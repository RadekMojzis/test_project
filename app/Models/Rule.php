<?php
use Illuminate\Support\Facades\Input;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'transformer',
        'value',
        'active'
    ];
    protected $casts = [
        'active' => 'boolean',
    ];

    public function extensions(){
        return $this->belongsToMany(Extension::class)->withTimestamps();
    }
}
