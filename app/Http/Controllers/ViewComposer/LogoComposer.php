<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\V1\Logo\LogoRepositoryInterface;

class LogoComposer
{
    public $repoLogo;
    /**
     * Create a movie composer.
    *
    * @return void
    */
    public function __construct(LogoRepositoryInterface $repoLogo)
    {
        $this->repoLogo = $repoLogo;
    }
     /**
     * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $logos = $this->repoLogo->paginate(1);
        $view->with('logos', $logos);
    }
}
