<?php

namespace Tox\Providers;

use Tox\Console\PublishCommand;
use Yuga\Interfaces\Application\Application;
use Yuga\Providers\ServiceProvider;
use Yuga\Providers\Shared\MakesCommandsTrait;
use Yuga\Route\Route;

class ToxServiceProvider extends ServiceProvider
{
    use MakesCommandsTrait;
    protected $namespace = 'Tox\Controllers';

    /**
     * Register a service to the application.
     *
     * @param \Yuga\Interfaces\Application\Application
     *
     * @return mixed
     */
    public function load(Application $app)
    {
        if ($app->runningInConsole()) {
            $app->singleton('command.tox.publish', function ($app) {
                return new PublishCommand($app['cache'], $app['files']);
            });

            $this->commands('command.tox.publish');
        }
    }

    public function boot(Route $router)
    {
        if (!is_dir(path('resources/views/tox'))) {
            $this->app->get('view')->setTemplateDirectory('./tox/src/resources/views');
        }

        $router->group(['prefix' => 'tox', 'middleware' => 'web', 'namespace' => $this->namespace], function () {
            require __DIR__.'/../routes/tox.php';
        });
    }
}
