@extends('partial.main')

@section('container')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<style>

        

    
</style>

<section class="flex flex-col items-center justify-center max-w-screen-xl mx-auto pt-20 px-4">
    <div class="flex items-center justify-center w-full my-4">
        <div class="flex items-center w-full max-w-sm">
            <input type="text" name="search" id="search" class="form-input w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Cari...">
            <a href="{{ request()->fullUrl() }}" id="btnSearch" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Cari
            </a>
        </div>
    </div>
    <script>
        document.getElementById('search').addEventListener('change', function() {
            const searchValue = this.value;
            const btnSearch = document.getElementById('btnSearch');
            const newUrl = new URL(btnSearch.href);
            newUrl.searchParams.set('search', searchValue);
            btnSearch.href = newUrl.toString();
        });
    </script>
    <div class="flex flex-col mt-6 w-full">
        @if (Auth::user()->level == 0 && request()->has('filter'))
            @if (request('filter') == 'total_admin')
                <h1 class="text-3xl font-bold text-center">Data Mustahik Admin</h1>
            @elseif (request('filter') == 'total_surveyor')
                <h1 class="text-3xl font-bold text-center">Data Mustahik Surveyor</h1>
            @elseif (request('filter') == 'total_ttd_sudah')
                <h1 class="text-3xl font-bold text-center">Data Mustahik Sudah Validasi</h1>
            @elseif (request('filter') == 'total_ttd_belum')
                <h1 class="text-3xl font-bold text-center">Data Mustahik Belum Validasi</h1>
            @elseif (request('filter') == 'total_ditolak')
                <h1 class="text-3xl font-bold text-center">Data Mustahik Ditolak</h1>
            @elseif (request('filter') == 'total_diterima')
                <h1 class="text-3xl font-bold text-center">Data Mustahik Diterima</h1>
            @elseif (request('filter') == 'surveyor')
                <h1 class="text-3xl font-bold text-center">Data Mustahik Surveyor {{ request('name') }}</h1>
            @else
                <h1 class="text-3xl font-bold text-center">Data Mustahik</h1>
            @endif
        @endif
        <div class="flex justify-between py-2 align-middle w-full">
            <div class="flex justify-between gap-2 mb-4 mx-auto w-full">
                <a href="/form" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full md:w-auto">
                    Tambah Data Mustahik Baru
                </a>
                @if (Auth::user()->level == 0 && request()->has('filter'))
                <a href="{{ route('dashboard') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full md:w-auto">
                    Kembali ke Dashboard
                </a>
                @endif
            </div>

        </div>
        <div class="w-full h-full overflow-x-auto">
            <div class="flex py-2 align-middle">
                <div class=" border border-gray-200 rounded-xl mx-auto w-screen min-h-[350px]">
                    <table class="min-w-full divide-y divide-gray-200 table-auto" id="tabel_nasabah">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Nomor Survey
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Nama Mustahik
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Pekerjaan
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Umur
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Jenis Bantuan
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Status Kelayakan
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Tanggal Survey
                                </th>
                                @if (Auth::user()->level == 0)
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Surveyor
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Validasi Koordinator
                                </th>
                                @endif
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($mustahik as $item)
                            <tr class="hover:bg-gray-100 cursor-pointer">
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-bold text-center text-black">{{ $item->mustahik_id }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $item->nama_mustahik }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $item->pekerjaan }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $item->usia }} tahun</p>
                                </td>
                                                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $item->jenis_bantuan }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $item->rekomendasi_scoring == "1" ? "Layak" : "Tidak Layak" }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ \Carbon\Carbon::parse($item->tanggal_survey)->format('d-m-Y') }}</p>
                                </td>
                                @if (Auth::user()->level == 0)
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $item->user_id }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $item->signed_koordinator ? "Sudah Divalidasi" : "Belum Divalidasi" }}</p>
                                </td>
                                @endif
                                <td class="px-2 py-4 whitespace-nowrap items-center justify-center align-middle flex">
                                    <div class="relative inline-block text-left mx-auto">
                                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-{{$item->mustahik_id}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"> Action <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                            </svg>
                                            </button>
                                                <div id="dropdown-{{$item->mustahik_id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                                    <li>
                                                    @if (Auth::user()->level == 0 && !$item->signed_koordinator)
                                                    <li>
                                                    <a href="{{ route('form-validasi', $item->mustahik_id) }}" target="_blank" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 ">Validasi</a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a href="{{ route('form-print', $item->mustahik_id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 ">Print</a>
                                                    </li>

                                                    <li>
                                                        <a href="{{ route('form-edit', $item->mustahik_id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 ">Edit</a>
                                                    </li>
                                                    {{-- <li>
                                                        <form action="{{ route('form-destroy', $item->mustahik_id) }}" method="POST" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 ">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="block hover:bg-gray-100 dark:hover:bg-gray-600 ">Hapus</button>
                                                        </form>
                                                    </li> --}}
                                                    </ul>
                                                </div>
    
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="flex justify-between">
        {{ $mustahik->appends(request()->query())->links() }}
    </div>
</section>


<script src="{{ asset('js/home.js') }}"></script>
@if(session('message'))
    <script>
        alert("Selamat datang di website BPRS Batimakmur Indah!")
    </script>
@endif






@endsection