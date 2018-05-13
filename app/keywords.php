<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keywords extends Model
{
    //

    protected $primaryKey 	= 'uuid';		//如果不指定 假定每个数据表都有一个名为 id 的主键字段
    public $incrementing 	= true;			//如果希望使用非递增或者非数字的主键，则必须在模型上设置为false
    public $timestamps 		= true;			//Eloquent 会默认数据表中存在 created_at 和 updated_at 这两个字段
    protected $dateFormat 	= 'U';
    protected function asDateTime($value)
    {
        return $value;
    }
}
