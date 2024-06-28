<?php

namespace App\Models;

use App\Models\Bien;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public function biens(){
        return $this->hasMany(Bien::class);
    }
    protected $guarded = [];

    public function biens(){
        return $this->hasMany(Bien::class);
    }
}
