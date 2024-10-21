<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MustahikScoring
 * 
 * @property int $id
 * @property int $mustahik_id
 * @property int $total_nilai
 * @property float $nilai_akhir
 * @property bool $rekomendasi_scoring
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Mustahik $mustahik
 *
 * @package App\Models
 */
class MustahikScoring extends Model
{
	protected $table = 'mustahik_scoring';

	protected $casts = [
		'mustahik_id' => 'int',
		'total_nilai' => 'int',
		'nilai_akhir' => 'float',
		'rekomendasi_scoring' => 'bool'
	];

	protected $fillable = [
		'mustahik_id',
		'total_nilai',
		'nilai_akhir',
		'rekomendasi_scoring'
	];

	public function mustahik()
	{
		return $this->belongsTo(Mustahik::class);
	}
}
