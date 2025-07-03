<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION["email"])) {
    header("Location: login.html");
    exit();
}

$doctor_email = $_SESSION["email"];

$sql = "SELECT name, department,picture FROM userdoctor WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $doctor_email);
$stmt->execute();
$result = $stmt->get_result();
$doctor = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Compass Hospital</title>
    <link rel="icon" href="images/logoc.ico">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="Dinterface.css">
</head>

<body>
    <header>
        <div class="logo"><img src="images/CC.png" alt=""></div>
        <nav class="navbar">
            <a href="index.html"><i class="fas fa-home"></i> Home</a>
        </nav>

        <div class="right-icons">
            <a href="login.html">
                <div class="btn" id="lg">Log Out</div>
            </a>
        </div>
    </header>

    <section class="head1">
        <h1>Doctor Portal</h1>

        <div class="hd">
            <div class="dcard">
                <?php
                if (!empty($doctor['picture'])) {
                    echo "<img src='" . htmlspecialchars($doctor['picture']) . "' alt='Doctor Picture'>";                   
                } else {
                    echo "No picture available";
                }
                ?>
            </div>
            <h2>Name : Dr.<?php echo htmlspecialchars($doctor['name']); ?></h2>
            <h3>Department : <?php echo htmlspecialchars($doctor['department']); ?></h3>
        </div>
    </section>

    <section class="cards">
        <div class="staff-interface2">
            <img src="images/bluelogo.png" alt="" class="img2">
        </div>
        <div class="carddiv">
            <div class="card">
                <h3>Total Patients</h3>
                <p>120</p>
            </div>
            <div class="card">
                <h3>Today's Appointments</h3>
                <p>15</p>
            </div>
            <div class="card">
                <h3>Messages</h3>
                <p>5 New</p>
            </div>
        </div>
    </section>

    <section class="sup">
        <section id="patients" class="hidden">
            <h2>Patients Details</h2>
            <div class="patient-search">
                <input type="text" id="search-bar" placeholder="Search patient by name...">
                <button id="search-btn">Search</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Condition</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bimantha Perera</td>
                        <td>21</td>
                        <td>Diabetes</td>
                        <td><button class="view-details">View Details</button></td>
                    </tr>
                    <tr>
                        <td>Jimuth Gomez</td>
                        <td>25</td>
                        <td>Hypertension</td>
                        <td><button class="view-details">View Details</button></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section id="appointments" class="hidden">
            <h2>Appointments</h2>
            <div class="appointments-list">
                <div class="appointment-item">
                    <p><strong>Patient:</strong>Nethmi Punchihewa</p>
                    <p><strong>Time:</strong> 10:00 AM</p>
                    <button class="mark-done">Mark as Done</button>
                    <button class="mark-admit">Admite Patient</button>
                </div>
                <div class="appointment-item">
                    <p><strong>Patient:</strong>Manaw Candappa</p>
                    <p><strong>Time:</strong> 11:00 AM</p>
                    <button class="mark-done">Mark as Done</button>
                    <button class="mark-admit">Admite Patient</button>
                </div>
            </div>
        </section>
    </section>

    <div class="popup">
        <h2>Patient Admitted</h2>
        <p>The patient has been successfully admitted to the hospital.</p>
        <button id="closePopup">OK</button>
    </div>

    <script src="Dinterface.js"></script>
</body>

</html>