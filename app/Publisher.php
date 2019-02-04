<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [
        'name', 'address', 'web', 'email','slug'
    ];

    public function books()
    {
      return $this->hasMany(Book::class);
    }
}
