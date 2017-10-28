<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    {{--<link href="./Public/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">--}}
	  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
    <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	  <script src="{{ asset('js/app.js') }}"></script>
    <script src="./Public/Js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./Public/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body style="padding-top:60px;">

	<!-- 带有字体图标的导航栏 -->
	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">	<!-- 响应式的导航栏 -->
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">
                        <span class="glyphicon glyphicon-home">Home</span></a>
                </li>
                <li>
                    <a href="#shop">
                        <span class="glyphicon glyphicon-shopping-cart">Shop</span></a>
                </li>
                <li>
                    <a href="#support">
                        <span class="glyphicon glyphicon-headphones">Support</span></a>
                </li>
                <li>
                    <a href="#support">
                        <span class="glyphicon glyphicon-headphones">Support</span></a>
                </li>
                <li>
                    <a href="#support">
                        <span class="glyphicon glyphicon-headphones">Support</span></a>
                </li>
                <li>
                    <a href="#support">
                        <span class="glyphicon glyphicon-headphones">Support</span></a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right"> 
	            <li><a href="#"><span class="glyphicon glyphicon-user"></span> 注册</a></li> 
	            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li> 
	        </ul>
            <!-- <form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		            <div class="input-group">
		            	<input type="text" class="form-control" placeholder="Search"><span class="input-group-btn"><button class="btn btn-default" type="button">Go!</button></span>
		            </div>
		        </div>
		    </form> -->
        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
	</div>
			
			
	<!-- 容器 -->
	<div class="container">
		<img src="./Public/Images/timg.jpg" class="img-responsive" alt="响应式图像">
		<div class="jumbotron">
				<h1>我的第一个 Bootstrap 页面</h1>
				<p>重置窗口大小，查看响应式效果！</p> 
	  	</div>
	  	
	  	<!-- 网格 -->
		<div class="row">
		    <div class="col-sm-3">
				<h3>第一列</h3>
				<p>学的不仅是技术，更是梦想！</p>
				<p>再牛逼的梦想,也抵不住你傻逼似的坚持！</p>
		    </div>
		    <div class="col-sm-3">
				<h3>第二列</h3>
				<p>学的不仅是技术，更是梦想！</p>
				<p>再牛逼的梦想,也抵不住你傻逼似的坚持！</p>
		    </div>
		    <div class="col-sm-3">
				<h3>第三列</h3>        
				<p>学的不仅是技术，更是梦想！</p>
				<p>再牛逼的梦想,也抵不住你傻逼似的坚持！</p>
		    </div>
		    <div class="col-sm-3">
				<h3>第三列</h3>        
				<p>学的不仅是技术，更是梦想！</p>
				<p>再牛逼的梦想,也抵不住你傻逼似的坚持！</p>
		    </div>
		</div>
		
		<h2>表格</h2>
		<p>创建响应式表格 (将在小于768px的小型设备下水平滚动)。另外：添加交替单元格的背景色：</p>      
		<div class="table-responsive">          
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Street a aa aaa aa aa aa a aaaaa a aa aaa aaaaa a</th>
					</tr>
				</thead>
			<tbody>
					<tr>
						<td>1</td>
						<td>Anna aa aa a  a aa aaa aa aa aa a aaaaa a a aaa aaaaa a Awesome</td>
						<td>Broome Street</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Debbie Dallas</td>
						<td>Houston Street</td>
					</tr>
					<tr>
						<td>3</td>
						<td>John Doe</td>
						<td>Madison Street</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<h2>图像</h2>
		<p>创建响应式图片(将扩展到父元素)。 另外：图片以椭圆型展示：</p>            
		图片响应式<img src="./Public/Images/timg.jpg" class="img-responsive img-circle" alt="Cinque Terre" width="304" height="236"> 
		添加圆角<img src="./Public/Images/timg.jpg" class="img-rounded" alt="Cinque Terre" width="304" height="236">
		将图片变为圆形<img src="./Public/Images/timg.jpg" class="img-circle" alt="Cinque Terre" width="304" height="236">
		缩略图功能<img src="./Public/Images/timg.jpg" class="img-thumbnail" width="304" height="236">

		<h2>图标</h2>
		<p>插入图标:</p>      
		<p>云图标: <span class="glyphicon glyphicon-cloud"></span></p>      
		<p>信件图标: <span class="glyphicon glyphicon-envelope"></span></p>            
		<p>搜索图标: <span class="glyphicon glyphicon-search"></span></p>
		<p>打印图标: <span class="glyphicon glyphicon-print"></span></p>      
		<p>下载图标：<span class="glyphicon glyphicon-download"></span></p>
		
		<h2>表单1</h2>
		<form class="form-horizontal bs-example bs-example-form" role="form">
			<div class="form-group">
	            <div class="col-lg-6">
			        <div class="input-group">
		            	<span class="input-group-addon"><input type="checkbox"></span>
		            	<input type="text" class="form-control" placeholder="twitterhandle">
			        </div>
			    </div>
			    <div class="col-sm-5">
					<p class="help-block">*这里是块级帮助文本的实例。</p>
				</div>
			</div>
			<div class="form-group">
			    <div class="col-lg-6">
			        <div class="input-group">
			            <input type="text" class="form-control">
			            <span class="input-group-addon">.00</span>
			        </div>
			    </div>
			</div>
			<div class="form-group">
			    <div class="col-lg-6">
			        <div class="input-group">
			            <span class="input-group-addon">$</span>
			            <input type="text" class="form-control">
			            <span class="input-group-addon">.00</span>
			        </div>
			    </div>
			</div>
			<div class="form-group">
			    <div class="col-lg-6">
			        <div class="input-group">
			            <span class="input-group-btn"><button class="btn btn-default" type="button">Go!</button></span>
			            <input type="text" class="form-control">
			            <span class="input-group-btn"><button class="btn btn-default" type="button">Go!</button></span>
			        </div>
			    </div>
			</div>
			<div class="form-group">
				<div class="col-lg-6">
	                <div class="input-group">
	                    <input type="text" class="form-control">
	                    <div class="input-group-btn">
	                        <button type="button" class="btn btn-default 
	                        dropdown-toggle" data-toggle="dropdown">下拉菜单
	                            <span class="caret"></span>
	                        </button>
	                        <ul class="dropdown-menu pull-right">
	                            <li>
	                                <a href="#">功能</a>
	                            </li>
	                            <li>
	                                <a href="#">另一个功能</a>
	                            </li>
	                            <li>
	                                <a href="#">其他</a>
	                            </li>
	                            <li class="divider"></li>
	                            <li>
	                                <a href="#">分离的链接</a>
	                            </li>
	                        </ul>
	                    </div><!-- /btn-group -->
	                </div><!-- /input-group -->
	            </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            
			
	    </form>
	    
	    <h2>表单2</h2>
		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">名称</label>
				<div class="col-sm-5">
					<input type="text" class="form-control" id="name" placeholder="请输入名称">
				</div>
				<div class="col-sm-5">
					<div class="alert alert-success alert-dismissable">
			            <button type="button" class="close" data-dismiss="alert"
			                    aria-hidden="true">
			                &times;
			            </button>
			            	成功！很好地完成了提交。
			        </div>
				</div>
			</div>
			<div class="form-group">
  				<label for="lastname" class="col-sm-2 control-label">姓</label>
  				<div class="col-sm-5">
    				<input type="text" class="form-control" id="lastname" placeholder="请输入姓">
  				</div>
  				<div class="col-sm-5">
					<p class="help-block">*这里是块级帮助文本的实例。</p>
				</div>
			</div>
			<div class="form-group">
  				<label for="name" class="col-sm-2 control-label">文本框</label>
  				<div class="col-sm-5">
  					<textarea class="form-control" rows="3"></textarea>
  				</div>
  				<div class="col-sm-5">
					<p class="help-block">*这里是块级帮助文本的实例。</p>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">选择列表</label>
				<div class="col-sm-5">
					<select class="form-control" id="name">
						<option value="aaaaaa">aaaaaaaaaaaa</option>
						<option value="aaaaaa">aaaaaaaaaaaa</option>
					</select>
				</div>
				<div class="col-sm-5">
					<p class="help-block">*这里是块级帮助文本的实例。</p>
				</div>
			</div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">可多选的选择列表</label>
				<div class="col-sm-5">
				    <select multiple class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
				    </select>
				</div>
				<div class="col-sm-5">
					<p class="help-block">*这里是块级帮助文本的实例。</p>
				</div>
			</div>
