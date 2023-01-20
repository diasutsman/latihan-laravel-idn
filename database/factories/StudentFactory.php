<?php

namespace Database\Factories;

use App\Models\MyClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {

    return [
      'name' => fake()->name(),
      'address' => fake()->address(),
      'class_id' => MyClass::all()->random()->id,
    ];
  }
}
