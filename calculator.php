<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <h2>Calculator</h2>
    <form action="" method="POST">
        <label for="number1">Eerste getal:</label><br>
        <input type="text" id="number1" name="number1" value="<?php echo isset($_POST['number1']) ? $_POST['number1'] : ''; ?>" required><br><br>
        
        <label for="operation">operation:</label><br>
        <select id="operation" name="operation" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select><br><br>
        
        <label for="number2">Tweede getal:</label><br>
        <input type="text" id="number2" name="number2" value="<?php echo isset($_POST['number2']) ? $_POST['number2'] : ''; ?>" required><br><br>
        
        <input type="submit" value="Bereken">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $operation = $_POST['operation'];
        
        if (!is_numeric($number1)) {
            echo "<p style='color: red;'>Number 1 is not a number!</p>";
        }
        
        if (!is_numeric($number2)) {
            echo "<p style='color: red;'>Number 2 is not a number!</p>";
        }
        
        if ($operation == '/' && $number2 == 0) {
            echo "<p style='color: red;'>Division by zero is not allowed!</p>";
        }
        
        if ($operation == '%' && $number2 == 0) {
            echo "<p style='color: red;'>The value of number 2 cannot be 0 in the modulo operation!</p>";
        }
        
        if (is_numeric($number1) && is_numeric($number2) && $operation != '/' && !($operation == '%' && $number2 == 0)) {
            switch ($operation) {
                case '+':
                    $result = $number1 + $number2;
                    break;
                case '-':
                    $result = $number1 - $number2;
                    break;
                case '*':
                    $result = $number1 * $number2;
                    break;
                case '/':
                    $result = $number1 / $number2;
                    break;
                case '%':
                    $result = fmod($number1, $number2);
                    break;
            }
            
            echo "<h3>Results:</h3>";
            echo "<p>$number1 $operation $number2 = $result</p>";
        }
    }
    ?>
</body>
</html>
