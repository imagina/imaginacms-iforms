<?php

namespace Modules\Iform\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Iform\Events\CreateForm;
use Modules\Iform\Events\DeleteForm;
use Modules\Iform\Events\Handlers\DeleteFormeable;
use Modules\Iform\Events\Handlers\StoreFormeable;
use Modules\Iform\Events\UpdateForm;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        CreateForm::class => [
            StoreFormeable::class,
        ],
        UpdateForm::class => [
            StoreFormeable::class,
        ],
        DeleteForm::class => [
            DeleteFormeable::class,
        ],
    ];

    /**
     * Indicates if events should be discovered.
     *
     * @var bool
     */
    protected static $shouldDiscoverEvents = true;

    /**
     * Configure the proper event listeners for email verification.
     */
    protected function configureEmailVerification(): void {}
}
