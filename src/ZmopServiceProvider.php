<?php namespace Turncypher\Zmop;

/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 16-10-15
 * Time: 上午11:29
 */
use Illuminate\Support\ServiceProvider;

class ZmopServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/zmop.php' => base_path('config/zmop.php'),
        ], "config");
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerZmop();
    }

    private function registerZmop()
    {
        $this->app->bind('zmop', function ($app) {
            $gatewayUrl = config('zmop.gatewayUrl');
            $appId = config('zmop.appId');
            $charset = config('zmop.charset');
            $privateKeyFilePath = config('zmop.privateKeyFile');
            $zhiMaPublicKeyFilePath = config('zmop.zmPublicKeyFile');

            return new ZmopClient(
                $gatewayUrl,
                $appId,
                $charset,
                $privateKeyFilePath,
                $zhiMaPublicKeyFilePath
            );
        });
    }
}