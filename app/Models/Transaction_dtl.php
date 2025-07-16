<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class Transaction_dtl extends Model
{
    use HasFactory;
    protected $table = 'transaction_dtl';
    protected $fillable = [
        'transaction_hdr_id',
        'berkas_id',
    ];

    public function transaction_hdr(): BelongsTo
    {
        return $this->belongsTo(Transaction_hdr::class);
    }

    public function berkas(): BelongsTo
    {
        return $this->belongsTo(Berkas::class, 'berkas_id');
    }
}
