<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'phone',
        'location',
        'description',
        'skills',
        'curriculum',
        'visible',
        'user_id',
    ];

    protected $attributes = [
        'phone' => '', // Aggiungi il valore di default vuoto
        'skills' => '',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
