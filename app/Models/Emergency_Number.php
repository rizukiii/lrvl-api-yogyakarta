<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency_Number extends Model
{
    use HasFactory;
    protected $table = 'emergency_numbers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'number'
    ];

    public function casts(){
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
