<?php

$term = "gnome-terminal -- ";
$nom = $_POST["name"];
$cmd ="rosrun map_server map_saver -f ~/Desktop/projet/map/".$nom;

function execInBackground($cmd) {
    global $result;
    if (substr(php_uname(), 0, 7) == "Windows"){
        pclose(popen("start /B ". $cmd, "r")); 
    }
    else {
	
        exec($term . $cmd . " > /dev/null &");  
    }
}


execInBackground($cmd);


?>


<html>
<body onload="alert('success');">
</body>
</html>

<?php
header('Location: index.php');
?>