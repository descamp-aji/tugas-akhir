<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kode_riksa extends Model
{
    use HasFactory;
    protected $table = 'kode_riksa';
    protected $primaryKey = 'kode_riksa_id';

    public function berkas(): HasMany
    {
        return $this->hasMany(Berkas::class, 'kode_riksa_id');
    }

    public function transaction_dtl(): BelongsTo
    {
        return $this->belongsTo(Transaction_dtl::class);
    }
}
