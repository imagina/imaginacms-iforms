<?php

namespace Modules\Iform\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Iform\Events\Handlers\RegisterIformSidebar;

class IformServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterIformSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('forms', array_dot(trans('iform::forms')));
            $event->load('fields', array_dot(trans('iform::fields')));
            $event->load('leads', array_dot(trans('iform::leads')));
            // append translations



        });
    }

    public function boot()
    {
        $this->publishConfig('iform', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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
            'Modules\Iform\Repositories\FormRepository',
            function () {
                $repository = new \Modules\Iform\Repositories\Eloquent\EloquentFormRepository(new \Modules\Iform\Entities\Form());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Iform\Repositories\Cache\CacheFormDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Iform\Repositories\FieldRepository',
            function () {
                $repository = new \Modules\Iform\Repositories\Eloquent\EloquentFieldRepository(new \Modules\Iform\Entities\Field());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Iform\Repositories\Cache\CacheFieldDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Iform\Repositories\LeadRepository',
            function () {
                $repository = new \Modules\Iform\Repositories\Eloquent\EloquentLeadRepository(new \Modules\Iform\Entities\Lead());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Iform\Repositories\Cache\CacheLeadDecorator($repository);
            }
        );
// add bindings



    }
}
