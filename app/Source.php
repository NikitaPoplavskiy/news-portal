<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = [
        'type', 'name', 'url', 'status', 'category_id'
    ];
}
