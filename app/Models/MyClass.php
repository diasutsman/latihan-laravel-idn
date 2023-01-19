<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
  use HasFactory;

  protected $table = 'classes';
  protected $guarded = [];

  public function students()
  {
    return $this->hasMany(Student::class);
  }
}
