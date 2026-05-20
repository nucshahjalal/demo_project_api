@extends('backend.app')
@section('page_title','ID Card Print Preview')

@section('content')
<style>
    /* ১. প্রিন্ট অপ্টিমাইজেশন - প্রিন্ট করার সময় বাটন ও সাইডবার লুকানোর জন্য */
    @media print {
        .no-print, .main-header, .main-sidebar, .main-footer, .breadcrumb { 
            display: none !important; 
        }
        
        body, .content-wrapper { 
            background: #fff !important; 
            margin: 0 !important; 
            padding: 0 !important; 
        }

        .page {
            margin: 0 auto !important;
            box-shadow: none !important;
            border: none !important;
            width: 100% !important;
            /* ব্যাকগ্রাউন্ড ইমেজ প্রিন্ট করার জন্য */
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        /* এক পেজে ৯টি কার্ড রাখার জন্য ব্রেকিং ঠিক করা */
        .id-card-render {
            page-break-inside: avoid;
            border: 1px solid #000 !important;
        }
    }

    /* ২. স্ক্রিন প্রিভিউ লেআউট */
    .page {
        width: {{ $template->page_width }}mm;
        min-height: {{ $template->page_height }}mm;
        padding: {{ $template->margin_top }}mm {{ $template->margin_right }}mm {{ $template->margin_bottom }}mm {{ $template->margin_left }}mm;
        margin: 20px auto;
        background: white;
        box-shadow: 0 0 15px rgba(0,0,0,0.2);
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        align-content: start;
        box-sizing: border-box;
    }

    .id-card-render {
        width: 100%;
        position: relative;
        overflow: hidden;
        background: #fff;
        border: 1px solid #ddd;
        transition: transform 0.2s;
    }

    /* ডায়নামিক ফটো স্টাইল */
    .id-card-render img.photo {
        width: {{ $template->photo_size }}px;
        height: {{ $template->photo_size }}px;
        border-radius: {{ $template->photo_style == 'round' ? '50%' : '5px' }};
        object-fit: cover;
    }

    .signature-area {
        margin-top: 5px;
        font-size: 11px;
        font-weight: bold;
        border-top: 1px solid #ccc;
        display: inline-block;
        padding-top: 2px;
    }
</style>

<!-- প্রিন্ট কন্ট্রোল প্যানেল -->
<div class="container-fluid no-print pt-4">
    <div class="card border-primary">
        <div class="card-body d-flex justify-content-between align-items-center bg-light">
            <div>
                <h4 class="text-primary mb-0"><i class="fas fa-id-card"></i> ID Card Preview</h4>
                <p class="text-muted mb-0">Template: <strong>{{ $template->card_name }}</strong> | Total: {{ count($students) }} Students</p>
            </div>
            <div>
                <button onclick="window.history.back()" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-arrow-left"></i> Go Back
                </button>
                <!-- মেইন প্রিন্ট বাটন -->
                <button onclick="triggerPrint()" class="btn btn-success btn-lg shadow-sm">
                    <i class="fas fa-print"></i> <strong>Print ID Cards Now</strong>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- কার্ড কন্টেইনার -->
<div class="page" id="printableArea">
   @foreach($students as $student)
    @php
        $html = $template->editor_content;

        // ব্যাকগ্রাউন্ড ইমেজ রিপ্লেস
        $bgImage = $template->template_file ? asset($template->template_file) : '';
        $html = str_replace('[TEMPLATE_FILE]', $bgImage, $html);

        // ১. আপনার এডিটরে যদি [PHOTO_URL] থাকে তবে এটি ব্যবহার করুন
        // ২. asset('storage/'.$student->photo) নিশ্চিত করুন যদি পাথ 'students/image.jpg' হয়
        $studentPhoto = $student->photo ? asset('storage/' . $student->photo) : asset('images/default-user.png');
        
        $html = str_replace('[PHOTO_URL]', $studentPhoto, $html); // আপনার এডিটর অনুযায়ী
        $html = str_replace('{{photo}}', $studentPhoto, $html);    // আপনার কোড অনুযায়ী

        // বাকি ডাটা রিপ্লেস
        $html = str_replace('[NAME]', $student->name, $html);
        $html = str_replace('{{name}}', $student->name, $html);
        $html = str_replace('[ID]', $student->reg_id, $html);
        $html = str_replace('{{student_id}}', $student->reg_id, $html);
        $html = str_replace('[F_NAME]', $student->f_name, $html);
      
    @endphp

    <div class="id-card-render shadow-sm p-1">
        {!! $html !!}
        {{-- সিগনেচার অংশ --}}
    </div>
@endforeach

</div>

<script>
    // বাটন ক্লিক করলে প্রিন্ট করার ফাংশন
    function triggerPrint() {
        // ছোট একটি ডিলে দেওয়া যাতে সব ইমেজ রেন্ডার হতে পারে
        setTimeout(function() {
            window.print();
        }, 500);
    }
</script>
@endsection
