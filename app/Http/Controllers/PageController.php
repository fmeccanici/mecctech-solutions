<?php

namespace App\Http\Controllers;

use App\Actions\GetAllPortfolioItems;
use App\Actions\GetAllVisibleTags;
use Inertia\Inertia;

class PageController extends Controller
{
    public function home()
    {
        $tag = request()->query('tag');

        if ($tag == 'All')
        {
            $tag = null;
        }

        return Inertia::render('Home')->with([
            'portfolioItems' => GetAllPortfolioItems::run($tag),
            'tags' => GetAllVisibleTags::run(),
        ]);
    }
}
