<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'body'];	
    protected $table = 'posts';
    public $timestamps = true;
}
