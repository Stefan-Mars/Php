<?php
function query(){
    $conn = mysqli_connect('localhost', 'root', '', 'dbs10041809');
    if(!$conn){
        die('Connection Failed' . mysqli_connect_error());
    }

    $result = mysqli_query($conn, 'SELECT * FROM `users`');

    $collection = [];
    if(mysqli_num_rows($result) > 0);{
        while($row=mysqli_fetch_assoc($result))
        {
            $collection[]=$row;
        }
    }
}
