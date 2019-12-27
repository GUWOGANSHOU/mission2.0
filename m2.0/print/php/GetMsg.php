<?php 

/**

 * 接口名：GetMsg

*参数名：AccepterId,Page,[PhoneNumber,PromulgateTIme(YYYY-MM-DD),MissionState]}

*接收者Id,{用户电话号码，任务发布时间，任务状态，当前页数}

*返回数据：[{用户账号PhoneNumber,时间PromulgateTIme(YYYY-MM-DD)，文件名FileName，需求字段MissionDetail，费用Reward，流水单号WIDout_trade_no ，任务状态MissionState}]

*/

include 'task.php';
$task = new Task();
if(!empty($_POST['WIDout_trade_no'])){
    $tasks = $task->select($_POST['WIDout_trade_no']);
    echo json_encode($tasks);
}else{
    $tasks = $task->select(
        $_POST['AccepterId'],$_POST['Page'],
        $_POST['PhoneNumber'],$_POST['PromulgateTime']
        ,$_POST['MissionState']);
        echo json_encode($tasks);
}


?>