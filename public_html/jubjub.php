<?php
    $sakura = new mysqli("localhost", "sakura_ten", "Skr-10#TNI", "sakura_ten");
    $sakura->query('SET NAMES UTF8');
    $registrants = $sakura->query("SELECT id, profile_picture FROM answer");
    
    while($jubjub = $registrants->fetch_assoc()){
        echo "<img onclick='alert(\"".$jubjub['id']."\")' src='https://sakuracamptni.com/10/profilepic/".$jubjub['profile_picture']."' style='width: 280px; height: auto;'>";
    }
?>
