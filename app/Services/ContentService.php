<?php

namespace App\Services;

use App\Core\Response\GenericObjectResponse;
use App\Helper\HttpResponseType;
use App\Http\Requests\Admin\Editor\StoreOrUpdateContentRequest;
use App\Repositories\Contracts\IContentRepository;
use App\Services\Contracts\IContentService;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContentService extends BaseService implements IContentService
{
    protected IContentRepository $_contentRepository;

    public function __construct(IContentRepository $contentRepository)
    {
        $this->_contentRepository = $contentRepository;
    }

    public function getContent(): GenericObjectResponse
    {
        $response = new GenericObjectResponse();

        try {
            $content = $this->_contentRepository->findSingleFirstContent();

            $response->dto = $content;
        } catch (Exception $ex) {
            $response = $this->setMessageResponse($response,
                'ERROR',
                HttpResponseType::INTERNAL_SERVER_ERROR->value,
                $ex->getMessage());

            Log::error("Invalid get content", $response->getMessageResponseError());
        }

        return $response;
    }

    public function storeOrUpdateContent(StoreOrUpdateContentRequest $request): GenericObjectResponse
    {
        $response = new GenericObjectResponse();

        try {
            DB::beginTransaction();

            $createOrUpdateContent = $this->_contentRepository->createOrUpdateContent($request);

            DB::commit();

            $response = $this->setGenericObjectResponse($response,
                $createOrUpdateContent,
                'SUCCESS',
                HttpResponseType::SUCCESS->value);

            Log::info("Content created");
        } catch (QueryException $ex) {
            DB::rollBack();

            $response = $this->setMessageResponse($response,
                'ERROR',
                HttpResponseType::BAD_REQUEST->value,
                $ex->getMessage());

            Log::error("Invalid query", $response->getMessageResponseError());
        } catch (Exception $ex) {
            DB::rollBack();

            $response = $this->setMessageResponse($response,
                'ERROR',
                HttpResponseType::INTERNAL_SERVER_ERROR->value,
                $ex->getMessage());

            Log::error("Invalid create job", $response->getMessageResponseError());
        }

        return $response;
    }
}
