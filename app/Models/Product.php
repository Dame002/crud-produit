<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'prix',
    ];

    public function factures()
    {
        return $this->belongsToMany(Facture::class, 'factures_produits')
            ->withPivot('qte')
            ->withTimestamps();
    }
}
