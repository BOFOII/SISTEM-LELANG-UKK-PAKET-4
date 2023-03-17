<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory, HasUUID;
    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'nama_barang',
        'tgl',
        'harga_awal',
        'deskripsi_barang',
    ];

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }
}
