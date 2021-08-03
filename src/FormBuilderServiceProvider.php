<?php

namespace doode\FormBuilder;

use doode\FormBuilder\Middlewares\FormAllowSubmissionEdit;
use doode\FormBuilder\Middlewares\PublicFormAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FormBuilderServiceProvider extends ServiceProvider
{
	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function register()
	{
	    $this->mergeConfigFrom(
	        __DIR__.'/../config/config.php', 'formbuilder'
	    );
	}

	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
	    // load custom route overrides
	    $this->loadRoutesFrom( __DIR__.'/../routes.php' );

	    // register the middleware
	    Route::aliasMiddleware('public-form-access', PublicFormAccess::class);
	    Route::aliasMiddleware('submisson-editable', FormAllowSubmissionEdit::class);

	    // load migrations
	    $this->loadMigrationsFrom( __DIR__.'/../migrations' );

	    // load the views
	    $this->loadViewsFrom( __DIR__.'/../views', 'formbuilder' );

	    // publish config files
	    $this->publishes([
	        __DIR__.'/../config/config.php' => config_path('formbuilder.php', 'formbuilder'),
	    ], 'formbuilder-config');

	    // publish view files
	    $this->publishes([
	    	__DIR__.'/../views' => resource_path('views/vendor/formbuilder', 'formbuilder::'),
	    ], 'formbuilder-views');

	    // publish public assets
	    $this->publishes([
	        __DIR__.'/../public' => public_path('vendor/formbuilder'),
        ], 'formbuilder-public');
	}
}
