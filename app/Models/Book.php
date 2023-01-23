<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
  use HasFactory;
  protected $guarded = [];
  public $with = ['category'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
