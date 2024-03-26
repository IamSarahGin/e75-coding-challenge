
<?php
session_start();

// Initialize voucher count if not set
if (!isset($_SESSION['voucher_count'])) {
    $_SESSION['voucher_count'] = 10;
}

// Initialize claimed names array if not set
if (!isset($_SESSION['claimed_names'])) {
    $_SESSION['claimed_names'] = array();
}

// Process voucher generation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'claim_again' button is clicked
    if(isset($_POST['claim_again'])){
        $_SESSION['voucher_generated'] = false;
        header("Location: index.php");
        exit();
    }

    // Check if 'reset_count' button is clicked
    if(isset($_POST['reset_count'])){
        // Reset the voucher count
        $_SESSION['voucher_count'] = 10;
        // Clear the claimed names array
        $_SESSION['claimed_names'] = array();
        $_SESSION['voucher_generated'] = false;
        header("Location: index.php");
        exit();
    }

    // Check if 'name' key is set in $_POST array
    if(isset($_POST['name'])){
        $name = $_POST['name'];

        // Check if the name has already claimed a voucher
        if (in_array($name, $_SESSION['claimed_names'])) {
            $_SESSION['voucher_generated'] = false;
            header("Location: index.php");
            exit();
        } else {
            // Generate voucher
            if ($_SESSION['voucher_count'] > 0) {
                $generated_number = rand(1000, 9999); // Generating a random 4-digit number for voucher
                $_SESSION['voucher_count'] -= 1; // Decrementing voucher count
                $_SESSION['claimed_names'][] = $name; // Add the claimed name to the array
                $_SESSION['generated_number'] = $generated_number;
                $_SESSION['voucher_generated'] = true;
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['voucher_generated'] = false;
                header("Location: index.php");
                exit();
            }
        }
    } else {
        // If 'name' key is not set, redirect to index.php
        header("Location: index.php");
        exit();
    }
}
?>































<!-- <?php
session_start();

// Check if the "Claim Again" button is clicked
if (isset($_POST['claim_again'])) {
    // Redirect back to index.php
    header("Location: index.php");
    exit();
}

// Check if the "Reset Count" button is clicked
if (isset($_POST['reset_count'])) {
    // Reset the voucher count
    $_SESSION['voucher_count'] = 10;
    // Clear the claimed names array
    $_SESSION['claimed_names'] = array();
    // Redirect back to index.php
    header("Location: index.php");
    exit();
}

// Generate voucher only if name is provided
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $voucher_generated = false;

    // Check if the name has already claimed a voucher
    if (in_array($name, $_SESSION['claimed_names'])) {
        // Redirect back to index.php without any prompt
        header("Location: index.php");
        exit();
    } else {
        // Generate voucher
        if ($_SESSION['voucher_count'] > 0) {
            $generated_number = rand(1000, 9999); // Generating a random 4-digit number for voucher
            $_SESSION['voucher_count'] -= 1; // Decrementing voucher count
            $_SESSION['claimed_names'][] = $name; // Add the claimed name to the array
            $voucher_generated = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mang Donaldbee Vouchers</title>
    <style>
        body {
            background-color: yellow; /* Yellow Green */
            text-align: center;
        }
        h1 {
            color: red;
            text-align: center;
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
    </style>
</head>
<body>
    <?php if ($voucher_generated): ?>
        <h1>Mang Donaldbee Vouchers</h1>
        <p>We're giving away vouchers as a token of appreciation for the first <?php echo $_SESSION['voucher_count']; ?> customers.</p>
        <p>50% Discount</p>
        <p><?php echo $generated_number; ?></p>
        <form action="index.php" method="post">
            <input type="submit" name="claim_again" value="Claim Again">
            <input type="submit" name="reset_count" value="Reset Count">
        </form>
    <?php endif; ?>
</body>
</html>
 -->
























