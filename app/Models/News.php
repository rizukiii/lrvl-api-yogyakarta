<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primarykey = 'id';
    protected $fillable = [
        'image',
        'title',
        'description',
        'author',
    ];

    public function casts()
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }

    public function getStatusDateAttribute()
    {
        if ($this->created_at == $this->updated_at) {
            return 'Dibuat pada ' . $this->created_at->format('d M Y H:i:s');
        } else {
            return 'Diperbarui pada ' . $this->updated_at->format('d M Y H:i:s');
        }
    }
}
