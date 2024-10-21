<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MustahikRekomendasi
 * 
 * @property int $id
 * @property int $mustahik_id
 * @property int|null $akurasi_alamat
 * @property int|null $kelayakan_mustahik
 * @property string|null $analisis_rekomendasi
 * @property string|null $kode_koordinat
 * @property string|null $signed_disurvey
 * @property string|null $signed_koordinator
 * @property string|null $signed_surveyor
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Mustahik $mustahik
 *
 * @package App\Models
 */
class MustahikRekomendasi extends Model
{
	protected $table = 'mustahik_rekomendasi';

	protected $casts = [
		'mustahik_id' => 'int',
		'akurasi_alamat' => 'int',
		'kelayakan_mustahik' => 'int'
	];

	protected $fillable = [
		'mustahik_id',
		'akurasi_alamat',
		'kelayakan_mustahik',
		'analisis_rekomendasi',
		'kode_koordinat',
		'signed_disurvey',
		'signed_koordinator',
		'signed_surveyor'
	];

	public function mustahik()
	{
		return $this->belongsTo(Mustahik::class);
	}
}
