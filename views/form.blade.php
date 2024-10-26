@extends ('partial.main')

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
    <form method="POST" action="{{ Route('form-store') }}" class="pt-20 flex flex-col space-y-4 max-w-screen-xl mx-auto">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->name }}">
        <section id="identitas_mustahik" class="space-y-4">
            <p class="block py-4 text-base font-semibold text-black">
                I. Identitas Mustahik
            </p>

            <div class="gap-4">
                <div class="space-y-4">
                    <div>
                        <label for="nama_mustahik" class="block mb-2 text-xs font-medium text-black">Nama Mustahik</label>
                        <input name="nama_mustahik" type="text" id="nama_mustahik"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            required>
                    </div>

                    <div>
                        <label for="nama_kepala_keluarga" class="block mb-2 text-xs font-medium text-black">Nama Kepala
                            Keluarga</label>
                        <input name="nama_kepala_keluarga" type="text" id="nama_kepala_keluarga"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            required>
                    </div>

                    <div class="flex justify-between gap-2">
                        <div class="w-1/2">
                            <label for="jenis_kelamin" class="block mb-2 text-xs font-medium text-black">Jenis
                                Kelamin</label>
                            <div class="flex flex-col gap-2">
                                <label for="jenis_kelamin_laki-laki" class="inline-flex items-center cursor-pointer">
                                    <input id="jenis_kelamin_laki-laki" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_kelamin" value="Laki-laki" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Laki-laki</span>
                                </label>
                                <label for="jenis_kelamin_perempuan" class="inline-flex items-center cursor-pointer">
                                    <input id="jenis_kelamin_perempuan" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_kelamin" value="Perempuan" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <div class="w-1/2">
                            <label for="usia" class="block mb-2 text-xs font-medium text-black">Usia</label>
                            <input name="usia" type="number" id="usia"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                        </div>
                    </div>

                    <div>
                        <label for="no_ktp_kk" class="block mb-2 text-xs font-medium text-black">No. KTP / KK</label>
                        <input name="no_ktp_kk" type="text" id="no_ktp_kk"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                            required>
                    </div>
                </div>

                <div class="space-y-4 mt-2">
                    <div>
                        <label for="alamat" class="block mb-2 text-xs font-medium text-black">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="block p-2.5 w-full text-sm text-black bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500"
                            required></textarea>
                    </div>
                    <div class="flex gap-2 justify-between">
                        <div class="w-1/2">
                            <label for="kota" class="block mb-2 text-xs font-medium text-black">Kota</label>
                            <select name="kota" id="kota"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                                <option value="">Pilih Kota</option>
                            </select>
                            <input type="hidden" name="kota_nama" id="kota_nama">
                        </div>
                        <div class="w-1/2">
                            <label for="kecamatan" class="block mb-2 text-xs font-medium text-black">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                                <option value="">Pilih Kecamatan</option>
                                
                            </select>
                            <input type="hidden" name="kecamatan_nama" id="kecamatan_nama">
                        </div>
                    
                       
                    </div>
                    <div class="flex justify-between gap-2">
                        <div class="flex flex-col w-1/3">
                            <label for="kelurahan" class="block mb-2 text-xs font-medium text-black">Kelurahan</label>
                            <select name="kelurahan" id="kelurahan"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                                <option value="">Pilih Kelurahan</option>
                            </select>
                            <input type="hidden" name="kelurahan_nama" id="kelurahan_nama">
                        </div>
                        <div class="flex flex-col w-1/3">
                            <label for="rt" class="block mb-2 text-xs font-medium text-black">RT</label>
                            <input name="rt" type="text" id="rt"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                        </div>
                        <div class="flex flex-col w-1/3">
                            <label for="rw" class="block mb-2 text-xs font-medium text-black">RW</label>
                            <input name="rw" type="text" id="rw"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                        </div>
                        
                    </div> 
                    <script>
                        const kotaSelect = document.getElementById('kota');
                        const kecamatanSelect = document.getElementById('kecamatan');
                        const kelurahanSelect = document.getElementById('kelurahan');
                    
                        // Fungsi untuk mengambil data dari API
                        async function fetchWilayah(url) {
                            try {
                                const response = await fetch(url);
                                return response.json();
                            } catch (error) {
                                console.error('Error fetching data:', error);
                            }
                        }
                    
                        // Ambil data Kota dan tambahkan ke select Kota
                        async function getKota() {
                            const data = await fetchWilayah('https://api.binderbyte.com/wilayah/kabupaten?api_key=b6e3a8afb4176be07b43896dd2f1d5b37ac06cdcc1a618bb4b1df50895f84477&id_provinsi=31'); // Ganti dengan URL API yang valid
                            data.value.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.name;
                                kotaSelect.appendChild(option);
                            });
                        }
                    
                        // Ambil data Kecamatan berdasarkan Kota
                        async function getKecamatan(kotaId) {
                            const data = await fetchWilayah(`https://api.binderbyte.com/wilayah/kecamatan?api_key=b6e3a8afb4176be07b43896dd2f1d5b37ac06cdcc1a618bb4b1df50895f84477&id_kabupaten=${kotaId}`);
                            kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>'; // Reset kecamatan
                            kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>'; // Reset kelurahan
                            data.value.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.name;
                                kecamatanSelect.appendChild(option);
                            });
                        }
                    
                        // Ambil data Kelurahan berdasarkan Kecamatan
                        async function getKelurahan(kecamatanId) {
                            const data = await fetchWilayah(`https://api.binderbyte.com/wilayah/kelurahan?api_key=b6e3a8afb4176be07b43896dd2f1d5b37ac06cdcc1a618bb4b1df50895f84477&id_kecamatan=${kecamatanId}`);
                            kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>'; // Reset kelurahan
                            data.value.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item.name;
                                kelurahanSelect.appendChild(option);
                            });
                        }
                        
                        const kotaNama = document.getElementById('kota_nama');
                        const kecamatanBarang = document.getElementById('kecamatan_nama');
                        const kelurahanBarang = document.getElementById('kelurahan_nama');
                        // Event listener
                        kotaSelect.addEventListener('change', () => {
                            kotaNama.value = kotaSelect.options[kotaSelect.selectedIndex].text;
                            const kotaId = kotaSelect.value;
                            if (kotaId) getKecamatan(kotaId);
                        });
                    
                        kecamatanSelect.addEventListener('change', () => {
                            kecamatanBarang.value = kecamatanSelect.options[kecamatanSelect.selectedIndex].text;
                            const kecamatanId = kecamatanSelect.value;
                            if (kecamatanId) getKelurahan(kecamatanId);
                        });

                        kelurahanSelect.addEventListener('change', () => {
                            kelurahanBarang.value = kelurahanSelect.options[kelurahanSelect.selectedIndex].text;
                        })
                    
                        // Inisialisasi data Kota saat halaman dimuat
                        getKota();
                    </script>

                    <div class="space-y-4">
                        <div>
                            <label for="no_telp" class="block mb-2 text-xs font-medium text-black">No. Telepon</label>
                            <input name="no_telp" type="tel" id="no_telp"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label for="pekerjaan" class="block mb-2 text-xs font-medium text-black">Pekerjaan</label>
                            <input name="pekerjaan" type="text" id="pekerjaan"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label for="agama" class="block mb-2 text-xs font-medium text-black">Agama</label>
                            <input name="agama" type="text" id="agama"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 mt-4">
                    <div class="space-y-4">
                        <div>
                            <label for="nama_diwawancarai" class="block mb-2 text-xs font-medium text-black">Nama yang
                                Diwawancarai</label>
                            <input name="nama_diwawancarai" type="text" id="nama_diwawancarai"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label for="no_telp_diwawancarai" class="block mb-2 text-xs font-medium text-black">No.
                                Telepon yang Diwawancarai</label>
                            <input name="no_telp_diwawancarai" type="tel" id="no_telp_diwawancarai"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label for="hubungan" class="block mb-2 text-xs font-medium text-black">Hubungan</label>
                            <div class="flex flex-col gap-2">
                                <label for="hubungan_orang_tua" class="inline-flex items-center cursor-pointer">
                                    <input id="hubungan_orang_tua" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="hubungan" value="orang_tua" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Orang Tua</span>
                                </label>
                                <label for="hubungan_mertua" class="inline-flex items-center cursor-pointer">
                                    <input id="hubungan_mertua" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="hubungan" value="mertua" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Mertua</span>
                                </label>
                                <label for="hubungan_suami" class="inline-flex items-center cursor-pointer">
                                    <input id="hubungan_suami" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="hubungan" value="suami" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Suami</span>
                                </label>
                                <label for="hubungan_istri" class="inline-flex items-center cursor-pointer">
                                    <input id="hubungan_istri" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="hubungan" value="istri" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Istri</span>
                                </label>
                                <label for="hubungan_anak" class="inline-flex items-center cursor-pointer">
                                    <input id="hubungan_anak" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="hubungan" value="anak" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Anak</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="nomor_index" class="block mb-2 text-xs font-medium text-black">Nomor Index</label>
                            <input name="nomor_index" type="text" id="nomor_index"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                required>
                        </div>

                        <div>
                            <label for="jenis_bantuan" class="block mb-2 text-xs font-medium text-black">Jenis
                                Bantuan</label>
                            <div class="flex flex-col gap-2">
                                <label for="pendidikan" class="inline-flex items-center cursor-pointer">
                                    <input id="pendidikan" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_bantuan" value="pendidikan" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Pendidikan</span>
                                </label>
                                <label for="kesehatan" class="inline-flex items-center cursor-pointer">
                                    <input id="kesehatan" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_bantuan" value="kesehatan" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Kesehatan</span>
                                </label>
                                <label for="pekerjaan" class="inline-flex items-center cursor-pointer">
                                    <input id="pekerjaan" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_bantuan" value="pekerjaan" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Pekerjaan</span>
                                </label>
                                <label for="pengeluaran_keluarga" class="inline-flex items-center cursor-pointer">
                                    <input id="pengeluaran_keluarga" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_bantuan" value="pengeluaran_keluarga" required>
                                    <span class="ml-3 block text-sm font-medium text-gray-700">Pengeluaran Keluarga</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <label for="tanggal_survey" class="block mb-2 text-xs font-medium text-black">Tanggal
                                Survey</label>
                            <input name="tanggal_survey" type="date" id="tanggal_survey"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                required>
                        </div>
                    </div>
                </div>
        </section>
        <section id="profil_keluarga" class="my-4 space-y-4 analisis">
            <p class="block py-4 text-base font-semibold text-black">
                II. Profil Keluarga
            </p>

            <div class="space-y-4">
                <div>
                    <label for="status_pernikahan" class="block mb-2 text-xs font-medium text-black">1. Status Pernikahan
                        Kepala Keluarga</label>
                    <div class="flex flex-col gap-2">
                        <label for="status_pernikahan_janda" class="inline-flex items-center cursor-pointer">
                            <input id="status_pernikahan_janda" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="status_pernikahan" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Janda</span>
                        </label>
                        <label for="status_pernikahan_duda" class="inline-flex items-center cursor-pointer">
                            <input id="status_pernikahan_duda" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="status_pernikahan" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Duda</span>
                        </label>
                        <label for="status_pernikahan_menikah" class="inline-flex items-center cursor-pointer">
                            <input id="status_pernikahan_menikah" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="status_pernikahan" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Menikah</span>
                        </label>
                        <label for="status_pernikahan_bujang" class="inline-flex items-center cursor-pointer">
                            <input id="status_pernikahan_bujang" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="status_pernikahan" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Bujang</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="jumlah_anggota" class="block mb-2 text-xs font-medium text-black">2. Jumlah Anggota /
                        Tanggungan keluarga dalam 1 rumah (Suami, istri, orang tua, mertua)</label>
                    <div class="flex flex-col gap-2">
                        <label for="jumlah_anggota_lebih_dari_6" class="inline-flex items-center cursor-pointer">
                            <input id="jumlah_anggota_lebih_dari_6" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jumlah_anggota" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">>6</span>
                        </label>
                        <label for="jumlah_anggota_4_s_d_6" class="inline-flex items-center cursor-pointer">
                            <input id="jumlah_anggota_4_s_d_6" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jumlah_anggota" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">4 s/d 6</span>
                        </label>
                        <label for="jumlah_anggota_1_s_d_3" class="inline-flex items-center cursor-pointer">
                            <input id="jumlah_anggota_1_s_d_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jumlah_anggota" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">1 s/d 3</span>
                        </label>
                        <label for="jumlah_anggota_tidak_ada" class="inline-flex items-center cursor-pointer">
                            <input id="jumlah_anggota_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jumlah_anggota" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">tidak ada</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="usia_kepala" class="block mb-2 text-xs font-medium text-black">3. Usia Kepala
                        Keluarga</label>
                    <div class="flex flex-col gap-2">
                        <label for="usia_kepala_diatas_55" class="inline-flex items-center cursor-pointer">
                            <input id="usia_kepala_diatas_55" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usia_kepala" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">diatas 55 tahun</span>
                        </label>
                        <label for="usia_kepala_51_s_d_55" class="inline-flex items-center cursor-pointer">
                            <input id="usia_kepala_51_s_d_55" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usia_kepala" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">51 s/d 55</span>
                        </label>
                        <label for="usia_kepala_40_s_d_50" class="inline-flex items-center cursor-pointer">
                            <input id="usia_kepala_40_s_d_50" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usia_kepala" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">40 s/d 50</span>
                        </label>
                        <label for="usia_kepala_30_s_d_40" class="inline-flex items-center cursor-pointer">
                            <input id="usia_kepala_30_s_d_40" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usia_kepala" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">30 s/d 40</span>
                        </label>
                        <label for="usia_kepala_di_bawah_30" class="inline-flex items-center cursor-pointer">
                            <input id="usia_kepala_di_bawah_30" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usia_kepala" value="1" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">di bawah 30</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="anggota_hamil" class="block mb-2 text-xs font-medium text-black">4. Anggota keluarga ada
                        yang hamil atau memiliki balita/batita</label>
                    <div class="flex flex-col gap-2">
                        <label for="anggota_hamil_ya" class="inline-flex items-center cursor-pointer">
                            <input id="anggota_hamil_ya" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="anggota_hamil" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Ya</span>
                        </label>
                        <label for="anggota_hamil_tidak" class="inline-flex items-center cursor-pointer">
                            <input id="anggota_hamil_tidak" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="anggota_hamil" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="anak_usia_sekolah" class="block mb-2 text-xs font-medium text-black">5. Jumlah Anak Usia
                        Sekolah</label>
                    <div class="flex flex-col gap-2">
                        <label for="anak_usia_sekolah_lebih_dari_3" class="inline-flex items-center cursor-pointer">
                            <input id="anak_usia_sekolah_lebih_dari_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="anak_usia_sekolah" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">>3</span>
                        </label>
                        <label for="anak_usia_sekolah_1_s_d_3" class="inline-flex items-center cursor-pointer">
                            <input id="anak_usia_sekolah_1_s_d_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="anak_usia_sekolah" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">1 s/d 3</span>
                        </label>
                        <label for="anak_usia_sekolah_tidak_ada" class="inline-flex items-center cursor-pointer">
                            <input id="anak_usia_sekolah_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="anak_usia_sekolah" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">tidak ada</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="orang_tua_uzur" class="block mb-2 text-xs font-medium text-black">6. Ada Orang Tua Selain
                        Kepala Keluarga yang Sudah Uzur (diatas 55 tahun)</label>
                    <div class="flex flex-col gap-2">
                        <label for="orang_tua_uzur_ya" class="inline-flex items-center cursor-pointer">
                            <input id="orang_tua_uzur_ya" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="orang_tua_uzur" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Ya</span>
                        </label>
                        <label for="orang_tua_uzur_tidak" class="inline-flex items-center cursor-pointer">
                            <input id="orang_tua_uzur_tidak" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="orang_tua_uzur" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="anggota_penyakit_berat" class="block mb-2 text-xs font-medium text-black">7. Ada Anggota
                        yang Memiliki Penyakit Berat</label>
                    <div class="flex flex-col gap-2">
                        <label for="anggota_penyakit_berat_ya" class="inline-flex items-center cursor-pointer">
                            <input id="anggota_penyakit_berat_ya" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="anggota_penyakit_berat" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Ya</span>
                        </label>
                        <label for="anggota_penyakit_berat_tidak" class="inline-flex items-center cursor-pointer">
                            <input id="anggota_penyakit_berat_tidak" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="anggota_penyakit_berat" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="anggota_cacat_fisik" class="block mb-2 text-xs font-medium text-black">8. Jumlah Anggota
                        Keluarga yang Memiliki Cacat Fisik</label>
                    <div class="flex flex-col gap-2">
                        <label for="anggota_cacat_fisik_ya" class="inline-flex items-center cursor-pointer">
                            <input id="anggota_cacat_fisik_ya" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="anggota_cacat_fisik" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Ya</span>
                        </label>
                        <label for="anggota_cacat_fisik_tidak" class="inline-flex items-center cursor-pointer">
                            <input id="anggota_cacat_fisik_tidak" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="anggota_cacat_fisik" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak</span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section id="identifikasi_ketenagakerjaan_penghasilan" class="my-4 space-y-4 analisis">
            <p class="block py-4 text-base font-semibold text-black">
                III. Identifikasi Ketenagakerjaan dan Penghasilan Keluarga
            </p>

            <div class="space-y-4">
                <div>
                    <label for="penghasilan_utama_kepala" class="block mb-2 text-xs font-medium text-black">9. Penghasilan
                        Utama Kepala Keluarga</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div
                                class="w-12 text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="jumlah_utama_kepala" id="jumlah_utama_kepala"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="penghasilan_utama_kepala_tidak_ada" class="inline-flex items-center cursor-pointer">
                                <input id="penghasilan_utama_kepala_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="penghasilan_utama_kepala" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                            </label>
                            <label for="penghasilan_utama_kepala_buruh" class="inline-flex items-center cursor-pointer">
                                <input id="penghasilan_utama_kepala_buruh" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="penghasilan_utama_kepala" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Buruh/ Tani serabutan/ Tng Kontrak</span>
                            </label>
                            <label for="penghasilan_utama_kepala_dagang" class="inline-flex items-center cursor-pointer">
                                <input id="penghasilan_utama_kepala_dagang" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="penghasilan_utama_kepala" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Dagang/ Tani/ Ternak/ Produksi Jasa Kecil</span>
                            </label>
                            <label for="penghasilan_utama_kepala_karyawan" class="inline-flex items-center cursor-pointer">
                                <input id="penghasilan_utama_kepala_karyawan" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="penghasilan_utama_kepala" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Karyawan/ Pegawai/ Home Industri</span>
                            </label>
                            <label for="penghasilan_utama_kepala_pns" class="inline-flex items-center cursor-pointer">
                                <input id="penghasilan_utama_kepala_pns" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="penghasilan_utama_kepala" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">PNS/ Pengusaha/ Industri</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="penghasilan_anggota_2" class="block mb-2 text-xs font-medium text-black">10. Penghasilan
                        Anggota Keluarga 2</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex ">
                            <div
                                class="w-12 text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="penghasilan_anggota_2"
                                id="penghasilan_anggota_2"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="penghasilan_anggota_2_tidak_ada" class="inline-flex items-center cursor-pointer">
                                <input id="penghasilan_anggota_2_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="pekerjaan_anggota_2" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                            </label>
                            <label for="pekerjaan_anggota_2_buruh" class="inline-flex items-center cursor-pointer">
                                <input id="pekerjaan_anggota_2_buruh" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="pekerjaan_anggota_2" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Buruh/ Tani serabutan/ Tng Kontrak</span>
                            </label>
                            <label for="pekerjaan_anggota_2_dagang" class="inline-flex items-center cursor-pointer">
                                <input id="pekerjaan_anggota_2_dagang" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="pekerjaan_anggota_2" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Dagang/ Tani/ Ternak/ Produksi Jasa Kecil</span>
                            </label>
                            <label for="pekerjaan_anggota_2_karyawan" class="inline-flex items-center cursor-pointer">
                                <input id="pekerjaan_anggota_2_karyawan" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="pekerjaan_anggota_2" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Karyawan/ Pegawai/ Home Industri</span>
                            </label>
                            <label for="pekerjaan_anggota_2_pns" class="inline-flex items-center cursor-pointer">
                                <input id="pekerjaan_anggota_2_pns" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="pekerjaan_anggota_2" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">PNS/ Pengusaha/ Industri</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="penghasilan_anggota_lain" class="block mb-2 text-xs font-medium text-black">11.
                        Penghasilan Anggota Keluarga Lain</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div
                                class="w-12 text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="penghasilan_anggota_lain"
                                id="penghasilan_anggota_lain"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="pekerjaan_anggota_lain_tidak_ada" class="inline-flex items-center cursor-pointer">
                                <input id="pekerjaan_anggota_lain_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="pekerjaan_anggota_lain" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                            </label>
                            <label for="pekerjaan_anggota_lain_buruh" class="inline-flex items-center cursor-pointer">
                                <input id="pekerjaan_anggota_lain_buruh" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="pekerjaan_anggota_lain" value="3"  required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Buruh/ Tani serabutan/ Tng Kontrak</span>
                            </label>
                            <label for="pekerjaan_anggota_lain_dagang" class="inline-flex items-center cursor-pointer">
                                <input id="pekerjaan_anggota_lain_dagang" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="pekerjaan_anggota_lain" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Dagang/ Tani/ Ternak/ Produksi Jasa Kecil</span>
                            </label>
                            <label for="pekerjaan_anggota_lain_karyawan" class="inline-flex items-center cursor-pointer">
                                <input id="pekerjaan_anggota_lain_karyawan" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="pekerjaan_anggota_lain" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Karyawan/ Pegawai/ PNS</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="pendapatan_aset_sewa" class="block mb-2 text-xs font-medium text-black">12. Pendapatan
                        dari Aset yang Disewakan</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div
                                class="w-12 text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="pendapatan_aset_sewa"
                                id="pendapatan_aset_sewa"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_aset_sewa_tidak_ada" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_aset_sewa_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_aset_sewa" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                            </label>
                            <label for="jenis_aset_sewa_alat_produksi" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_aset_sewa_alat_produksi" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_aset_sewa" value="2"  required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Alat Produksi/ Kendaraan</span>
                            </label>
                            <label for="jenis_aset_sewa_tanah" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_aset_sewa_tanah" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_aset_sewa" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tanah/ Rumah/ Kios/ Kontrakan</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="penerimaan_bantuan_pendidikan" class="block mb-2 text-xs font-medium text-black">13.
                        Penerimaan Bantuan Pendidikan dari Pemerintah dan Pihak Lain</label>
                    <div class="flex gap-2">
                        <div class="flex flex-col gap-2 w-full">
                            <label for="jenis_bantuan_pendidikan_tidak_ada" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_bantuan_pendidikan_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_bantuan_pendidikan" value="4"  required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                            </label>
                            <label for="jenis_bantuan_pendidikan_kpj" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_bantuan_pendidikan_kpj" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_bantuan_pendidikan" value="2"  required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">KPJ/KJMU</span>
                            </label>
                            <label for="jenis_bantuan_pendidikan_beasiswa" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_bantuan_pendidikan_beasiswa" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_bantuan_pendidikan" value="1"  required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Program Beasiswa</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="pendapatan_bulanan_lain" class="block mb-2 text-xs font-medium text-black">14. Pendapatan
                        Bulanan Lain di Luar Usaha Pokok</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div
                                class="w-12 text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="pendapatan_bulanan_lain"
                                id="pendapatan_bulanan_lain"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_pendapatan_lain_tidak_ada" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_pendapatan_lain_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_pendapatan_lain" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak ada</span>
                            </label>
                            <label for="jenis_pendapatan_lain_ada" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_pendapatan_lain_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_pendapatan_lain" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Ada</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="kategori_penghasilan" class="block mb-2 text-xs font-medium text-black">15. Kategori
                        Penghasilan per Bulan</label>
                    <div class="flex flex-col gap-2">
                        <label for="kategori_penghasilan_kurang_dari_1juta" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_penghasilan_kurang_dari_1juta" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_penghasilan" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">< Rp 1.000.000</span>
                        </label>
                        <label for="kategori_penghasilan_1juta_sampai_2juta" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_penghasilan_1juta_sampai_2juta" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_penghasilan" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Rp 1.000.000 - Rp 2.500.000</span>
                        </label>
                        <label for="kategori_penghasilan_2juta_sampai_5juta" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_penghasilan_2juta_sampai_5juta" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_penghasilan" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Rp 2.500.000 - Rp 5.000.000</span>
                        </label>
                        <label for="kategori_penghasilan_5juta_sampai_7juta" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_penghasilan_5juta_sampai_7juta" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_penghasilan" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Rp 5.000.000 - Rp 7.000.000</span>
                        </label>
                        <label for="kategori_penghasilan_lebih_dari_7juta" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_penghasilan_lebih_dari_7juta" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_penghasilan" value="1" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">> Rp 7.000.000</span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section id="identifikasi_pengeluaran_keluarga" class="my-4 space-y-4 analisis">
            <p class="block py-4 text-base font-semibold text-black">
                IV. Identifikasi Pengeluaran Keluarga
            </p>
            <div class="space-y-4">
                <div>
                    <label for="konsumsi_pangan" class="block mb-2 text-xs font-medium text-black">16. Konsumsi Pangan(Makanan Pokok, Sayur Mayur, Makanan Kering, Daging, Ikan, Susu, Telur, Dll)</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="konsumsi_pangan" id="konsumsi_pangan"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_konsumsi_pangan_5" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_konsumsi_pangan_5" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_konsumsi_pangan" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">< Rp 1.000.000</span>
                            </label>
                            <label for="jenis_konsumsi_pangan_4" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_konsumsi_pangan_4" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_konsumsi_pangan" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp 1.000.000 - Rp 2.000.000</span>
                            </label>
                            <label for="jenis_konsumsi_pangan_3" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_konsumsi_pangan_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_konsumsi_pangan" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp 2.000.000 - Rp 3.000.000</span>
                            </label>
                            <label for="jenis_konsumsi_pangan_2" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_konsumsi_pangan_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_konsumsi_pangan" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp 3.000.000 - Rp 3.500.000</span>
                            </label>
                            <label for="jenis_konsumsi_pangan_1" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_konsumsi_pangan_1" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_konsumsi_pangan" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">> Rp 3.500.000</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="konsumsi_rokok" class="block mb-2 text-xs font-medium text-black">17. Konsumsi Rokok/Tembakau dalam 1 Bulan</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="konsumsi_rokok" id="konsumsi_rokok"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_konsumsi_rokok_3" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_konsumsi_rokok_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_konsumsi_rokok" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak ada</span>
                            </label>
                            <label for="jenis_konsumsi_rokok_2" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_konsumsi_rokok_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_konsumsi_rokok" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">2 hari 1 bungkus (Rp.300.000 per bulan)</span>
                            </label>
                            <label for="jenis_konsumsi_rokok_1" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_konsumsi_rokok_1" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_konsumsi_rokok" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">1 hari 1 bungkus </span>
                            </label>
                        </div>
            
                    </div>
                </div>
                <div>
                    <label for="biaya_listrik_air_gas" class="block mb-2 text-xs font-medium text-black">18. Biaya Listrik, Air, Gas, dan Bahan Bakar dalam 1 Bulan</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="biaya_listrik_air_gas" id="biaya_listrik_air_gas"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_biaya_listrik_air_gas_5" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_listrik_air_gas_5" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_listrik_air_gas" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">< Rp. 200.000</span>
                            </label>
                            <label for="jenis_biaya_listrik_air_gas_4" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_listrik_air_gas_4" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_listrik_air_gas" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 200.000 - Rp. 500.000</span>
                            </label>
                            <label for="jenis_biaya_listrik_air_gas_3" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_listrik_air_gas_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_listrik_air_gas" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 500.000 - Rp. 700.000</span>
                            </label>
                            <label for="jenis_biaya_listrik_air_gas_2" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_listrik_air_gas_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_listrik_air_gas" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 700.000 - Rp. 1.000.000</span>
                            </label>
                            <label for="jenis_biaya_listrik_air_gas_1" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_listrik_air_gas_1" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_listrik_air_gas" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">> Rp. 1.000.000</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="pakaian_kebersihan" class="block mb-2 text-xs font-medium text-black">19. Pakaian untuk Anak-anak dan Orang Dewasa (Mencakup baju lebaran, dan sejenisnya), serta Perawatan Kebersihan Tubuh (Mencakup sabun mandi, kosmetik, dll) dalam 1 Bulan</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="pakaian_kebersihan" id="pakaian_kebersihan"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_pakaian_kebersihan_5" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_pakaian_kebersihan_5" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_pakaian_kebersihan" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">< Rp. 200.000</span>
                            </label>
                            <label for="jenis_pakaian_kebersihan_4" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_pakaian_kebersihan_4" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_pakaian_kebersihan" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 200.000 - Rp. 500.000</span>
                            </label>
                            <label for="jenis_pakaian_kebersihan_3" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_pakaian_kebersihan_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_pakaian_kebersihan" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 500.000 - Rp. 700.000</span>
                            </label>
                            <label for="jenis_pakaian_kebersihan_2" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_pakaian_kebersihan_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_pakaian_kebersihan" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 700.000 - Rp. 1.000.000</span>
                            </label>
                            <label for="jenis_pakaian_kebersihan_1" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_pakaian_kebersihan_1" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_pakaian_kebersihan" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">> Rp. 1.000.000</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="komunikasi" class="block mb-2 text-xs font-medium text-black">20. Komunikasi (Pembayaran rekening telepon dan pembelian voucher/isi pulasa, Kartu Perdana, Paket Data Internet)</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="komunikasi" id="komunikasi"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_komunikasi_5" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_komunikasi_5" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_komunikasi" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak ada</span>
                            </label>
                            <label for="jenis_komunikasi_4" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_komunikasi_4" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_komunikasi" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">< Rp. 100.000</span>
                            </label>
                            <label for="jenis_komunikasi_3" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_komunikasi_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_komunikasi" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 100.000 - Rp. 250.000</span>
                            </label>
                            <label for="jenis_komunikasi_2" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_komunikasi_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_komunikasi" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 250.000 - Rp. 400.000</span>
                            </label>
                            <label for="jenis_komunikasi_1" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_komunikasi_1" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_komunikasi" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">> Rp. 400.000</span>
                            </label>
                        </div>

                    </div>
                </div>

                <div>
                    <label for="transportasi" class="block mb-2 text-xs font-medium text-black">21. Transportasi (Mencakup biaya bis, ojek, angkot, perahu, dan biaya perbaikan kendaraan, bahan bakar kendaraaan, dan sejenisnya)</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="transportasi" id="transportasi"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_transportasi_5" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_transportasi_5" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_transportasi" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak ada</span>
                            </label>
                            <label for="jenis_transportasi_4" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_transportasi_4" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_transportasi" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">< Rp. 100.000</span>
                            </label>
                            <label for="jenis_transportasi_3" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_transportasi_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_transportasi" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 100.000 - Rp. 250.000</span>
                            </label>
                            <label for="jenis_transportasi_2" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_transportasi_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_transportasi" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 250.000 - Rp. 400.000</span>
                            </label>
                            <label for="jenis_transportasi_1" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_transportasi_1" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_transportasi" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">> Rp. 400.000</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="biaya_sewa" class="block mb-2 text-xs font-medium text-black">22. Biaya Sewa Rumah/Kontrakan</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex ">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="biaya_sewa" id="biaya_sewa"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2 ">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_sewa" value="4" >
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak ada</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_sewa" value="3" >
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 500.000 - Rp. 1.000.000</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_sewa" value="2" >
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 1.000.000 - Rp. 2.000.000</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_sewa" value="1" >
                                <span class="ml-3 block text-sm font-medium text-gray-700">> Rp. 2.000.000</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="biaya_sekolah" class="block mb-2 text-xs font-medium text-black">23. Biaya Sekolah (SPP, Uang Saku, Buku, Seragam)</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="biaya_sekolah" id="biaya_sekolah"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_biaya_sekolah_5" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_sekolah_5" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_sekolah" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak ada</span>
                            </label>
                            <label for="jenis_biaya_sekolah_4" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_sekolah_4" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_sekolah" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">< Rp. 200.000 - Rp. 500.000</span>
                            </label>
                            <label for="jenis_biaya_sekolah_3" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_sekolah_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_sekolah" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 500.000 - Rp. 1.000.000</span>
                            </label>
                            <label for="jenis_biaya_sekolah_2" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_sekolah_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_sekolah" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 1.000.000 - Rp. 2.000.000</span>
                            </label>
                            <label for="jenis_biaya_sekolah_1" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_sekolah_1" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_sekolah" value="1" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">> Rp. 2.000.000</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="biaya_kesehatan" class="block mb-2 text-xs font-medium text-black">24. Biaya Kesehatan (Mencakup biaya rumah sakit, puskesmas, konsultasi dokter mantri, obat-obatan, dan lainya)</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="biaya_kesehatan" id="biaya_kesehatan"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_biaya_kesehatan_5" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_kesehatan_5" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_kesehatan" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">> Rp. 2.500.000</span>
                            </label>
                            <label for="jenis_biaya_kesehatan_4" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_kesehatan_4" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_kesehatan" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 1.500.000 - Rp. 2.500.000</span>
                            </label>
                            <label for="jenis_biaya_kesehatan_3" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_kesehatan_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_kesehatan" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 500.000 - Rp. 1.500.000</span>
                            </label>
                            <label for="jenis_biaya_kesehatan_2" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_biaya_kesehatan_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_biaya_kesehatan" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak ada</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="angsuran_kredit" class="block mb-2 text-xs font-medium text-black">25. Angsuran Kredit</label>
                    <div class="flex flex-col gap-2">
                        
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Rp.
                            </div>
                            <input type="text" data-type="money"  value="0" name="angsuran_kredit" id="angsuran_kredit"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Masukkan jumlah dalam Rupiah">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="jenis_angsuran_kredit_5" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_angsuran_kredit_5" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_angsuran_kredit" value="5" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak ada</span>
                            </label>
                            <label for="jenis_angsuran_kredit_4" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_angsuran_kredit_4" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_angsuran_kredit" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700"> < Rp. 1.000.000</span>
                            </label>
                            <label for="jenis_angsuran_kredit_3" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_angsuran_kredit_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_angsuran_kredit" value="3" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Rp. 1.000.000 - Rp. 2.500.000</span>
                            </label>
                            <label for="jenis_angsuran_kredit_2" class="inline-flex items-center cursor-pointer">
                                <input id="jenis_angsuran_kredit_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="jenis_angsuran_kredit" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">>Rp. 2.500.000 </span>
                            </label>
                        </div>
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Keterangan
                            </div>
                            <input type="text" name="keterangan_angsuran_kredit" id="keterangan_angsuran_kredit"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="(Opsional) Isikan keterangan angsuran">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="kategori_pengeluaran" class="block mb-2 text-xs font-medium text-black">26. Kategori Pengeluaran per Bulan</label>
                    <div class="flex flex-col gap-2">
                        <label for="kategori_pengeluaran_5" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_pengeluaran_5" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_pengeluaran" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">< Rp 2.000.000</span>
                        </label>
                        <label for="kategori_pengeluaran_4" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_pengeluaran_4" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_pengeluaran" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Rp 2.000.000 - Rp 3.000.000</span>
                        </label>
                        <label for="kategori_pengeluaran_3" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_pengeluaran_3" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_pengeluaran" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Rp 3.000.000 - Rp 5.000.000</span>
                        </label>
                        <label for="kategori_pengeluaran_2" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_pengeluaran_2" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_pengeluaran" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Rp 5.000.000 - Rp 7.000.000</span>
                        </label>
                        <label for="kategori_pengeluaran_1" class="inline-flex items-center cursor-pointer">
                            <input id="kategori_pengeluaran_1" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kategori_pengeluaran" value="1" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">> Rp 7.000.000</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="tabungan_bank" class="block mb-2 text-xs font-medium text-black">27. Tabungan di Bank</label>
                    <div class="flex flex-col gap-2">
                        <label for="tabungan_bank_tidak_ada" class="inline-flex items-center cursor-pointer">
                            <input id="tabungan_bank_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="tabungan_bank" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                        </label>
                        <label for="tabungan_bank_ada" class="inline-flex items-center cursor-pointer">
                            <input id="tabungan_bank_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="tabungan_bank" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Ada</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="memiliki_bpjs" class="block mb-2 text-xs font-medium text-black">28. Memiliki BPJS</label>
                    <div class="flex flex-col gap-2">
                        <div class="flex flex-col gap-2">
                            <label for="memiliki_bpjs_tidak_ada" class="inline-flex items-center cursor-pointer">
                                <input id="memiliki_bpjs_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="memiliki_bpjs" value="4" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                            </label>
                            <label for="memiliki_bpjs_ada" class="inline-flex items-center cursor-pointer">
                                <input id="memiliki_bpjs_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="memiliki_bpjs" value="2" required>
                                <span class="ml-3 block text-sm font-medium text-gray-700">Ada</span>
                            </label>
                        </div>
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Keterangan
                            </div>
                            <input type="text" name="keterangan_bpjs" id="keterangan_bpjs"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="(Optional) Isikan keterangan BPJS">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="asuransi_pendidikan" class="block mb-2 text-xs font-medium text-black">29. Asuransi Pendidikan</label>
                    <div class="flex flex-col gap-2">
                        <label for="asuransi_pendidikan_tidak_ada" class="inline-flex items-center cursor-pointer">
                            <input id="asuransi_pendidikan_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="asuransi_pendidikan" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                        </label>
                        <label for="asuransi_pendidikan_ada" class="inline-flex items-center cursor-pointer">
                            <input id="asuransi_pendidikan_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="asuransi_pendidikan" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Ada</span>
                        </label>
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Keterangan
                            </div>
                            <input type="text" name="keterangan_asuransi_pendidikan" id="keterangan_asuransi_pendidikan"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="(Optional) Isikan keterangan asuransi pendidikan">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="deposito" class="block mb-2 text-xs font-medium text-black">30. Deposito dan Tabungan Hari Tua</label>
                    <div class="flex flex-col gap-2">
                        <label for="deposito_tidak_ada" class="inline-flex items-center cursor-pointer">
                            <input id="deposito_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="deposito" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                        </label>
                        <label for="deposito_ada" class="inline-flex items-center cursor-pointer">
                            <input id="deposito_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="deposito" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Ada</span>
                        </label>
                        <div class="flex">
                            <div class="text-center self-center text-xs font-medium text-black bg-gray-200 rounded-l-lg p-3 border border-gray-300">
                                Keterangan
                            </div>
                            <input type="text" name="keterangan_deposito" id="keterangan_deposito"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-r-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="(Optional) Isikan keterangan deposito">
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        <section id="identifikasi_tempat_tinggal" class="my-4 space-y-4 analisis">
            <p class="block py-4 text-base font-semibold text-black">
                VI. Identifikasi Kondisi Tempat Tinggal dan Lingkungan
            </p>

            <div class="space-y-4">
                <div>
                    <label for="kepemilikan_tempat_tinggal" class="block mb-2 text-xs font-medium text-black">31. Kepemilikan Tempat Tinggal</label>
                    <div class="flex flex-col gap-2">
                        <label for="kepemilikan_tempat_tinggal_menumpang" class="inline-flex items-center cursor-pointer">
                            <input id="kepemilikan_tempat_tinggal_menumpang" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kepemilikan_tempat_tinggal" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Menumpang / tidak jelas</span>
                        </label>
                        <label for="kepemilikan_tempat_tinggal_kontrak" class="inline-flex items-center cursor-pointer">
                            <input id="kepemilikan_tempat_tinggal_kontrak" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kepemilikan_tempat_tinggal" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Kontrak</span>
                        </label>
                        <label for="kepemilikan_tempat_tinggal_bersama" class="inline-flex items-center cursor-pointer">
                            <input id="kepemilikan_tempat_tinggal_bersama" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kepemilikan_tempat_tinggal" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Bersama / Keluarga</span>
                        </label>
                        <label for="kepemilikan_tempat_tinggal_sendiri" class="inline-flex items-center cursor-pointer">
                            <input id="kepemilikan_tempat_tinggal_sendiri" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kepemilikan_tempat_tinggal" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Sendiri/Warisan</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="bentuk_bangunan" class="block mb-2 text-xs font-medium text-black">32. Bentuk Bangunan</label>
                    <div class="flex flex-col gap-2">
                        <label for="bentuk_bangunan_tidak_permanen" class="inline-flex items-center cursor-pointer">
                            <input id="bentuk_bangunan_tidak_permanen" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="bentuk_bangunan" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Permanen</span>
                        </label>
                        <label for="bentuk_bangunan_semi_permanen" class="inline-flex items-center cursor-pointer">
                            <input id="bentuk_bangunan_semi_permanen" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="bentuk_bangunan" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Semi Permanen</span>
                        </label>
                        <label for="bentuk_bangunan_permanen" class="inline-flex items-center cursor-pointer">
                            <input id="bentuk_bangunan_permanen" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="bentuk_bangunan" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Permanen</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="desain_bangunan" class="block mb-2 text-xs font-medium text-black">33. Desain Bangunan</label>
                    <div class="flex flex-col gap-2">
                        <label for="desain_bangunan_1_lantai" class="inline-flex items-center cursor-pointer">
                            <input id="desain_bangunan_1_lantai" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="desain_bangunan" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">1 Lantai</span>
                        </label>
                        <label for="desain_bangunan_2_lantai" class="inline-flex items-center cursor-pointer">
                            <input id="desain_bangunan_2_lantai" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="desain_bangunan" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">2 Lantai</span>
                        </label>
                        <label for="desain_bangunan_lebih_dari_2_lantai" class="inline-flex items-center cursor-pointer">
                            <input id="desain_bangunan_lebih_dari_2_lantai" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="desain_bangunan" value="1" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">lebih dari 2 Lantai</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="lokasi_rumah" class="block mb-2 text-xs font-medium text-black">34. Lokasi Rumah</label>
                    <div class="flex flex-col gap-2">
                        <label for="lokasi_rumah_bantaran_kali" class="inline-flex items-center cursor-pointer">
                            <input id="lokasi_rumah_bantaran_kali" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="lokasi_rumah" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Bantaran Kali</span>
                        </label>
                        <label for="lokasi_rumah_kampung_kumuh" class="inline-flex items-center cursor-pointer">
                            <input id="lokasi_rumah_kampung_kumuh" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="lokasi_rumah" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Kampung Kumuh</span>
                        </label>
                        <label for="lokasi_rumah_kampung_biasa" class="inline-flex items-center cursor-pointer">
                            <input id="lokasi_rumah_kampung_biasa" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="lokasi_rumah" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Kampung Biasa</span>
                        </label>
                        <label for="lokasi_rumah_komplek" class="inline-flex items-center cursor-pointer">
                            <input id="lokasi_rumah_komplek" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="lokasi_rumah" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Komplek</span>
                        </label>
                        <label for="lokasi_rumah_kluster" class="inline-flex items-center cursor-pointer">
                            <input id="lokasi_rumah_kluster" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="lokasi_rumah" value="1" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Kluster</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="tata_letak_lingkungan" class="block mb-2 text-xs font-medium text-black">35. Tata Letak Lingkungan pada Umumnya</label>
                    <div class="flex flex-col gap-2">
                        <label for="tata_letak_lingkungan_kumuh_dan_padat" class="inline-flex items-center cursor-pointer">
                            <input id="tata_letak_lingkungan_kumuh_dan_padat" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="tata_letak_lingkungan" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Kumuh dan Padat</span>
                        </label>
                        <label for="tata_letak_lingkungan_kurang_teratur" class="inline-flex items-center cursor-pointer">
                            <input id="tata_letak_lingkungan_kurang_teratur" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="tata_letak_lingkungan" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Kurang Teratur</span>
                        </label>
                        <label for="tata_letak_lingkungan_teratur" class="inline-flex items-center cursor-pointer">
                            <input id="tata_letak_lingkungan_teratur" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="tata_letak_lingkungan" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Teratur</span>
                        </label>
                        <label for="tata_letak_lingkungan_sangat_teratur" class="inline-flex items-center cursor-pointer">
                            <input id="tata_letak_lingkungan_sangat_teratur" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="tata_letak_lingkungan" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Sangat Teratur</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="akses_rumah_ke_jalan" class="block mb-2 text-xs font-medium text-black">36. Akses Rumah ke Jalan</label>
                    <div class="flex flex-col gap-2">
                        <label for="akses_rumah_ke_jalan_gang_sangat_kecil" class="inline-flex items-center cursor-pointer">
                            <input id="akses_rumah_ke_jalan_gang_sangat_kecil" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="akses_rumah_ke_jalan" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Gang Sangat Kecil</span>
                        </label>
                        <label for="akses_rumah_ke_jalan_gang_kecil_jalan_2_motor" class="inline-flex items-center cursor-pointer">
                            <input id="akses_rumah_ke_jalan_gang_kecil_jalan_2_motor" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="akses_rumah_ke_jalan" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Gang Kecil Jalan 2 Motor</span>
                        </label>
                        <label for="akses_rumah_ke_jalan_pinggir_jalan_1_mobil" class="inline-flex items-center cursor-pointer">
                            <input id="akses_rumah_ke_jalan_pinggir_jalan_1_mobil" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="akses_rumah_ke_jalan" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Pinggir Jalan 1 Mobil</span>
                        </label>
                        <label for="akses_rumah_ke_jalan_pinggir_jalan_2_mobil" class="inline-flex items-center cursor-pointer">
                            <input id="akses_rumah_ke_jalan_pinggir_jalan_2_mobil" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="akses_rumah_ke_jalan" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Pinggir Jalan 2 Mobil</span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section id="identifikasi_kepemilikan" class="my-4 space-y-4 analisis">
            <p class="block py-4 text-base font-semibold text-black">
                VI. Identifikasi Kepemilikan
            </p>

            <div class="space-y-4">
                <div>
                    <label for="kendaraan_transportasi" class="block mb-2 text-xs font-medium text-black">37. Kendaraan/Transportasi</label>
                    <div class="flex flex-col gap-2">
                        <label for="kendaraan_transportasi_tidak_ada" class="inline-flex items-center cursor-pointer">
                            <input id="kendaraan_transportasi_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kendaraan_transportasi" value="5" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                        </label>
                        <label for="kendaraan_transportasi_sepeda" class="inline-flex items-center cursor-pointer">
                            <input id="kendaraan_transportasi_sepeda" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kendaraan_transportasi" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">hanya sepeda</span>
                        </label>
                        <label for="kendaraan_transportasi_motor" class="inline-flex items-center cursor-pointer">
                            <input id="kendaraan_transportasi_motor" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kendaraan_transportasi" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">motor</span>
                        </label>
                        <label for="kendaraan_transportasi_motor_lebih_dari_1" class="inline-flex items-center cursor-pointer">
                            <input id="kendaraan_transportasi_motor_lebih_dari_1" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kendaraan_transportasi" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">motor lebih dari 1</span>
                        </label>
                        <label for="kendaraan_transportasi_mobil" class="inline-flex items-center cursor-pointer">
                            <input id="kendaraan_transportasi_mobil" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kendaraan_transportasi" value="1" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">mobil</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="usaha_dagang_produksi" class="block mb-2 text-xs font-medium text-black">38. Usaha Dagang/Produksi</label>
                    <div class="flex flex-col gap-2">
                        <label for="usaha_dagang_produksi_tidak_ada" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_dagang_produksi_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_dagang_produksi" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                        </label>
                        <label for="usaha_dagang_produksi_warung_kecil" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_dagang_produksi_warung_kecil" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_dagang_produksi" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Warung Kecil</span>
                        </label>
                        <label for="usaha_dagang_produksi_toko" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_dagang_produksi_toko" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_dagang_produksi" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Toko / tani/ ternak/ home industri kecil</span>
                        </label>
                        <label for="usaha_dagang_produksi_ruko" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_dagang_produksi_ruko" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_dagang_produksi" value="1" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Ruko/ industri menengah</span>
                        </label>
                    </div>

                </div>

                <div>
                    <label for="usaha_sampingan_jasa" class="block mb-2 text-xs font-medium text-black">39. Usaha Sampingan Jasa</label>
                    <div class="flex flex-col gap-2">
                        <label for="usaha_sampingan_jasa_tidak_ada" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_sampingan_jasa_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_sampingan_jasa" value="4" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada / Serabutan</span>
                        </label>
                        <label for="usaha_sampingan_jasa_ojek_online" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_sampingan_jasa_ojek_online" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_sampingan_jasa" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Ojek Online</span>
                        </label>
                        <label for="usaha_sampingan_jasa_usaha_tetap" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_sampingan_jasa_usaha_tetap" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_sampingan_jasa" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Usaha tetap/ bulanan</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="usaha_pendapatan_sewa_aktiva" class="block mb-2 text-xs font-medium text-black">40. Usaha dari Pendapatan Sewa Aktiva</label>
                    <div class="flex flex-col gap-2">
                        <label for="usaha_pendapatan_sewa_aktiva_tidak_ada" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_pendapatan_sewa_aktiva_tidak_ada" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_pendapatan_sewa_aktiva" value="3" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tidak Ada</span>
                        </label>
                        <label for="usaha_pendapatan_sewa_aktiva_alat_produksi" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_pendapatan_sewa_aktiva_alat_produksi" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_pendapatan_sewa_aktiva" value="2" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Alat Produksi/ Kendaraan</span>
                        </label>
                        <label for="usaha_pendapatan_sewa_aktiva_tanah_rumah" class="inline-flex items-center cursor-pointer">
                            <input id="usaha_pendapatan_sewa_aktiva_tanah_rumah" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="usaha_pendapatan_sewa_aktiva" value="1" required>
                            <span class="ml-3 block text-sm font-medium text-gray-700">Tanah/ Rumah/ Kios/ Kontrakan</span>
                        </label>
                    </div>
                </div>
            </div>
        </section>
        <section id="identifikasi_scoring" class="my-4 space-y-4 analisis">
          <p class="block py-4 text-base font-semibold text-black">
              VII. Hasil Scoring Kelayakan
          </p>

          <div class="flex gap-12 justify-between">
            <div class="">
              <label for="total_nilai" class="block mb-2 text-xs font-medium text-black">Total Nilai :</label> 
              <div class="flex gap-4">
                <div class="text-center self-center text-xl font-medium text-black bg-gray-50 rounded-lg px-2.5 py-5 border border-gray-300 flex items-center">
                  <input id="total_nilai" readonly value="0" name="total_nilai" class="w-40 bg-transparent text-right mr-2 focus:outline-none">
                  <p class="whitespace-nowrap">/40 =</p>
                </div>
                <input type="text" name="nilai_akhir" id="nilai_akhir" readonly
                  class="bg-gray-50 border border-gray-300 text-black text-xl text-center rounded-lg flex px-2.5 py-5 w-36 focus:outline-none focus:ring-none focus:border-none">
              </div>

            </div>
            <div class="">
              <label for="rekomendasi_scoring" class="block mb-2 text-xs text-center font-medium text-black">Rekomendasi Scoring</label>
              <div class="flex gap-2">
                <button type="button" id="rekomendasi_ya" class="px-4 py-6 w-28 bg-gray-50 text-black rounded-lg border border-gray-300 pointer-events-none" >Ya</button>
                <button type="button" id="rekomendasi_tidak" class="px-4 py-6 w-28 bg-gray-50 text-black rounded-lg border border-gray-300 pointer-events-none">Tidak</button>
                <input type="hidden" name="rekomendasi_scoring" id="rekomendasi_scoring" value="0">
              </div>
            </div>
            <script>
              document.getElementById('rekomendasi_ya').addEventListener('click', function() {
                this.classList.add('bg-gray-200', 'border-green-500', 'border-2');
                this.classList.remove('bg-gray-50', 'border-gray-300');
                document.getElementById('rekomendasi_tidak').classList.add('bg-gray-50', 'border-gray-300');
                document.getElementById('rekomendasi_tidak').classList.remove('bg-gray-200', 'border-green-500', 'border-2');
                document.getElementById('rekomendasi_scoring').value = '1';
              });
              
              document.getElementById('rekomendasi_tidak').addEventListener('click', function() {
                this.classList.add('bg-gray-200', 'border-green-500', 'border-2');
                this.classList.remove('bg-gray-50', 'border-gray-300');
                document.getElementById('rekomendasi_ya').classList.add('bg-gray-50', 'border-gray-300');
                document.getElementById('rekomendasi_ya').classList.remove('bg-gray-200', 'border-green-500', 'border-2');
                document.getElementById('rekomendasi_scoring').value = 0;
              });

              
            </script>
          </div>
      </section>
        <section id="catatan_surveyor" class="my-4 space-y-4">
          <p class="block py-4 text-base font-semibold text-black">
              VIII. Catatan/Rekomendasi Surveyor/Pewawancara
          </p>

          <div class="space-y-4">
            <div>
              <label for="akurasi_alamat" class="block mb-2 text-xs font-medium text-black">Akurasi Alamat</label>
              <div class="flex flex-col gap-2">
                <label for="akurasi_alamat_ya" class="inline-flex items-center cursor-pointer">
                  <input id="akurasi_alamat_ya" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="akurasi_alamat" value="1" required>
                  <span class="ml-3 block text-sm font-medium text-gray-700">Ya</span>
                </label>
                <label for="akurasi_alamat_tidak" class="inline-flex items-center cursor-pointer">
                  <input id="akurasi_alamat_tidak" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="akurasi_alamat" value="2" required>
                  <span class="ml-3 block text-sm font-medium text-gray-700">Tidak</span>
                </label>
              </div>
            </div>

            <div>
              <label for="kelayakan_mustahik" class="block mb-2 text-xs font-medium text-black">Kelayakan Mustahik</label>
              <div class="flex flex-col gap-2">
                <label for="kelayakan_mustahik_ya" class="inline-flex items-center cursor-pointer">
                  <input id="kelayakan_mustahik_ya" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kelayakan_mustahik" value="1" required>
                  <span class="ml-3 block text-sm font-medium text-gray-700">Ya</span>
                </label>
                <label for="kelayakan_mustahik_tidak" class="inline-flex items-center cursor-pointer">
                  <input id="kelayakan_mustahik_tidak" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kelayakan_mustahik" value="2" required>
                  <span class="ml-3 block text-sm font-medium text-gray-700">Tidak</span>
                </label>
                <label for="kelayakan_mustahik_dipertimbangkan" class="inline-flex items-center cursor-pointer">
                  <input id="kelayakan_mustahik_dipertimbangkan" type="radio" class="form-radio h-5 w-5 text-green-600 transition duration-150 ease-in-out" name="kelayakan_mustahik" value="3" required>
                  <span class="ml-3 block text-sm font-medium text-gray-700">dipertimbangkan</span>
                </label>
              </div>
            </div>

            <div>
              <label for="analisis_rekomendasi" class="block mb-2 text-xs font-medium text-black">Analisis dan Rekomendasi Surveyor</label>
              <textarea id="analisis_rekomendasi" name="analisis_rekomendasi" rows="4" 
                  class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                  placeholder="Tuliskan analisis rekomendasi surveyor terhadap kelayakan mustahik dari hasil survey"></textarea>
            </div>
          </div>
        </section>
        <section>
          <div>
              <label for="kode_koordinat" class="block mb-2 text-xs font-medium text-black">Kode titik koordinat (Share Lokasi Google Maps)</label>
              <input type="text" name="kode_koordinat" id="kode_koordinat" class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
          </div>
        </section>
        <section>
            <div class="my-4 flex justify-between">
                <label for="paraf_disurvey" class="block my-2 font-medium text-black">Paraf yang disurvey:</label>
                <button id="clear_paraf_disurvey" class="font-medium text-red-500 underline">Hapus Paraf</button>
            </div>
            <div id="sig_disurvey" class="signature border border-gray-300 rounded-lg p-2" style="height: 200px;"></div>
            <textarea id="signature64_disurvey" name="signed_disurvey" style="display: none"></textarea>
        </section>
        @if (Auth::user()->level == 0)
        <section>
            <div class="my-4 flex justify-between">
                <label for="paraf_koordinator" class="block my-2 font-medium text-black">Koordinator Survey:</label>
                <button id="clear_paraf_koordinator" class="font-medium text-red-500 underline">Hapus Paraf</button>
            </div>
            <div id="sig_koordinator" class="signature border border-gray-300 rounded-lg p-2" style="height: 200px;"></div>
            <textarea id="signature64_koordinator" name="signed_koordinator" style="display: none"></textarea>
        </section>
        @endif
        
        <section>
            <div class="my-4 flex justify-between">
                <label for="paraf_surveyor" class="block my-2 font-medium text-black">Paraf Surveyor:</label>
                <button id="clear_paraf_surveyor" class="font-medium text-red-500 underline">Hapus Paraf</button>
            </div>
            <div id="sig_surveyor" class="signature border border-gray-300 rounded-lg p-2" style="height: 200px;"></div>
            <textarea id="signature64_surveyor" name="signed_surveyor" style="display: none"></textarea>
        </section>
        
        <div class=" pt-6">
            
            <button type="submit" id="submit_form"
                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 my-2 w-full disabled:opacity-50">Simpan</button>
        </div>
    </form>

    <script type="text/javascript">

    $(document).ready(function () {
    // Initialize jSignature for each signature pad
    var sig_disurvey = $("#sig_disurvey").jSignature({ 'UndoButton': true });
   
    
    var sig_surveyor = $("#sig_surveyor").jSignature({ 'UndoButton': true });

    // Clear signature handlers
    $('#clear_paraf_disurvey').click(function (e) {
        e.preventDefault();
        sig_disurvey.jSignature("reset");
        $("#signature64_disurvey").val('');
    });

    $(window).on('beforeunload', function() {
        return confirmExit();
    });
    
    var isAnyTaskInProgress = true;
    
    function confirmExit() {
        if (isAnyTaskInProgress) {
            return "Anda yakin ingin keluar dari halaman ini?";
        }
    }

    $('#clear_paraf_surveyor').click(function (e) {
        e.preventDefault();
        sig_surveyor.jSignature("reset");
        $("#signature64_surveyor").val('');
    });

    @if ( Auth::user()->level == 0 )
    var sig_koordinator = $("#sig_koordinator").jSignature({ 'UndoButton': true });
    $('#clear_paraf_koordinator').click(function (e) {
        e.preventDefault();
        sig_koordinator.jSignature("reset");
        $("#signature64_koordinator").val('');
    });
    @endif
    // Capture signature on form submission
    $("form").submit(function () {
        isAnyTaskInProgress = false;

        var data_disurvey = sig_disurvey.jSignature("getData", "svgbase64");
        @if ( Auth::user()->level == 0 )
        var data_koordinator = sig_koordinator.jSignature("getData", "svgbase64");
        $("#signature64_koordinator").val(data_koordinator.join(","));
        @endif
       
        var data_surveyor = sig_surveyor.jSignature("getData", "svgbase64");

        // Save to hidden fields
        $("#signature64_disurvey").val(data_disurvey.join(","));

        $("#signature64_surveyor").val(data_surveyor.join(","));
    });
});

    </script>
    <script>
        // create scrip to make sure all required input fiulled then button with id submit_form not read-only
        $("#submit_form").prop("disabled", true);
        $("input[required]").on("input", function () {
            if ($("input").val() != "") {
                $("#submit_form").prop("disabled", false);
            }
        });

        $(document).ready(function () {
            hitungTotalNilai();
            $(".analisis input[type='radio']").change(function () {
                hitungTotalNilai();
            });
        });

        function hitungTotalNilai() {
            var total = 0;
            $(".analisis input[type='radio']:checked").each(function () {
                total += parseInt($(this).val())*20;
            });
            $("#total_nilai").val(total);
            $("#nilai_akhir").val(total / 40);   
            
            if (total/40 > 40) {
                $('#rekomendasi_ya').click();
            }
            else {
                $('#rekomendasi_tidak').click();
            }
        }

       
    </script>
              
    <script>
        $("input[data-type='money']").on({
            keyup: function() {
                formatCurrency($(this));
            },
            blur: function() {
                formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }


        function formatCurrency(input, blur) {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // original length
            var original_len = input_val.length;

            // initial caret position 
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(",") >= 0) {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(",");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                    right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = left_side + "," + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;

                // final formatting
                if (blur === "blur") {
                    input_val += ",00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
    </script>
    <script>

    </script>
    @if (session('success-add'))
        <script>
            alert("Data berhasil ditambah!")
        </script>
    @endif

    @if (session('success-edit'))
        <script>
            alert("Data berhasil diedit!")
        </script>
    @endif
@endsection
