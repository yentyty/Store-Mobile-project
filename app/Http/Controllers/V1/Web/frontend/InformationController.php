<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Information\InformationRepositoryInterface;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;

class InformationController extends Controller
{
    protected $repoInformation;
    protected $repoFactory;


    public function __construct(
        InformationRepositoryInterface $repoInformation,
        FactoryRepositoryInterface $repoFactory
    ) {
        $this->repoInformation = $repoInformation;
        $this->repoFactory = $repoFactory;
    }

    public function detail($slug, $id)
    {
        $infoDetail = $this->repoInformation->detail($id);
        $fatories = $this->repoFactory->index();

        return view('frontend.information.detail', compact('infoDetail', 'fatories'));
    }
}
