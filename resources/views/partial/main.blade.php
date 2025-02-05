
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baznas DKI</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <style>
        /* Ganti warna latar belakang tombol "Choose Files" menjadi abu-abu */
        input[type="file"]::-webkit-file-upload-button {
            background-color: #cbd5e0; /* Sesuaikan warna abu-abu yang diinginkan */
            border: 1px solid #a0aec0; /* Sesuaikan warna border yang diinginkan */
            color: #4a5568; /* Sesuaikan warna teks yang diinginkan */
            padding: 0.001rem 1rem; /* Sesuaikan padding yang diinginkan */
            border-radius: 0.275rem; /* Sesuaikan radius border yang diinginkan */
            transition: background-color 0.3s ease; /* Efek transisi ketika dihover */
            margin-left:0.1rem   
        }
    
        input[type="file"]::-webkit-file-upload-button:hover {
            background-color: #a0aec0; /* Sesuaikan warna abu-abu saat dihover */
        }
    </style>
</head>
<body class="m-0 p-0">
    @include('partial.navbar')

    @yield('container')

</body>
</html>