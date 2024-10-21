<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mustahik
 * 
 * @property int $id
 * @property string $nama_mustahik
 * @property string $nama_kepala_keluarga
 * @property string $jenis_kelamin
 * @property int $usia
 * @property string $no_ktp_kk
 * @property string $alamat
 * @property string $rt
 * @property string $rw
 * @property string $kelurahan
 * @property string $kelurahan_id
 * @property string $kecamatan
 * @property string $kecamatan_id
 * @property string $kota
 * @property string $kota_id
 * @property string $no_telp
 * @property string $pekerjaan
 * @property string $agama
 * @property string $nama_diwawancarai
 * @property string $no_telp_diwawancarai
 * @property string $hubungan
 * @property string $nomor_index
 * @property string $jenis_bantuan
 * @property Carbon $tanggal_survey
 * @property string $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|MustahikKeluarga[] $mustahik_keluargas
 * @property Collection|MustahikKepemilikan[] $mustahik_kepemilikans
 * @property Collection|MustahikPengeluaran[] $mustahik_pengeluarans
 * @property Collection|MustahikPenghasilan[] $mustahik_penghasilans
 * @property Collection|MustahikRekomendasi[] $mustahik_rekomendasis
 * @property Collection|MustahikScoring[] $mustahik_scorings
 * @property Collection|MustahikTempatTinggal[] $mustahik_tempat_tinggals
 *
 * @package App\Models
 */
class Mustahik extends Model
{
	protected $table = 'mustahik';

	protected $casts = [
		'usia' => 'int',
		'tanggal_survey' => 'datetime'
	];

	protected $fillable = [
		'nama_mustahik',
		'nama_kepala_keluarga',
		'jenis_kelamin',
		'usia',
		'no_ktp_kk',
		'alamat',
		'rt',
		'rw',
		'kelurahan',
		'kelurahan_id',
		'kecamatan',
		'kecamatan_id',
		'kota',
		'kota_id',
		'no_telp',
		'pekerjaan',
		'agama',
		'nama_diwawancarai',
		'no_telp_diwawancarai',
		'hubungan',
		'nomor_index',
		'jenis_bantuan',
		'tanggal_survey',
		'user_id'
	];

	public function mustahik_keluargas()
	{
		return $this->hasMany(MustahikKeluarga::class);
	}

	public function mustahik_kepemilikans()
	{
		return $this->hasMany(MustahikKepemilikan::class);
	}

	public function mustahik_pengeluarans()
	{
		return $this->hasMany(MustahikPengeluaran::class);
	}

	public function mustahik_penghasilans()
	{
		return $this->hasMany(MustahikPenghasilan::class);
	}

	public function mustahik_rekomendasis()
	{
		return $this->hasMany(MustahikRekomendasi::class);
	}

	public function mustahik_scorings()
	{
		return $this->hasMany(MustahikScoring::class);
	}

	public function mustahik_tempat_tinggals()
	{
		return $this->hasMany(MustahikTempatTinggal::class);
	}
}
