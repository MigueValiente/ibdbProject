<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['user_id','title', 'slug', 'description','publisher_id'];

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


}
