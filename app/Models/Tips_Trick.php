<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tips_Trick extends Model
{
    use HasFactory;
    protected $table = 'tips_tricks';
    protected $primarykey = 'id';
    protected $fillable = [
        'image',
        'title',
        'description',
        'author',
    ];

    public function casts(){
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
