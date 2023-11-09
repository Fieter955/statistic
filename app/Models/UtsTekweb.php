<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtsTekweb extends Model
{
    use HasFactory;

    protected $fillable = ['Penulis', 'Pengarang', 'Judul_Buku', 'Tanggal_Terbit', 'Gambar']; 
}

