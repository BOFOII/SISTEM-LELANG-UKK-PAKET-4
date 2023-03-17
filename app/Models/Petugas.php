<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Petugas extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUUID;
    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_petugas';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'id_level',
    ];
    protected $hidden = [
        'password',
    ];

    public function level() {
        return $this->belongsTo(Level::class, 'id_level', 'id_level');
    }

    public function avatar() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function lelangs() {
        return $this->hasMany(Lelang::class, 'id_petugas', 'id_petugas');
    }
}
