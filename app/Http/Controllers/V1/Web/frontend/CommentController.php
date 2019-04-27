<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Comment\CommentRepositoryInterface;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;

class CommentController extends Controller
{
    protected $repoComment;
    protected $repoFactory;



    public function __construct(
        CommentRepositoryInterface $repoComment,
        FactoryRepositoryInterface $repoFactory
    ) {
        $this->repoComment = $repoComment;
        $this->repoFactory = $repoFactory;
    }

    public function store(Request $request)
    {
        $this->repoComment->store($request->all());

        return redirect()
        ->back()
        ->with('msg', 'Bạn đã bình luận thành công !!!');
    }
}
