<?php
include('config.php');
$item = json_encode(array
    (array('id'=>1, 'color'=>'1e90ff','text'=> 'Low1 Priority'),
    array('id'=>2, 'color'=> 'green', 'text'=>'High2 Priority'),
     array('id'=>4, 'color'=> 'red', 'text'=>'module'),
   array('id'=>3, 'color'=> 'orange', 'text'=>'Medium3 Priority'),
));
$sql = "SELECT * from resource";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $data[] = array('id' =>$row["id"],'text'=>$row['text'],'startDate'=>date('D M d Y G:i:s', strtotime($row['startDate'])),'endDate'=>date('D M d Y G:i:s', strtotime($row['endDate'])),'priority'=>$row['priority'],
           'description'=>$row['description']
       );  
    }
}
 $data = json_encode($data); 
$conn->close();