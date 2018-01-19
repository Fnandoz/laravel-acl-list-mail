<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regras extends Model
{
    public function usuario()
    {
      return $this->belongsToMany(User::class);
    }

}
