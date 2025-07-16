<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Transaction_status extends Model
{
    use HasFactory;
    protected $table = 'transaction_status';
    
    public function transaction_hdr(): HasMany
    {
        return $this->hasMany(Transaction_hdr::class);
    }
}
