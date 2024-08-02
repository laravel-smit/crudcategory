<?php

namespace laravelsmit\crudcategory;

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
        ]);
    }

    public function register() {
        // Merge config
        $this->mergeConfigFrom(
                __DIR__ . '/../config/categorypackage.php', 'categorypackage'
        );
    }

}
