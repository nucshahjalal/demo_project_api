@extends('backend.app')
@section('page_title','Vehicle List')
@section('content')

<main class="nxl-container">
<div class="nxl-content">
        <!-- [ page-header ] start -->
    <div class="page-header d-flex align-items-center justify-content-between">
    <div class="page-header-left d-flex align-items-center gap-2">
    

       <button onclick="triggerPrint()" class="btn btn-success btn-lg shadow-sm">
            <i class="fas fa-print"></i> <strong>Print</strong>
        </button>
    </div>

    <div class="page-header-left d-flex align-items-center gap-2">
        <div class="page-header-right ms-auto">
            <form method="get" action="">
                @csrf
                <div class="d-flex align-items-center gap-2">
                    <input class="form-control" type="text" name="filter" 
                        value="{{ request('filter') }}" id="filter" placeholder="Search...">
                    <div class="col-auto">
                        <button class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>

       
    </div>
</div>

<div class="main-content">
    <div class="container-fluid">

        <div class="print-wrapper" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15mm; padding: 10mm 0;">
            @foreach($students as $student)
                @php
                    $html = $template->editor_content ?? '';
                    $bgImage = !empty($template->template_file) ? asset($template->template_file) : '';
                    
                    $studentPhoto = (!empty($student->photo) && file_exists(public_path($student->photo))) 
                        ? asset($student->photo) 
                        : asset('images/default-user.png');

                    $replaceMap = [
                        '[TEMPLATE_FILE]' => $bgImage,
                        '[PHOTO_URL]'     => $studentPhoto,
                        '[NAME]'          => $student->name ?? '',
                        '[ID]'            => $student->reg_id ?? '',
                        '[F_NAME]'        => $student->f_name ?? '',
                        '[M_NAME]'        => $student->m_name ?? '',
                        '[ROLL]'          => (string) ($student->roll ?? $student->roll_no ?? 'N/A'),
                        '[ADDRESS]'       => $student->address ?? ''
                    ];

                    $html = str_replace(array_keys($replaceMap), array_values($replaceMap), $html);
                @endphp

                <div class="card-container" style="page-break-inside: avoid; flex: 0 0 auto;">
                    <div class="id-card-render">
                        {!! $html !!}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
</div>
    <!-- [ Footer ] start -->
    <!-- @include('backend.footer') -->
    <!-- [ Footer ] end -->
    
</main>

<style>
  @media print {
        @page {
            size: A4;
            margin: 0; /* ব্রাউজার মার্জিন জিরো করে ভেতরে প্যাডিং ব্যবহার করা ভালো */
        }
        body {
            margin: 0;
            padding: 0;
            background: none !important;
        }
        .print-wrapper {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: wrap !important;
            justify-content: center !important; /* কার্ডগুলো পেজের মাঝখানে রাখবে */
        }
    }
    
    /* এডিটর থেকে আসা কোনো বাড়তি মার্জিন থাকলে তা রিসেট করবে */
    .id-card-render > div {
        margin: 0 !important;
    }
   .btn {
        text-transform: capitalize;
    }

    /* if we need */
    /* .id-card-render {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    height: 100%;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    transition: 0.2s;
}

.id-card-render:hover {
    transform: scale(1.02);
} */

/* Photo style */
.id-card-render img {
    width: {{ $template->photo_size }}px;
    height: {{ $template->photo_size }}px;
    object-fit: cover;
    border-radius: {{ $template->photo_style == 'round' ? '50%' : '6px' }};
}

</style>


<script>
  //print button click event
    function triggerPrint() {
        setTimeout(function() {
            window.print();
        }, 500);
    }
</script>
@endsection

