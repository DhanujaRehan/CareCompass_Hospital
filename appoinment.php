<?php

include "db_connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $dob = $_POST["dob"];
    $doctor = $_POST["doctor"];
    $alergics = $_POST["alergics"];
    $date = $_POST["date"];
    $time = $_POST["time"];


    $sql = "INSERT INTO appoinment (name, email, number,dateofbirth,doctor,alergics,date, time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $email, $number, $dob, $doctor, $alergics, $date, $time);
    if ($stmt->execute()) {
        echo "<script>alert('Appoinment successful!'); window.location.href='apoinment.html';</script>";
    } else {
        echo "<script>alert('Appoinment unsuccessful!'); window.location.href='apoinment.html';</script>" . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}

?>