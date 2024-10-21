@extends('partial.main')

@section('container')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<section class="flex flex-col items-center justify-center max-w-screen-xl mx-auto pt-20 px-4">
    <div class="flex flex-col mt-6 w-full">
        <div class="flex justify-between py-2 align-middle w-full">
            <div class="flex justify-between gap-2 mb-4 mx-auto w-full">
                <a href="{{ route('user-store') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full md:w-auto">
                    Tambah Pengguna Baru
                </a>

            </div>
        </div>
        <div class="w-full h-full overflow-x-auto">
            <div class="flex py-2 align-middle">
                <div class=" border border-gray-200 rounded-xl mx-auto w-screen min-h-[350px]">
                    <table class="min-w-full divide-y divide-gray-200 table-auto" id="tabel_pengguna">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Nama
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Username
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Level
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Status Aktif
                                </th>
                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-black">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr class="hover:bg-gray-100 cursor-pointer">
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-bold text-center text-black">{{ $user->name }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $user->username }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $user->level == 0 ? 'Koordinator' : 'Surveyor' }}</p>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <p class="text-sm font-normal text-center text-black">{{ $user->isActive ? 'Aktif' : 'Tidak Aktif' }}</p>
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap items-center justify-center align-middle flex">
                                  <div class="relative inline-block text-left mx-auto">
                                        
                                  <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-{{$user->username}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"> Action <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                      </svg>
                                  </button>
                                  <div id="dropdown-{{$user->username}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                      <li>
                                      <a href="{{ route('user-edit', $user->username) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 ">Edit</a>
                                      </li>
                                      <li>
                                          <form action="{{ route('user-destroy', $user->username) }}" method="POST" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 ">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="block hover:bg-gray-100 dark:hover:bg-gray-600 ">Hapus</button>
                                          </form>
                                      </li>
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
        {{ $users->links() }}
    </div>
</section>
<script src="{{ asset('js/home.js') }}"></script>
@if(session('message'))
    <script>
        alert("{{ session('message') }}")
    </script>
@endif

<script>
    // $(document).ready(function() {
    //     $('#tabel_pengguna').DataTable({
    //         responsive: true,
    //         scrollX: true
    //     });
    // });
</script>

@endsection