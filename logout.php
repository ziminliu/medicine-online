<?php
session_start();
session_destroy();
session_unset();
if(isset($_COOKIE["ID"])){          //判断cookie中是否保存session id
        setcookie("ID",'',time()-3600); //删除包含session id的cookie
        setcookie("NAME",'',time()-3600); //删除包含session id的cookie
    }
echo '<script>window.location.replace("login/index.php")</script>';
?>