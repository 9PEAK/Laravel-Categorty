<?php

namespace Peak\Service\Category;

use Illuminate\Database\Eloquent\Builder;

class Core extends \Illuminate\Database\Eloquent\Model
{

	protected $table = 'category';
	public $timestamps = false;

	protected $fillable = [
		'name' => 'name',
		'intro' => 'intro',
		'img' => 'img',
		'pid' => 'pid',
		'top' => 'top',
		'status' => 'status',
	];

	protected $hidden = [
		'type'
	];

	protected $casts = [
		'top' => 'int'
	];




	/**
	 * 初始化
	 * */
	static function init ($type)
	{
		self::$CATEGORY_TYPE = $type;
		return self::class;
	}

	protected static $CATEGORY_TYPE = null;

	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope('type', function (Builder $builder) {
			$builder->where('type', self::$CATEGORY_TYPE);
		});

		static::saving(function ($model) {
			$model->type = self::$CATEGORY_TYPE;
		});

		static::saved(function ($model){
			if (!$model->pid) {
				$model->pid = $model->id;
				$model->save();
			}
		});

	}


	### 作用域查询

	/**
	 * 检索状态
	 * */
	public function scopeWhereStatus ($query, $status)
	{
		return $query->where('status', $status);
	}


	/**
	 * 搜索名称
	 * */
	public function scopeWhereName ($query, $name, $like=false)
	{
		return $like ? $query->where('name', 'like', '%'.$name.'%') : $query->where('name', $name);
	}


	# model方法



	### Model 关系

	/**
	 * 下级分类
	 * */
	public function sub ()
	{
		return $this->hasMany(static::class, 'pid', 'id');
	}


	/**
	 * 上级分类
	 * */
	public function sup ()
	{
		return $this->belongsTo(static::class, 'id', 'pid')->whereRaw('id!=pid');
	}

}