<!-- 			<div class="form-group">
				<label for="inputfile" class="col-sm-2 control-label">文件输入</label>
				<div class="col-sm-5">
					<input type="file" id="inputfile" style="float:left;margin-right:10px;"><p class="help-block">这里是块级帮助文本的实例。</p>
				</div>
			</div> -->
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
						<label class="checkbox-inline">
					        <input type="checkbox" id="inlineCheckbox1" value="option1"> 选项 1
					    </label>
					    <label class="checkbox-inline">
					        <input type="checkbox" id="inlineCheckbox2" value="option2"> 选项 2
					    </label>
						<label class="radio-inline">
					        <input type="radio" name="optionsRadiosinline" id="optionsRadios3" value="option1" checked> 选项 1
					    </label>
					    <label class="radio-inline">
					        <input type="radio" name="optionsRadiosinline" id="optionsRadios4"  value="option2"> 选项 2
					    </label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-5">
					<p class="form-control-static">email@example.com</p>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">密码</label>
				<div class="col-sm-5">
					<input type="password" class="form-control" id="inputPassword" placeholder="请输入密码">
				</div>
				<div class="col-sm-5">
					<p class="help-block">*这里是块级帮助文本的实例。</p>
				</div>
			</div>
			
			
			
			<div class="form-group">
				<label for="inputPassword" class="col-sm-2 control-label">禁用</label>
				<div class="col-sm-5">
					<input class="form-control" id="disabledInput" type="text" placeholder="该输入框禁止输入..." disabled>
				</div>
			</div>
			<fieldset disabled>
				<div class="form-group">
					<label for="disabledTextInput" class="col-sm-2 control-label">禁用输入（Fieldset disabled）</label>
					<div class="col-sm-5">
						<input type="text" id="disabledTextInput" class="form-control" placeholder="禁止输入">
					</div>
				</div>
				<div class="form-group">
					<label for="disabledSelect" class="col-sm-2 control-label">禁用选择菜单（Fieldset disabled）</label>
					<div class="col-sm-5">
					<select id="disabledSelect" class="form-control">
						<option>禁止选择</option>
					</select>
					</div>
				</div>
			</fieldset>
			<div class="form-group has-success">
				<label class="col-sm-2 control-label" for="inputSuccess">输入成功</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputSuccess">
				</div>
			</div>
			<div class="form-group has-warning">
				<label class="col-sm-2 control-label" for="inputWarning">输入警告</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputWarning">
				</div>
			</div>
			<div class="form-group has-error">
				<label class="col-sm-2 control-label" for="inputError">输入错误</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputError">
				</div>
			</div>
			

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">登录</button>
				</div>
			</div>
		</form>
		
		
		<h2>按钮</h2>
		<!-- 标准的按钮 -->
		<button type="button" class="btn btn-default">默认按钮</button>
		<!-- 提供额外的视觉效果，标识一组按钮中的原始动作 -->
		<button type="button" class="btn btn-primary">原始按钮</button>
		<!-- 表示一个成功的或积极的动作 -->
		<button type="button" class="btn btn-success">成功按钮</button>
		<!-- 信息警告消息的上下文按钮 -->
		<button type="button" class="btn btn-info">信息按钮</button>
		<!-- 表示应谨慎采取的动作 -->
		<button type="button" class="btn btn-warning">警告按钮</button>
		<!-- 表示一个危险的或潜在的负面动作 -->
		<button type="button" class="btn btn-danger">危险按钮</button>
		<!-- 并不强调是一个按钮，看起来像一个链接，但同时保持按钮的行为 -->
		<button type="button" class="btn btn-link">链接按钮</button>
		
		<h2>图标</h2>
		<p>
		    <button type="button" class="btn btn-default">
		        <span class="glyphicon glyphicon-sort-by-attributes"></span>
		    </button>
		    <button type="button" class="btn btn-default">
		        <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
		    </button>
		    <button type="button" class="btn btn-default">
		        <span class="glyphicon glyphicon-sort-by-order"></span>
		    </button>
		    <button type="button" class="btn btn-default">
		        <span class="glyphicon glyphicon-sort-by-order-alt"></span>
		    </button>
		    <a class="text-info" href="http://www.runoob.com/try/demo_source/bootstrap3-glyph-icons.htm">字体图标列表</a>     
		    
		</p>
		<button type="button" class="btn btn-primary btn-lg" style="color: rgb(212, 106, 64);">
			<span class="glyphicon glyphicon-user"></span> User
		</button>
		<button type="button" class="btn btn-primary btn-lg" style="text-shadow: black 5px 3px 3px;">
			<span class="glyphicon glyphicon-user"></span> User
		</button>
		
		<h2>按钮组</h2>
		<div class="btn-group btn-group-lg">
		    <button type="button" class="btn btn-default">按钮 1</button>
		    <button type="button" class="btn btn-default">按钮 2</button>
		    <button type="button" class="btn btn-default">按钮 3</button>
		</div>
		    <div class="btn-group btn-group-sm">
		    <button type="button" class="btn btn-default">按钮 4</button>
		    <button type="button" class="btn btn-default">按钮 5</button>
		    <button type="button" class="btn btn-default">按钮 6</button>
		</div>
		    <div class="btn-group btn-group-xs">
		    <button type="button" class="btn btn-default">按钮 7</button>
		    <button type="button" class="btn btn-default">按钮 8</button>
		    <button type="button" class="btn btn-default">按钮 9</button>
		</div>
		
		<h2>按钮下拉菜单</h2>
		<div class="btn-group-vertical">
		    <button type="button" class="btn btn-default">按钮 1</button>
		    <button type="button" class="btn btn-default">按钮 2</button>
		    <div class="btn-group-vertical">
		    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
		        下拉
		        <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu">
		        <li><a href="#">下拉链接 1</a></li>
		        <li><a href="#">下拉链接 2</a></li>
		    </ul>
		    </div>
		</div>
		<div class="btn-group">
			<!-- <button type="button" class="btn btn-default">默认</button> -->
		    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">原始
		        <span class="caret"></span>
		    </button>
		    <ul class="dropdown-menu" role="menu">
		        <li>
		            <a href="#">功能</a>
		        </li>
		        <li>
		            <a href="#">另一个功能</a>
		        </li>
		        <li>
		            <a href="#">其他</a>
		        </li>
		        <li class="divider"></li>
		        <li>
		            <a href="#">分离的链接</a>
		        </li>
		    </ul>
		</div>
		
		
		
		<h2>标签式的导航菜单</h2>
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#">Home</a></li>
		  <li><a href="#">SVN</a></li>
		  <li class="disabled"><a href="#">iOS</a></li>
		  <li><a href="#">VB.Net</a></li>
		  <li class="dropdown">
		  	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		  		Java<span class="caret"></span>
		  	</a>
		  	<ul class="dropdown-menu">
		        <li><a href="#">Swing</a></li>
		        <li><a href="#">jMeter</a></li>
		        <li><a href="#">EJB</a></li>
		        <li class="divider"></li>
		        <li><a href="#">分离的链接</a></li>
		      </ul>
		  </li>
		  <li><a href="#">PHP</a></li>
		</ul>
		<h2>基本的胶囊式导航菜单</h2>
		<ul class="nav nav-pills nav-justified">
		  <li class="active"><a href="#">Home</a></li>
		  <li><a href="#">SVN</a></li>
		  <li><a href="#">iOS</a></li>
		  <li><a href="#">VB.Net</a></li>
		  <li class="dropdown">
		  	<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		  		Java<span class="caret"></span>
		  	</a>
		  	<ul class="dropdown-menu">
		        <li><a href="#">Swing</a></li>
		        <li><a href="#">jMeter</a></li>
		        <li><a href="#">EJB</a></li>
		        <li class="divider"></li>
		        <li><a href="#">分离的链接</a></li>
		      </ul>
		  </li>
		  <li><a href="#">PHP</a></li>
		</ul>
		<h2>垂直的胶囊式导航菜单</h2>
		<ul class="nav nav-pills nav-stacked">
		  <li class="active"><a href="#">Home</a></li>
		  <li><a href="#">SVN</a></li>
		  <li><a href="#">iOS</a></li>
		  <li><a href="#">VB.Net</a></li>
		  <li><a href="#">Java</a></li>
		  <li><a href="#">PHP</a></li>
		</ul>
		
		<h2>动态标签</h2>
		<p><strong>提示:</strong> 与 .tab-pane 和 data-toggle="tab" (data-toggle="pill" ) 一同使用, 设置标签页对应的内容随标签的切换而更改。</p>
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#home">首页</a></li>
		  <li><a data-toggle="tab" href="#menu1">菜单 1</a></li>
		  <li><a data-toggle="tab" href="#menu2">菜单 2</a></li>
		  <li><a data-toggle="tab" href="#menu3">菜单 3</a></li>
		</ul>
		
		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
		    <h3>首页</h3>
		    <p>菜鸟教程 —— 学的不仅是技术，更是梦想！！！</p>
		  </div>
		  <div id="menu1" class="tab-pane fade">
		    <h3>菜单 1</h3>
		    <p>这是菜单 1 显示的内容。这是菜单 1 显示的内容。这是菜单 1 显示的内容。</p>
		  </div>
		  <div id="menu2" class="tab-pane fade">
		    <h3>菜单 2</h3>
		    <p>这是菜单 2 显示的内容。这是菜单 2 显示的内容。这是菜单 2 显示的内容。</p>
		  </div>
		  <div id="menu3" class="tab-pane fade">
		    <h3>菜单 3</h3>
		    <p>这是菜单 3 显示的内容。这是菜单 3 显示的内容。这是菜单 3 显示的内容。</p>
		  </div>
		</div>

		<h2>分页</h2>
		<p>.disabled 类指定不可访问的分页链接， .active 类设置当前访问的页面： </p>
		<ul class="pagination">
		  <li><a href="#">«</a></li>
		  <li><a href="#">1</a></li>
		  <li><a href="#">2</a></li>
		  <li class="disabled"><a href="#">3</a></li>
		  <li><a href="#">4</a></li>
		  <li><a href="#">5</a></li>
		  <li class="active"><a href="#">6</a></li>
		  <li><a href="#">»</a></li>
		</ul>
		
		<h2>标签</h2>
		<h1><span class="label label-default">默认标签</span></h1>
		<h2><span class="label label-primary">主要标签</span></h2>
		<h3><span class="label label-success">成功标签</span></h3>
		<h4><span class="label label-info">信息标签</span></h4>
		<h5><span class="label label-warning">警告标签</span></h5>
		<h6><span class="label label-danger">危险标签</span></h6>
		
		<h2>徽章</h2>
	    <p>.badge 类指定未读消息的数量:</p>
	    <p><a href="#">收件箱 <span class="badge">21</span></a></p>
		
		
		<h2>超大屏幕</h2>
		<div class="jumbotron">
	        <h1>欢迎登陆页面！</h1>
	        <p>这是一个超大屏幕（Jumbotron）的实例。</p>
			<p><a class="btn btn-primary btn-lg" role="button">
	        	学习更多</a>
			</p>
		</div>
		<div class="jumbotron">
			<div class="container">
			
		        <h1>欢迎登陆页面！</h1>
		        <p>这是一个超大屏幕（Jumbotron）的实例。</p>
		        <p><a class="btn btn-primary btn-lg" role="button">
		        	学习更多</a>
		      </p>
		   </div>
		</div>

		<div class="page-header">
		    <h1>页面标题实例
		        <small>子标题</small>
		    </h1>
		</div>
		<p>这是一个示例文本。这是一个示例文本。这是一个示例文本。这是一个示例文本。这是一个示例文本。</p>
		
		
		<h2>缩略图</h2>
		<div class="row">
		    <div class="col-sm-6 col-md-3">
		        <a href="#" class="thumbnail">
		            <img src="./Public/Images/kittens.jpg"
		                 alt="通用的占位符缩略图">
		        </a>
		        <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="#" class="btn btn-primary" role="button">
	                      	  按钮
	                    </a> 
	                    <a href="#" class="btn btn-default" role="button">
	                        	按钮
	                    </a>
	                </p>
	            </div>
		    </div>
		    <div class="col-sm-6 col-md-3">
		        <a href="#" class="thumbnail">
		            <img src="./Public/Images/kittens.jpg"
		                 alt="通用的占位符缩略图">
		        </a>
		        <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="#" class="btn btn-primary" role="button">
	                      	  按钮
	                    </a> 
	                    <a href="#" class="btn btn-default" role="button">
	                        	按钮
	                    </a>
	                </p>
	            </div>
		    </div>
		    <div class="col-sm-6 col-md-3">
		        <a href="#" class="thumbnail">
		            <img src="./Public/Images/kittens.jpg"
		                 alt="通用的占位符缩略图">
		        </a>
		        <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="#" class="btn btn-primary" role="button">
	                      	  按钮
	                    </a> 
	                    <a href="#" class="btn btn-default" role="button">
	                        	按钮
	                    </a>
	                </p>
	            </div>
		    </div>
		    <div class="col-sm-6 col-md-3">
		        <a href="#" class="thumbnail">
		            <img src="./Public/Images/kittens.jpg"
		                 alt="通用的占位符缩略图">
		        </a>
		        <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="#" class="btn btn-primary" role="button">
	                      	  按钮
	                    </a> 
	                    <a href="#" class="btn btn-default" role="button">
	                        	按钮
	                    </a>
	                </p>
	            </div>
		    </div>
		</div>
		
		<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">
                &times;
            </button>
            	成功！很好地完成了提交。
        </div>
		
		<h2>带列表组的面板</h2>
		<div class="panel panel-success">
		    <div class="panel-heading">面板标题</div>
		    <div class="panel-body">
		        <p>这是一个基本的面板内容。这是一个基本的面板内容。
		            这是一个基本的面板内容。这是一个基本的面板内容。
		            这是一个基本的面板内容。这是一个基本的面板内容。
		            这是一个基本的面板内容。这是一个基本的面板内容。
		        </p>
		    </div>
		    <ul class="list-group">
		        <li class="list-group-item">免费域名注册</li>
		        <li class="list-group-item">免费 Window 空间托管</li>
		        <li class="list-group-item">图像的数量</li>
		        <li class="list-group-item">24*7 支持</li>
		        <li class="list-group-item">每年更新成本</li>
		    </ul>
		    <div class="panel-footer">面板脚注</div>
		</div>
		
		<h2>带表格的面板</h2>
		<div class="panel panel-default">
		    <div class="panel-heading">
		        <h3 class="panel-title">面板标题</h3>
		    </div>
		    <div class="panel-body">
		        这是一个基本的面板
		    </div>
		    <table class="table">
		        <th>产品</th><th>价格 </th>
		        <tr><td>产品 A</td><td>200</td></tr>
		        <tr><td>产品 B</td><td>400</td></tr>
		    </table>
		</div>
		<div class="panel panel-default">
		    <div class="panel-heading">面板标题</div>
		    <table class="table">
		        <th>产品</th><th>价格 </th>
		        <tr><td>产品 A</td><td>200</td></tr>
		        <tr><td>产品 B</td><td>400</td></tr>
		    </table>
		</div>
		
		<h2>Well 是一种会引起内容凹陷显示或插图效果的容器 </h2>
		<div class="well well-lg">您好，我在大的 Well 中！</div>
		<div class="well well-sm">您好，我在小的 Well 中！</div>


		<h2>创建模态框（Modal）</h2>
		<!-- 按钮触发模态框 -->
		<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">开始演示模态框</button>
		<!-- 模态框（Modal） -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title" id="myModalLabel">模态框（Modal）标题</h4>
		            </div>
		            <div class="modal-body">在这里添加一些文本</div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		                <button type="button" class="btn btn-primary">提交更改</button>
		            </div>
		        </div><!-- /.modal-content -->
		    </div><!-- /.modal -->
		</div>
		
		
		<h2>标签页</h2>
		<hr>
		<p class="active-tab"><strong>激活的标签页</strong>：<span></span></p>
		<p class="previous-tab"><strong>前一个激活的标签页</strong>：<span></span></p>
		<hr>
		<ul id="myTab" class="nav nav-tabs">
		    <li class="active">
		        <a href="#home" data-toggle="tab">
		            菜鸟教程
		        </a>
		    </li>
		    <li><a href="#svn" data-toggle="tab">iOS</a></li>
		    <li class="dropdown">
		        <a href="#" id="myTabDrop1" class="dropdown-toggle"
		           data-toggle="dropdown">Java
		            <b class="caret"></b>
		        </a>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
		            <li><a href="#jmeter" tabindex="-1" data-toggle="tab">jmeter</a></li>
		            <li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>
		        </ul>
		    </li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="home">.1111..</div>
			<div class="tab-pane fade" id="svn">..2222.</div>
			<div class="tab-pane fade" id="jmeter">.3333..</div>
			<div class="tab-pane fade" id="ejb">..4444.</div>
		</div>
		<script>
		    $(function(){
		        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		            // 获取已激活的标签页的名称
		            var activeTab = $(e.target).text();
		            // 获取前一个激活的标签页的名称
		            var previousTab = $(e.relatedTarget).text();
		            $(".active-tab span").html(activeTab);
		            $(".previous-tab span").html(previousTab);
		        });
		    });
		</script>
		
		
		<h2>警告框</h2>
		<div id="myAlert" class="alert alert-success">
		    <a href="#" class="close" data-dismiss="alert">&times;</a>
		    <strong>成功！</strong>结果是成功的。
		</div>
		 
		<script>
		$(function(){
		    $("#myAlert").bind('closed.bs.alert', function () {
		        alert("警告消息框被关闭。");
		    });
		});
		</script>
				
				
				
				
		<h2>轮播</h2>
		<div id="myCarousel" class="carousel slide">
		    <!-- 轮播（Carousel）指标 -->
		    <ol class="carousel-indicators">
		        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		        <li data-target="#myCarousel" data-slide-to="1"></li>
		        <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>   
		    <!-- 轮播（Carousel）项目 -->
		    <div class="carousel-inner">
		        <div class="item active">
		            <img src="./Public/Images/timg.jpg" alt="First slide">
		            <div class="carousel-caption">标题 1</div>
		        </div>
		        <div class="item">
		            <img src="./Public/Images/timg.jpg" alt="Second slide">
		        </div>
		        <div class="item">
		            <img src="./Public/Images/timg.jpg" alt="Third slide">
		        </div>
		    </div>
		    <!-- 轮播（Carousel）导航 -->
		    <a class="carousel-control left" href="#myCarousel" 
		        data-slide="prev">&lsaquo;
		    </a>
		    <a class="carousel-control right" href="#myCarousel" 
		        data-slide="next">&rsaquo;
		    </a>
		    <!-- 控制按钮 -->
		    <div style="text-align:center;">
		        <input type="button" class="btn start-slide" value="Start">
		        <input type="button" class="btn pause-slide" value="Pause">
		        <input type="button" class="btn prev-slide" value="Previous Slide">
		        <input type="button" class="btn next-slide" value="Next Slide">
		        <input type="button" class="btn slide-one" value="Slide 1">
		        <input type="button" class="btn slide-two" value="Slide 2">            
		        <input type="button" class="btn slide-three" value="Slide 3">
		    </div>
		</div>
		<script>
			$(function(){
				$('#identifier').carousel({
					interval: 1000
				});
		        // 初始化轮播
		        $(".start-slide").click(function(){
		            $("#myCarousel").carousel('cycle');
		        });


		        // 停止轮播
		        $(".pause-slide").click(function(){
		            $("#myCarousel").carousel('pause');
		        });
		        // 循环轮播到上一个项目
		        $(".prev-slide").click(function(){
		            $("#myCarousel").carousel('prev');
		        });
		        // 循环轮播到下一个项目
		        $(".next-slide").click(function(){
		            $("#myCarousel").carousel('next');
		        });
		        // 循环轮播到某个特定的帧 
		        $(".slide-one").click(function(){
		            $("#myCarousel").carousel(0);
		        });
		        $(".slide-two").click(function(){
		            $("#myCarousel").carousel(1);
		        });
		        $(".slide-three").click(function(){
		            $("#myCarousel").carousel(2);
		        });
		        /* $('#myCarousel').on('slide.bs.carousel', function () {
		            alert("当调用 slide 实例方法时立即触发该事件。");
		        }); */
		    });
		</script>
		
		
		<h2>滚动监听</h2>
		<div data-spy="scroll" data-target="#navbar-example" data-offset="0">  <!-- data-target的内容与导航nav的id对应 -->
			<h4 id="ios">iOS</h4>
			<p>id与导航中li下面的a的href对应</p>
			<h4 id="svn">SVN</h4>
			<p>111</p>
			<h4 id="jmeter">jMeter</h4>
			<p>333</p>
		</div>
		
		
		<h2>折叠</h2>
		<div class="panel-group" id="accordion">
		    <div class="panel panel-default">
		        <div class="panel-heading">
		            <h4 class="panel-title">
		                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">	<!-- data-toggle="collapse" 添加到您想要展开或折叠的组件的链接上。 -->
		                点击我进行展开，再次点击我进行折叠。第 1 部分
		                </a>
		            </h4>
		        </div>
		        <div id="collapseOne" class="panel-collapse collapse in">
		            <div class="panel-body">
		                1.data-toggle="collapse" 添加到您想要展开或折叠的组件的链接上。
						2.href 或 data-target 属性添加到父组件，它的值是子组件的 id。
						3.data-parent 属性把折叠面板（accordion）的 id 添加到要展开或折叠的组件的链接上。
		            </div>
		        </div>
		    </div>
		    <div class="panel panel-default">
		        <div class="panel-heading">
		            <h4 class="panel-title">
		                <a data-toggle="collapse" data-parent="#accordion" 
		                href="#collapseTwo">
		                点击我进行展开，再次点击我进行折叠。第 2 部分
		            </a>
		            </h4>
		        </div>
		        <div id="collapseTwo" class="panel-collapse collapse">
		        <div class="panel-body">
		            Nihil anim keffiyeh helvetica, craft beer labore wes anderson 
		            cred nesciunt sapiente ea proident. Ad vegan excepteur butcher 
		            vice lomo.
		        </div>
		        </div>
		    </div>
		</div>
		
		<h2>创建不带 accordion 标记的简单的可折叠组件（collapsible）</h2>
		<button type="button" class="btn btn-primary" data-toggle="collapse" 
		    data-target="#demo">
		    简单的可折叠组件
		</button>    
		<div id="demo" class="collapse in">
		    Nihil anim keffiyeh helvetica, craft beer labore wes anderson 
		    cred nesciunt sapiente ea proident. Ad vegan excepteur butcher 
		    vice lomo.
		</div>
		<script>
		/* $(function () { $('#collapseFour').collapse({
        toggle: false
		    })}); */
		    $(function () { $('#collapseOne').collapse('show')});
		    $(function () { $('#collapseTwo').collapse('toggle')});
		    //$(function () { $('#collapseOne').collapse('hide')});
		</script>
		
		
		
		<br>
	</div>
	<!-- 容器 结束！-->









    
  </body>
</html>