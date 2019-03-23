<?php

namespace App\Repositories\V1\Promotion;

use App\Repositories\BaseRepository;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;

class PromotionRepository extends BaseRepository implements PromotionRepositoryInterface
{
    public function getModel()
    {
        return Promotion::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('created_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $promotions = Promotion::where('percent', 'LIKE', '%' . $key . '%')->paginate(5);
        $promotions->appends(['key' => $key]);

        return $promotions;
    }

    public function changestatus($data)
    {
        $id = $data['id'];
        $promotion = $this->model->find($id);
        $promotion->status = !$promotion->status;
        $promotion->save();

        return response()->json($promotion);
    }

    public function store($data)
    {
        $data['slug'] = str_slug($data['percent']);

        return $this->model->create($data)->id;
    }

    public function update($id, $data)
    {
        $promotion = $this->model->find($id);

        $data['slug'] = str_slug($data['percent']);

        return $promotion->update($data);
    }

    public function delete($id)
    {
        $promotion = $this->model->find($id);
        $promotion->delete();
    }
}
