<?php
        //bind to $x
        $mysqli = new mysqli('localhost', 'root', 'root', 'mytable');
        if ($stmt = $mysqli->prepare("SELECT x FROM data")) {
            $stmt->bind_result($x);
            $OK = $stmt->execute();
        }
        //put all of the resulting $x into a PHP array
        $result_array = Array();
        while($stmt->fetch()) {
            $result_array[] = $x;
        }
        //convert the PHP array into JSON format, so it works with javascript
        $json_array = json_encode($result_array);

        if ($stmt = $mysqli->prepare("SELECT data.y FROM data")) {
            $stmt->bind_result($y);
            $OK = $stmt->execute();
        }
        //put all of the resulting y into a PHP array
        $result_array = Array();
        while($stmt->fetch()) {
            $result_array[] = $y;
        }
        //convert the PHP array into JSON format, so it works with javascript
        $json_array2 = json_encode($result_array);  


    ?>  

    <script>
        var xv = <?php echo $json_array; ?>;
        var yv = <?php echo $json_array2; ?>;
        var storage = [];
        for(var i=0;i<100;i++)
        { 
            var x = xv[i];
            var y = yv[i];
            var json = {x: x, y: y};
            storage.push(json); 
        }