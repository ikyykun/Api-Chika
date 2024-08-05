<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idol extends Model
{
    use HasFactory;

    protected $table = 'idol';

    protected $fillable = ['nama','description','instagram','facebook','youtube','spotify','x'];

    public function member() {
        return $this->hasMany(Member::class, 'id_idol','id');
    }
}
