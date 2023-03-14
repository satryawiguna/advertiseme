<?php

namespace App\Http\Controllers;

use App\Core\Response\BasicResponse;

class WebBaseController extends Controller
{
    protected function getAllResponse(BasicResponse $response): array {
        return $response->getMessageResponseAll();
    }

    protected function getAllLatestResponse(BasicResponse $response): string {
        return $response->getMessageResponseAllLatest();
    }

    protected function getSuccessResponse(BasicResponse $response): array {
        return $response->getMessageResponseSuccess();
    }

    protected function getSuccessLatestResponse(BasicResponse $response): string {
        return $response->getMessageResponseSuccessLatest();
    }

    protected function getErrorResponse(BasicResponse $response): array {
        return $response->getMessageResponseError();
    }

    protected function getErrorLatestJsonResponse(BasicResponse $response): string {
        return $response->getMessageResponseErrorLatest();
    }

    protected function getInfoResponse(BasicResponse $response): array {
        return $response->getMessageResponseInfo();
    }

    protected function getInfoLatestResponse(BasicResponse $response): string {
        return  $response->getMessageResponseInfoLatest();
    }

    protected function getWarningResponse(BasicResponse $response): array {
        return $response->getMessageResponseWarning();
    }

    protected function getWarningLatestResponse(BasicResponse $response): string {
        return $response->getMessageResponseWarningLatest();
    }
}
