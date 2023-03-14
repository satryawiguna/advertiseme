<?php

namespace App\Repositories\Contracts;

use App\Core\Entity\BaseEntity;
use App\Http\Requests\Admin\Editor\StoreOrUpdateContentRequest;

interface IContentRepository
{
    public function findSingleFirstContent(): BaseEntity | null;

    public function findById(string $id):  BaseEntity | null;

    public function createOrUpdateContent(StoreOrUpdateContentRequest $request): BaseEntity | null;
}
