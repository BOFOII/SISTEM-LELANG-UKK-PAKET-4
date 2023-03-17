<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Masyarakat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUUID;
    protected $table = 'tb_masyarakat';
    protected $primaryKey = 'id_user';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
        'telp',
    ];

    public function avatar() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function histories() {
        return $this->hasMany(History::class, 'id_user', 'id_user');
    }

    public function notifications() {
        return $this->morphMany(Notification::class, 'notificationable');
    }
    
}
