<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory, HasUUID;
    protected $table = 'histroy_lelang';
    protected $primaryKey = 'id_history';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id_lelang',
        'id_barang',
        'id_user',
        'penawaran_harga',
    ];

    public function user() {
        return $this->belongsTo(Masyarakat::class, 'id_user', 'id_user');
    }
    
}
