<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MustahikPenghasilan
 * 
 * @property int $id
 * @property int $mustahik_id
 * @property string|null $jumlah_utama_kepala
 * @property int $penghasilan_utama_kepala
 * @property string|null $penghasilan_anggota_2
 * @property int $pekerjaan_anggota_2
 * @property string|null $penghasilan_anggota_lain
 * @property int $pekerjaan_anggota_lain
 * @property string|null $pendapatan_aset_sewa
 * @property int $jenis_aset_sewa
 * @property int $jenis_bantuan_pendidikan
 * @property string|null $pendapatan_bulanan_lain
 * @property int $jenis_pendapatan_lain
 * @property int $kategori_penghasilan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Mustahik $mustahik
 *
 * @package App\Models
 */
class MustahikPenghasilan extends Model
{
	protected $table = 'mustahik_penghasilan';

	protected $casts = [
		'mustahik_id' => 'int',
		'penghasilan_utama_kepala' => 'int',
		'pekerjaan_anggota_2' => 'int',
		'pekerjaan_anggota_lain' => 'int',
		'jenis_aset_sewa' => 'int',
		'jenis_bantuan_pendidikan' => 'int',
		'jenis_pendapatan_lain' => 'int',
		'kategori_penghasilan' => 'int'
	];

	protected $fillable = [
		'mustahik_id',
		'jumlah_utama_kepala',
		'penghasilan_utama_kepala',
		'penghasilan_anggota_2',
		'pekerjaan_anggota_2',
		'penghasilan_anggota_lain',
		'pekerjaan_anggota_lain',
		'pendapatan_aset_sewa',
		'jenis_aset_sewa',
		'jenis_bantuan_pendidikan',
		'pendapatan_bulanan_lain',
		'jenis_pendapatan_lain',
		'kategori_penghasilan'
	];

	public function mustahik()
	{
		return $this->belongsTo(Mustahik::class);
	}
}
