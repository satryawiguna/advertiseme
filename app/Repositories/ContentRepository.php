<?php

namespace App\Repositories;

use App\Core\Entity\BaseEntity;
use App\Http\Requests\Admin\Editor\StoreOrUpdateContentRequest;
use App\Models\Content;
use App\Notifications\NewContentNotification;
use App\Repositories\Contracts\IContentRepository;

class ContentRepository extends BaseRepository implements IContentRepository
{
    protected Content $_content;

    public function __construct(Content $content)
    {
        parent::__construct($content);
        $this->_content = $content;
    }

    public function findSingleFirstContent(): BaseEntity|null
    {
        return $this->_content::all()->first();
    }

    public function findById(string|int $id): BaseEntity|null
    {
        return $this->_content::find($id);
    }

    public function createOrUpdateContent(StoreOrUpdateContentRequest $request): BaseEntity | null
    {
        $id = $request->id;

        if ($id !== 0) {
            $content = $this->_content->find($id);

            $content = $content->first();

            if (!$content) {
                return null;
            }

            $this->setAuditableInformationFromRequest($content, $request);

            $content->content = $request->input('content');

            $content->save();
        } else {
            $content = new $this->_content([
                "content" => $request->input('content')
            ]);

            $this->setAuditableInformationFromRequest($content, $request);

            $content->save();
        }

        return $content->fresh();
    }
}
