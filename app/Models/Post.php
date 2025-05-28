<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];
    public function utilisateurs(){
        return $this->belongsTo(Utilisateur::class);

    }
}
