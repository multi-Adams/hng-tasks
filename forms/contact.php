<?php
$q = $_REQUEST['q'];
$req = json_decode($q, true);

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
