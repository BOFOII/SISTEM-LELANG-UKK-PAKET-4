<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'tb_notification';
    public $timestamps = false;
    protected $fillable = [
        'message',
        'status'
    ];

    public function notificationable() {
        return $this->morphTo();
    }
}
