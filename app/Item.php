<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Item extends Model
{
  protected $fillable  = ['titulo', 'descricao', 'publico', 'user_id', 'foto', 'pdf'];

}
