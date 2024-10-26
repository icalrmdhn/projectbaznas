@extends('partial.main')

@section('container')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<style>
</style>

<section class="flex flex-col items-cente max-w-screen-xl mx-auto pt-20 px-4">
    <div class="flex flex-col mt-6 w-full">
        <div class="py-2 align-middle w-full">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4 mx-auto w-full">
                <a href="{{ route('home') }}" class="rounded min-h-28 overflow-hidden shadow-lg bg-white border border-gray-200 flex items-center hover:shadow-2xl transform hover:scale-105 hover:bg-gray-100 transition duration-300 ease-in-out">
                    <div class="ps-6 pe-1 pt-4 w-full h-full flex flex-col justify-between">
                        <div class="mb-2 text-sm">Total Keseluruhan Data Mustahik</div>
                        <div class="flex justify-between align-bottom">
                            <p class="font-bold text-xl mb-2">
                              {{ $total_mustahik }}
                          </p>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                          </svg>
                        </div>
                    </div>
                </a>
                <a href="{{ route('home', ['filter' => 'total_surveyor']) }}" class="rounded min-h-28 overflow-hidden shadow-lg bg-white border border-gray-200 flex items-center hover:shadow-2xl transform hover:scale-105 hover:bg-gray-100 transition duration-300 ease-in-out">
                    <div class="ps-6 pe-1 pt-4 w-full h-full flex flex-col justify-between">
                        <div class="mb-2 text-sm">Total Keseluruhan Data Surveyor</div>
                        <div class="flex justify-between align-bottom">
                            <p class="font-bold text-xl mb-2">
                                {{ $total_surveyor }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
                </a>
                <a href="{{ route('home', ['filter' => 'total_admin']) }}" class="rounded min-h-28 overflow-hidden shadow-lg bg-white border border-gray-200 flex items-center hover:shadow-2xl transform hover:scale-105 hover:bg-gray-100 transition duration-300 ease-in-out">
                    <div class="ps-6 pe-1 pt-4 w-full h-full flex flex-col justify-between">
                        <div class="mb-2 text-sm">Total Keseluruhan Data Admin</div>
                        <div class="flex justify-between align-bottom">
                            <p class="font-bold text-xl mb-2">
                                {{ $total_admin }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
                </a>
                <a href="{{ route('home', ['filter' => 'total_ttd_sudah']) }}" class="rounded min-h-28 overflow-hidden shadow-lg bg-white border border-gray-200 flex items-center hover:shadow-2xl transform hover:scale-105 hover:bg-gray-100 transition duration-300 ease-in-out">
                    <div class="ps-6 pe-1 pt-4 w-full h-full flex flex-col justify-between">
                        <div class="mb-2 text-sm">Total Data Sudah di Validasi</div>
                        <div class="flex justify-between align-bottom">
                            <p class="font-bold text-xl mb-2">
                                {{ $total_ttd_sudah }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-10 md:grid-rows-4 gap-4 mx-auto w-full">
                <a href="{{ route('home', ['filter' => 'total_ttd_belum']) }}" class="col-span-1 row-span-1 rounded overflow-hidden shadow-lg bg-white border border-gray-200 flex items-center hover:shadow-2xl transform hover:scale-105 hover:bg-gray-100 transition duration-300 ease-in-out">
                    <div class="ps-6 pe-1 pt-4 w-full h-full flex flex-col justify-between">
                        <div class="mb-2 text-sm">Total Data Belum Di Validasi</div>
                        <div class="flex justify-between align-bottom">
                            <p class="font-bold text-xl mb-2">
                                {{ $total_ttd_belum }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
                </a>
                <a href="{{ route('home', ['filter' => 'total_ditolak']) }}" class="col-span-1 row-span-1 rounded overflow-hidden shadow-lg bg-white border border-gray-200 flex items-center hover:shadow-2xl transform hover:scale-105 hover:bg-gray-100 transition duration-300 ease-in-out">
                    <div class="ps-6 pe-1 pt-4 w-full h-full flex flex-col justify-between">
                        <div class="mb-2 text-sm">Total Data Ditolak</div>
                        <div class="flex justify-between align-bottom">
                            <p class="font-bold text-xl mb-2">
                                {{ $total_ditolak }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
                </a>
                <a href="{{ route('home', ['filter' => 'total_diterima']) }}" class="col-span-1 row-span-1 rounded overflow-hidden shadow-lg bg-white border border-gray-200 flex items-center hover:shadow-2xl transform hover:scale-105 hover:bg-gray-100 transition duration-300 ease-in-out">
                    <div class="ps-6 pe-1 pt-4 w-full h-full flex flex-col justify-between">
                        <div class="mb-2 text-sm">Total Data Diterima</div>
                        <div class="flex justify-between align-bottom">
                            <p class="font-bold text-xl mb-2">
                                {{ $total_diterima }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="rounded overflow-hidden shadow-lg bg-white border border-gray-200 col-span-1 md:row-span-4 px-6 py-4">
                  <h2 class="font-bold text-xl mb-4 ">List Surveyor</h2>
                  <div class="flex flex-col">
                    <div class="overflow-x-auto flex flex-col gap-2">
                      @foreach ($detail_surveyor as $item)
                        <a href="{{ route('home', ['filter' => 'surveyor','name' => $item->name]) }}" href="" class="flex justify-between items-center px-2 py-2 rounded-lg hover:bg-gray-100">
                          <h5 class="">{{ $item->name }}</h5>
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                        </a>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="rounded overflow-hidden shadow-lg bg-white border border-gray-200 col-span-1 sm:col-span-3 row-span-3 px-6 py-4">
                  <h2 class="font-bold text-xl mb-4 ">Grafik Data Surveyor</h2>
                  <div id="column-chart"></div>
                  <script>
                    
const options = {
  series: [
    {
      name: "Total Data Survey",
      color: "#22c55e",
      data: [
        @foreach ($detail_surveyor as $item) 
          { x: "{{ $item->name }}", y: {{ $item->total }} },
        @endforeach
        
        
      ],
    },
  ],
  chart: {
    type: "bar",
    height: "320px",
    fontFamily: "Inter, sans-serif",
    toolbar: {
      show: false,
    },
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "70%",
      borderRadiusApplication: "end",
      borderRadius: 8,
    },
  },
  tooltip: {
    shared: true,
    intersect: false,
    style: {
      fontFamily: "Inter, sans-serif",
    },
  },
  states: {
    hover: {
      filter: {
        type: "darken",
        value: 1,
      },
    },
  },
  stroke: {
    show: true,
    width: 0,
    colors: ["transparent"],
  },
  grid: {
    show: false,
    strokeDashArray: 4,
    padding: {
      left: 2,
      right: 2,
      top: -14
    },
  },
  dataLabels: {
    enabled: false,
  },
  legend: {
    show: false,
  },
  xaxis: {
    floating: false,
    labels: {
      show: true,
      style: {
        fontFamily: "Inter, sans-serif",
        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
      }
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false,
    },
  },
  yaxis: {
    show: false,
  },
  fill: {
    opacity: 1,
  },
}

if(document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
  const chart = new ApexCharts(document.getElementById("column-chart"), options);
  chart.render();
}

                  </script>
                </div>
            </div>
        </div>
    </div>

    <br>
</section>

@endsection
<script src="{{ asset('js/home.js') }}"></script>
@if(session('message'))
    <script>
        alert("Selamat datang di website BPRS Batimakmur Indah!")
    </script>
@endif
