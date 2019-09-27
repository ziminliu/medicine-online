<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登录</title>

<!-- Bootstrap -->
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
	.form-bg{
    background: #00b4ef;
}
.form-horizontal{
    background: #fff;
    padding-bottom: 40px;
    border-radius: 15px;
    text-align: center;
}
.form-horizontal .heading{
    display: block;
    font-size: 35px;
    font-weight: 700;
    padding: 35px 0;
    border-bottom: 1px solid #f0f0f0;
    margin-bottom: 30px;
}
.form-horizontal .form-group{
    padding: 0 40px;
    margin: 0 0 25px 0;
    position: relative;
}
.form-horizontal .form-control{
    background: #f0f0f0;
    border: none;
    border-radius: 20px;
    box-shadow: none;
    padding: 0 20px 0 45px;
    height: 40px;
    transition: all 0.3s ease 0s;
}
.form-horizontal .form-control:focus{
    background: #e0e0e0;
    box-shadow: none;
    outline: 0 none;
}
.form-horizontal .form-group i{
    position: absolute;
    top: 12px;
    left: 60px;
    font-size: 17px;
    color: #c8c8c8;
    transition : all 0.5s ease 0s;
}
.form-horizontal .form-control:focus + i{
    color: #00b4ef;
}
.form-horizontal .fa-question-circle{
    display: inline-block;
    position: absolute;
    top: 12px;
    right: 60px;
    font-size: 20px;
    color: #808080;
    transition: all 0.5s ease 0s;
}
.form-horizontal .fa-question-circle:hover{
    color: #000;
}
.form-horizontal .main-checkbox{
    float: left;
    width: 20px;
    height: 20px;
    background: #11a3fc;
    border-radius: 50%;
    position: relative;
    margin: 5px 0 0 5px;
    border: 1px solid #11a3fc;
}
.form-horizontal .main-checkbox label{
    width: 20px;
    height: 20px;
    position: absolute;
    top: 0;
    left: 0;
    cursor: pointer;
}
.form-horizontal .main-checkbox label:after{
    content: "";
    width: 10px;
    height: 5px;
    position: absolute;
    top: 5px;
    left: 4px;
    border: 3px solid #fff;
    border-top: none;
    border-right: none;
    background: transparent;
    opacity: 0;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
}
.form-horizontal .main-checkbox input[type=checkbox]{
    visibility: hidden;
}
.form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{
    opacity: 1;
}
.form-horizontal .text{
    float: left;
    margin-left: 7px;
    line-height: 20px;
    padding-top: 5px;
    text-transform: capitalize;
}
.form-horizontal .btn{
    float: right;
    font-size: 14px;
    color: #fff;
    background: #00b4ef;
    border-radius: 30px;
    padding: 10px 25px;
    border: none;
    text-transform: capitalize;
    transition: all 0.5s ease 0s;
}
@media only screen and (max-width: 479px){
    .form-horizontal .form-group{
        padding: 0 25px;
    }
    .form-horizontal .form-group i{
        left: 45px;
    }
    .form-horizontal .btn{
        padding: 10px 20px;
    }
}
	.cent{
		margin: 0px auto;
	}
	</style>
</head>
<body background="../home.jpg">
	<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <form class="form-horizontal" action="" method="post" id="form">
                <span class="heading">用户登录</span>
                <div class="form-group">
                    <input type="text" class="form-control" id="userID" name="userID" placeholder="用户名">
                    <i class="fa fa-user"></i>	
                </div>
                <div class="form-group help">
                    <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="密　码">
                    <i class="fa fa-lock"></i>
                    <a href="#" class="fa fa-question-circle"></a>
                </div>
                <div class="form-group">
                    <input type="text" class="text" style="color: red ;outline: none;border: none" id="prompt" value='<?php if($_GET["prompt"]=="wrong")
								    echo "账号或密码错误"; ?> '/>
                    <button type="submit" class="btn btn-default" id="submit" >登录</button>
                    <a href="../resign/resign.php" class="btn btn-default">注册</a>
                </div>
            </form>
        </div>
    </div>
</div>
	<!--<div class="cent">
	<div class="col-lg-2">
	<form action="check.php" method="post">
                <label for="userID">账号</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input id="userID" name="userID" class="form-control" placeholder="请输入账号" maxlength="20" type="text">
                </div>
                <label for="userPassword">密码</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input id="userPassword" name="userPassword" class="form-control" placeholder="请输入密码" maxlength="20" type="text">
            </div>
		<div>		
		    <input type="submit" value="登录" class="btn btn-info btn-lg">
		</div>
	</form>
	</div>
	</div>-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="../bootstrap/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="../bootstrap/js/bootstrap.js"></script>
<script>
var form=document.getElementById("form");
	var id=document.getElementById("userID");
	var pw=document.getElementById("userPassword");
	var submit=document.getElementById("submit");
	var prompt=document.getElementById("prompt");
	id.onchange=checkid;
	submit.onclick=checkid_pw;
	/*验证账号和密码不能为空及错误的情况*/
	if(getQueryVariable("prompt")=="wrong")
		prompt.value="账号或密码错误";
	function checkid()
	{
		if(isNaN(id.value))
			prompt.value="账号只能为数字";
		else
			prompt.value="";
	}
	
	function checkid_pw()
	{
		if(id.value==""&pw.value=="")
			prompt.value="账号和密码不能为空";
		else
			/*若账号密码正确，数据提交到check.php 界面*/
			form.action="check.php";
			
	}
	
	
	</script>
</body>
</html>
