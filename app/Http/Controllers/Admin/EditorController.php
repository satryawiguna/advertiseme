<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebBaseController;
use App\Http\Requests\Admin\Editor\StoreOrUpdateContentRequest;
use App\Models\Content;
use App\Services\Contracts\IContentService;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class EditorController extends WebBaseController
{
    public IContentService $_contentService;

    public function __construct(IContentService $contentService)
    {
        $this->_contentService = $contentService;
    }

    public function show(Request $request): Response
    {
        $content = $this->_contentService->getContent();

        if ($content->dto) {
            return Inertia::render('Editor/ShowEditor', [
                "id" => $content->dto->id,
                "content" => $content->dto->content
            ]);
        }

        return Inertia::render('Editor/ShowEditor');
    }

    public function storeOrUpdate(StoreOrUpdateContentRequest $request): Response
    {
        $storeEditorResponse = $this->_contentService->storeOrUpdateContent($request);

        if ($storeEditorResponse->isError()) {
            return Inertia::render('Editor/ShowEditor', [
                "id" => $content->id ?? 0,
                "content" => $request->input('content'),
                "type" => "ERROR",
                "message" => $this->getErrorResponse($storeEditorResponse)
            ]);
        }

        return Inertia::render('Editor/ShowEditor', [
            "id" => $storeEditorResponse->dto->id,
            "content" => $request->input('content'),
            "type" => "SUCCESS",
            "data" => $storeEditorResponse->dto
        ]);
    }
}
