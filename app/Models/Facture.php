<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'client_id',
        'num_facture'

    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function products()
    {
        return $this->belongsToMany(Produit::class, 'factures_produits')
            ->withPivot('qte')
            ->withTimestamps();
    }
    public function lignes()
{
    return $this->hasMany(LigneFacture::class);
}

}
