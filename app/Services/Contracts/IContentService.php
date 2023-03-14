<?php

namespace App\Services\Contracts;

use App\Core\Response\GenericObjectResponse;
use App\Http\Requests\Admin\Editor\StoreOrUpdateContentRequest;

interface IContentService
{
    public function getContent(): GenericObjectResponse;

    public function getContentById(string $id): GenericObjectResponse;

    public function storeOrUpdateContent(StoreOrUpdateContentRequest $request): GenericObjectResponse;
}
