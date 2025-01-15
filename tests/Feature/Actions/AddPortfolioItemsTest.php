<?php

namespace Tests\Feature\Actions;

use App\Actions\AddPortfolioItems;
use App\Models\BulletPoint;
use App\Models\Image;
use App\Models\PortfolioItem;
use App\Models\Tag;
use Database\Factories\PortfolioItemFactory;
use Tests\TestCase;

class AddPortfolioItemsTest extends TestCase
{

    /** @test */
    public function it_should_add_portfolio_items_with_relations()
    {
        // Given
        $bulletPoints = BulletPoint::factory()->count(3)->make();
        $images = Image::factory()->count(3)->make();
        $tags = Tag::factory()->count(3)->make();
        $portfolioItems = PortfolioItemFactory::new()
            ->count(20)
            ->make()
            ->map(function ($portfolioItem) use ($bulletPoints, $images, $tags) {
                $portfolioItem['bullet_points'] = $bulletPoints->toArray();
                $portfolioItem['images'] = $images->toArray();
                $portfolioItem['tags'] = $tags->toArray();
                return $portfolioItem;
            })
            ->toArray();

        // When
        AddPortfolioItems::run($portfolioItems);

        // Then
        $expectedPortfolioItems = collect($portfolioItems)->map(function ($item) {
            unset($item['bullet_points'], $item['images'], $item['tags']); // Relationships not in the database
            return $item;
        })->toArray();

        $actualPortfolioItems = PortfolioItem::query()
            ->select(['title_nl', 'title_en', 'main_image_url', 'description_nl', 'description_en', 'website_url', 'position'])
            ->get()
            ->toArray();

        $expectedTags = collect($portfolioItems)->map(function ($item) {
            return collect($item['tags'])->pluck('name')->toArray();
        })->flatten()->unique()->toArray();

        $actualTags = Tag::query()->pluck('name')->toArray();

        // Then
        self::assertEquals($expectedPortfolioItems, $actualPortfolioItems);
        self::assertEquals($expectedTags, $actualTags);
    }
}
