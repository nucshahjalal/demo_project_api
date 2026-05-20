<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>Print ID Card</title>
    <style>
        @page {
            size: {{ $cardSetting->pageWidth }} {{ $cardSetting->pageHeight }};
            margin: 0;
        }

        body { 
            margin: 0; 
            display: flex; 
            flex-direction: column;
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            background: #f0f0f0; 
            font-family: sans-serif;
        }

        @media print {
            body { background: none; }
            .no-print { display: none; }
            .id-card { 
                box-shadow: none; 
                margin: 0;
                /* প্রিন্টে ব্যাকগ্রাউন্ড ইমেজ দেখানোর জন্য নিচের লাইনটি জরুরি */
                -webkit-print-color-adjust: exact; 
                print-color-adjust: exact;
            }
        }

        .print-btn {
            margin-bottom: 20px;
            padding: 10px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .id-card {
            width: {{ $cardSetting->pageWidth }};
            height: {{ $cardSetting->pageHeight }};
            position: relative;
            /* ডাটাবেস থেকে ডাইনামিক ব্যাকগ্রাউন্ড ইমেজ */
         background-image: url("{{ asset('backend/assets/images/card.jpg') }}");
            background-size: 100% 100%; /* সম্পূর্ণ কার্ড কভার করার জন্য */
            background-repeat: no-repeat;
            background-position: center;
            overflow: hidden;
            background-color: white;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }

        .label { position: absolute; }

        .student-photo {
            position: absolute;
            top: {{ $cardSetting->photoTop }};
            left: {{ $cardSetting->photoLeft }};
            width: {{ $cardSetting->photoWidth }};
            /* বর্ডার স্টাইল */
            border: {{ $cardSetting->photoBorder }} solid #fff;
            border-radius: 5px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <div class="no-print">
        <button class="print-btn" onclick="window.print()">Print / Save as PDF</button>
    </div>

    <div class="id-card">
        <!-- স্টুডেন্ট ফটো (এটিও স্টুডেন্ট টেবিল থেকে ডাইনামিক হওয়া উচিত) -->
        <img src="{{ asset($student->photo ?? 'backend/assets/images/image.jpg') }}" class="student-photo">

        <!-- নাম -->
        <div class="label" style="top: {{ $cardSetting->nameTop }}; left: {{ $cardSetting->nameLeft }}; font-size: {{ $cardSetting->nameSize }}; color: {{ $cardSetting->nameColor }}; font-weight: bold;">
            {{ strtoupper($student->name) }}
        </div>

        <!-- আইডি -->
        <div class="label" style="top: {{ $cardSetting->idTop }}; left: {{ $cardSetting->idLeft }}; font-size: {{ $cardSetting->idSize }}; color: {{ $cardSetting->idColor }};">
            ID NO: {{ $student->student_id }}
        </div>

        <!-- ডিপার্টমেন্ট -->
        <div class="label" style="top: {{ $cardSetting->deptTop }}; left: {{ $cardSetting->deptLeft }}; font-size: {{ $cardSetting->deptSize }};">
            Dept: {{ $student->department }}
        </div>
    </div>

</body>
</html>
