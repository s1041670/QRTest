<?php
 
//$_FILES['字段名']['name'] 客户端文件的原名称。
//$_FILES['字段名']['type'] 文件的 MIME 类型，需要浏览器提供该信息的支持，例如"image/gif"。
//$_FILES['字段名']['size'] 已上传文件的大小，单位为字节。
//$_FILES['字段名']['tmp_name'] 文件被上传后在服务端储存的临时文件名，一般是系统默认。可以在php.ini的upload_tmp_dir 指定，但 用 putenv() 函数设置是不起作用的。
//$_FILES['字段名']['error'] 和该文件上传相关的错误代码。['error'] 是在 PHP 4.2.0 版本中增加的。下面是它的说明：(它们在PHP3.0以后成了常量)
 
 
$folder=$_POST["folder"];//根据表单字段接收文件夹的字符串信息
$fileName =$_FILES["file"]["name"];//根据表单字段接收需要保存的文件名字
$tmp=$_FILES["file"]["tmp_name"];
$fil=$folder.$fileName;
 
 
//下面这一段代码保存数据信息到文本，用来测试提交的字符串信息
$file=fopen("test.txt","a+");
fwrite($file,$folder."+");
fwrite($file,$fileName."+");
fwrite($file,$fil);
fclose($file);
 
    // 判断当期目录下的 upload 目录是否存在该文件
    if (!file_exists($fil))
    {
        // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
        move_uploaded_file($_FILES["file"]["tmp_name"], $fil);
    }
?>