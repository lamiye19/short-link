<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'uuid',
        'short',
        'long',
        'logo',
        'color',
        'user_id'
    ];

    public function clicked(){
        return $this->hasMany(LinkClick::class, 'link_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
