<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MyClass>
 */
class MyClassFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'name' => fake()->numberBetween(10, 12) . ' ' . fake()->unique()->word(),
      'major' => fake()->randomElement(['Rekayasa Perangkat Lunak', 'Desain Multi Media', 'Teknik Komputer Jaringan']),
    ];
  }
}
