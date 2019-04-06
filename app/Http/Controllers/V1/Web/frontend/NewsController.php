<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\News\NewsRepositoryInterface;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;

class NewsController extends Controller
{
    protected $repoNews;
    protected $repoFactory;


    public function __construct(
        NewsRepositoryInterface $repoNews,
        FactoryRepositoryInterface $repoFactory
    ) {
        $this->repoNews = $repoNews;
        $this->repoFactory = $repoFactory;
    }

    public function index()
    {
        $fatories = $this->repoFactory->index();
        $news = $this->repoNews->paginate(12);

        return view('frontend.news.news', compact('news', 'fatories'));
    }

    public function detail($id, $slug)
    {
        $newdetail = $this->repoNews->detail($id);
        $fatories = $this->repoFactory->index();
        $newanother = $this->repoNews->newAnother($id);

        return view('frontend.news.detail', compact('newdetail', 'fatories', 'newanother'));
    }
}
