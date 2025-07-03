<?php
include 'db_connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User deleted successfully'); window.location.href='cashier.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>


