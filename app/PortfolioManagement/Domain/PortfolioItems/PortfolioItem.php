<?php

namespace App\PortfolioManagement\Domain\PortfolioItems;

use App\SharedKernel\CleanArchitecture\ValueObject;
use Illuminate\Support\Collection;

class PortfolioItem extends ValueObject
{
    private string $title;
    private string $description;
    private string $websiteUrl;
    private Image $mainImage;
    /**
     * @var Collection<Image>
     */
    private Collection $images;

    /**
     * @var Collection<string>
     */
    private Collection $tags;

    public function __construct(string $title, Image $mainImage, string $description, string $websiteUrl, Collection $images, Collection $tags)
    {
        $this->title = $title;
        $this->mainImage = $mainImage;
        $this->description = $description;
        $this->websiteUrl = $websiteUrl;
        $this->images = $images;
        $this->tags = $tags;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function mainImage(): Image
    {
        return $this->mainImage;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function websiteUrl(): string
    {
        return $this->websiteUrl;
    }

    public function images(): Collection
    {
        return $this->images;
    }

    public function tags(): Collection
    {
        return $this->tags;
    }

    public function hasTag(string $tag): bool
    {
        foreach ($this->tags as $presentTag)
        {
            if ($tag === $presentTag)
            {
                return true;
            }
        }

        return false;
    }
}
