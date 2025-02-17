<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culinary extends Model
{
    use HasFactory;
    protected $table = 'culinaries';
    protected $primarykey = 'id';
    protected $fillable = [
        'image',
        'title',
        'description',
        'address',
        'open_at',
        'closed_at',
        'telp',
        'instagram',
        'website',
        'price',
        'latitude',
        'longitude',
    ];
    public function casts(){
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
}
