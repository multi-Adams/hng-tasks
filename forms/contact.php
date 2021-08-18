<?php
$q = $_REQUEST['q'];
$req = json_decode($q, true);
// $msg = [];
// $msg['name'] = $q['name'];
// $msg['email'] = $q['email'];
// $msg['subject'] = $q['subject'];
// $msg['msg'] = $q['message'];

// echo (json_encode($q));


// echo $msg;

// print_r($msg);



function send_to_db($data)
{


  $host = "localhost";
  $dbUser = "ade";
  $password = "ade123";
  $database = "msgs";




  $connection = new mysqli($host, $dbUser, $password, $database);

  if ($connection->connect_error) {
    die("Database Connection Error, Error No.: " . $connection->connect_errno . " | " . $connection->connect_error);
  }



  $name = $data['name'];
  $email = $data['email'];
  $subject = $data['subject'];
  $message = $data['message'];
  $product_query = $connection->prepare("CALL `send_to_db`('$name', '$email', '$subject', '$message')");
  $product_query->execute();
  echo 'done!';
}

send_to_db($req);



// print_r($req);
