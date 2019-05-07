<?php

namespace Peak\Service\Category;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{

	public function boot()
	{
		// 创建迁移
		$this->publishes(
			[
				__DIR__.'/publish/migration.php' => database_path('migrations/'.date('Y_m_d').'_170327_peak_category.php'),
			],
			'migration'
		);
	}


	public function register ()
	{

	}


}
