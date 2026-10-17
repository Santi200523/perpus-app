<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['kode_buku', 'judul', 'pengarang', 'penerbit', 'tahun', 'stok'])]
class Book extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'tahun' => 'integer',
            'stok'  => 'integer',
        ];
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}