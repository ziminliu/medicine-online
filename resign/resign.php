<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>企业创建</title>
<script src="https://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<style>
@charset "utf-8";
	/* track base Css */
</style>
</head>
<body background="../home.jpg">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <form  action="../login/creatZUser.php" class="" method="post" id="formId">
			<div class="form-group has-feedback">
                <label for="userID">企业ID</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input id="userID" name="userID" class="form-control " placeholder="请输入企业ID" maxlength="20" type="text" data-container="body" data-toggle="popover" data-placement="right" 	data-content="只能包含数字">
                </div>
            </div>
			
            <div class="form-group has-feedback">
                <label for="password">密码</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input id="password" name="password" class="form-control " placeholder="请输入密码" maxlength="20" type="password" data-container="body" data-toggle="popover" data-placement="right" 	data-content="密码不能为空">
                </div>
            </div>

			
			
            <div class="form-group has-feedback">
                <label for="userName">企业名称</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input id="userName" name="userName" class="form-control "  placeholder="请输入企业名" maxlength="20" type="text" data-container="body" data-toggle="popover" data-placement="right" 	data-content="名称不能为空">
                </div>

            </div>
			
            <div class="form-group has-feedback">
                <label for="phoneNum">手机号码</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                    <input id="phoneNum" name="phoneNum" class="form-control " placeholder="请输入手机号码" maxlength="11" type="text" data-container="body" data-toggle="popover" data-placement="right" 	data-content="请输入11位的手机号码">
                </div>
            </div>
			
            <div class="form-group has-feedback">
                <label for="userOwner">企业法人</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input id="userOwner" name="userOwner" class="form-control " placeholder="请输入企业法人" maxlength="20" type="text" data-container="body" data-toggle="popover" data-placement="right" 	data-content="法人不能为空">
                </div>

            </div>
			
			
            <div class="form-group has-feedback">
                <label for="userEmail">企业邮箱</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input id="userEmail" name="userEmail" class="form-control" placeholder="请输入企业邮箱" maxlength="20" type="email" data-container="body" data-toggle="popover" data-placement="right" 	data-content="邮箱不能为空">
                </div>

            </div>
			
            <div class="form-group">
                <input class="form-control btn btn-primary" id="submit0" formaction="../login/creatTUser.php" formmethod="post" value="注&nbsp;&nbsp;测&nbsp;&nbsp;投&nbsp;&nbsp;标&nbsp;&nbsp;企&nbsp;&nbsp;业" type="submit" >
            </div>
            <div class="form-group">
                <input class="form-control btn btn-primary" id="submit1"  value="注&nbsp;&nbsp;测&nbsp;&nbsp;招&nbsp;&nbsp;标&nbsp;&nbsp;企&nbsp;&nbsp;业" type="submit" >
            </div>
            <div class="form-group">
                <input value="重置" id="reset" class="form-control btn btn-danger" type="reset">
            </div>
        </form>
    </div>
</div>

<script>
	
	var id=document.getElementById("userID");
	var pw=document.getElementById("password");
	var na=document.getElementById("userName");
	var tel=document.getElementById("phoneNum");
	var owner=document.getElementById("userOwner");
	var uemail=document.getElementById("userEmail");
	/*
	var sub0=document.getElementById("submit0");
	var sub1=document.getElementById("submit1");
	sub0.onmouseover=checka;
	function checka()
	{
	var form = document.getElementById(formId);    
    var elements = new Array();    
    var tagElements = form.getElementsByTagName('input');    
    for (var j = 0; j < tagElements.length; j++){  
         elements.push(tagElements[j]);  
  
    }  
		
	for(var i=0;i<elements.length;i++)
		{
			if(element[i].value=="")
			{
				document.getElementById("submit0").disabled=true
				return;
			}
		}
		$("#submit0").removeAttr("disabled");
	}*/
	
	
	tel.onblur=checktel;
	owner.onblur=checkow;
	na.onblur=checkna;
	pw.onblur=checkpw;
	uemail.onblur=checkem;
/*$(function () { 
	$("[data-toggle='popover1']").popover();
	$("[data-toggle='popover1']").popover();
});*/
	id.onblur=checkid;
	owner.onblur=checkow;
	
	
	function checkid()
	{
		if(isNaN(id.value))
			{
				$(function () { $('#userID').popover('show');});
			}
		else
				$(function () { $('#userID').popover('hide');});
	}
	
	
	/*验证企业名不能为空*/
	function checkna(){
		if(na.value=="")
				$(function () { $('#userName').popover('show');});
		else
				$(function () { $('#userName').popover('hide');});
	}
	
	
	/*验证密码不能为空*/
	function checkpw(){
		if(pw.value=="")
				$(function () { $('#password').popover('show');});
		else
				$(function () { $('#password').popover('hide');});
	}
	
	/*验证法人不能为空*/
	function checkow(){
		if(owner.value=="")
				$(function () { $('#userOwner').popover('show');});
		else
				$(function () { $('#userOwner').popover('hide');});
	}
	
	/*验证电话号码的合法性*/
	function checktel()
	{
		if(tel.value=="")
		{
		$(function () { $('#phoneNum').popover('show');});
		}
		if(isNaN(id.value))
		{
		$(function () { $('#phoneNum').popover('show');});
		}
		else
			$(function () { $('#phoneNum').popover('hide');});	
	}
	
	
	/*验证法人不能为空*/
	function checkem(){
		if(uemail.value=="")
				$(function () { $('#userEmail').popover('show');});
		else
				$(function () { $('#userEmail').popover('hide');});
	}
	/*
//校验成功函数
function success(Obj, counter) {
    Obj.parent().parent().removeClass('has-error').addClass('has-success');
    $('.tips').eq(counter).hide();
    $('.glyphicon-ok').eq(counter).show();
    $('.glyphicon-remove').eq(counter).hide();
    check[counter] = true;

}

// 校验失败函数
function fail(Obj, counter, msg) {
    Obj.parent().parent().removeClass('has-success').addClass('has-error');
    $('.glyphicon-remove').eq(counter).show();
    $('.glyphicon-ok').eq(counter).hide();
    $('.tips').eq(counter).text(msg).show();
    check[counter] = false;
}

// 手机号码
var regPhoneNum = /^[0-9]{11}$/
$('.container').find('input').eq(4).change(function() {
    if (regPhoneNum.test($(this).val())) {
        success($(this), 4);
    } else {
        fail($(this), 4, '手机号码只能为11位数字');
    }
});
*/
</script>

</body>
</html>
