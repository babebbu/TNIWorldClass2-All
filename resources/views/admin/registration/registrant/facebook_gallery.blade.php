<?php
    $sakura = new mysqli("localhost", "sakura_ten", "Skr-10#TNI", "sakura_ten");
    $sakura->query('SET NAMES UTF8');
    $registrants = $sakura->query("SELECT 'id', 'profile_picture' FROM answer");
    var_dump($sakura);
    foreach($registrants->fetch_assoc() as $jubjub){
        echo "<img src='https://sakuracamptni.com/10/profilepic/$jubjub->profile_picture' style='width: 300px; height: 300px;'>";
    }
?>