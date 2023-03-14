<?php

namespace App\Http\Controllers;

use App\Services\Contracts\IContentService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContentController extends WebBaseController
{
    public IContentService $_contentService;

    public function __construct(IContentService $contentService)
    {
        $this->_contentService = $contentService;
    }

    public function show(string $id): Response
    {
        $content = $this->_contentService->getContentById($id);

        return Inertia::render('Content/ShowContent', [
            "content" => $content->dto
        ]);
    }
}
