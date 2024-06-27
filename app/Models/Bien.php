<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bien extends Model
{
    use HasFactory;
    public function user(){
        return $this->belognsTo(User::class);
    }
    public function category(){
        return $this->belognsTo(Category::class);
    }
}
