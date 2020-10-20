<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['hash', 'title', 'slug', 'details', 'category_id',  'status', 'featured', 'view_count', 'sourceId', 'content', 'image', 'source_date','source_url'];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
