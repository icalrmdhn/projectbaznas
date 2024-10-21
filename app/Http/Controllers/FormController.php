<?php

namespace App\Http\Controllers;

use App\Models\Mustahik;
use App\Models\MustahikKeluarga;
use App\Models\MustahikKepemilikan;
use App\Models\MustahikPengeluaran;
use App\Models\MustahikPenghasilan;
use App\Models\MustahikRekomendasi;
use App\Models\MustahikScoring;
use App\Models\MustahikTempatTinggal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\LaravelPdf\Facades\Pdf;

class FormController extends Controller
{
  
    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {


                 // Simpan image ke storage
                 $disurveyImagePath = $this->saveSignatureImage($request->signed_disurvey, 'signed_disurvey', $request->nama_mustahik);
                 $surveyorImagePath = $this->saveSignatureImage($request->signed_surveyor, 'signed_surveyor',$request->nama_mustahik);
                 $koordinatorImagePath = null;
                 if (Auth::user()->level == 0) {
                     $koordinatorImagePath = $this->saveSignatureImage($request->signed_koordinator, 'signed_koordinator',$request->nama_mustahik);
                 }
                 //dd($request->all(), $disurveyImagePath, $koordinatorImagePath, $surveyorImagePath,Auth::user()->level);
        //dd($request->all(), $disurveyImagePath, $koordinatorImagePath, $surveyorImagePath);
              // Simpan ke tabel mustahik
              $mustahik = Mustahik::create([
                'nama_mustahik' => $request->nama_mustahik,
                'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
                'jenis_kelamin' => $request->jenis_kelamin,
                'usia' => $request->usia,
                'no_ktp_kk' => $request->no_ktp_kk,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kelurahan' => $request->kelurahan_nama,
                'kelurahan_id' => $request->kelurahan,
                'kecamatan' => $request->kecamatan_nama,
                'kecamatan_id' => $request->kecamatan,
                'kota' => $request->kota_nama,
                'kota_id' => $request->kota,
                'no_telp' => $request->no_telp,
                'pekerjaan' => $request->pekerjaan,
                'agama' => $request->agama,
                'nama_diwawancarai' => $request->nama_diwawancarai,
                'no_telp_diwawancarai' => $request->no_telp_diwawancarai,
                'hubungan' => $request->hubungan,
                'nomor_index' => $request->nomor_index,
                'jenis_bantuan' => $request->jenis_bantuan,
                'tanggal_survey' => $request->tanggal_survey,
                'user_id' => $request->user_id,
            ]);
    
            // Simpan ke tabel mustahik_keluarga
            MustahikKeluarga::create([
                'mustahik_id' => $mustahik->id,
                'jumlah_anggota' => $request->jumlah_anggota,
                'usia_kepala' => $request->usia_kepala,
                'anggota_hamil' => $request->anggota_hamil,
                'anak_usia_sekolah' => $request->anak_usia_sekolah,
                'orang_tua_uzur' => $request->orang_tua_uzur,
                'anggota_penyakit_berat' => $request->anggota_penyakit_berat,
                'anggota_cacat_fisik' => $request->anggota_cacat_fisik,
                'status_pernikahan' => $request->status_pernikahan,
            ]);
    
            // Simpan ke tabel mustahik_penghasilan
            MustahikPenghasilan::create([
                'mustahik_id' => $mustahik->id,
                'jumlah_utama_kepala' => $this->convertToDecimal($request->jumlah_utama_kepala),
                'penghasilan_utama_kepala' => $request->penghasilan_utama_kepala,
                'penghasilan_anggota_2' => $this->convertToDecimal($request->penghasilan_anggota_2),
                'pekerjaan_anggota_2' => $request->pekerjaan_anggota_2,
                'penghasilan_anggota_lain' => $this->convertToDecimal($request->penghasilan_anggota_lain),
                'pekerjaan_anggota_lain' => $request->pekerjaan_anggota_lain,
                'pendapatan_aset_sewa' => $this->convertToDecimal($request->pendapatan_aset_sewa),
                'jenis_aset_sewa' => $request->jenis_aset_sewa,
                'jenis_bantuan_pendidikan' => $request->jenis_bantuan_pendidikan,
                'pendapatan_bulanan_lain' => $this->convertToDecimal($request->pendapatan_bulanan_lain),
                'jenis_pendapatan_lain' => $request->jenis_pendapatan_lain,
                'kategori_penghasilan' => $request->kategori_penghasilan,
            ]);
    
            // Simpan ke tabel mustahik_pengeluaran
            MustahikPengeluaran::create([
                'mustahik_id' => $mustahik->id,
                'konsumsi_pangan' => $this->convertToDecimal($request->konsumsi_pangan),
                'jenis_konsumsi_pangan' => $request->jenis_konsumsi_pangan,
                'konsumsi_rokok' => $this->convertToDecimal($request->konsumsi_rokok),
                'jenis_konsumsi_rokok' => $request->jenis_konsumsi_rokok,
                'biaya_listrik_air_gas' => $this->convertToDecimal($request->biaya_listrik_air_gas),
                'jenis_biaya_listrik_air_gas' => $request->jenis_biaya_listrik_air_gas,
                'pakaian_kebersihan' => $this->convertToDecimal($request->pakaian_kebersihan),
                'jenis_pakaian_kebersihan' => $request->jenis_pakaian_kebersihan,
                'komunikasi' => $this->convertToDecimal($request->komunikasi),
                'jenis_komunikasi' => $request->jenis_komunikasi,
                'transportasi' => $this->convertToDecimal($request->transportasi),
                'jenis_transportasi' => $request->jenis_transportasi,
                'biaya_sewa' => $this->convertToDecimal($request->biaya_sewa),
                'jenis_biaya_sewa' => $request->jenis_biaya_sewa,
                'biaya_sekolah' => $this->convertToDecimal($request->biaya_sekolah),
                'jenis_biaya_sekolah' => $request->jenis_biaya_sekolah,
                'biaya_kesehatan' => $this->convertToDecimal($request->biaya_kesehatan),
                'jenis_biaya_kesehatan' => $request->jenis_biaya_kesehatan,
                'angsuran_kredit' => $this->convertToDecimal($request->angsuran_kredit),
                'jenis_angsuran_kredit' => $request->jenis_angsuran_kredit,
                'keterangan_angsuran_kredit' => $request->keterangan_angsuran_kredit,
                'kategori_pengeluaran' => $request->kategori_pengeluaran,
                'tabungan_bank' => $request->tabungan_bank,
                'memiliki_bpjs' => $request->memiliki_bpjs,
                'keterangan_bpjs' => $request->keterangan_bpjs,
                'asuransi_pendidikan' => $request->asuransi_pendidikan,
                'keterangan_asuransi_pendidikan' => $request->keterangan_asuransi_pendidikan,
                'deposito' => $request->deposito,
                'keterangan_deposito' => $request->keterangan_deposito,
            ]);
    



            // Simpan ke tabel mustahik_rekomendasi
            MustahikRekomendasi::create([
                'mustahik_id' => $mustahik->id,
                'akurasi_alamat' => $request->akurasi_alamat,
                'kelayakan_mustahik' => $request->kelayakan_mustahik,
                'analisis_rekomendasi' => $request->analisis_rekomendasi,
                'kode_koordinat' => $request->kode_koordinat,
                'signed_disurvey' => $disurveyImagePath,
                'signed_surveyor' => $surveyorImagePath,
                'signed_koordinator' => $koordinatorImagePath,

            ]);
    
            // Simpan ke tabel mustahik_scoring
            MustahikScoring::create([
                'mustahik_id' => $mustahik->id,
                'total_nilai' => $request->total_nilai,
                'nilai_akhir' => $request->nilai_akhir,
                'rekomendasi_scoring' => $request->rekomendasi_scoring,
            ]);

            // Simpan ke tabel mustahik_kepemilikan
            MustahikKepemilikan::create([
                'mustahik_id' => $mustahik->id,
                'kendaraan_transportasi' => $request->kendaraan_transportasi,
                'usaha_dagang_produksi' => $request->usaha_dagang_produksi,
                'usaha_sampingan_jasa' => $request->usaha_sampingan_jasa,
                'usaha_pendapatan_sewa_aktiva' => $request->usaha_pendapatan_sewa_aktiva,
            ]);
    
            // Simpan ke tabel mustahik_tempat_tinggal
            MustahikTempatTinggal::create([
                'mustahik_id' => $mustahik->id,
                'akses_rumah_ke_jalan' => $request->akses_rumah_ke_jalan,
                'bentuk_bangunan' => $request->bentuk_bangunan,
                'desain_bangunan' => $request->desain_bangunan,
                'kepemilikan_tempat_tinggal' => $request->kepemilikan_tempat_tinggal,
                'lokasi_rumah' => $request->lokasi_rumah,
                'tata_letak_lingkungan' => $request->tata_letak_lingkungan
            ]);

            return redirect('/')->with('success', 'Data mustahik berhasil ditambahkan');
      }

