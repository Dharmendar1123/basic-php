<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Calculator</title>
</head>

<body>
    <?php
    $operation = "";
    $operationError = "";
    $op = "";
    $arr = [];
    $output = $displayOutput = 0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $operation = $_POST["operationValue"];
        if (empty($operation)) {
            $operationError = "Input Field should not be Null";
        } else {
            for ($i = 0; $i < strlen($operation); ++$i) {
                if ($operation[$i] === "+") {
                    $op = "+";
                    // break;
                } elseif ($operation[$i] === "-") {
                    $op = "-";
                    // break;
                } elseif ($operation[$i] === "*") {
                    $op = "*";
                    // break;
                } elseif ($operation[$i] === "/") {
                    $op = "/";
                    // break;
                } else {
                    continue;
                }
            }

            if(empty($op)) {
                $operationError = "Invalid Operation";
            }else {
                $arr = explode($op, $operation);
            // }

            if (preg_match("/[a-zA-Z]/", $operation)) {
                $operationError = "Input Should be Integer";
            } else {
                $arr[0] = (float)$arr[0];
                $arr[1] = (float)$arr[1];

                switch ($op) {
                    case "+":
                        $output = $arr[0] + $arr[1];
                        $displayOutput++;
                        break;
                    case "-":
                        $output = $arr[0] - $arr[1];
                        $displayOutput++;
                        break;
                    case "*":
                        $output = $arr[0] * $arr[1];
                        $displayOutput++;
                        break;
                    case "/":
                        if ($arr[1] === 0) {
                            $operationError = "Divisor Should not be 0";
                        } else {
                            $output = $arr[0] / $arr[1];
                            $output =  round($output,2);
                            $displayOutput++;
                        }
                        break;
                    default:
                        $operationError = "Operator not allowed";
                }
            }
        }
        }
    }
    ?>
    <div class="borderDesign">
        <div class="centerAlign">
            <h1>Calculator</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label class="mg-2" for="operationValue">Enter Operation:</label><br>
                <input class="mg-2 inputField" type="text" name="operationValue" value="<?php echo $operation; ?>"><br>
                <span class="error"> <?php echo $operationError; ?></span><br>
                <input class="mg-2 btn" type="submit" name="submit" value="Submit">
            </form>
        </div>
        <?php
        // echo $operation;
        if ($displayOutput != 0) {
        echo "<h1 class='centerAlign'>" . "Output" . "</h1>";
        echo "<h3 class='centerAlign'>" . $output . "</h3>";
        }
        ?>
    </div>
</body>

</html>