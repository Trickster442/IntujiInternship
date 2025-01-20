<?php declare(strict_types = 1);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        #String
        $name = "Sandip Magar" ;
        echo "$name";
        echo "<br>";
        var_dump( $name );
        echo "<br>";

        #Integer
        $age = 21;
        echo($age);
        echo "<br>";
        var_dump( $age );
        echo "<br>";


        #Boolean 
        $happy = true;
        echo $happy;
        echo "<br>";
        var_dump( $happy );
        echo "<br>";
        
        #float
        $ageMonth = 21.10;
        echo($ageMonth);
        echo "<br>";
        var_dump( $ageMonth );
        echo "<br>";

        #constant #dont use $ for declaring constant instead use const keyword or with pi
        #const pi = 3.14;
        define("pi", 3.149);
        echo pi;
        echo "<br>";


        #array type #use array keyword to create array
        $car = array("Volvo", "Swiss");
        echo $car[1];

        echo "<br>";

        #for each to print each value inn array
        foreach( $car as $k){
            echo $k ."<br>";
        }
        echo "<br>";
        #associate array #key value pair
        $my_results = array("software_design" => 67,"science"=> 90,"maths" => 99);
        echo $my_results["science"];
        echo "<br>";
        #multidimensional array #arrays inside array
        $many_arrays = array(1,2,3,4, array("a", "b", "c", "d"));
        echo $many_arrays[4][2];
        echo "<br>";


        //type casting
        $fromNum = 54;
        $toStr = (string) $fromNum;
        $toFloat = (float) $fromNum;
        // settype($fromNum, "string")
        var_dump($toStr);
        var_dump( $toFloat );

    ?>

</body>
</html>