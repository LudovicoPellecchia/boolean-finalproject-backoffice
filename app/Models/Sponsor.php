<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
        "premium"
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
