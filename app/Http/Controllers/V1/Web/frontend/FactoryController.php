<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;

class FactoryController extends Controller
{
    protected $repoFactory;


    public function __construct(
        FactoryRepositoryInterface $repoFactory
    ) {
        $this->repoFactory = $repoFactory;
    }

    public function postFactory($id, $slug)
    {
        $listfactory = $this->repoFactory->postFactory($id);
        $fatories = $this->repoFactory->index();

        return view('frontend.factory.index', compact('fatories', 'listfactory'));
    }
}
