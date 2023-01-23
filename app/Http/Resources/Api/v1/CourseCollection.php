<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($item){
                return [
                    'title' => $item->title,
                    'body' => $item->body,
                    'image' => $item->image,
                    //'episodes' => new EpisodeCollection($item->episodes)
                ];
            })
        ];
    }

    public function with($request): array
    {
        return [
            'status' => 'success',
        ];
    }
}
