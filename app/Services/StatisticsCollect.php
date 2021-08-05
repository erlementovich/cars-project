<?php

namespace App\Services;

use App\Contracts\Interfaces\ArticlesRepositoryContract;
use App\Contracts\Interfaces\CarsRepositoryContract;
use App\Contracts\Interfaces\TagsRepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class StatisticsCollect
{
    protected $carRepository;
    protected $articleRepository;
    protected $tagRepository;

    public function __construct(CarsRepositoryContract $carRepository, ArticlesRepositoryContract $articleRepository, TagsRepositoryContract $tagRepository)
    {
        $this->carRepository = $carRepository;
        $this->articleRepository = $articleRepository;
        $this->tagRepository = $tagRepository;
    }

    public function getHeaders()
    {
        return [
            'Количество машин',
            'Количество новостей',
            'Тег с наиб. кол-вом статей',
            'Самая длинная новость (title; id; length)',
            'Самая короткая новость (title; id; length)',
            'Ср. количество новостей тега',
            'Самая тегированная новость (title; id; count)'
        ];
    }


    public function getStatistics()
    {
        return [
            $this->carRepository->count(),
            $this->articleRepository->count(),
            $this->tagRepository->maxArticlesCountTag()->name,
            $this->getBodySorted('desc'),
            $this->getBodySorted(),
            $this->tagRepository->avgArticlesCount(),
            $this->getMostTagged(),
        ];
    }

    public function getBodySorted($direction = 'asc')
    {
        $result = $this->articleRepository->articleSortedByBody($direction);
        return $this->toString($result);
    }

    public function getMostTagged()
    {
        $result = $this->articleRepository->mostTagged();
        return $this->toString($result);
    }

    public function toString(Model $data)
    {
        $array = $data->toArray();
        $response = '';

        foreach ($array as $key => $value) {
            $response .= "$value; ";
        }
        return $response;
    }

}
