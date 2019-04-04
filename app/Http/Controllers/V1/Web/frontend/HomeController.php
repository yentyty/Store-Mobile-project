<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Banner\BannerRepositoryInterFace;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;
use App\Models\Banner;

class HomeController extends Controller
{
    protected $repoBanner;
    protected $repoFactory;

    public function __construct(
        BannerRepositoryInterFace $repoBanner,
        FactoryRepositoryInterFace $repoFactory
    ) {
        $this->repoBanner = $repoBanner;
        $this->repoFactory = $repoFactory;
    }

    public function index()
    {
        $fatories = $this->repoFactory->index();
        return view('frontend.home.index', compact('fatories'));
    }
}
