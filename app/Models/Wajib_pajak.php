<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;


class Wajib_pajak extends Model
{
    use HasFactory, Searchable;

    protected $table = 'wajib_pajak';
    protected $primaryKey = 'wajib_pajak_id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'wajib_pajak_id',
        'name',
        'jenis',
    ];
    
    public function toSearchableArray(): array
    {
        return [
            'wajib_pajak_id' => $this->wajib_pajak_id,
            'name' => $this->name,
        ];
    }

    public function berkas(): HasMany
    {
        return $this->hasMany(Berkas::class, 'wajib_pajak_id');
    }
}
