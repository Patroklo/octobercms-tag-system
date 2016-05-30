<?php

namespace Patroklo\Tags;
use System\ServiceProvider;


/**
 * Class TagsProvider
 * @package Patroklo\Tags
 */
class TagsProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application events.
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/tags/assets' => public_path('public/js')
		], 'public');
	}

}
