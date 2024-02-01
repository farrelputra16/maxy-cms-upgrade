<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        body {
            background: url("{{ asset('uploads/certificate/44/template.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column; /* Untuk menempatkan elemen secara vertikal */
            text-align: center; /* Untuk mengatur tulisan ke tengah secara horizontal */
            color: #000000;
        }

        /* Gaya CSS lainnya untuk sertifikat */
        h1 {
            font-size: 36px; /* Sesuaikan ukuran font */
        }

        p {
            font-size: 18px; /* Sesuaikan ukuran font */
        }

        /* Tambahan gaya CSS lainnya... */
    </style>
</head>
<body>
    <h1>Certificate of Completion</h1>
    <p>This is to certify that {{ $username }} has successfully completed the course.</p>
    <!-- Additional content -->
</body>
</html>