<?php

namespace App\Http\Controllers;

use App\Services\Contracts\IContentService;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class WelcomeController extends WebBaseController
{
    public IContentService $_contentService;

    public function __construct(IContentService $contentService)
    {
        $this->_contentService = $contentService;
    }

    public function index()
    {
        $content = $this->_contentService->getContent();

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'content' => $content->dto
        ]);
    }

    public function show(string $id)
    {
        return Inertia::render('Content/Show');
    }
}
