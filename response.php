<?php

if (is_ajax()) {
  if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
    $action = $_POST["action"];
    switch($action) { //Switch case for value of action
      case "test": test_function(); break;
    }
  }
}
//Function to check if the request is an AJAX request
function is_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function test_function(){
  $return = $_POST;
  $myvar=$_POST['field'];
  //$myvar2=$_POST['userid'];
  
  if(is_numeric($myvar))
  {
    $conn=mysqli_connect("localhost","root","","wordpress");

    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }
    
    $query  = "SELECT * FROM api where userid='$myvar'";
    
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    $flag=0;
    $count  = mysqli_num_rows($result);
    if($count==0)
    {
    $flag=1;
    }
    
    
    $stack = array();
    
    $i=0;
    while ($row=mysqli_fetch_row($result))
    {
        while($i<10)
        {
            array_push($stack,$row[$i]);
            $i=$i+1;
        }
    }
    if($count!=0)
    {
    //print_r($stack);
    $return ["flag"]=$flag;
      $return["userid"] =$stack[0];
      $return["name"] =$stack[1];
      $return["phone"] =$stack[2];
      $return["email"] =$stack[3];
      $return["eid"] =$stack[4];
      $return["company"] =$stack[5];
      $return["salary"] =$stack[6];
      $return["location"] =$stack[7];
      $return["hometown"] =$stack[8];
      $return["degree"] =$stack[9];
      $return["json"] = $stack;
      echo json_encode($return);
    }
    else
    {
        $return ["flag"]=$flag;
        echo json_encode($return);
        
    }
  }
  else
  {
    $conn=mysqli_connect("localhost","root","","wordpress");

    if(!$conn)
    {
    die("Connection failed: " . mysqli_connect_error());
    }
    
    $query  = "SELECT * FROM api where name='$myvar'";
    
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    $flag=0;
    $count  = mysqli_num_rows($result);
    if($count==0)
    {
    $flag=1;
    }
    
    
    $stack = array();
    
    $i=0;
    while ($row=mysqli_fetch_row($result))
    {
        while($i<10)
        {
            array_push($stack,$row[$i]);
    
    $i=$i+1;
        }
    }
    
    if($count!=0)
    {
    //print_r($stack);
    $return ["flag"]=$flag;
      $return["userid"] =$stack[0];
      $return["name"] =$stack[1];
      $return["phone"] =$stack[2];
      $return["email"] =$stack[3];
      $return["eid"] =$stack[4];
      $return["company"] =$stack[5];
      $return["salary"] =$stack[6];
      $return["location"] =$stack[7];
      $return["hometown"] =$stack[8];
      $return["degree"] =$stack[9];
      //$return["email"] =$stack[0];
      //$return["email"] =$stack[0];
      $return["json"] = $stack;
      echo json_encode($return);
    }
    else
    {
        $return ["flag"]=$flag;
       
      echo json_encode($return);
    }
  }
}
