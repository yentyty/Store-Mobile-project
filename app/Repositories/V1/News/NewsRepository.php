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

    public function store($data)
    {
        $data['slug'] = str_slug($data['title']);
        if (isset($data['cover_image'])) {
            $file = $data['cover_image'];
            $data['slug'] = str_slug($data['cover_image']);

            $forder = 'uploads/images/news';
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['cover_image'] = $fileName;
        }
        if (isset($data['content_image'])) {
            $file = $data['content_image'];
            $data['slug'] = str_slug($data['content_image']);

            $forder = 'uploads/images/news';
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['content_image'] = $fileName;
        }

            return $this->model->create($data)->id;
    }
}
