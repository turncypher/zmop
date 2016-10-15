<?php namespace Turncypher\Zmop;

/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 16-10-15
 * Time: 上午11:29
 */
use Illuminate\Support\ServiceProvider;

class  ZmopServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/zmop.php' => config_path('zmop.php'),
        ], 'config');
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}