<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkClick extends Model
{
    use HasFactory;

    protected $fillable = [
        "ip",
        "ipv6",
        "country",
        "link_id",
    ];

    public function link(){
        return $this->hasOne(Link::class, 'id', 'link_id');
    }
}
