<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneFacture extends Model
{
    use HasFactory;

    protected $fillable = [
        'facture_id',
        'description',
        'quantite',
        'prix_unitaire'
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }
}
