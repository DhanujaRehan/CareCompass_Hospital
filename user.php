<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dname = $_POST["dname"];
    $demail = $_POST["demail"];
    $dpassword = $_POST["dpassword"];
    $drole = $_POST["department"];
    $type = $_POST["role"];

    $targetDir = "uploads/";
    $fileName = basename($_FILES["picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    if (!move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)) {
        die("File upload failed.");
    }

    $success1 = $success2 = true;

    if ($type == "Hospital_Staff") {
        $stmt1 = $conn->prepare("INSERT INTO userdoctor (name, email, password, department, picture) VALUES (?, ?, ?, ?, ?)");
        $stmt1->bind_param("sssss", $dname, $demail, $dpassword, $drole, $targetFilePath);
        $success1 = $stmt1->execute();
        $stmt1->close();
    }


    if ($type == "Administrator") {
        $stmt3 = $conn->prepare("INSERT INTO admin (name, email, password, department, pic) VALUES (?, ?, ?, ?, ?)");
        $stmt3->bind_param("sssss", $dname, $demail, $dpassword, $drole, $targetFilePath);
        $success3 = $stmt3->execute();
        $stmt3->close();
    }


    if ($type == "Hospital_Staff" || $type == "Administrator") {
        $stmt2 = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt2->bind_param("ssss", $dname, $demail, $dpassword, $type);
        $success2 = $stmt2->execute();
        $stmt2->close();
    }

    
    $conn->close();

    if ($success1 && $success2) {
        echo "<script>alert('Registration Successful!');window.location.href='user.html';</script>";
    } else {
        die("Error occurred during registration.");
    }
}
