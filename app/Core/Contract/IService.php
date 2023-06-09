<?php

namespace App\Core\Contract;

use App\Core\Entity\BaseEntity;
use App\Core\Response\BasicResponse;
use App\Core\Response\GenericListResponse;
use App\Core\Response\GenericListSearchPageResponse;
use App\Core\Response\GenericListSearchResponse;
use App\Core\Response\GenericObjectResponse;
use Illuminate\Support\Collection;

interface IService
{
    public function setMessageResponse(BasicResponse $response,
                                       string $type,
                                       int $codeStatus,
                                       string|array $message = null);

    public function setGenericObjectResponse(GenericObjectResponse $response,
                                             BaseEntity|array|null $dto,
                                             string $type,
                                             int $codeStatus): GenericObjectResponse;

    public function setGenericListResponse(GenericListResponse $response,
                                           Collection $dtoList,
                                           string $type,
                                           int $codeStatus): GenericListResponse;

    public function setGenericListSearchResponse(GenericListSearchResponse $response,
                                                 Collection $dtoListSearch,
                                                 int $totalCount,
                                                 string $type,
                                                 int $codeStatus): GenericListSearchResponse;

    public function setGenericListSearchPageResponse(GenericListSearchPageResponse $response,
                                                     Collection $dtoListSearchPage,
                                                     int $totalCount,
                                                     array $meta,
                                                     string $type,
                                                     int $codeStatus): GenericListSearchPageResponse;
}
