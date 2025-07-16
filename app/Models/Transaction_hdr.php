<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Transaction_hdr extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'user_nip',
        'transaction_status_id',
        'no_surat',
        'tgl_surat',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_dikembalikan',
    ];

    protected $table = 'transaction_hdr';
    
    public function toSearchableArray(): array
    {
        return [
            'no_surat' => $this->no_surat
        ];
    }

    public function transaction_status(): BelongsTo
    {
        return $this->belongsTo(Transaction_status::class, 'transaction_status_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_nip', 'nip');
    }

    public function transaction_dtl(): HasMany
    {
        return $this->hasMany(Transaction_dtl::class);
    }
}
