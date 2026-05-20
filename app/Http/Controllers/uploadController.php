<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Employee, Product, Current, Portfolio};
use DB;
use ZipArchive;
use SimpleXMLElement;


class uploadController extends Controller
{
   

    public function index(){
     // dd('ff');
        return view('sms.upload.index');
    }

   public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx'
        ]);

        $filePath = $request->file('file')->getRealPath();
        $zip = new ZipArchive();

        if ($zip->open($filePath) !== true) {
            return back()->with('error', 'Cannot open Excel file');
        }

        /**
         * Read shared strings
         */
        $sharedStrings = [];
        if ($xml = $zip->getFromName('xl/sharedStrings.xml')) {
            $shared = new SimpleXMLElement($xml);
            foreach ($shared->si as $item) {
                $sharedStrings[] = (string) $item->t;
            }
        }

        /**
         * Get first sheet
         */
        $workbookXml = $zip->getFromName('xl/workbook.xml');
        $workbook = new SimpleXMLElement($workbookXml);
        $sheetId = (string) $workbook->sheets->sheet[0]['sheetId'];
        $sheetXml = $zip->getFromName("xl/worksheets/sheet{$sheetId}.xml");

        if (!$sheetXml) {
            return back()->with('error', 'Sheet not found');
        }

        $sheet = new SimpleXMLElement($sheetXml);

        DB::beginTransaction();

        try {
            $isHeader = true;

            foreach ($sheet->sheetData->row as $row) {
                $cells = [];

                foreach ($row->c as $cell) {
                    $column = preg_replace('/\d+/', '', (string) $cell['r']);
                    $value  = (string) $cell->v;

                    if (isset($cell['t']) && $cell['t'] == 's') {
                        $value = $sharedStrings[(int) $value] ?? '';
                    }

                    $cells[$column] = trim($value);
                }

                // Skip header row
                if ($isHeader) {
                    $isHeader = false;
                    continue;
                }

                // Skip empty rows
                if (empty(array_filter($cells))) {
                    continue;
                }

                // Insert into DB
                Portfolio::create([
                    'name'   => $cells['A'] ?? null,
                    'status' => $cells['B'] ?? null,
                ]);
            }

            DB::commit();
            return back()->with('success', 'Excel file uploaded successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

}
