<?php

namespace Laravelsmit\CrudCategory;

use Illuminate\Support\ServiceProvider;

class CategoryPackageServiceProvider extends ServiceProvider {

    public function boot() {
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'categorypackage');

        // Load translations
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'categorypackage');

        // Publish config
        $this->publishes([
            __DIR__ . '/../config/categorypackage.php' => config_path('categorypackage.php'),
                ], 'config');

        // Publish other resources
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/categorypackage'),
            __DIR__ . '/../routes/web.php' => base_path('routes/categorypackage.php'),
            __DIR__ . '/../Http/Controllers' => app_path('Http/Controllers/CategoryPackage'),
                ], 'categorypackage-resources');
    }

    public function register() {
        // Merge config
        try {
            $this->mergeConfigFrom(
                    __DIR__ . '/../config/categorypackage.php', 'categorypackage'
            );
        } catch (\Exception $e) {
            \Log::error("Could not load configuration file: " . $e->getMessage());
        }
    }

}
