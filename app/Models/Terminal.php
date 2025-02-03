<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;
    protected $table = 'terminals';
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
        'image',
        'address',
        'open_at',
        'closed_at',
        'facilities',
        'telp',
        'status',
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
