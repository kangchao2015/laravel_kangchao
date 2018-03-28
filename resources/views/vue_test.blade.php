<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title id="title">Vue 测试实例 - @{{ttt}}菜鸟教程(runoob.com)</title>
<script src="https://cdn.bootcss.com/vue/2.2.2/vue.min.js"></script>
</head>
<body>

<div id = "computed_props">
    千米 : <input type = "text" v-model = "kilometers">
    米 	: <input type = "text" v-model = "meters">
</div>
<p id="info"></p>
<script type = "text/javascript">
    var vm = new Vue({
	    el: '#computed_props',
	    data: {
	        kilometers : 0,
	        meters:0
	    },
	    methods: {
	    },
	    computed :{
	    },
	    watch : {
	        kilometers:function(val) {
	            this.kilometers = val;
	            this.meters = val * 1000;
	        },
	        meters : function (val) {
	            this.kilometers = val/ 1000;
	            this.meters = val;
	        }
	    }
    });
    // $watch 是一个实例方法
    vm.$watch('kilometers', function (newValue, oldValue) {
    // 这个回调将在 vm.kilometers 改变后调用
	    document.getElementById ("info").innerHTML = "修改前值为: " + oldValue + "，修改后值为: " + newValue;
	})
</script>


</body>
</html>