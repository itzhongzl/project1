<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>友情链接列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 友情链接管理 <span class="c-gray en">&gt;</span> 友情链接列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!-- <div class="text-c">
		<button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
	 <span class="select-box inline">
		<select name="" class="select">
			<option value="0">全部分类</option>
			<option value="1">分类一</option>
			<option value="2">分类二</option>
		</select> -->
<!-- 		</span> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;"> -->
		<form action="/adminlink" method="get">
			<input type="text" name="keywords" id="" placeholder="关键词" style="width:250px" class="input-text" value="{{$request['keywords'] or ''}}">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜搜</button>
		</form>
	<!-- </div> -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
			<a class="btn btn-danger radius del"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> 
			<a class="btn btn-primary radius" data-title="添加链接" data-href="/adminlink/create" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加链接</a>
		</span> 
		<span class="r">共有数据：<strong>{{$count}}</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">ID</th>
					<th>地址</th>
					<th width="80">名称</th>
					<th width="120">发布时间</th>
					<th width="120">更新时间</th>
					<th width="60">发布状态</th>
					<th width="120">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $v)
				<tr class="text-c">
					<td><input type="checkbox" value="{{$v->id}}"></td>
					<td>{{$v->id}}</td>
					<td>{{$v->web}}</td>
					<td class="text-l">{{$v->name}}</td>
					<td>{{date('Y/m/d H:i:s',$v->updatetime)}}</td>
					<td>{{date('Y/m/d H:i:s',$v->changetime)}}</td>
					<td class="td-status"><span class="label label-success radius">已发布</span></td>
					<td class="f-14 td-manage">
						<a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> 
							<a style="text-decoration:none" class="ml-5" onClick="article_edit('链接编辑','/adminlink/1/edit','10001')" href="/adminlink/{{$v->id}}/edit" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
						</form>

						<form action="/adminlink/{{$v->id}}" method="post">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$data->render()}}
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
//获取需要删除数据的id
//遍历
$('.del').click(function(){
	a=[];
	$(":checkbox").each(function(){
		// alert(1);
		if($(this).attr('checked')){
			id = $(this).val();
			alert(id);
			// a.push(id);
		}
	});

	//ajax操作
	// $.get('/adminlinkdel',{a:a},function(data){
	// 	if(data==1){
	// 		for(var i=0;i<a.length;i++){
	// 			$("input[value='"+a[i]+"']").parents("tr").remove();
	// 		}
	// 	}else{
	// 		alert(data);
	// 	}
	// });
});
</script> 
</body>
</html>
