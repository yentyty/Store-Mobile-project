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

    public function index()
    {
        $fatories = $this->repoFactory->index();
        $introduce = $this->repoIntroduce->paginate(3);

        return view('frontend.contact.index', compact('fatories', 'introduce'));
    }

    public function store(CreateContactRequest $request)
    {
        $this->repoContact->store($request->all());

        return redirect()
        ->route('fe.contact.index')
        ->with('msg', 'Bạn đã gửi liên hệ thành công !!! Hệ thống sẽ gửi mail xác nhận');
    }
}
