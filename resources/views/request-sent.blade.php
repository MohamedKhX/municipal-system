<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم إرسال الطلب بنجاح</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #e6f7f2, #d1f5ea);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 90%;
            width: 400px;
        }
        .icon {
            font-size: 4rem;
            color: #10b981;
            margin-bottom: 1rem;
        }
        h1 {
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        p {
            color: #4b5563;
            margin-bottom: 1.5rem;
        }
        .button {
            background-color: #10b981;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .button:hover {
            background-color: #059669;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<div class="card">
    <div class="icon">✔️</div>
    <h1>تم إرسال الطلب بنجاح!</h1>
    <p>تمت معالجة طلبك وإرساله بنجاح. سنعود إليك قريبًا.</p>
    <a href="{{ route('home', getCurrentMunicipality()) }}" class="button">العودة إلى الصفحة الرئيسية</a>
</div>
</body>
</html>
