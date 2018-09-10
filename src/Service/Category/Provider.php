<?php

namespace Peak\Service\SystemConfig;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{

	public function boot()
	{
		// 创建迁移
		$this->publishes([
			__DIR__.'/publish/migration.php' => database_path('migrations/2018_09_09_170327_peak_category.php'),
		]);

	}


}