      public function edit($id)
      {
          $mustahik = Mustahik::find($id);
          $mustahik = Mustahik::leftJoin('mustahik_keluarga', 'mustahik.id', '=', 'mustahik_keluarga.mustahik_id')
              ->leftJoin('mustahik_penghasilan', 'mustahik.id', '=', 'mustahik_penghasilan.mustahik_id')
              ->leftJoin('mustahik_pengeluaran', 'mustahik.id', '=', 'mustahik_pengeluaran.mustahik_id')
              ->leftJoin('mustahik_rekomendasi', 'mustahik.id', '=', 'mustahik_rekomendasi.mustahik_id')
              ->leftJoin('mustahik_scoring', 'mustahik.id', '=', 'mustahik_scoring.mustahik_id')
              ->leftJoin('mustahik_tempat_tinggal', 'mustahik.id', '=', 'mustahik_tempat_tinggal.mustahik_id')
              ->leftJoin('mustahik_kepemilikan', 'mustahik.id', '=', 'mustahik_kepemilikan.mustahik_id')
              ->select('mustahik.*', 'mustahik_keluarga.*', 'mustahik_penghasilan.*', 'mustahik_pengeluaran.*', 'mustahik_rekomendasi.*', 'mustahik_scoring.*', 'mustahik_tempat_tinggal.*', 'mustahik_kepemilikan.*')
              ->find($id);
        //dd($mustahik);
          return view('form-edit', compact('mustahik'));
      }

