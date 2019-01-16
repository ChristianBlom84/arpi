<?php

namespace App\Http\Resources;

use App\Article;
use App\Http\Resources\PeopleResource;
use App\Http\Resources\ArticleResource;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class PeoplesResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => PeopleResource::collection($this->collection),
        ];
    }

    public function with($request)
    {
        $included  = $this->collection->map(
            function ($article) {
                return $article;
            }
        )->unique();

        return [
            'links'    => [
                'self' => route('authors.index'),
            ],
            'included' => $this->withIncluded($included),
        ];
    }

    private function withIncluded(Collection $included)
    {
        return $included->map(
            function ($include) {
                if ($include instanceof Article) {
                    return new ArticleResource($include);
                }
            }
        );
    }
}
