<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Book extends Model
{
    protected $fillable = ['user_id','title', 'slug', 'description','publisher_id','author','cover'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function publisher()
    {
      return $this->belongsTo('App\Publisher');
    }

    public function authors()
    {
      return $this->belongsToMany(Author::class);
    }

    public function getCoverAttribute($cover)
    {
      if(!$cover || starts_with($cover, 'http') ){
          return $cover;
      }

      return Storage::disk('public')->url($cover);
    }


}
