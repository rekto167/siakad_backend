<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    protected $guarded = ['id'];
    
    public function days()
    {
      return $this->hasMany(Days::class, 'id', 'day_id');
    }
}
