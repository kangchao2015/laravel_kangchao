<?php

namespace App\Http\Controllers\test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\live_info;
use App\live_infos;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class testController extends Controller
{

	//默认情况下，Eloquent 查询的结果返回的内容都是 Collection 实例。
    public function test1(){
        $data = live_info::all();
        $data = $data->reject(function($d){
            return $d->feedback_score != 5.0;
        })->map(function($d){
            return $d->subject;
        });

        // var_dump($data);s
        foreach($data as $k=>$v){
            echo $k."==>".$v;
            echo "<br>";
        }
    }

    ///下面的代码在 Collection 类中添加一个 toUpper 方法：
    public function test2(){
		// $collection = collect([1, 2, 3]);
		Collection::macro('toUpper', function () {
	   		return $this->map(function ($value) {
		        return Str::upper($value);
		    });
		});

		$collection = collect(['first', 'second']);

		$upper = $collection->toUpper();

		foreach($upper as $k=>$v){
			echo $k."=>".$v;
			echo "<br>";
		}
    }

    //Collection 类允许你链式调用其方法，以达到在底层数组上优雅地执行 map 和 reject 操作
    public function test3(){
		$collection = collect(['taylor', 'abigail', null])->map(function ($name) {
		    return strtoupper($name);
		})
		->reject(function ($name) {
		    return empty($name);
		});
		foreach($collection as $k=>$v){
			echo $k."=>".$v;
			echo "<br>";
		}
    }

    public function test4(){
		$data = live_info::all();
		live_info::chunk(200, function($d){
			foreach ($d as $key => $value) {
				# code...
				echo $key."-->".$value;
				echo "<br>";
			}
		});

    }

    /**
     * 用   DB::facade  来查询数据
     */
    public function test5(){

        //用   DB::facade  来查询数据
        $res1  = DB::select("select * from live_info limit 3");      //返回结果数组
        $res  = DB::insert("insert into live_info(id, subject) values(?,?)",[191919,"kkkkk"]);  //返回布尔
        $res =  DB::update("update live_info set subject =  ? where id = ?",["zzzzzzz", 191919]);  //返回影响的行数
        $res = DB::delete("delete from live_info where id = 191919");
        dd($res);
        return 123;
    }

    /**
     * 查询构造器 操作数据库
     * 使用了pdo的参数绑定 不需要考虑注入的问题
     */
    public function test6(){

        //插入数据后返回 布尔值
//        $res = DB::table('live_info')->insert(
//            ['id' => '202020', 'subject' => 'asdfasdfas']
//        );

        //插入数据后返回主键
//       $res =  DB::table("live_info")->insertGetId(
//            ['id' => '202020', 'subject' => 'asdfasdfas']
//        );

        //插入多条数据
//        $res =  DB::table("live_info")->insert([
//            ['id' => '202020', 'subject' => 'asdfasdfas'],
//            ['id' => '202020', 'subject' => 'asdfasdfas'],
//            ['id' => '202020', 'subject' => 'asdfasdfas'],
//        ]);

        //更新数据
        //一定要待条件
//        $res = DB::table("live_info")->
//            where("id",'202020')
//            ->update(
//            ['subject'=> "vnvnvnvnvn"]
//        );

        /**
         * 更新指定字段自增1
         */
//        $res = DB::table("live_info")->increment('id'); //自增1
//        $res = DB::table("live_info")->increment('id', 3); //自增3
//        $res = DB::table("live_info")->decrement('id'); //自减少1
//        $res = DB::table("live_info")->decrement('id',3); //自减少3

        //添加限定条件
//        $res = DB::table("live_info")->where('uuid', 588)->decrement('id',3); //自减少3

        //在自增 或者自减的时候  修改其他字段
//        $res = DB::table("live_info")
//            ->where('uuid', 588)
//            ->decrement('id',3, ['subject'=> 'aaaaaaaaaaaa']); //自减少3 的同时修改 subject

        /**
         * 使用查询构造器删除数据
         * 返回删除的行数
         */
//        $res = DB::table("live_info")->where('uuid', '588')->delete();
//        $res = DB::table("live_info")->where('uuid','<=', '600')->delete();

        //情空数据表
//        $res = DB::table("live_info")->truncate();



        //返回值均为收到影响的行数
        dd($res);

    }

    /**
     * 使用查询构造器 查询数据
     */
    public function test7(){

        //get 获取到所有的数据
        $res = DB::table("live_info")->get();     //collection类型

        //获取结果集中的第一条数据
        $res = DB::table("live_info")->orderby("uuid","desc")->first();     //数组


        //指定条件
        $res = DB::table("live_info")
            ->orderby("uuid","desc")
            ->where('uuid',"<", 620)
            ->where('seats_taken',"<", 1000)
            ->get();     //数组  指定多个条件


        //使用原生的where条件
        $res = DB::table("live_info")
            ->whereRaw("uuid < ?  and seats_taken < 1000", [620, 1000])
            ->get();


        //pluck 只能查询到某个字段
        //pluck 传如一个字段返回该字段内容 传入两个字段可以将后面的字段作为下标返回
        $res = DB::table("live_info")
            ->orderby("uuid","desc")
            ->where('uuid',"<", 620)
            ->where('seats_taken',"<", 1000)
            ->pluck('seats_taken','subject');     //数组  指定多个条件


        //select 选择指定的字段
        $res = DB::table("live_info")
            ->orderby("uuid","desc")
            ->where('uuid',"<", 620)
            ->where('seats_taken',"<", 1000)
            ->select('seats_taken','subject')
            ->get();     //数组  指定多个条件

        //chunk 将得到的数据分成指定大小的小份  通过闭包函数做处理
        $res = DB::table("live_info")
            ->orderby("uuid","desc")
            ->chunk(10,function($res1){
//               echo "ppppp   ";
//               echo "<br>";
        });


        //聚合函数
        $res = DB::table("live_info")
            ->count();     //数组  指定多个条件

        $res = DB::table("live_info")
            ->max('uuid');     //数组  指定多个条件

        $res = DB::table("live_info")
            ->min('uuid');     //数组  指定多个条件

        $res = DB::table("live_info")
            ->avg('uuid');     //数组  指定多个条件

        $res = DB::table("live_info")
            ->sum('uuid');     //数组  指定多个条件


        dd($res);
    }

    /**
     * @return $this
     * ORM Eloquent
     */
    public function test8(){

        //all 表的所有记录
        $res = live_info::all();

        //如果没有当前这条数据的话会返回空
        $res = live_info::find("60113");  //根据主键查找

        //如果没有当前这条数据会返回 错误 根据主键查找
        $res = live_info::findorfail("603");

        $res = live_info::get();
        $res = live_info::where("id",">","600")->first();

        //chunk
        $res = live_info::chunk(400,function($res1){
            echo 123 . "<br>";
        });

        $res = live_info::count();
        $res = live_info::max("uuid");
        $res = live_info::min("uuid");
        $res = live_info::sum("uuid");


        dd($res);
    }

    /**
     * ORM Eloquent 增加数据
     * save 方法
     */
    public function test9(){


//        $live = new live_infos();
//        $live->subject = "asdfasdf";
//        $live->id = 123;
//        $res = $live->save();

//        $res = live_infos::all();
//        $res = live_infos::find(2);
//        echo $res->updated_at;
//        echo "<br>";
//        echo date("Y-m-d H:i:s", $res->created_at);

            $res = live_infos::find(2);

            //使用模型 的create方法

//        $res  = live_infos::create(['id'=>50,'subject'=>'adsf']);


        //firstOrcreate();
        //按照属性去查找记录 如果没有查找到的就去创建该记录
//        $res = live_infos::firstorcreate(['id'=>'51']);

        //firstOrNew();
        //
        $res = live_infos::firstornew(['id'=>'51']);


        dd($res);

    }

    /**
     * orm修改数据
     * orm删除数据
     */
    public function test10(){

//        $a = live_infos::find(34);
//        $a->subject = "kangchao";
//        $a->save();


        //按照条件更新
//        $a = live_infos::where("id" ,'=','51')->update(['id'=>101010]);

        //通过模型删除数据
//        $a = live_infos::find(20);
//        $a = $a->delete();

        //通过主键删除
//        $a = live_infos::destroy(21);

        $a = live_infos::where("id" ,'=','123')->delete();



        dd($a);


    }

    /**
     * 模板
     */
    public function test12(){

        $lives = live_infos::limit(0)->get();

        return view('test.index',[
            'data' => 123,
            'lives' => $lives
        ])->with('test',"kangchao");
    }


    /**
        url test
    */
    public function test13(){

        return view("test.test13");
    }


    /**
        request
    */
    public function test14(Request $req){

        //获取
        $res =  $req->input("name", "zzzz");            //获取指定的键的值
        $res =  $req->has("name1");                             //判断指定的键是否存在
        $res =  $req->all();                                        //获取所有的参数

        //判断类型
        $res =  $req->method();                                       //获取请求类型
        $res =  $req->isMethod("GET");                        //判断请求类型是否是指定的类型
        $res =  $req->ajax();                                          //判断是否为ajax请求
        $res =  $req->is("test123*");                                  //判断是否为指定的请求路径

        $res =  $req->url();                                           //获取请求的url
        dd($res);
        return view("test.request");
    }

    /**
     * session
     */
    public function test15(Request $req){

        return Session::get("aaa","nonde");
//        1.HTTP的request方法
//        $req->session()->put("aa","bb");
//        echo $req->session()->get("aa");
//        dd($req->session());


//        2.session 辅助函数
//        session()->put("cc","dd");
//        echo session()->get("cc");

//        3.通过session类的静态方法
//        Session::put("aaa","bbb");
//        echo Session::get("aaa1","default");

//        4.session的数组操作
//        Session::push(1,"b");
//        Session::push(1,"d");
//        $res = Session::get(1);

//        5.取出session并删除
//        $res = Session::pull(1,"asfdsafads");
//        dd($res);

//        6.判断session中的某个值是否存在
//        if(Session::has("aaaaa")){
//            echo 123;
//        }else{
//            echo 999;
//        }


//        7.删除指定的几个键值
//        Session::forget('aaa');

//        8.清空session
//        Session::flush();

//        9.暂存session数据
//        Session::flash('aaa','bbbb');
    }

    /**
     * @请求之respose();
     */
    public function test16(Request $req){

//        $data = [
//            'errCode'   =>  0,
//            'errMsg'    =>  "Success",
//            'data'      =>  [
//                'name'      =>  'kangchao',
//                'gender'    =>  'male'
//            ]
//        ];
//
//        return Response::json($data);
//        return response::json($data);


        /**
         * 重定向
         * 方法一  带过去的数据可以用   Session::get(); 方法来获取到数据  相当于 flash方法 只有一次有效
         * 方法二  action
         * 方法三  rroute 用路由别名重定向
         * 方法四  back(); 返回上一个页面
         */
//        return redirect("test15")->with('aaa','zzz');
//        return redirect()->action('test\testController@test15')->with('aaa','zzz');
//        return redirect()->route("test155")->with('aaa','zzz');
//        return redirect()->back();
    }


    /**
     * middleware
     */
    public  functio



























}
