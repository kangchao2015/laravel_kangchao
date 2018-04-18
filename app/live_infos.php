<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class live_infos extends Model
{
    //指定模型关联的表名
    protected $table 		= 'live_infos';	//如果不指定 将会使用类的复数形式「蛇形命名」来作为表名

    //指定主键
    protected $primaryKey 	= 'uuid';		//如果不指定 假定每个数据表都有一个名为 id 的主键字段

    protected $dateFormat 	= 'U';

    //指定允许批量赋值的字段
    protected $fillable = ['id','subject'];

    //指定不允许批量赋值的字段
    protected $guarded = [];

    protected function asDateTime($value)
    {
        return $value;
    }

}
