<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Builder::macro('customPaginate', function () {
            //if the request has pagination query parameter and its value is none we will return the model without a pagination
            if (request()->pagination === 'none') {
                return $this->get();
            }
            $page = Paginator::resolveCurrentPage();
            //here we will check if there is a per page value we will use it in pagination else we will use a default pagination value
            $perPage = request()->per_page ? request()->per_page :20;

            $results = ($total = $this->toBase()->getCountForPagination()) ? $this->forPage($page, $perPage)->get(['*']) : $this->model->newCollection();

            return $this->paginator($results, $total, $perPage, $page, [
                    'path'     => Paginator::resolveCurrentPath(),
                    'pageName' => 'page',
                ]);
        });
        
    }
}
