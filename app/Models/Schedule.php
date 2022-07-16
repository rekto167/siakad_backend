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

    public function classroom()
    {
      return $this->hasMany(Classroom::class, 'id', 'classroom_id');
    }

    public function mapel()
    {
      return $this->hasMany(Mapel::class, 'id', 'mapel_id');
    }

    public function pengajar()
    {
      return $this->hasMany(User::class, 'id', 'pengajar');
    }

    public function day()
    {
      return $this->hasMany(Day::class, 'id', 'day_id');
    }
}
