<?php

namespace App\Repositories\V1\Comment;

use App\Repositories\BaseRepository;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function getModel()
    {
        return Comment::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->orderBy('updated_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $comments = Comment::where('content', 'LIKE', '%' . $key . '%')->paginate(5);
        $comments->appends(['key' => $key]);

        return $comments;
    }

    public function changestatus($data)
    {
        $id = $data['id'];
        $comments = $this->model->find($id);
        $comments->status = !$comments->status;
        $comments->save();

        return response()->json($comments);
    }

    public function delete($id)
    {
        $comments = $this->model->find($id);
        $comments->delete();
    }

    public function commment($id)
    {
        $comments = Comment::where('product_id', $id)
        ->where('status', 1)
        ->orderBy('parent_id', 'asc')
        ->orderBy('created_at', 'desc')
        ->get();

        return $comments;
    }
}
