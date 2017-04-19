<?php

namespace Modules\Iforms\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;

class IformsServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function boot()
    {
        $this->publishConfig('iforms', 'config');
        $this->publishConfig('iforms', 'settings');
        $this->publishConfig('iforms', 'permissions');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Iforms\Repositories\FormRepository',
            function () {
                $repository = new \Modules\Iforms\Repositories\Eloquent\EloquentFormRepository(new \Modules\Iforms\Entities\Form());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Iforms\Repositories\Cache\CacheFormDecorator($repository);
            }
        );
// add bindings

    }
}
