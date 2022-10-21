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
        $app['tox_views'] = $app->getVendorDir() . '/yuga/tox/src/resources/views';
    }

    public function boot(Route $router)
    {   
        $this->view = $this->app->get('view');
        // print_r($this->view);
        // die();
        if (!is_dir(path('resources/views/tox'))) {
            // $view = clone $this->app->get('view');
            // $view->setTemplateDirectory($this->app->getVendorDir().'/yuga/tox/src/resources/views');
            $this->view->setTemplateDirectory(path().'tox/src/resources/views');
        }
        $router->group(['prefix' => 'tox', 'middleware' => 'web', 'namespace' => $this->namespace], function () {
            require __DIR__.'/../routes/tox.php';
        });
    }
}
