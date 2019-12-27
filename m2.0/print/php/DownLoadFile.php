<?php 
/**
 * 接口名：DownLoadFile
 * 参数名：{WIDout_trade_no}单号
 * 返回数据：{下载链接，DownLoadUrl}
 * 作用:通过一个或多个任务单号来获得一个或多个下载链接。
 */
include 'task.php';
$task = new Task();
$task = $task->select($_POST['WIDout_trade_no']);
if($task){
    echo "/Mission2.0/print/upload/".$task->data["missionPromulgatorId"]."/".$task->data["fileName"];
}else{
    echo "error";
}

?>