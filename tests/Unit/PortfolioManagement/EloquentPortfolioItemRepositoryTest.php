<?php

namespace Tests\Unit\PortfolioManagement;

use App\PortfolioManagement\Domain\PortfolioItems\PortfolioItem;
use App\PortfolioManagement\Domain\PortfolioItems\PortfolioItemFactory;
use App\PortfolioManagement\Infrastructure\Persistence\Eloquent\Repositories\EloquentPortfolioItemRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EloquentPortfolioItemRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private EloquentPortfolioItemRepository $portfolioItemRepository;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->portfolioItemRepository = new EloquentPortfolioItemRepository();
    }

    /** @test */
    public function it_should_find_a_portfolio_item()
    {
        /** @var PortfolioItem $portfolioItem */
        $portfolioItem = PortfolioItemFactory::create(1)->first();
        $this->portfolioItemRepository->add($portfolioItem);
        $title = $portfolioItem->title();
        $mainImage = $portfolioItem->mainImage();
        $description = $portfolioItem->description();
        $websiteUrl = $portfolioItem->websiteUrl();
        $foundPortfolioItem = $this->portfolioItemRepository->find($title, $mainImage, $description, $websiteUrl);

        self::assertEquals($portfolioItem, $foundPortfolioItem);
    }

    /** @test */
    public function it_should_add_portfolio_item()
    {
        $portfolioItem = PortfolioItemFactory::create(1)->first();
        $this->portfolioItemRepository->add($portfolioItem);

        self::assertEquals($portfolioItem, $this->portfolioItemRepository->all()->first());
    }

    /** @test */
    public function it_should_add_multiple_portfolio_items()
    {
        $portfolioItems = PortfolioItemFactory::create(10);
        $this->portfolioItemRepository->addMultiple($portfolioItems);

        self::assertEquals($portfolioItems, $this->portfolioItemRepository->all());
    }
}