      public function update(Request $request, $id)
      {
            //dd($request,$id);
          $mustahik = Mustahik::find($id);
          $mustahik->update([
            'nama_mustahik' => $request->nama_mustahik,
                'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
                'jenis_kelamin' => $request->jenis_kelamin,
                'usia' => $request->usia,
                'no_ktp_kk' => $request->no_ktp_kk,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kelurahan' => $request->kelurahan_nama,
                'kecamatan' => $request->kecamatan_nama,
                'kota' => $request->kota_nama,
                'no_telp' => $request->no_telp,
                'pekerjaan' => $request->pekerjaan,
                'agama' => $request->agama,
                'nama_diwawancarai' => $request->nama_diwawancarai,
                'no_telp_diwawancarai' => $request->no_telp_diwawancarai,
                'hubungan' => $request->hubungan,
                'nomor_index' => $request->nomor_index,
                'jenis_bantuan' => $request->jenis_bantuan,
                'tanggal_survey' => $request->tanggal_survey,
          ]);
          $mustahik_keluarga = MustahikKeluarga::where('mustahik_id', $id)->first();
          $mustahik_keluarga->update([
            'jumlah_anggota' => $request->jumlah_anggota,
                'usia_kepala' => $request->usia_kepala,
                'anggota_hamil' => $request->anggota_hamil,
                'anak_usia_sekolah' => $request->anak_usia_sekolah,
                'orang_tua_uzur' => $request->orang_tua_uzur,
                'anggota_penyakit_berat' => $request->anggota_penyakit_berat,
                'anggota_cacat_fisik' => $request->anggota_cacat_fisik,
                'status_pernikahan' => $request->status_pernikahan,
            ]);
        $mustahik_penghasilan = MustahikPenghasilan::where('mustahik_id', $id)->first();
        $mustahik_penghasilan->update([
                'jumlah_utama_kepala' => $this->convertToDecimal($request->jumlah_utama_kepala),
                'penghasilan_utama_kepala' => $request->penghasilan_utama_kepala,
                'penghasilan_anggota_2' => $this->convertToDecimal($request->penghasilan_anggota_2),
                'pekerjaan_anggota_2' => $request->pekerjaan_anggota_2,
                'penghasilan_anggota_lain' => $this->convertToDecimal($request->penghasilan_anggota_lain),
                'pekerjaan_anggota_lain' => $request->pekerjaan_anggota_lain,
                'pendapatan_aset_sewa' => $this->convertToDecimal($request->pendapatan_aset_sewa),
                'jenis_aset_sewa' => $request->jenis_aset_sewa,
                'jenis_bantuan_pendidikan' => $request->jenis_bantuan_pendidikan,
                'pendapatan_bulanan_lain' => $this->convertToDecimal($request->pendapatan_bulanan_lain),
                'jenis_pendapatan_lain' => $request->jenis_pendapatan_lain,
                'kategori_penghasilan' => $request->kategori_penghasilan,
            ]);

                        // Simpan ke tabel mustahik_kepemilikan
            $mustahik_kepemilikan = MustahikKepemilikan::where('mustahik_id', $id)->first();
            $mustahik_kepemilikan->update([
                'kendaraan_transportasi' => $request->kendaraan_transportasi,
                'usaha_dagang_produksi' => $request->usaha_dagang_produksi,
                'usaha_sampingan_jasa' => $request->usaha_sampingan_jasa,
                'usaha_pendapatan_sewa_aktiva' => $request->usaha_pendapatan_sewa_aktiva,
            ]);
          
            $mustahik_pengeluaran = MustahikPengeluaran::where('mustahik_id', $id)->first();
            $mustahik_pengeluaran->update([
                'konsumsi_pangan' => $this->convertToDecimal($request->konsumsi_pangan),
                'jenis_konsumsi_pangan' => $request->jenis_konsumsi_pangan,
                'konsumsi_rokok' => $this->convertToDecimal($request->konsumsi_rokok),
                'jenis_konsumsi_rokok' => $request->jenis_konsumsi_rokok,
                'biaya_listrik_air_gas' => $this->convertToDecimal($request->biaya_listrik_air_gas),
                'jenis_biaya_listrik_air_gas' => $request->jenis_biaya_listrik_air_gas,
                'pakaian_kebersihan' => $this->convertToDecimal($request->pakaian_kebersihan),
                'jenis_pakaian_kebersihan' => $request->jenis_pakaian_kebersihan,
                'komunikasi' => $this->convertToDecimal($request->komunikasi),
                'jenis_komunikasi' => $request->jenis_komunikasi,
                'transportasi' => $this->convertToDecimal($request->transportasi),
                'jenis_transportasi' => $request->jenis_transportasi,
                'biaya_sewa' => $this->convertToDecimal($request->biaya_sewa),
                'jenis_biaya_sewa' => $request->jenis_biaya_sewa,
                'biaya_sekolah' => $this->convertToDecimal($request->biaya_sekolah),
                'jenis_biaya_sekolah' => $request->jenis_biaya_sekolah,
                'biaya_kesehatan' => $this->convertToDecimal($request->biaya_kesehatan),
                'jenis_biaya_kesehatan' => $request->jenis_biaya_kesehatan,
                'angsuran_kredit' => $this->convertToDecimal($request->angsuran_kredit),
                'jenis_angsuran_kredit' => $request->jenis_angsuran_kredit,
                'keterangan_angsuran_kredit' => $request->keterangan_angsuran_kredit,
                'kategori_pengeluaran' => $request->kategori_pengeluaran,
                'tabungan_bank' => $request->tabungan_bank,
                'memiliki_bpjs' => $request->memiliki_bpjs,
                'keterangan_bpjs' => $request->keterangan_bpjs,
                'asuransi_pendidikan' => $request->asuransi_pendidikan,
                'keterangan_asuransi_pendidikan' => $request->keterangan_asuransi_pendidikan,
                'deposito' => $request->deposito,
                'keterangan_deposito' => $request->keterangan_deposito,
            ]);

            if($request->signed_disurvey) {
                $disurveyImagePath = $this->saveSignatureImage($request->signed_disurvey, 'signed_disurvey', $request->nama_mustahik);
            }
            else {
                $disurveyImagePath = $request->old_signed_disurvey;
            }
             // Simpan image ke storage
            
             if($request->signed_koordinator) {
                $koordinatorImagePath = $this->saveSignatureImage($request->signed_koordinator, 'signed_koordinator',$request->nama_mustahik);
            }
            else {
                $koordinatorImagePath = $request->old_signed_koordinator;
            }
             if($request->signed_surveyor) {
                $surveyorImagePath = $this->saveSignatureImage($request->signed_surveyor, 'signed_surveyor',$request->nama_mustahik);
            }
            else {
                $surveyorImagePath = $request->old_signed_surveyor;
            }
 
             // Ubah ke tabel mustahik_rekomendasi
             MustahikRekomendasi::where('mustahik_id', $id)->update([
                 'akurasi_alamat' => $request->akurasi_alamat,
                 'kelayakan_mustahik' => $request->kelayakan_mustahik,
                 'analisis_rekomendasi' => $request->analisis_rekomendasi,
                 'kode_koordinat' => $request->kode_koordinat,
                 'signed_disurvey' => $disurveyImagePath,
                 'signed_koordinator' => $koordinatorImagePath,
                 'signed_surveyor' => $surveyorImagePath,
             ]);
     
             // Ubah ke tabel mustahik_scoring
             MustahikScoring::where('mustahik_id', $id)->update([
                 'total_nilai' => $request->total_nilai,
                 'nilai_akhir' => $request->nilai_akhir,
                 'rekomendasi_scoring' => $request->rekomendasi_scoring,
             ]);
     
             // Ubah ke tabel mustahik_tempat_tinggal
             MustahikTempatTinggal::where('mustahik_id', $id)->update([
                 'akses_rumah_ke_jalan' => $request->akses_rumah_ke_jalan,
                 'bentuk_bangunan' => $request->bentuk_bangunan,
                 'desain_bangunan' => $request->desain_bangunan,
                 'kepemilikan_tempat_tinggal' => $request->kepemilikan_tempat_tinggal,
                 'lokasi_rumah' => $request->lokasi_rumah,
                 'tata_letak_lingkungan' => $request->tata_letak_lingkungan,
             ]);

             return redirect('/')->with('success', 'Data mustahik berhasil diperbarui');
      }

