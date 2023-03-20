<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $sentence = $this->faker->sentence(mt_rand(3, 8));
    $sentence_slug = join('-', explode(' ', strtolower($sentence)));
    return [
      'title' => $sentence,
      'slug' => $sentence_slug,
      // 'body' => '<p>' . join('</p><p>', $this->faker->paragraphs(mt_rand(3, 10))) . '</p>',
      'body' => collect($this->faker->paragraphs(mt_rand(3, 10)))
        ->map(fn ($p) => "<p>$p</p>")->join(''),
      'user_id' => mt_rand(1, 5),
      'category_id' => mt_rand(1, 3),
    ];
  }
}
