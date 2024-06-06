<?php
$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = isset($_POST['num1']) ? floatval($_POST['num1']) : 0;
    $num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
    $operation = $_POST['operation'];

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'subtract':
            $result = $num1 - $num2;
            break;
        case 'multiply':
            $result = $num1 * $num2;
            break;
        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = 'Division by zero error';
            }
            break;
        case 'exponent':
            $result = pow($num1, $num2);
            break;
        case 'percentage':
            $result = ($num1 / 100) * $num2;
            break;
        case 'sqrt':
            $result = 'First Number: ' . sqrt($num1) . ', Second Number: ' . sqrt($num2);
            break;
        case 'log':
            if ($num1 > 0 && $num2 > 0) {
                $result = 'First Number: ' . log($num1) . ', Second Number: ' . log($num2);
            } else {
                $result = 'Logarithm only defined for positive numbers';
            }
            break;
        default:
            $result = 'Invalid operation';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multipurpose Calculator Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h1>Multipurpose Calculator</h1>
        <form action="calc.php" method="post">
            <input type="number" name="num1" placeholder="Enter first number" required>
            <input type="number" name="num2" placeholder="Enter second number" required>
            <select name="operation" required>
                <option value="add">Addition</option>
                <option value="subtract">Subtraction</option>
                <option value="multiply">Multiplication</option>
                <option value="divide">Division</option>
                <option value="exponent">Exponentiation</option>
                <option value="percentage">Percentage</option>
                <option value="sqrt">Square Root</option>
                <option value="log">Logarithm</option>
            </select>
            <button type="submit">Calculate</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "<h2>Result: " . htmlspecialchars($result) . "</h2>";
        }
        ?>
    </div>
</body>
</html>
