<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active'
    ];

    public function files(){
        return $this->belongsToMany(File::class)->withTimestamps();
    }

    public function extensions(){
        return $this->belongsToMany(Extension::class)->withTimestamps();
    }
}
