<?php
/**
 * Created by PhpStorm.
 * User: 18030585
 * Date: 2020/03/18
 * Time: 15:31
 */
/*
 * 文件上传
 * $fileName 表单名称
 * $filePath 上传路径
 * $fileSize 允许上传文件大小
 * $fileType 允许上传文件类型
 * */

function file_up($fileName, $filePath, $fileSize=8192000, $fileType=['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif']){

//    if($dates){
//
//        $path = $filePath.date('Ymd').'/';
//        if(!file_exists($path)){
//
//            mkdir($path);
//
//        }
//        $filePath = $path;
//        $realPath = date('Ymd').'/';
//
//    }

    $name = $_FILES[$fileName]['name']; //上传文件原名, 必须改名
    $type = $_FILES[$fileName]['type']; //上传文件类型, 根据类型约束用户上传合法的东东
    $size = $_FILES[$fileName]['size']; //上传文件大小, 根据大小约束用户上传文件
    $tmp_name = $_FILES[$fileName]['tmp_name']; //上传文件在服务器上的临时位置
    $error = $_FILES[$fileName]['error']; //上传文件时出现的错误

    if($error){

        die('<script>alert("上传文件有问题"); history.back();</script>');

    }
    //判断类型
    if(!in_array($type, $fileType)){

        die('<script>alert("上传文件类型有问题"); history.back();</script>');

    }
    //文件大小
    if($size > $fileSize) {

        die('<script>alert("上传文件过大"); history.back();</script>');

    }

    $tmp_arr = pathinfo($name);
    $new_name = date('YmdHis').mt_rand().'.'.$tmp_arr['extension'];
    if(file_exists($filePath.$new_name)){

        die('<script>alert("上传文件重名"); history.back();</script>');

    }

    if(!file_exists($filePath)){
        mkdir($filePath);
    }

    move_uploaded_file($tmp_name, $filePath.$new_name);

//    if($dates){
//
//        return $realPath.$new_name;
//
//    }
    return $new_name;

}