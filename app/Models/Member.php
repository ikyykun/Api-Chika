<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';

    protected $fillable = ['nama', 'umur','id_idol', 'description', 'hobi', 'makanan', 'image_url'];

    public function idol() {
        return $this->belongsTo(Idol::class, 'id_idol','id');
    }
}
