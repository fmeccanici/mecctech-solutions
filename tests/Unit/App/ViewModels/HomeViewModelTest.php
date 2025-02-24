<?php

namespace Tests\Unit\App\ViewModels;

use App\Models\CaseStudy;
use App\Models\Client;
use App\Models\PortfolioItem;
use App\Models\Tag;
use App\Models\Testimonial;
use App\ViewModels\HomeViewModel;
use Database\Factories\PortfolioItemFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeViewModelTest extends TestCase
{
    use RefreshDatabase;

    private HomeViewModel $viewModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->viewModel = new HomeViewModel;
    }

    public function test_it_returns_portfolio_items_with_case_studies(): void
    {
        // Given
        $portfolioItem = PortfolioItem::factory()->create();
        $caseStudy = CaseStudy::factory()->create([
            'portfolio_item_id' => $portfolioItem->id,
        ]);

        // When
        $items = $this->viewModel->portfolioItems();

        // Then
        $this->assertCount(1, $items);
        $this->assertTrue($items->first()->has_case_study);
        $this->assertEquals($caseStudy->slug, $items->first()->case_study_slug);
    }

    public function test_it_returns_portfolio_items_filtered_by_tag(): void
    {
        // Given
        $tag = Tag::factory()->create();
        $portfolioItem = PortfolioItem::factory()->create();
        $portfolioItem->tags()->attach($tag);

        PortfolioItem::factory()->create(); // Another item without the tag

        // When
        $viewModel = new HomeViewModel($tag->name);
        $items = $viewModel->portfolioItems();

        // Then
        $this->assertCount(1, $items);
    }

    public function test_it_returns_visible_tags(): void
    {
        // Given
        Tag::factory()->count(3)->create(['visible' => true]);
        Tag::factory()->create(['visible' => false]);

        // When
        $tags = $this->viewModel->tags();

        // Then
        $this->assertCount(3, $tags);
    }

    public function test_it_returns_testimonials_ordered_by_position(): void
    {
        // Given
        $firstTestimonial = Testimonial::factory()->create(['position' => 1]);
        $secondTestimonial = Testimonial::factory()->create(['position' => 2]);

        // When
        $testimonials = $this->viewModel->testimonials();

        // Then
        $this->assertCount(2, $testimonials);
        $this->assertEquals($firstTestimonial->id, $testimonials->first()->id);
    }

    public function test_it_returns_clients_ordered_by_position(): void
    {
        // Given
        $firstClient = Client::factory()->create(['position' => 1]);
        $secondClient = Client::factory()->create(['position' => 2]);

        // When
        $clients = $this->viewModel->clients();

        // Then
        $this->assertCount(2, $clients);
        $this->assertEquals($firstClient->id, $clients->first()->id);
    }

    /** @test */
    public function it_should_paginate_portfolio_items()
    {
        // Given
        PortfolioItemFactory::new()
            ->count(10)
            ->create()
            ->load('tags', 'images', 'bulletPoints', 'caseStudy');

        // When
        $viewModel = new HomeViewModel;
        $result = $viewModel->portfolioItems();

        // Then
        $this->assertEquals(6, $result->perPage());
        $this->assertEquals(10, $result->total());
        $this->assertEquals(2, $result->lastPage());
        $this->assertCount(6, $result->items());
    }

    /** @test */
    public function it_should_respect_current_page()
    {
        // Given
        PortfolioItemFactory::new()
            ->count(10)
            ->create()
            ->load('tags', 'images', 'bulletPoints', 'caseStudy');

        $this->get('/?page=2');

        // When
        $viewModel = new HomeViewModel;
        $result = $viewModel->portfolioItems();

        // Then
        $this->assertEquals(2, $result->currentPage());
        $this->assertCount(4, $result->items()); // Second page should have 4 items (10 total - 6 on first page)
    }
}
