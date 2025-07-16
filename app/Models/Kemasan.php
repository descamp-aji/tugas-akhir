<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;


class Kemasan extends Model
{
    use HasFactory, Searchable;

    protected $table = 'kemasan';
    protected $primaryKey = 'kemasan_id';

    protected $fillable = [
        'rak',
        'baris',
        'kolom',
        'label',
    ];

    public function toSearchableArray(): array
    {
        return [
            'label' => $this->label,
        ];
    }

    public function berkas(): HasMany
    {
        return $this->hasMany(Berkas::class, 'kemasan_id');
    }
}
