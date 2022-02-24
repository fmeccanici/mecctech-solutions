<?php

namespace Tests\Unit\PortfolioManagement;

use App\PortfolioManagement\Domain\PortfolioItems\PortfolioItem;
use App\PortfolioManagement\Domain\PortfolioItems\PortfolioItemFactory;
use Tests\TestCase;

class PortfolioItemFactoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /** @test */
    public function it_should_create_portfolio_items_with_specified_quantity()
    {
        $amount = 100;
        $portfolioItems = PortfolioItemFactory::create($amount);
        self::assertEquals($amount, sizeof($portfolioItems));

        foreach ($portfolioItems as $portfolioItem)
        {
            self::assertInstanceOf(PortfolioItem::class, $portfolioItem);
        }
    }

    /** @test */
    public function it_should_create_portfolio_items_with_specified_tag()
    {
        $tags = array("Test Tag");
        $portfolioItems = PortfolioItemFactory::create(10, [
            "tags" => $tags
        ]);

        foreach ($portfolioItems as $portfolioItem)
        {
            self::assertEquals($tags, $portfolioItem->tags()->toArray());
        }
    }

    /** @test */
    public function it_should_create_portfolio_item_from_array()
    {
        // Given
        $title = "Test Title";
        $description = "Test Description";
        $websiteUrl = "Test Website Url";
        $image1Url = "Test Image Url 1";
        $image2Url = "Test Image Url 2";
        $tag1 = "Tag Name 1";
        $tag2 = "Tag Name 2";
        $mainImageUrl = "Main Image Url";

        $portfolioItemAsArray = [
            "title" => $title,
            "description" => $description,
            "website_url" => $websiteUrl,
            "main_image_url" => $mainImageUrl,
            "images" => [
                0 => [
                    "url" => $image1Url
                ],
                1 => [
                    "url" => $image2Url
                ]
            ],
            "tags" => [
                $tag1, $tag2
            ]
        ];

        // When
        $portfolioItem = PortfolioItemFactory::fromArray($portfolioItemAsArray);

        // Then
        self::assertEquals($title, $portfolioItem->title());
        self::assertEquals($description, $portfolioItem->description());
        self::assertEquals($websiteUrl, $portfolioItem->websiteUrl());
        self::assertEquals($image1Url, $portfolioItem->images()->first()->url());
        self::assertEquals($image2Url, $portfolioItem->images()[1]->url());
        self::assertEquals($tag1, $portfolioItem->tags()->first());
        self::assertEquals($tag2, $portfolioItem->tags()[1]);
    }
}
