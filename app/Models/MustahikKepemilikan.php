<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MustahikKepemilikan
 * 
 * @property int $id
 * @property int $mustahik_id
 * @property int $kendaraan_transportasi
 * @property int $usaha_dagang_produksi
 * @property int $usaha_sampingan_jasa
 * @property int $usaha_pendapatan_sewa_aktiva
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Mustahik $mustahik
 *
 * @package App\Models
 */
class MustahikKepemilikan extends Model
{
	protected $table = 'mustahik_kepemilikan';

	protected $casts = [
		'mustahik_id' => 'int',
		'kendaraan_transportasi' => 'int',
		'usaha_dagang_produksi' => 'int',
		'usaha_sampingan_jasa' => 'int',
		'usaha_pendapatan_sewa_aktiva' => 'int'
	];

	protected $fillable = [
		'mustahik_id',
		'kendaraan_transportasi',
		'usaha_dagang_produksi',
		'usaha_sampingan_jasa',
		'usaha_pendapatan_sewa_aktiva'
	];

	public function mustahik()
	{
		return $this->belongsTo(Mustahik::class);
	}
}
