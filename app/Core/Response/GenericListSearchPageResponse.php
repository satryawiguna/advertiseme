<?php

namespace App\Core\Response;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class GenericListSearchPageResponse extends BasicResponse
{
    public Paginator $dtoListSearchPage;

    public int $totalCount;

    public array $meta;

    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    public function getMeta(): array
    {
        return $this->meta;
    }

    public function getDtoListSearchPage(): Paginator
    {
        return $this->dtoListSearchPage ?? new Paginator(new Collection(), 10);
    }
}
