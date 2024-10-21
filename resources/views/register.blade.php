@extends('partial.main')

@section('container')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jSignature/2.1.2/jSignature.min.js"></script>

    
    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }

        .signature canvas {
            width: 100% !important;
            height: 200px !important;
        }
    </style>
    <form method="POST" action="{{ Route('user-store') }}" class="pt-20 flex flex-col space-y-4 max-w-screen-xl mx-auto">
        @csrf
        <section id="identitas_pengguna" class="space-y-4">
            <p class="block py-4 text-base font-semibold text-black">
                Tambahkan Pengguna
            </p>
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
            <div class="gap-4">
                <div class="space-y-4">
                    <input type="hidden" name="isActive" value="1">
                    <div>
                        <label for="name" class="block mb-2 text-xs font-medium text-black">Nama</label>
                        <input name="name" type="text" id="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            required value="{{ old('name') }}">
                    </div>

                    <div>
                        <label for="username" class="block mb-2 text-xs font-medium text-black">Username</label>
                        <input name="username" type="text" id="username"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            required value="{{ old('username') }}">
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-xs font-medium text-black">Email</label>
                        <input name="email" type="email" id="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            required value="{{ old('email') }}">
                    </div>

                    <div>
                        <label for="password" class="block mb-2 text-xs font-medium text-black">Password</label>
                        <input name="password" type="password" id="password"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            required>
                    </div>

                    <div>
                        <label for="confirm-password" class="block mb-2 text-xs font-medium text-black">Confirm Password</label>
                        <input name="confirm-password" type="password" id="confirm-password"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            required>
                    </div>
                    <div class="">
                        <label for="level" class="block mb-2 text-xs font-medium text-black">Role</label>
                        <div class="flex flex-col gap-2">
                            <label for="koordinator_surveyor" class="inline-flex items-center cursor-pointer">
                                <input id="koordinator_surveyor" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="level" value="0" required @checked(old('level') == 0)>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Koordinator Surveyor</span>
                            </label>
                            <label for="surveyor" class="inline-flex items-center cursor-pointer">
                                <input id="surveyor" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="level" value="1" required @checked(old('level') == '1')>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Surveyor</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="pt-6">
            <button type="submit"
                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 my-2 w-full">Simpan</button>
        </div>
    </form> 




@endsection