<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MustahikTempatTinggal
 * 
 * @property int $id
 * @property int $mustahik_id
 * @property int $kepemilikan_tempat_tinggal
 * @property int $bentuk_bangunan
 * @property int $desain_bangunan
 * @property int $lokasi_rumah
 * @property int $tata_letak_lingkungan
 * @property int $akses_rumah_ke_jalan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Mustahik $mustahik
 *
 * @package App\Models
 */
class MustahikTempatTinggal extends Model
{
	protected $table = 'mustahik_tempat_tinggal';

	protected $casts = [
		'mustahik_id' => 'int',
		'kepemilikan_tempat_tinggal' => 'int',
		'bentuk_bangunan' => 'int',
		'desain_bangunan' => 'int',
		'lokasi_rumah' => 'int',
		'tata_letak_lingkungan' => 'int',
		'akses_rumah_ke_jalan' => 'int'
	];

	protected $fillable = [
		'mustahik_id',
		'kepemilikan_tempat_tinggal',
		'bentuk_bangunan',
		'desain_bangunan',
		'lokasi_rumah',
		'tata_letak_lingkungan',
		'akses_rumah_ke_jalan'
	];

	public function mustahik()
	{
		return $this->belongsTo(Mustahik::class);
	}
}
