@extends('partial.main')

@section('container')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<style>

        

    
</style>

<section class="flex flex-col items-center justify-center max-w-screen-xl mx-auto pt-20 px-4">
    <div class="flex flex-col mt-6 w-full">
        
        
        <div class="w-full h-full overflow-x-auto">
            <div class="flex py-2 align-middle">
                <div class=" border border-gray-200 rounded-xl mx-auto w-screen min-h-[350px]">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Data User</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl class="divide-y divide-gray-200">
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Nama</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ Auth::user()->name }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ Auth::user()->email }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Level</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ Auth::user()->level == 0 ? 'Koordinator' : 'Surveyor' }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                              <dt class="text-sm font-medium text-gray-500">Total Survey</dt>
                              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $total_survey->total ?? 0 }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ Auth::user()->created_at }}</dd>
                            </div>
                            
                            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                              <dt class="text-sm font-medium text-gray-500">Perbarui Profil</dt>
                              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <a href="{{ route('user-edit', Auth::user()->username) }}" class="text-blue-600 hover:text-blue-800">Klik disini</a>
                              </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
                    
    
</section>
<script src="{{ asset('js/home.js') }}"></script>
@if(session('message'))
    <script>
        alert("Selamat datang di website BPRS Batimakmur Indah!")
    </script>
@endif

<script>
    // $(document).ready(function() {
    //     $('#tabel_nasabah').DataTable({
    //         responsive: true,
    //         scrollX: true
    //     });
    // });
</script>

@endsection