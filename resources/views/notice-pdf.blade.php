<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $notice->title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; line-height: 1.8; padding: 40px; color: #333; }
        h2 { color: #1e70cd; text-align: center; border-bottom: 2px solid #1e70cd; padding-bottom: 10px; }
        .date { text-align: right; color: #666; font-size: 12px; margin-bottom: 20px; }
        .content { margin-top: 20px; }
        .footer { margin-top: 50px; text-align: center; font-size: 12px; color: #999; border-top: 1px solid #ddd; padding-top: 10px; }
    </style>
</head>
<body>
    <h2>{{ $notice->title }}</h2>
    <div class="date">{{ $notice->notice_date ? date('d/m/Y', strtotime($notice->notice_date)) : '' }}</div>
    <hr>
    <div class="content">
        <p>{{ $notice->description ?? 'কোন বিবরণ নেই' }}</p>
    </div>
    <div class="footer">
        বাতাইছড়ি দাখিল মাদ্রাসা - Bataichhari Dakhil Madrasah
    </div>
</body>
</html>