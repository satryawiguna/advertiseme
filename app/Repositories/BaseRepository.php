<?php

namespace App\Repositories;

use App\Core\Contract\IRepository;
use App\Core\Entity\BaseEntity;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class BaseRepository implements IRepository
{
    protected BaseEntity $_model;

    public function __construct(BaseEntity $model)
    {
        $this->_model = $model;
    }

    public function all(string $order = "id", string $sort = "asc"): Collection {
        return $this->_model
            ->orderBy($order, $sort)
            ->get();
    }

    public function findById(int|string $id): BaseEntity|null {
        return $this->_model->find($id);
    }

    protected function setAuditableInformationFromRequest(BaseEntity|array $entity, FormRequest $request)
    {
        if ($entity instanceof BaseEntity) {
            if (!$entity->getKey()) {
                $entity->setCreatedInfo($request->request_by);
            } else {
                $entity->setUpdatedInfo($request->request_by);
            }
        }

        if (is_array($entity)) {
            if (!array_key_exists('id', $entity) || $entity['id'] == 0) {
                $entity['created_by'] = $request->request_by;
                $entity['created_at'] = Carbon::now()->toDateTimeString();
            } else {
                $entity['updated_by'] = $request->request_by;
                $entity['updated_at'] = Carbon::now()->toDateTimeString();
            }

            return $entity;
        }
    }
}
