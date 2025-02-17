<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;
    protected $table = 'accommodations';
    protected $primarykey = 'id';
    protected $fillable = [
        'image',
        'title',
        'description',
        'star',
        'address',
        'telp',
        'instagram',
        'website',
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
