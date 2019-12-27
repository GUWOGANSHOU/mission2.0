<?php 

include '/www/wwwroot/Mission2.0/PHPAPI/dbconnect.php';



class Task{

    var $data;

    function __construct($arr = null){

        $this->data=array("missionTitle"=>"0",

        "missionDescribe"=>"0",

        "missionReward"=>"0",

        "missionPromulgatorTime"=>"0",

        "missionPromulgatorId"=>"0",

        "missionPos"=>"0",

        "wIDout_trade_no"=>"0",

        "missionTimeDemand"=>"0",

        "missionAccepterId"=>"0",

        "missionState"=>"0",

		"missionMsgId"=>"0",				  
						  
        "fileName"=>"0");

        if ($arr){

            foreach($this->data as $key=>$value){

                $this->data[$key] = $arr[$key];

            }

        }

    }



    function insert() {

        $sql="insert into MissionMsg(";

        foreach($this->data as $key=>$value){

            $sql= $sql . $key . ",";

        }

        $sql = substr($sql,0,-1);

        $sql = $sql . ") values(";

        foreach($this->data as $key=>$value){

            $sql= $sql ."'".$value."'" . ",";

        }

        $sql = substr($sql,0,-1);

        $sql = $sql . ")";

        

        if (mysql_query($sql) ){

            return 0;

            // die('Error: ' . mysql_error());

        }else{

            return 1;

        }

        //         $sql="insert into MissionMsg(MissionTitle,MissionDescribe,MissionReward,

// MissionPromulgatorTime,MissionPromulgatorId,MissionPos,WIDout_trade_no,

// MissionTimeDemand,MissionAccepterId)

// values('$Title','$Detail','$Reward','$PayTime','$UserId','$Pos',

// '$WIDout_trade_no','$MissionTimeDemand','$MissionAccepterId')";

    }

    

    function update(){

        $sql= "UPDATE MissionMsg SET ";

        foreach($this->data as $key=>$value){

            if($key!="wIDout_trade_no"){

                $sql= $sql . $key ."="."'".$value."',";

            }

        }

        $sql = substr($sql,0,-1);

        $sql = $sql . " WHERE wIDout_trade_no = '".$this->data['wIDout_trade_no']."'";

        if (mysql_query($sql)>0){return true;}

        else{return false;}

    }



    function delete(){

        $sql= "DELETE FROM MissionMsg

        WHERE wIDout_trade_no='".$this->data['wIDout_trade_no']."'";

        if (mysql_query($sql)>0){return true;}

        else{return false;}

    }





    static function select($AccepterId,$Page=null,$PhoneNumber=NULL,$PromulgateTIme=NULL,$MissionState=NULL){

        $task = new Task();


        $sql = "SELECT ";

        foreach($task->data as $key=>$value){

            $sql= $sql . $key . ",";

        }

        $sql = substr($sql,0,-1);

        if($Page){

            $sql = $sql." FROM MissionMsg WHERE MissionAccepterId='$AccepterId'";

            if($PhoneNumber!=""){

                $sql = $sql." AND missionPromulgatorId='$PhoneNumber'";

            }

            if($PromulgateTIme!=""){

                $sql = $sql." AND missionPromulgatorTIme like '$PromulgateTIme%'";

            }

            if($MissionState!=""){

                $sql = $sql." AND missionState='$MissionState'";

            }

            $sql = $sql . " AND missionTitle='打印任务' AND missionState!=4  ORDER BY MissionMsgId DESC";

            $Page= ($Page-1)*10;

            $sql = $sql . " LIMIT $Page,20";


            $result = mysql_query($sql)or die(mysql_error());



            $i = 0;

            $tasks = array();

            while($row = mysql_fetch_assoc($result)){

              // $tasks[$i] = new Task($row);

                //$i++;
				
				$data[]=$row;

            }

            return $data;

        }else{

            return $task->select2($AccepterId,$sql);

        }

    }



    static function select2($WIDout_trade_no,$sql){

        $sql = $sql." FROM MissionMsg WHERE WIDout_trade_no='$WIDout_trade_no'";

        $result = mysql_query($sql) or die(mysql_error());

        if($row = mysql_fetch_array($result)){

            return new Task($row);

        }else{

            return null;

        }

		
//            while($row = mysql_fetch_assoc($result)){
//
//               // $tasks[$i] = new Task($row);
//
//                //$i++;
//				
//				$data[]=$row;
//
//            }
//
//            return $data;
		
    }


}

?>