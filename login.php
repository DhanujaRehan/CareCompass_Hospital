<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = strtolower(trim($_POST["email"] ?? ''));
    $password = trim($_POST["password"] ?? '');
    $role = trim($_POST["role"] ?? '');

    if (!$email || !$password || !$role) {
        die("All fields are required.");
    }

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE LOWER(email) = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id, $db_password, $db_role);
    $stmt->fetch();
    $stmt->close();

    if (!$user_id)
        die("Email is not registered.");
    if ($password !== $db_password) {
        echo "<script>alert('Wrong Password!'); window.location.href='login.html';</script>";

    }
    if ($role !== $db_role)
        die("Role is incorrect.");

    $_SESSION = ["email" => $email, "role" => $role, "user_id" => $user_id];

    $stmt = $conn->prepare("SELECT id FROM users WHERE LOWER(email) = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($doctor_id);
    if ($stmt->fetch())
        $_SESSION["doctor_id"] = $doctor_id;
    $stmt->close();

    if ($role === "patient") {
        echo "<script>alert('Login successful!'); window.location.href='profile.html';</script>";
    } elseif ($role === "administrator") {
        echo "<script>alert('Login successful!'); window.location.href='cashier.php';</script>";
    } elseif (isset($_SESSION["doctor_id"])) {
        echo "<script>alert('Login successful!'); window.location.href='Dinterface.php';</script>";
    } else {
        echo "<script>alert('Login unsuccessful!'); window.location.href='login.html';</script>";
    }
    exit();
}

$conn->close();
?>