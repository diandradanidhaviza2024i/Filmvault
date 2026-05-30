<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    // Menjaga ID dan membiarkan kolom lainnya dapat diisi secara massal (mass assignment)
    protected $guarded = ['id']; 

    /**
     * Relasi: Film dimiliki oleh 1 Genre
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * Relasi: Film difavoritkan oleh Banyak User
     */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}