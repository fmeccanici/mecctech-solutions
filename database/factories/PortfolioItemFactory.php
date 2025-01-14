<?php

namespace Database\Factories;

use App\Models\BulletPoint;
use App\Models\Image;
use App\Models\PortfolioItem;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioItemFactory extends Factory
{
    protected $model = PortfolioItem::class;

    public function definition(): array
    {
        return [
            "title_nl" => $this->faker->sentence,
            "title_en" => $this->faker->sentence,
            "main_image_url" => $this->faker->imageUrl(),
            "description_nl" => $this->faker->paragraph,
            "description_en" => $this->faker->paragraph,
            "website_url" => $this->faker->url,
            "position" => $this->faker->numberBetween(1, 100),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (PortfolioItem $portfolioItem) {
            BulletPoint::factory()->count(3)->create(['portfolio_item_id' => $portfolioItem->id]);

            Image::factory()->count(3)->create(['portfolio_item_id' => $portfolioItem->id]);

            $tags = Tag::factory()->count(3)->create();
            $portfolioItem->tags()->sync($tags->pluck('id')->toArray());
        });
    }
}
