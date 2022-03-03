<?php
$myFile = $_POST["FolderName"];
//调用函数，传入路径
deleteDir($myFile);//调用删除方法
 
function deleteDir($dir)
{
    if (!$handle = @opendir($dir))//判断当前文件夹是否为根目录
    {
        return false;
    }
    while (false !== ($file = readdir($handle)))//循环遍历当前文件夹
    {
        if ($file !== "." && $file !== "..")
        {   //排除当前目录与父级目录
            $file = $dir . '/' . $file;
            if (is_dir($file))
            {
                deleteDir($file);//删除当前文件夹中的文件
            }
            else
            {
                @unlink($file);
            }
        }
    }
    @rmdir($dir);//删除文件夹
}
?>