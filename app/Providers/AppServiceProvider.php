<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // --- Las URLs cuando trabajas en GitHub Codespaces -------------------
        //
        // Tu navegador entra por https://<codespace>-8000.app.github.dev, que
        // por fuera responde en el puerto 443. Dentro del contenedor, en cambio,
        // 'php artisan serve' escucha en el 8000, y Laravel arma las URLs
        // absolutas con el host Y EL PUERTO de la peticion. Resultado: el
        // redirect que hace tu store() sale como
        // http://<codespace>-8000.app.github.dev:8000/ y el navegador no
        // conecta, porque ese puerto no existe fuera del contenedor.
        //
        // forceRootUrl fija la raiz publica (sin puerto) y forceScheme la pone
        // en https, que es como entra el navegador. Sin lo segundo, las URLs
        // salen en http dentro de una pagina https y el navegador bloquea el
        // envio del formulario por contenido mixto.
        //
        // Se configura solo, con las mismas variables que Codespaces ya define
        // y que tambien usa el vite.config.js del curso. En el contenedor local
        // no hace nada, porque ahi CODESPACE_NAME no existe.
        //
        // Se lee con getenv() y no con env(): env() pasa por el repositorio de
        // Dotenv, que se arma una sola vez al arrancar y que devuelve null si
        // alguien corrio 'php artisan config:cache'. getenv() lee el entorno
        // del proceso directo y no falla en ninguno de esos casos.
        if ($codespace = getenv('CODESPACE_NAME')) {
            $dominio = getenv('GITHUB_CODESPACES_PORT_FORWARDING_DOMAIN') ?: 'app.github.dev';

            URL::forceRootUrl("https://{$codespace}-8000.{$dominio}");
            URL::forceScheme('https');
        }
    }
}
