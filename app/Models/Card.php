<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function User(){
      return $this->belongsToMany(User::class);
    }

    public function CardType(){
        return $this->belongsTo(CardType::class);
    }

    public function CardCategory(){
        return $this->belongsTo(CardCategory::class);
    }

    public function Scrumboard(){
        return $this->hasMany(Scrumboard::class);
    }
}
