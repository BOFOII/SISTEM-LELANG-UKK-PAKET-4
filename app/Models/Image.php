<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'tb_image';
    public $timestamps = false;
    protected $fillable = [
        'url'
    ];

    public function imageable() {
        return $this->morphTo();
    }
}
