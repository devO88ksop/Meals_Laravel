<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Admin;
use App\Interfaces\AdminInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\CategoryInterface;

use App\Repositories\AdminRepository;
use App\Repositories\ProductRepository;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Interfaces\Api\ApiProductInterface;
use App\Repositories\Api\ApiProductRepository;
use App\Interfaces\Api\CategoryInterface as ApiCategoryInterface;
use App\Repositories\Api\CategoryRepository as ApiCategoryRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(ApiCategoryInterface::class, ApiCategoryRepository::class);
        $this->app->bind(ApiProductInterface::class, ApiProductRepository::class);
        $this->app->bind(AdminInterface::class, AdminRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
