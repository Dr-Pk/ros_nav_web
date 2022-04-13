<?php

$cmd ="sh test.sh";

function execInBackground($cmd) {
    global $result;
    if (substr(php_uname(), 0, 7) == "Windows"){
        pclose(popen("start /B ". $cmd, "r")); 
    }
    else {
	
        exec($cmd . " > /dev/null &");  
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