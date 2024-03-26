
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





















































