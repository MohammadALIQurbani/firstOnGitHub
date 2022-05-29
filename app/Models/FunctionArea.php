<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FunctionArea extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function jopPosts(){
        return $this->hasMany(JobPost::class);
    }
}
