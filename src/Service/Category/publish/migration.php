<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PeakCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	DB::statement('CREATE TABLE IF NOT EXISTS `9peak_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT \'名称\',
  `intro` text COMMENT \'说明\',
  `img` text COMMENT \'图片url\',
  `pid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT \'上级分类\',
  `top` tinyint(2) NOT NULL DEFAULT \'1\' COMMENT \'排序 状态\',
  `status` tinyint(1) DEFAULT NULL COMMENT \'状态\',
  `total` mediumint(8) UNSIGNED NOT NULL DEFAULT \'0\' COMMENT \'子分类总数\',
  `type` float(3.1) NOT NULL COMMENT \'模块类型\',
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `pid` (`pid`),
  KEY `top` (`top`),
  KEY `type` (`type`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('9peak_category');
    }
}
