<?php

namespace App\Providers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

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

        if($this->app->environment('produccion'))
        {
            URL::foceScheme('https');
        }
        
       VerifyEmail::toMailUsing(function($notifiable, $url){
          return (new MailMessage)
            ->subject('Verificar Cuenta')
            ->line('Por favor para verificar su dirección de correo electrónico haga clic en el botón de abajo.')
            ->action('Confirmar cuenta', $url)
            ->line('Si no creó una cuenta en Darash, por favor ignore este mensaje.');
       });
    }
}
