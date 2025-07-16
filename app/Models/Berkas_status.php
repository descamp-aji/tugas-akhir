<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Berkas_status extends Model
{
    use HasFactory;
    protected $table = 'berkas_status';
    protected $primaryKey = 'berkas_status_id';

    public function berkas(): HasMany
    {
        return $this->hasMany(Berkas::class, 'berkas_status_id');
    }
}
