<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
     include_once 'event_info_db.php';
     include_once 'global_database.php';
    
 $database = new Database();
    $db = $database->getConnection();
    $item = new Data($db);
    
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
 
    $item->getSingleData();
    if($item->title != null){
        // create array
        $emp_arr = array(
            "id" =>  $item->id,
            "title" => $item->title,
            "details" => $item->details,
            "image" => $item->image,
            "status" => $item->status
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      else{
    echo http_response_code(404);
        echo json_encode("data not found.");
    }
?>
     