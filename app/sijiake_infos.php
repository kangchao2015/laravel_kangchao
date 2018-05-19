<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sijiake_infos extends Model
{
    
    const CREATED_AT 		= 'creation_date';		//自定义用于存储时间戳的字段名CREATED_AT 
    const UPDATED_AT 		= 'last_update';		//自定义用于存储时间戳的字段名UPDATED_AT 

    protected $connection 	= 'mysql_deamon';	//如果你想要为模型指定不同的连接，可以通过 $connection 属性来设置：


    //指定模型关联的表名
    protected $table 		= 'sijiake_infos';	//如果不指定 将会使用类的复数形式「蛇形命名」来作为表名

    //指定主键
    protected $primaryKey 	= 'uuid';		//如果不指定 假定每个数据表都有一个名为 id 的主键字段
    public $incrementing 	= true;			//如果希望使用非递增或者非数字的主键，则必须在模型上设置为false
    public $timestamps 		= true;			//Eloquent 会默认数据表中存在 created_at 和 updated_at 这两个字段
    protected $dateFormat 	= 'U';
}
