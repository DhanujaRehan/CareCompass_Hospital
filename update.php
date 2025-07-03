<?php
include 'db_connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('User updated successfully'); window.location.href='cashier.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>

<h2>Update User</h2>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>

</body>
</html>