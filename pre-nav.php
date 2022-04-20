
<html>
    <body>
        <form method="post" action="list.php">
            <label for="map">Map Selection:</label>
            <select name="map" id="map">
	        <?php
                $fileList = glob('map/*.yaml');
                foreach($fileList as $filename){
                    if(is_file($filename)){
                        echo "<option value='$filename'> $filename </option>"; 
                    }   
                }
            ?>  
	    <input type="submit" value="OK">  
            </select>
        </form>
    
    
    </body>
</html>
