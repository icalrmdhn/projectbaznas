<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baznas DKI</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</head>
<body style="background: url(https://baznas.tangerangkota.go.id/assets/frontend/img/profil.jpeg); background-size: cover; background-repeat: no-repeat" class="bg-cover bg-no-repeat">
    <form method="post" action="{{ Route('authenticate') }}" class="m-0">
        @csrf
        <div class="h-full w-full flex">
            <div class="p-6 w-[26rem] m-auto border-gray-300 border shadow-xl rounded-lg bg-white">
                <div class="flex justify-center py-4">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="w-auto h-28"> 
                </div>
                
                <div class="align-middle space-y-4">
                    
                    <div>
                        <label for="username" class="block mb-2 text-xs font-medium text-black">Username</label>
                        <input name="username" type="text" placeholder="Username" class=" shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>
            
                    <div>
                        <label for="password" class="block mb-2 text-xs font-medium text-black">Password</label>
                        <input name="password" type="password" placeholder="Password" class=" shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>
                    <div class=" items-center flex justify-center">
                        <button type="submit" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Login</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </form>
    @if(session('message'))
        <script> 
            alert('Daftar berhasil, silakan login!')
        </script>
    @endif
    @if(session('message-error'))
    <script>
        alert('Login Gagal!')
        </script>
    @endif
</body>
</html>