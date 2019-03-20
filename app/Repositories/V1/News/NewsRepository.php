<?php

namespace App\Repositories\V1\News;

use App\Repositories\BaseRepository;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use File;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    public function getModel()
    {
        return News::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->with('user')->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $news = News::where('title', 'LIKE', '%' . $key . '%')->paginate(10);
        $news->appends(['key' => $key]);

        return $news;
    }
}
