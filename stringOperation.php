<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>String Operation</title>
</head>

<body>
    <?php
        $name = "";
        $nameError = "";
        $nameLength = $output = 0;
        $namePartOne = $namePartSecond = $reverseNamePartOne = $modifiedName = "";
        $modifiedNameArray = $newNameArray = $sortedNameArray = $removeElementArray = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if(empty($_POST['name'])) {
                $nameError = "Name Should not be null";
            }elseif (strlen($_POST['name']) % 2 != 0) {
                $name = $_POST['name'];
                $nameError = "Name Should be of even length yours is ".strlen($_POST['name']);
            }else {
                $name = $_POST['name'];
                $nameLength = strlen($name);
                $namePartOne = substr($name,0,$nameLength/2);
                $namePartSecond = substr($name,$nameLength/2);
                $reverseNamePartOne = strrev($namePartOne);
                $modifiedName = $reverseNamePartOne.$namePartSecond;
                $modifiedNameArray = str_split($modifiedName);
                $newNameArray = $modifiedNameArray;
                array_unshift($newNameArray,"Hey");
                $sortedNameArray = $newNameArray;
                rsort($sortedNameArray);
                $removeElementArray = $sortedNameArray;
                array_shift($removeElementArray);
                array_shift($removeElementArray);
                $output++;
            }
            
            
        }
    ?>
    <div class="borderDesign centerAlign ">
    <h1>String Operation</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label class="mg-2" for="name">Enter Name:</label><br>
        <input class="mg-2 inputField" type="text" name="name" value="<?php echo $name; ?>"><br>
        <span class="error"> <?php echo $nameError;?></span><br>
        <input class="mg-2 btn" type="submit" name="submit" value="Submit">
    </form>

    <?php

        if($output !== 0) {

        echo "Step 1: Dividing the String in Half<br>";
        echo "First Part: ".substr($name,0,$nameLength/2) ."<br>"; 
        echo "Second Part: ".$namePartSecond ."<br><br>"; 
        
        echo "Step 2: Reverse First Part <br>";
        echo "Reversed First Part: ".$reverseNamePartOne ."<br><br>"; 

        echo "Step 3: Same Second Part <br>";
        echo "Second Part: ".$namePartSecond ."<br><br>";

        echo "Step 4: Concat the String <br>";
        echo "Concat String: ".$modifiedName."<br><br>"; 

        echo "Step 5: Conversion of String to Array <br>";
        print_r($modifiedNameArray);
        echo "<br><br>";

        echo "Step 6: Counting Array <br>";
        echo "Array Count: ".count($modifiedNameArray)."<br><br>"; 

        echo "Step 7: Push new elemnt to Array <br>";
        print_r($newNameArray);
        echo "<br><br>";

        echo "Step 8: Sort Array in reverse order <br>";
        print_r($sortedNameArray);
        echo "<br><br>";

        echo "Step 9: Remove First 2 elements from Array <br>";
        print_r($removeElementArray);
        echo "<br><br>";

        echo "Step 10: Printing the Array <br>";
        echo "<pre>";
        print_r($removeElementArray);
        echo "</pre>";
        echo $name. $modifiedName;
        }
    ?>
    </div>
</body>

</html>