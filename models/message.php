<?php
include_once '../models/database.php';
include_once '../models/Staff.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message
 *
 * @author mohamedsalah
 */

//$currentDateTime = date('Y-m-d');
//$currentDateTime2 = date('H:i:s');
//    echo $currentDateTime;
//    echo '<br>';
//    echo $currentDateTime2;
//    echo '<br>';
//    print time();
//    
//    date_default_timezone_set("Africa/Cairo");
//echo "The time is " . date("h:i:sa");
//echo '<br>';
// $DateTime = new DateTime();
// $DateTime->modify('-6 hours');
// echo $DateTime->format("H:i:s");

// $dat = new database();  
//       $c_date = new DateTime();
//       $c_date->modify('-1 day');
//       $date = $c_date->format('Y-m-d');
//        echo $date;
//       $query="SELECT user_id FROM guist WHERE checkoutdate = '$date'";
//       $result = $dat->query($query);
//       while ($row = $dat->query_associ($result)) {
//          $userid =  $row['user_id']; 
//          echo $userid;
//          
//       }
  
//                        $object = new database();
//   $c_date = new DateTime();
//      $c_date->modify('-1 day');
//       $date = $c_date->format('Y-m-d');
//       echo $date;
//       echo '<br>';
//    $query = "SELECT user_id FROM guist WHERE checkoutdate = '$date'";
//        
//        $result = $object->query($query);
//        while($row = $object->query_associ($result)){
//            $userid =  $row['user_id'];
//            echo $userid;
//            
//            $query = "SELECT room_id FROM userroom WHERE user_id = '$userid'";
//            
//        
//        $result = $object->query($query);
//             while($row = $object->query_associ($result)){
//                 $roomid =  $row['room_id'];
//                 echo $roomid;
//                 $query = "SELECT roomnum FROM room WHERE ID = '$roomid'";
//        
//        $result = $object->query($query);
//             while($row = $object->query_associ($result)){
//                 $roomnumber =  $row['roomnum'];
//                 echo $roomnumber;
//        }
//        
//             }
//             
//             }
    

//
//
// $object = new database();
//   $c_date = new DateTime();
//      $c_date->modify('-0 day');
//       $date = $c_date->format('Y-m-d');
//       echo $date;
//       echo '<br>';
//    
//    $query = "SELECT roomnum FROM room  JOIN userroom ON room.ID=userroom.room_id  JOIN guist ON userroom.user_id=guist.user_id  WHERE checkoutdate = '$date'";
//        
//        $result = $object->query($query);
//        while($row = $object->query_associ($result)){
//            $userid =  $row['roomnum'];
//            echo $userid;
//            //$array[] = $row;
//            
//}
//
//
//$array = array();
//
//
//$staff = new Staff();
//
//$all =  $staff->all();
//array_push ($array , $all); 
////$original_array = implode(", ", $array);
// 
//
//foreach ($array as $value) {
//   
//    echo $value;
//}
//
//$arr = array(1, 2, 3, 4);
//foreach ($arr as $value) {
//    $value = $value * 2;
//    echo $value;
//}
//

//$dat = new database();  
//       $c_date = new DateTime();
//       $c_date->modify('-0 day');
//       $date = $c_date->format('Y-m-d');
//        echo $date;

//$Time = new DateTime();
//       $result = $Time->modify('0 hours');
//      $t =  date_format($result,"H:i:s");
//      echo $t;


class message {
    
    public $ID;
    public $sender_id;
    public $receiver_id;
    public $content;
    public $date_id;
    public $state_id;
    public $time;
    
  
}