<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Banner\BannerRepositoryInterFace;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;
use App\Repositories\V1\Offer\OfferRepositoryInterFace;
use App\Models\Banner;

class HomeController extends Controller
{
    protected $repoBanner;
    protected $repoFactory;
    protected $repoOffer;

    public function __construct(
        BannerRepositoryInterFace $repoBanner,
        FactoryRepositoryInterFace $repoFactory,
        OfferRepositoryInterFace $repoOffer
    ) {
        $this->repoBanner = $repoBanner;
        $this->repoFactory = $repoFactory;
        $this->repoOffer = $repoOffer;
    }

    public function index()
    {
        $fatories = $this->repoFactory->index();
        $banners = $this->repoBanner->paginate(5);
        $offers = $this->repoOffer->paginate(2);
        return view('frontend.home.index', compact('fatories', 'banners', 'offers'));
    }
}
