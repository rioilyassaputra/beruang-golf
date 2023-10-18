<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function berita()
    {
        return $this->belongsTo(berita::class, 'id_berita');
    }

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');
    }
}
