<html lang="en">
<head>
    
    <title>Form Survey Baznas {{ $mustahik->nama_mustahik }}</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <style>
      td{
        padding: 0 5px;
      }
      tr{
        padding: 0 5px;
      }
    </style>
</head>
<body class="p-4">

    <section class="border-b border-black">
      <div class="flex items-center justify-center">
        <img src="{{ asset('img/logo.png') }}" alt="" class="w-auto h-36">
        <div class="flex flex-col text-center">
          <h1 class="text-xl font-bold">BADAN AMIL ZAKAT NASIONAL</h1>
          <h1 class="text-xl font-bold">Baznas (BASIS) PROVINSI DKI JAKARTA</h1>
          <p class="text-sm">Graha Mental Spiritual, Jl. K. H. Mas Mansyiur / JL. H. awaludin II <br> Kel. Kebon Melati, Kec. Tanah Abang, Kota Administarasi Jakarta Pusat</p>
          <p class="text-sm">
            Telp. : (021) 39013676, (021) 31440233 Fax : 63866751 Jakarta 10230
          </p>
        </div>
      </div>
    </section>
    <section>
       <div class="font-serif mx-4">
        <h1 class="text-center my-4 text-lg font-serif">Formulir Asessmen dan Wawancara Kelayakan Mustahik Perorangan</h1>
        <p class="text-justify">&emsp;&emsp; Selamat pagi/siang/sore/malam. Kami/saya dari BAZNAS (BAZIS) Provinsi DKI Jakarata sedang mengumpulkan data/informasi terkait keadaan ekonomi keluarga mustahik penerima bantuan zakat seperti pendidikan , kesehatan, pekerjaan, dan pengeluaran keluarga. Untuk itu kami/saya akan mewawancarai bapak/ibu beserta anggota keluarga lainya. Seluruh data yang bapak/ibu berikan kepada kami, akan dirahasiakan dan hanya akan digunakan untuk keperluan perencaan pengelolaan zakat yang lebiih baik.</p>
        <br>
        <br>
        
        <p>Bolehkan saya mulai wawancara sekarang?</p>
       <div class="flex flex-col">
        <div class="flex gap-2">
          <input type="checkbox" name="wawancara" id="wawancara" checked value="Ya"> Ya Bersedia &rarr; Mulai wawancara
        </div>
        <div class="flex gap-2">
          <input type="checkbox" name="wawancara" id="wawancara" value="Tidak"> Tidak Bersedia &rarr; Selesai dan segera laporkan ke penanggung jawab surveyor
        </div>
        <textarea name="wawancara" class="ml-4 border border-black" cols="30" rows="6">
          Jelaskan alasan jika tidak bersedia:
        </textarea>
       </div>
       </div>
    </section>
    <section id="identitas_mustahik" class="space-y-4 mx-4 mt-6">
      
      <table class="w-full border-collapse border border-black text-sm text-black">
          <tbody>
              <tr>
                  <th class=" border border-black bg-gray-400 text-center" colspan="4">Identitas Mustahik</th>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Nama Mustahik Langsung</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->nama_mustahik }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Nama Kepala Keluarga</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->nama_kepala_keluarga }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Jenis Kelamin</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->jenis_kelamin }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Usia</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->usia }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">No. KTP / KK</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->no_ktp_kk }}</td>
              </tr>
              
              <tr>
                  <td colspan="1" rowspan ="3" class="text-left border border-black w-60">Alamat</th>
                  <td colspan=3" class="border border-black">{{ $mustahik->alamat }}</td>
              </tr>
              <tr class="border border-black">
                  <td>
                    <div class="flex w-full">
                      <p class="text-left w-1/4 ">Rt: {{ $mustahik->rt }} </p>
                      <p  class="text-left w-1/4 ">Rw: {{ $mustahik->rw }} </p>
                      <p class="text-left w-1/2">Kel: {{ $mustahik->kelurahan }}</p>
                    </div>
                  </td>
                  
              </tr>
              <tr class="border border-black">
                <td>
                  <div class="flex w-full">
                    <p class="text-left w-1/2 ">Kec: {{ $mustahik->kecamatan }}</p>
                    <p  class="text-left w-1/2 ">Kota: {{ $mustahik->kota }}</p>
                    </div>
                </td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Telp / HP</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->no_telp }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Pekerjaan</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->pekerjaan }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Agama</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->agama }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Nama yang Diwawancarai</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->nama_diwawancarai }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Telp/HP</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->no_telp_diwawancarai }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Hubungan yang di wawancarai</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->hubungan }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Nomor Index</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->nomor_index }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Jenis Bantuan</th>
                  <td colspan="3" class="border border-black">{{ $mustahik->jenis_bantuan }}</td>
              </tr>
              <tr>
                  <td colspan="1" class="w-60 text-left border border-black">Tanggal Survey</th>
                  <td colspan="3" class="border border-black">{{ \Carbon\Carbon::parse($mustahik->tanggal_survey)->format('d-m-Y') }}</td>
              </tr>
          </tbody>
      </table>
  </section>
  <section id="profil_keluarga" class="my-4 mx-4">
    <table class="w-full border-collapse border border-black text-sm text-black">
        <tbody>
            <tr>
                <th class="border border-black bg-gray-400 text-center" colspan="4">Profil Keluarga</th>
            </tr>
            <tr>
                <td colspan="1" class="w-60 text-left border border-black">1. Status Pernikahan Kepala Keluarga</td>
                <td colspan="3" class="border border-black">
                    {{ $mustahik->status_pernikahan == '5' ? 'Janda' : ($mustahik->status_pernikahan == '4' ? 'Duda' : ($mustahik->status_pernikahan == '3' ? 'Menikah' : 'Bujang')) }}
                </td>
            </tr>
            <tr>
                <td colspan="1" class="w-60 text-left border border-black">2. Jumlah Anggota / Tanggungan keluarga dalam 1 rumah</td>
                <td colspan="3" class="border border-black">
                    {{ $mustahik->jumlah_anggota == '5' ? 'diatas 6' : ($mustahik->jumlah_anggota == '4' ? '4 s/d 6' : ($mustahik->jumlah_anggota == '3' ? '1 s/d 3' : 'tidak ada')) }}
                </td>
            </tr>
            <tr>
                <td colspan="1" class="w-60 text-left border border-black">3. Usia Kepala Keluarga</td>
                <td colspan="3" class="border border-black">
                    {{ $mustahik->usia_kepala == '5' ? 'diatas 55 tahun' : ($mustahik->usia_kepala == '4' ? '51 s/d 55' : ($mustahik->usia_kepala == '3' ? '40 s/d 50' : ($mustahik->usia_kepala == '2' ? '30 s/d 40' : 'di bawah 30'))) }}
                </td>
            </tr>
            <tr>
                <td colspan="1" class="w-60 text-left border border-black">4. Anggota keluarga ada yang hamil atau memiliki balita/batita</td>
                <td colspan="3" class="border border-black">
                    {{ $mustahik->anggota_hamil == '4' ? 'Ya' : 'Tidak' }}
                </td>
            </tr>
            <tr>
                <td colspan="1" class="w-60 text-left border border-black">5. Jumlah Anak Usia Sekolah</td>
                <td colspan="3" class="border border-black">
                    {{ $mustahik->anak_usia_sekolah == '5' ? 'diatas 3' : ($mustahik->anak_usia_sekolah == '4' ? '1 s/d 3' : 'tidak ada') }}
                </td>
            </tr>
            <tr>
                <td colspan="1" class="w-60 text-left border border-black">6. Ada Orang Tua Selain Kepala Keluarga yang Sudah Uzur</td>
                <td colspan="3" class="border border-black">
                    {{ $mustahik->orang_tua_uzur == '4' ? 'Ya' : 'Tidak' }}
                </td>
            </tr>
            <tr>
                <td colspan="1" class="w-60 text-left border border-black">7. Ada Anggota yang Memiliki Penyakit Berat</td>
                <td colspan="3" class="border border-black">
                    {{ $mustahik->anggota_penyakit_berat == '4' ? 'Ya' : 'Tidak' }}
                </td>
            </tr>
            <tr>
                <td colspan="1" class="w-60 text-left border border-black">8. Jumlah Anggota Keluarga yang Memiliki Cacat Fisik</td>
                <td colspan="3" class="border border-black">
                    {{ $mustahik->anggota_cacat_fisik == '4' ? 'Ya' : 'Tidak' }}
                </td>
            </tr>
        </tbody>
    </table>
