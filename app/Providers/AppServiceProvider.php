<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\V1\Role\RoleRepository;
use App\Repositories\V1\Role\RoleRepositoryInterface;
use App\Repositories\V1\User\UserRepository;
use App\Repositories\V1\User\UserRepositoryInterface;
use App\Repositories\V1\UserRole\UserRoleRepository;
use App\Repositories\V1\UserRole\UserRoleRepositoryInterface;
use App\Repositories\V1\News\NewsRepository;
use App\Repositories\V1\News\NewsRepositoryInterface;
use App\Repositories\V1\Information\InformationRepository;
use App\Repositories\V1\Information\InformationRepositoryInterface;
use App\Repositories\V1\Banner\BannerRepository;
use App\Repositories\V1\Banner\BannerRepositoryInterface;
use App\Repositories\V1\Introduce\IntroduceRepository;
use App\Repositories\V1\Introduce\IntroduceRepositoryInterface;
use App\Repositories\V1\Contact\ContactRepository;
use App\Repositories\V1\Contact\ContactRepositoryInterface;
use App\Repositories\V1\Promotion\PromotionRepository;
use App\Repositories\V1\Promotion\PromotionRepositoryInterface;
use App\Repositories\V1\Factory\FactoryRepository;
use App\Repositories\V1\Factory\FactoryRepositoryInterface;
use App\Repositories\V1\Offer\OfferRepository;
use App\Repositories\V1\Offer\OfferRepositoryInterface;
use App\Repositories\V1\Product\ProductRepository;
use App\Repositories\V1\Product\ProductRepositoryInterface;
use App\Repositories\V1\Bill\BillRepository;
use App\Repositories\V1\Bill\BillRepositoryInterface;
use App\Repositories\V1\Service\ServiceRepository;
use App\Repositories\V1\Service\ServiceRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserRoleRepositoryInterface::class, UserRoleRepository::class);
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(InformationRepositoryInterface::class, InformationRepository::class);
        $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
        $this->app->bind(IntroduceRepositoryInterface::class, IntroduceRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(PromotionRepositoryInterface::class, PromotionRepository::class);
        $this->app->bind(FactoryRepositoryInterface::class, FactoryRepository::class);
        $this->app->bind(OfferRepositoryInterface::class, OfferRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(BillRepositoryInterface::class, BillRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
    }
}
