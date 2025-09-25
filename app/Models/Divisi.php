<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_divisi'];

    // Relasi ini akan kita gunakan nanti saat menyambungkan ke Pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
