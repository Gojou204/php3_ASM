<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'author_id' => Author::all()->random()->author_id,
            'category_id' => Category::all()->random()->category_id,
            'publication_date' => $this->faker->date(), // Ngày xuất bản
            'price' => $this->faker->randomFloat(3, 5, 100), // Giá của sách
            'description' => $this->faker->text(), // Mô tả sách
            'quantity' => $this->faker->numberBetween(1, 1000), // Số lượng sách
            'image' => $this->faker->imageUrl(), // URL hình ảnh của sách
        ];
    }
}
