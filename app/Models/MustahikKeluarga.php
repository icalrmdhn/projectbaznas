<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MustahikKeluarga
 * 
 * @property int $id
 * @property int $mustahik_id
 * @property int $status_pernikahan
 * @property int $jumlah_anggota
 * @property int $usia_kepala
 * @property int $anggota_hamil
 * @property int $anak_usia_sekolah
 * @property int $orang_tua_uzur
 * @property int $anggota_penyakit_berat
 * @property int $anggota_cacat_fisik
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Mustahik $mustahik
 *
 * @package App\Models
 */
class MustahikKeluarga extends Model
{
	protected $table = 'mustahik_keluarga';

	protected $casts = [
		'mustahik_id' => 'int',
		'status_pernikahan' => 'int',
		'jumlah_anggota' => 'int',
		'usia_kepala' => 'int',
		'anggota_hamil' => 'int',
		'anak_usia_sekolah' => 'int',
		'orang_tua_uzur' => 'int',
		'anggota_penyakit_berat' => 'int',
		'anggota_cacat_fisik' => 'int'
	];

	protected $fillable = [
		'mustahik_id',
		'status_pernikahan',
		'jumlah_anggota',
		'usia_kepala',
		'anggota_hamil',
		'anak_usia_sekolah',
		'orang_tua_uzur',
		'anggota_penyakit_berat',
		'anggota_cacat_fisik'
	];

	public function mustahik()
	{
		return $this->belongsTo(Mustahik::class);
	}
}
