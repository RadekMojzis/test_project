<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active'
    ];
    protected $casts = [
        'active' => 'boolean',
    ];

    public function rules(){
        return $this->belongsToMany(Rule::class)->withTimestamps();
    }
    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