</section>
<section id="identifikasi_ketenagakerjaan_penghasilan" class="my-4 mx-4">
  <table class="w-full border-collapse border border-black text-sm text-black">
      <tbody>
          <tr>
              <th class="border border-black bg-gray-400 text-center" colspan="2">Identifikasi Ketenagakerjaan dan Penghasilan Keluarga</th>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  9. Penghasilan Utama Kepala Keluarga (Rp. {{ number_format($mustahik->jumlah_utama_kepala, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->penghasilan_utama_kepala == '5' ? 'Tidak Ada' : ($mustahik->penghasilan_utama_kepala == '4' ? 'Buruh/ Tani serabutan/ Tng Kontrak' : ($mustahik->penghasilan_utama_kepala == '3' ? 'Dagang/ Tani/ Ternak/ Produksi Jasa Kecil' : ($mustahik->penghasilan_utama_kepala == '2' ? 'Karyawan/ Pegawai/ Home Industri' : 'PNS/ Pengusaha/ Industri'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  10. Penghasilan Anggota Keluarga 2 (Rp. {{ number_format($mustahik->penghasilan_anggota_2, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->pekerjaan_anggota_2 == '5' ? 'Tidak Ada' : ($mustahik->pekerjaan_anggota_2 == '4' ? 'Buruh/ Tani serabutan/ Tng Kontrak' : ($mustahik->pekerjaan_anggota_2 == '3' ? 'Dagang/ Tani/ Ternak/ Produksi Jasa Kecil' : ($mustahik->pekerjaan_anggota_2 == '2' ? 'Karyawan/ Pegawai/ Home Industri' : 'PNS/ Pengusaha/ Industri'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  11. Penghasilan Anggota Keluarga Lain (Rp. {{ number_format($mustahik->penghasilan_anggota_lain, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->pekerjaan_anggota_lain == '4' ? 'Tidak Ada' : ($mustahik->pekerjaan_anggota_lain == '3' ? 'Buruh/ Tani serabutan/ Tng Kontrak' : ($mustahik->pekerjaan_anggota_lain == '2' ? 'Dagang/ Tani/ Ternak/ Produksi Jasa Kecil' : 'Karyawan/ Pegawai/ PNS')) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  12. Pendapatan dari Aset yang Disewakan (Rp. {{ number_format($mustahik->pendapatan_aset_sewa, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->jenis_aset_sewa == '4' ? 'Tidak Ada' : ($mustahik->jenis_aset_sewa == '2' ? 'Alat Produksi/ Kendaraan' : 'Tanah/ Rumah/ Kios/ Kontrakan') }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  13. Penerimaan Bantuan Pendidikan dari Pemerintah dan Pihak Lain
              </td>
              <td class="border border-black">
                  {{ $mustahik->jenis_bantuan_pendidikan == '4' ? 'Tidak Ada' : ($mustahik->jenis_bantuan_pendidikan == '2' ? 'KPJ/KJMU' : 'Program Beasiswa') }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  14. Pendapatan Bulanan Lain di Luar Usaha Pokok (Rp. {{ number_format($mustahik->pendapatan_bulanan_lain, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->jenis_pendapatan_lain == '3' ? 'Tidak ada' : 'Ada' }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  15. Kategori Penghasilan per Bulan
              </td>
              <td class="border border-black">
                  {{ $mustahik->kategori_penghasilan == '5' ? '< Rp 1.000.000' : ($mustahik->kategori_penghasilan == '4' ? 'Rp 1.000.000 - Rp 2.500.000' : ($mustahik->kategori_penghasilan == '3' ? 'Rp 2.500.000 - Rp 5.000.000' : ($mustahik->kategori_penghasilan == '2' ? 'Rp 5.000.000 - Rp 7.000.000' : '> Rp 7.000.000'))) }}
              </td>
          </tr>
      </tbody>
  </table>
</section>

<section id="identifikasi_ketenagakerjaan_penghasilan" class="my-4 mx-4">
  <table class="w-full border-collapse border border-black text-sm text-black">
      <tbody>
          <tr>
              <th class="border border-black bg-gray-400 text-center" colspan="2"> Identifikasi Ketenagakerjaan dan Penghasilan Keluarga</th>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  9. Penghasilan Utama Kepala Keluarga (Rp. {{ number_format($mustahik->jumlah_utama_kepala, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->penghasilan_utama_kepala == '5' ? 'Tidak Ada' : ($mustahik->penghasilan_utama_kepala == '4' ? 'Buruh/ Tani serabutan/ Tng Kontrak' : ($mustahik->penghasilan_utama_kepala == '3' ? 'Dagang/ Tani/ Ternak/ Produksi Jasa Kecil' : ($mustahik->penghasilan_utama_kepala == '2' ? 'Karyawan/ Pegawai/ Home Industri' : 'PNS/ Pengusaha/ Industri'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  10. Penghasilan Anggota Keluarga 2 (Rp. {{ number_format($mustahik->penghasilan_anggota_2, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->pekerjaan_anggota_2 == '5' ? 'Tidak Ada' : ($mustahik->pekerjaan_anggota_2 == '4' ? 'Buruh/ Tani serabutan/ Tng Kontrak' : ($mustahik->pekerjaan_anggota_2 == '3' ? 'Dagang/ Tani/ Ternak/ Produksi Jasa Kecil' : ($mustahik->pekerjaan_anggota_2 == '2' ? 'Karyawan/ Pegawai/ Home Industri' : 'PNS/ Pengusaha/ Industri'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  11. Penghasilan Anggota Keluarga Lain (Rp. {{ number_format($mustahik->penghasilan_anggota_lain, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->pekerjaan_anggota_lain == '4' ? 'Tidak Ada' : ($mustahik->pekerjaan_anggota_lain == '3' ? 'Buruh/ Tani serabutan/ Tng Kontrak' : ($mustahik->pekerjaan_anggota_lain == '2' ? 'Dagang/ Tani/ Ternak/ Produksi Jasa Kecil' : 'Karyawan/ Pegawai/ PNS')) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  12. Pendapatan dari Aset yang Disewakan (Rp. {{ number_format($mustahik->pendapatan_aset_sewa, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->jenis_aset_sewa == '4' ? 'Tidak Ada' : ($mustahik->jenis_aset_sewa == '2' ? 'Alat Produksi/ Kendaraan' : 'Tanah/ Rumah/ Kios/ Kontrakan') }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  13. Penerimaan Bantuan Pendidikan dari Pemerintah dan Pihak Lain
              </td>
              <td class="border border-black">
                  {{ $mustahik->jenis_bantuan_pendidikan == '4' ? 'Tidak Ada' : ($mustahik->jenis_bantuan_pendidikan == '2' ? 'KPJ/KJMU' : 'Program Beasiswa') }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  14. Pendapatan Bulanan Lain di Luar Usaha Pokok (Rp. {{ number_format($mustahik->pendapatan_bulanan_lain, 0, ',', '.') }})
              </td>
              <td class="border border-black">
                  {{ $mustahik->jenis_pendapatan_lain == '3' ? 'Tidak ada' : 'Ada' }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  15. Kategori Penghasilan per Bulan
              </td>
              <td class="border border-black">
                  {{ $mustahik->kategori_penghasilan == '5' ? '< Rp 1.000.000' : ($mustahik->kategori_penghasilan == '4' ? 'Rp 1.000.000 - Rp 2.500.000' : ($mustahik->kategori_penghasilan == '3' ? 'Rp 2.500.000 - Rp 5.000.000' : ($mustahik->kategori_penghasilan == '2' ? 'Rp 5.000.000 - Rp 7.000.000' : '> Rp 7.000.000'))) }}
              </td>
          </tr>
      </tbody>
  </table>
</section>


<section id="identifikasi_pengeluaran_keluarga" class="my-4 mx-4">
  <table class="w-full border-collapse border border-black text-sm text-black">
      <tbody>
          <tr>
              <th class="border border-black bg-gray-400 text-center py-2" colspan="2"> Identifikasi Pengeluaran Keluarga</th>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  16. Konsumsi Pangan (Makanan Pokok, Sayur Mayur, Makanan Kering, Daging, Ikan, Susu, Telur, Dll) (Rp. {{ number_format($mustahik->konsumsi_pangan, 0, ',', '.') }})
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->jenis_konsumsi_pangan == '5' ? '< Rp 1.000.000' : ($mustahik->jenis_konsumsi_pangan == '4' ? 'Rp 1.000.000 - Rp 2.000.000' : ($mustahik->jenis_konsumsi_pangan == '3' ? 'Rp 2.000.000 - Rp 3.000.000' : ($mustahik->jenis_konsumsi_pangan == '2' ? 'Rp 3.000.000 - Rp 3.500.000' : '> Rp 3.500.000'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  17. Konsumsi Rokok/Tembakau dalam 1 Bulan (Rp. {{ number_format($mustahik->konsumsi_rokok, 0, ',', '.') }})
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->jenis_konsumsi_rokok == '3' ? 'Tidak ada' : ($mustahik->jenis_konsumsi_rokok == '2' ? '2 hari 1 bungkus (Rp.300.000 per bulan)' : '1 hari 1 bungkus') }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  18. Biaya Listrik, Air, Gas, dan Bahan Bakar dalam 1 Bulan (Rp. {{ number_format($mustahik->biaya_listrik_air_gas, 0, ',', '.') }})
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->jenis_biaya_listrik_air_gas == '5' ? '< Rp. 200.000' : ($mustahik->jenis_biaya_listrik_air_gas == '4' ? 'Rp. 200.000 - Rp. 500.000' : ($mustahik->jenis_biaya_listrik_air_gas == '3' ? 'Rp. 500.000 - Rp. 700.000' : ($mustahik->jenis_biaya_listrik_air_gas == '2' ? 'Rp. 700.000 - Rp. 1.000.000' : '> Rp. 1.000.000'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  19. Pakaian untuk Anak-anak dan Orang Dewasa, serta Perawatan Kebersihan Tubuh dalam 1 Bulan (Rp. {{ number_format($mustahik->pakaian_kebersihan, 0, ',', '.') }})
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->jenis_pakaian_kebersihan == '5' ? '< Rp. 200.000' : ($mustahik->jenis_pakaian_kebersihan == '4' ? 'Rp. 200.000 - Rp. 500.000' : ($mustahik->jenis_pakaian_kebersihan == '3' ? 'Rp. 500.000 - Rp. 700.000' : ($mustahik->jenis_pakaian_kebersihan == '2' ? 'Rp. 700.000 - Rp. 1.000.000' : '> Rp. 1.000.000'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  20. Komunikasi (Pembayaran rekening telepon dan pembelian voucher/isi pulsa) (Rp. {{ number_format($mustahik->komunikasi, 0, ',', '.') }})
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->jenis_komunikasi == '5' ? 'Tidak ada' : ($mustahik->jenis_komunikasi == '4' ? '< Rp. 100.000' : ($mustahik->jenis_komunikasi == '3' ? 'Rp. 100.000 - Rp. 250.000' : ($mustahik->jenis_komunikasi == '2' ? 'Rp. 250.000 - Rp. 400.000' : '> Rp. 400.000'))) }}
              </td>
          </tr>
          <tr>
            <td class="w-60 text-left border border-black">
                21. Transportasi (Mencakup biaya bis, ojek, angkot, perahu, dan biaya perbaikan kendaraan, bahan bakar kendaraaan, dan sejenisnya) (Rp. {{ number_format($mustahik->transportasi, 0, ',', '.') }})
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->jenis_transportasi == '5' ? 'Tidak ada' : ($mustahik->jenis_transportasi == '4' ? '< Rp. 100.000' : ($mustahik->jenis_transportasi == '3' ? 'Rp. 100.000 - Rp. 250.000' : ($mustahik->jenis_transportasi == '2' ? 'Rp. 250.000 - Rp. 400.000' : '> Rp. 400.000'))) }}
            </td>
        </tr>
        <tr>
            <td class="w-60 text-left border border-black">
                22. Biaya Sewa Rumah/Kontrakan (Rp. {{ number_format($mustahik->biaya_sewa, 0, ',', '.') }})
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->jenis_biaya_sewa == '4' ? 'Tidak ada' : ($mustahik->jenis_biaya_sewa == '3' ? 'Rp. 500.000 - Rp. 1.000.000' : ($mustahik->jenis_biaya_sewa == '2' ? 'Rp. 1.000.000 - Rp. 2.000.000' : '> Rp. 2.000.000')) }}
            </td>
        </tr>
        <tr>
            <td class="w-60 text-left border border-black">
                23. Biaya Sekolah (SPP, Uang Saku, Buku, Seragam) (Rp. {{ number_format($mustahik->biaya_sekolah, 0, ',', '.') }})
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->jenis_biaya_sekolah == '5' ? 'Tidak ada' : ($mustahik->jenis_biaya_sekolah == '4' ? '< Rp. 200.000 - Rp. 500.000' : ($mustahik->jenis_biaya_sekolah == '3' ? 'Rp. 500.000 - Rp. 1.000.000' : ($mustahik->jenis_biaya_sekolah == '2' ? 'Rp. 1.000.000 - Rp. 2.000.000' : '> Rp. 2.000.000'))) }}
            </td>
        </tr>
        <tr>
            <td class="w-60 text-left border border-black">
                24. Biaya Kesehatan (Mencakup biaya rumah sakit, puskesmas, konsultasi dokter mantri, obat-obatan, dan lainya) (Rp. {{ number_format($mustahik->biaya_kesehatan, 0, ',', '.') }})
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->jenis_biaya_kesehatan == '5' ? '> Rp. 2.500.000' : ($mustahik->jenis_biaya_kesehatan == '4' ? 'Rp. 1.500.000 - Rp. 2.500.000' : ($mustahik->jenis_biaya_kesehatan == '3' ? 'Rp. 500.000 - Rp. 1.500.000' : 'Tidak ada')) }}
            </td>
        </tr>
        <tr>
            <td class="w-60 text-left border border-black">
                25. Angsuran Kredit {{ $mustahik->keterangan_angsuran_kredit }} (Rp. {{ number_format($mustahik->angsuran_kredit, 0, ',', '.') }})
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->jenis_angsuran_kredit == '5' ? 'Tidak ada' : ($mustahik->jenis_angsuran_kredit == '4' ? '< Rp. 1.000.000' : ($mustahik->jenis_angsuran_kredit == '3' ? 'Rp. 1.000.000 - Rp. 2.500.000' : '> Rp. 2.500.000')) }}
            </td>
        </tr>
        <tr>
            <td class="w-60 text-left border border-black">
                26. Kategori Pengeluaran per Bulan
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->kategori_pengeluaran == '5' ? '< Rp 2.000.000' : ($mustahik->kategori_pengeluaran == '4' ? 'Rp 2.000.000 - Rp 3.000.000' : ($mustahik->kategori_pengeluaran == '3' ? 'Rp 3.000.000 - Rp 5.000.000' : ($mustahik->kategori_pengeluaran == '2' ? 'Rp 5.000.000 - Rp 7.000.000' : '> Rp 7.000.000'))) }}
            </td>
        </tr>
        <tr>
            <td class="w-60 text-left border border-black">
                27. Tabungan di Bank
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->tabungan_bank == '3' ? 'Tidak Ada' : 'Ada' }}
            </td>
        </tr>
        <tr>
            <td class="w-60 text-left border border-black">
                28. Memiliki BPJS atau Asuransi Kesehatan lain / swasta {{ $mustahik->keterangan_bpjs }}
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->memiliki_bpjs == '4' ? 'Tidak Ada' : 'Ada' }}
            </td>
        </tr>
        <tr>
            <td class="w-60 text-left border border-black">
                29. Asuransi Pendidikan {{ $mustahik->keterangan_asuransi_pendidikan }}
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->asuransi_pendidikan == '4' ? 'Tidak Ada' : 'Ada' }}
            </td>
        </tr>
        <tr>
            <td class="w-60 text-left border border-black">
                30. Deposito dan Tabungan Hari Tua {{ $mustahik->keterangan_deposito }}
            </td>
            <td class="border border-black text-left">
                {{ $mustahik->deposito == '4' ? 'Tidak Ada' : 'Ada' }}
            </td>
        </tr>
      </tbody>
  </table>
</section>
<section id="identifikasi_tempat_tinggal" class="my-4 mx-4">
  <table class="w-full border-collapse border border-black text-sm text-black">
      <tbody>
          <tr>
              <th class="border border-black bg-gray-400 text-center py-2" colspan="2">Identifikasi Kondisi Tempat Tinggal dan Lingkungan</th>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  31. Kepemilikan Tempat Tinggal
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->kepemilikan_tempat_tinggal == '5' ? 'Menumpang / tidak jelas' : ($mustahik->kepemilikan_tempat_tinggal == '4' ? 'Kontrak' : ($mustahik->kepemilikan_tempat_tinggal == '3' ? 'Bersama / Keluarga' : ($mustahik->kepemilikan_tempat_tinggal == '2' ? 'Sendiri/Warisan' : 'Tidak ada'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  32. Bentuk Bangunan 
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->bentuk_bangunan == '4' ? 'Tidak Permanen' : ($mustahik->bentuk_bangunan == '3' ? 'Semi Permanen' : 'Permanen') }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  33. Desain Bangunan 
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->desain_bangunan == '3' ? '1 Lantai' : ($mustahik->desain_bangunan == '2' ? '2 Lantai' : 'lebih dari 2 Lantai') }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  34. Lokasi Rumah 
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->lokasi_rumah == '5' ? 'Bantaran kali' : ($mustahik->lokasi_rumah == '4' ? 'Kampung kumuh' : ($mustahik->lokasi_rumah == '3' ? 'Kampung biasa' : ($mustahik->lokasi_rumah == '2' ? 'Komplek' : 'Kluster'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  35. Tata Letak Lingkungan pada Umumnya 
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->tata_letak_lingkungan == '5' ? 'Kumuh dan padat' : ($mustahik->tata_letak_lingkungan == '4' ? 'Kurang teratur' : ($mustahik->tata_letak_lingkungan == '3' ? 'Teratur' : 'Sangat teratur')) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  36. Akses Rumah ke Jalan
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->akses_rumah_ke_jalan == '5' ? 'Gang Sangat Kecil' : ($mustahik->akses_rumah_ke_jalan == '4' ? 'Gang kecil jalan 2 motor' : ($mustahik->akses_rumah_ke_jalan == '3' ? 'Pinggir jalan 1 mobil' : 'Pinggir jalan 2 mobil')) }}
              </td>
          </tr>
      </tbody>
  </table>
</section>
<section id="identifikasi_kepemilikan" class="my-4 mx-4">
  <table class="w-full border-collapse border border-black text-sm text-black">
      <tbody>
          <tr>
              <th class="border border-black bg-gray-400 text-center py-2" colspan="2"> Identifikasi Kepemilikan</th>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  37. Kendaraan/Transportasi
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->kendaraan_transportasi == '5' ? 'Tidak Ada' : ($mustahik->kendaraan_transportasi == '4' ? 'Hanya sepeda' : ($mustahik->kendaraan_transportasi == '3' ? 'Motor' : ($mustahik->kendaraan_transportasi == '2' ? 'Motor lebih dari 1' : 'Mobil'))) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  38. Usaha Dagang/Produksi
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->usaha_dagang_produksi == '4' ? 'Tidak Ada' : ($mustahik->usaha_dagang_produksi == '3' ? 'Warung Kecil' : ($mustahik->usaha_dagang_produksi == '2' ? 'Toko / tani/ ternak/ home industri kecil' : 'Ruko/ industri menengah')) }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  39. Usaha Sampingan Jasa
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->usaha_sampingan_jasa == '4' ? 'Tidak Ada / Serabutan' : ($mustahik->usaha_sampingan_jasa == '3' ? 'Ojek Online' : 'Usaha tetap/ bulanan') }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  40. Usaha dari Pendapatan Sewa Aktiva
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->usaha_pendapatan_sewa_aktiva == '3' ? 'Tidak Ada' : ($mustahik->usaha_pendapatan_sewa_aktiva == '2' ? 'Alat Produksi/ Kendaraan' : 'Tanah/ Rumah/ Kios/ Kontrakan') }}
              </td>
          </tr>
      </tbody>
  </table>
</section>
<br>
<section id="scoring" class="my-4 mx-4">
  <table class="w-full border-collapse border border-black text-sm text-black">
      <tbody>
          <tr>
              <th class="border border-black bg-gray-400 text-center py-2" colspan="2"> Hasil Scoring Kelayakan</th>
          </tr>
          <tr class="">
              <td class="w-1/2 text-left border border-black px-4 py-2">
                <div class="">
                  <label for="total_nilai" class="block mb-2 text-xs font-medium text-black">Total Nilai :</label> 
                  <div class="flex gap-4">
                    <div class="text-center self-center text-xl font-medium text-black bg-gray-50 rounded-lg px-2.5 py-5 border border-black flex items-center">
                      <input id="total_nilai" readonly value="{{ $mustahik->total_nilai }}" name="total_nilai" class="w-40 bg-transparent text-right mr-2 focus:outline-none">
                      <p class="whitespace-nowrap">/40 =</p>
                    </div>
                    <input type="text" name="nilai_akhir" id="nilai_akhir" readonly
                      class="bg-gray-50 border border-black text-black text-xl text-center rounded-lg flex px-2.5 py-5 w-36 focus:outline-none focus:ring-none focus:border-none" value="{{ $mustahik->nilai_akhir }}">
                  </div>
              </td>
              <td class="w-1/2 text-left border border-black py-2">
                <label for="rekomendasi_scoring" class="block mb-2 text-xs text-center font-medium text-black">Rekomendasi Scoring</label>
              <div class="flex justify-center items-center">
                @if($mustahik->rekomendasi_scoring == '1')
                    <button type="button" id="rekomendasi_ya" class="px-4 py-6 w-28 bg-gray-200 text-black rounded-lg border border-green-500 ">Ya</button>
                @else
                    <button type="button" id="rekomendasi_tidak" class="px-4 py-6 w-28 bg-gray-50 text-black rounded-lg border border-black">Tidak</button>
                @endif
                <input type="hidden" name="rekomendasi_scoring" id="rekomendasi_scoring" value="{{ $mustahik->rekomendasi_scoring }}">
              </div>
              </td>
              
      </tbody>
  </table>
</section>
<section id="keterangan_scoring" class="my-4 mx-4">
  <table class="w-full border-collapse border border-black text-sm text-black">
      <tbody>
          <tr>
              <th class="border border-black bg-gray-400 text-center py-2" colspan="3"> Keteragan Scoring</th>
          </tr>
          <tr>
              <td class="w-6 text-left border border-black">
                  1
              </td>
              <td class="border border-black text-left" colspan="2">
                  Interval skoring dari 0 sd 100
              </td>
          </tr>
          <tr>
              <td class="w-6 text-left border border-black">
                  2
              </td>
              <td class="border border-black text-left" colspan="2">
                  Skor 100 untuk item Positif (yang diharapkan) dan skor 20 untuk item negatif (tidak diharapkan)
              </td>
          </tr>
          <tr>
              <td class="w-6 text-left border border-black">
                  3
              </td>
              <td class="border border-black text-left" colspan="2">
                  Skor penilaian dilakukan dari nomor 1 sampai dengan 40
              </td>
          </tr>
          <tr>
            <td class="w-6 text-left border border-black">
                4
            </td>
            <td class="border border-black text-left">
                a = bobot nilai 100
            </td>
            <td class="text-left border border-black">
                Hasil Skor 80 < x < 100 = perlu perhatian khusus
            </td>
          </tr>
          <tr>
            <td class="w-6 text-left border border-black">
                5
            </td>
            <td class="border border-black text-left w-1/4">
                b = bobot nilai 80
            </td>
            <td class="text-left border border-black">
                Hasil Skor 60 < x < 80 = layak dibantu
            </td>
          </tr>
          <tr>
            <td class="w-6 text-left border border-black">
                6
            </td>
            <td class="border border-black text-left">
                c = bobot nilai 60
            </td>
            <td class="text-left border border-black">
                Hasil Skor 40 < x < 60 = dibantu namun kurang layak
            </td>
          </tr>
          <tr>
            <td class="w-6 text-left border border-black">
                7
            </td>
            <td class="border border-black text-left">
                d = bobot nilai 40
            </td>
            <td class="text-left border border-black">
                Hasil Skor 20 < x < 40 = tidak layak dibantu
            </td>
          </tr>
          <tr>
            <td class="w-6 text-left border border-black">
                8
            </td>
            <td class="border border-black text-left">
                e = bobot nilai 20
            </td>
            <td class="text-left border border-black">
                Hasil Skor 0 < x < 20 = sanagat tidak layak ditolak
            </td>
          </tr>  
          
          
      </tbody>
  </table>
</section>
<section id="catatan_surveyor" class="my-4 mx-4">
  <table class="w-full border-collapse border border-black text-sm text-black">
      <tbody>
          <tr>
              <th class="border border-black bg-gray-400 text-center py-2" colspan="2">Catatan/Rekomendasi Surveyor/Pewawancara</th>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  1. Akurasi Alamat
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->akurasi_alamat == '1' ? 'Ya' : 'Tidak' }}
              </td>
          </tr>
          <tr>
              <td class="w-60 text-left border border-black">
                  2. Kelayakan Mustahik
              </td>
              <td class="border border-black text-left">
                  {{ $mustahik->kelayakan_mustahik == '1' ? 'Ya' : ($mustahik->kelayakan_mustahik == '2' ? 'Tidak' : 'Dipertimbangkan') }}
              </td>
          </tr>
          <tr>

              <td class="border border-black text-left h-40 align-top" colspan="2" >
                Tulislah analisa rekomendai surveyor terhadap kelayakan mustahik dari hasil survey <br>
                  {{ $mustahik->analisis_rekomendasi }}
              </td>
          </tr>
      </tbody>
  </table>
</section>



<section id="tanda_tangan" class="my-4 mx-4">
  <table class="w-full border-collapse border border-black text-sm text-black">
      <tbody>
      
          <tr>
              <td class="w-1/3 text-left border border-black" rowspan="2" colspan="2"> Kode titik koordinat (Share Lokasi Google Maps)</td>
              <td class="w-60 text-left border border-black">
                Tgl. {{ $mustahik->created_at->format('d/m/Y') }}
              </td>
              <td class="w-60 text-left border border-black">
                Tgl. {{ $mustahik->created_at->format('d/m/Y') }}
              </td>
              <td class="w-60 text-left border border-black">
                Tgl. {{ $mustahik->created_at->format('d/m/Y') }}
              </td>
          </tr>
          <tr>
            <td class="w-60 text-left border border-black">
              Paraf yang disurvey:
            </td>
            <td class="w-60 text-left border border-black">
              Koordinator Survey
            </td>
            <td class="w-60 text-left border border-black">
              Paraf Surveyor
            </td>

          </tr>
          <tr>
              <td class="w-1/3 text-left border border-black" colspan="2">{{ $mustahik->kode_koordinat }}
              </td>
              <td class="w-60 text-left border border-black">
                  @if($mustahik->signed_koordinator)
                      <img src="/storage/{{ $mustahik->signed_koordinator }}" alt="Koordinator Survey" class="border object-contain border-gray-300 w-full rounded-lg p-2" style="height: 100px;">
                  @else
                      Tidak ada paraf
                  @endif
              </td>
              <td class="w-60 text-left border border-black">
                  @if($mustahik->signed_surveyor)
                      <img src="/storage/{{ $mustahik->signed_surveyor }}" alt="Paraf Surveyor" class="border object-contain border-gray-300 w-full rounded-lg p-2" style="height: 100px;">
                  @else
                      Tidak ada paraf
                  @endif
              </td>
              <td class="w-60 text-left border border-black">
                  @if($mustahik->signed_disurvey) 
                      <img src="/storage/{{ $mustahik->signed_disurvey }}" alt="Paraf yang disurvey" class="border object-contain border-gray-300 w-full rounded-lg p-2" style="height: 100px;">
                  @else
                      Tidak ada paraf
                  @endif
              </td>
          </tr>
      </tbody>
  </table>
</section>


<script type="text/javascript">
    window.print();
    window.onafterprint = back;

    function back() {
        window.history.back();
    }
</script>
</body>
</html>