<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MustahikPengeluaran
 * 
 * @property int $id
 * @property int $mustahik_id
 * @property float|null $konsumsi_pangan
 * @property int $jenis_konsumsi_pangan
 * @property float|null $konsumsi_rokok
 * @property int $jenis_konsumsi_rokok
 * @property float|null $pakaian_kebersihan
 * @property int $jenis_pakaian_kebersihan
 * @property float|null $komunikasi
 * @property int $jenis_komunikasi
 * @property float|null $transportasi
 * @property int $jenis_transportasi
 * @property float|null $biaya_sewa
 * @property int $jenis_biaya_sewa
 * @property float|null $biaya_sekolah
 * @property int $jenis_biaya_sekolah
 * @property float|null $biaya_kesehatan
 * @property int $jenis_biaya_kesehatan
 * @property float|null $angsuran_kredit
 * @property int $jenis_angsuran_kredit
 * @property string|null $keterangan_angsuran_kredit
 * @property int|null $kategori_pengeluaran
 * @property int $tabungan_bank
 * @property int $memiliki_bpjs
 * @property string|null $keterangan_bpjs
 * @property int $asuransi_pendidikan
 * @property string|null $keterangan_asuransi_pendidikan
 * @property int $deposito
 * @property string|null $keterangan_deposito
 * @property int $jenis_biaya_listrik_air_gas
 * @property float|null $biaya_listrik_air_gas
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Mustahik $mustahik
 *
 * @package App\Models
 */
class MustahikPengeluaran extends Model
{
	protected $table = 'mustahik_pengeluaran';

	protected $casts = [
		'mustahik_id' => 'int',
		'konsumsi_pangan' => 'float',
		'jenis_konsumsi_pangan' => 'int',
		'konsumsi_rokok' => 'float',
		'jenis_konsumsi_rokok' => 'int',
		'pakaian_kebersihan' => 'float',
		'jenis_pakaian_kebersihan' => 'int',
		'komunikasi' => 'float',
		'jenis_komunikasi' => 'int',
		'transportasi' => 'float',
		'jenis_transportasi' => 'int',
		'biaya_sewa' => 'float',
		'jenis_biaya_sewa' => 'int',
		'biaya_sekolah' => 'float',
		'jenis_biaya_sekolah' => 'int',
		'biaya_kesehatan' => 'float',
		'jenis_biaya_kesehatan' => 'int',
		'angsuran_kredit' => 'float',
		'jenis_angsuran_kredit' => 'int',
		'kategori_pengeluaran' => 'int',
		'tabungan_bank' => 'int',
		'memiliki_bpjs' => 'int',
		'asuransi_pendidikan' => 'int',
		'deposito' => 'int',
		'jenis_biaya_listrik_air_gas' => 'int',
		'biaya_listrik_air_gas' => 'float'
	];

	protected $fillable = [
		'mustahik_id',
		'konsumsi_pangan',
		'jenis_konsumsi_pangan',
		'konsumsi_rokok',
		'jenis_konsumsi_rokok',
		'pakaian_kebersihan',
		'jenis_pakaian_kebersihan',
		'komunikasi',
		'jenis_komunikasi',
		'transportasi',
		'jenis_transportasi',
		'biaya_sewa',
		'jenis_biaya_sewa',
		'biaya_sekolah',
		'jenis_biaya_sekolah',
		'biaya_kesehatan',
		'jenis_biaya_kesehatan',
		'angsuran_kredit',
		'jenis_angsuran_kredit',
		'keterangan_angsuran_kredit',
		'kategori_pengeluaran',
		'tabungan_bank',
		'memiliki_bpjs',
		'keterangan_bpjs',
		'asuransi_pendidikan',
		'keterangan_asuransi_pendidikan',
		'deposito',
		'keterangan_deposito',
		'jenis_biaya_listrik_air_gas',
		'biaya_listrik_air_gas'
	];

	public function mustahik()
	{
		return $this->belongsTo(Mustahik::class);
	}
}
