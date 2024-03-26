<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mang Donaldbee Voucher</title>
    <style>
        body {
            background-color: yellow; /* Yellow Green */
            text-align: center;
        }
        h1 {
            color: red;
        }
        form {
            display: inline-block;
            text-align: left;
            padding: 20px;
          
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: red;
            color: yellow;
            padding: 10px 20px;
            border: 1px solid black;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Mang Donaldbee Vouchers!</h1>
    <p>We're giving away <b>vouchers</b> <br>as a token of appreciation <br>for the first <b><?php echo $_SESSION['voucher_count']; ?></b> customers.</p>
    
    <?php if(isset($_SESSION['voucher_generated']) && $_SESSION['voucher_generated']): ?>
        <p>50% Discount</p>
        <p><?php echo $_SESSION['generated_number']; ?></p>
        <form action="process.php" method="post">
            <input type="submit" name="claim_again" value="Claim Again">
            <input type="submit" name="reset_count" value="Reset Count">
        </form>
    <?php else: ?>
        <form method="post" action="process.php">
            <label className="text-danger "for="name">Your name please:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>
</body>
</html>


























































<!-- <?php
session_start();

// Initialize voucher count if not set
if (!isset($_SESSION['voucher_count'])) {
    $_SESSION['voucher_count'] = 10;
}

// Initialize claimed names array if not set
if (!isset($_SESSION['claimed_names'])) {
    $_SESSION['claimed_names'] = array();
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'name' key is set in $_POST array
    if(isset($_POST['name'])){
        $name = $_POST['name'];

        // Check if the name has already claimed a voucher
        if (in_array($name, $_SESSION['claimed_names'])) {
            echo "<script>alert('This name has already claimed a voucher. Please try with a different name.');</script>";
        } else {
            // Redirect to process.php with the entered name
            header("Location: process.php?name=" . urlencode($name));
            exit();
        }
    } else {
        // If 'name' key is not set, display a message or handle the situation accordingly
        echo "<script>alert('Please enter a name.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mang Donaldbee Voucher</title>
    <style>
        body {
            background-color: yellow; /* Yellow Green */
            text-align: center;
        }
        h1 {
            color: red;
        }
        form {
            display: inline-block;
            text-align: left;
            padding: 20px;
          
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: red;
            color: yellow;
            padding: 10px 20px;
            border: 1px solid black;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Mang Donaldbee Vouchers!</h1>
    <p>We're giving away vouchers as a token of appreciation 
        <br>for the first <?php echo $_SESSION['voucher_count']; ?> customers.</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Your name please:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html> -->












































