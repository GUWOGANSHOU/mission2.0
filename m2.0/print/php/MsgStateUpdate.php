<?php 
/**

 * 接口名：MsgStateUpdate

 * 参数名：{WIDout_trade_no,State}单号，任务状态

 * 返回数据：{执行状态，ExectState }

 * 作用:通过一个或多个单号和状态代码来更新任务状态，当任务状态更改为3或4时删除对应的文件。

 */
include 'task.php';

$task = new Task();

$task = $task->select($_POST['WIDout_trade_no']);

$task->data['missionState'] = $_POST['State'];

if($task->update()){

    if($_POST['State']=="3" or  $_POST['State']=="4"){

        //echo("/Mission2.0/print/upload/".$task->data["missionPromulgatorId"]."/".$task->data["fileName"]);

        unlink("/www/wwwroot/Mission2.0/print/upload/".$task->data["missionPromulgatorId"]."/".$task->data["fileName"]);

    }
    echo json_encode("success");
}else{
    echo "error";
}
?>