<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable=[
      'title', 'story', 'name', 'user_image', 'imageName'
    ];
}