      public function destroy($id)
      {
          Mustahik::find($id)->delete();
          MustahikKeluarga::where('mustahik_id', $id)->delete();
          MustahikPenghasilan::where('mustahik_id', $id)->delete();
          MustahikPengeluaran::where('mustahik_id', $id)->delete();
        $mustahikRekomendasi = MustahikRekomendasi::where('mustahik_id', $id)->first();
          if ($mustahikRekomendasi) {
            Storage::disk('public')->delete($mustahikRekomendasi->signed_disurvey);
            Storage::disk('public')->delete($mustahikRekomendasi->signed_koordinator);
            Storage::disk('public')->delete($mustahikRekomendasi->signed_surveyor);
          }

          MustahikRekomendasi::where('mustahik_id', $id)->delete();
          MustahikScoring::where('mustahik_id', $id)->delete();
          MustahikTempatTinggal::where('mustahik_id', $id)->delete();

          return redirect('/')->with('success', 'Data mustahik berhasil dihapus');
      }

      public function download($id){
        $mustahik = Mustahik::find($id);
          $mustahik = Mustahik::leftJoin('mustahik_keluarga', 'mustahik.id', '=', 'mustahik_keluarga.mustahik_id')
              ->leftJoin('mustahik_penghasilan', 'mustahik.id', '=', 'mustahik_penghasilan.mustahik_id')
              ->leftJoin('mustahik_pengeluaran', 'mustahik.id', '=', 'mustahik_pengeluaran.mustahik_id')
              ->leftJoin('mustahik_rekomendasi', 'mustahik.id', '=', 'mustahik_rekomendasi.mustahik_id')
              ->leftJoin('mustahik_scoring', 'mustahik.id', '=', 'mustahik_scoring.mustahik_id')
              ->leftJoin('mustahik_tempat_tinggal', 'mustahik.id', '=', 'mustahik_tempat_tinggal.mustahik_id')
              ->leftJoin('mustahik_kepemilikan', 'mustahik.id', '=', 'mustahik_kepemilikan.mustahik_id')
              ->select('mustahik.*', 'mustahik_keluarga.*', 'mustahik_penghasilan.*', 'mustahik_pengeluaran.*', 'mustahik_rekomendasi.*', 'mustahik_scoring.*', 'mustahik_tempat_tinggal.*', 'mustahik_kepemilikan.*')
              ->find($id);
        return view('form-print', ['mustahik' => $mustahik]);
      }

      private function convertToDecimal($value)
      {
          // Remove non-numeric characters except for commas and dots
          $value = preg_replace('/[^\d,.-]/', '', $value);
          // Replace comma with dot for decimal format
          $value = str_replace(',', '.', $value);
          return (float)$value;
      }

private function saveSignatureImage($image, $prefix, $name)
{
    $image = str_replace('image/svg+xml;base64,', '', $image);
    $image = str_replace(' ', '+', $image);
    $imageName = $prefix . '_' . $name . '_' . date('YmdHis') . '.svg';
    Storage::disk('public')->put($imageName, base64_decode($image));
    //store in public

    return $imageName;
}

}
