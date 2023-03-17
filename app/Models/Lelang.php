<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory, HasUUID;
    protected $table = 'tb_lelang';
    protected $primaryKey = 'id_lelang';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id_barang',
        'tgl_lelang',
        'harga_akhir',
        'id_user',
        'id_petugas',
        'status',
    ];

    public function barang() {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    public function petugas() {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id_petugas');
    }

    public function winner() {
        return $this->belongsTo(Masyarakat::class, 'id_user', 'id_user');
    }

    public function histories() {
        return $this->hasMany(History::class, 'id_lelang', 'id_lelang')->orderBy('penawaran_harga', 'desc');
    }

    public function scopeIsSubmited($query, String $id_user) {
        return $this->histories()->where('id_user', $id_user);
    }
}
