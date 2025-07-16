<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class Berkas extends Model
{
    use HasFactory, Searchable;
    protected $table = 'berkas';
    protected $primaryKey = 'berkas_id';
    protected $fillable = [
        'wajib_pajak_id',
        'kode_riksa_id',
        'berkas_status_id',
        'kemasan_id',
        'no_lhp',
        'tgl_lhp',
        'masa_pajak_awal',
        'masa_pajak_akhir',
    ];

    public function toSearchableArray(): array
    {
        return [
            'wajib_pajak_id' => $this->wajib_pajak_id,
            'no_lhp' => $this->no_lhp,
        ];
    }
    public function wajib_pajak(): BelongsTo
    {
        return $this->belongsTo(Wajib_pajak::class, 'wajib_pajak_id');
    }

    public function kemasan(): BelongsTo
    {
        return $this->belongsTo(Kemasan::class, 'kemasan_id');
    }

    public function berkas_status(): BelongsTo
    {
        return $this->belongsTo(Berkas_status::class, 'berkas_status_id');
    }

    public function kode_riksa(): BelongsTo
    {
        return $this->belongsTo(Kode_riksa::class, 'kode_riksa_id');
    }

    public function transaction_dtl(): HasOne
    {
        return $this->hasOne(Transaction_dtl::class, 'berkas_id');
    }
}
