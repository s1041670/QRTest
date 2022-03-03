<?php
$myFile = $_POST["FolderName"];//获取要创建的文件夹名字
 //文件存储路径
 if(!file_exists($myFile))//判断文件夹是否存在
     mkdir($myFile,0777);//创建文件夹，并指定权限为0777才可以上传文件保存进去
?>