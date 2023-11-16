<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scrumboard extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function User(){
      return $this->belongsToMany(User::class)->withPivot('user_id', 'scrumboard_id');
    }

    public function Card(){
      return $this->hasMany(Card::class);
    }
    
    public function Client(){
      return $this->belongsTo(Client::class);
    }
}
