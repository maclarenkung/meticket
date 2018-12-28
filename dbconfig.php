<?php

$host="localhost";
$user="root";
$password="";
$database="pj_036-052";

$conn=new mysqli($host,$user,$password,$database);

if(!$conn){
die('ไม่สามารถเชื่อมต่อ :'.mysqli_error($conn));    
}

$conn->query("set names uft8"); //ทำงานกับภาษาไทย



