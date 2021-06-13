<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'author_name',
      'post_text',
    ];
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}