<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Employee, Product, Current, Portfolio};
use DB;

class PortfolioController extends Controller
{
    public function index(){
        return view('portfolio.index');
    }

    public function uploadFile(){
       
        return view('upload.index');
    }

}
