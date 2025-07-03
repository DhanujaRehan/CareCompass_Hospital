<?php
session_start();
include 'db_connect.php';

$sql = "SELECT * FROM users";
$result = $conn->query($sql);


$user_email = $_SESSION["email"];
$sql1 = "SELECT name, department,pic FROM admin WHERE email = ?";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result1 = $stmt->get_result();
$user = $result1->fetch_assoc();
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
    <link rel="stylesheet" href="cashier.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <header>

        <nav class="navbar">
            <a href="index.html"><i class="fas fa-home"></i> Home</a>

        </nav>

        <div class="logo"><img src="images/CC.png" alt=""></div>

        <div class="right-icons">
            <a href="login.html">
                <div class="btn" id="lg">Log Out</div>
            </a>
        </div>

    </header>

    <section class="cashierm">
        <div class="staff-interface2">
            <img src="images/bluelogo.png" alt="" class="img2">
        </div>

        <h1>Hospital Staff Interface</h1>

        <div class="staff-interface">

            <div class="staff-details">
                <div class="sc">
                    <h3>User Details</h3>
                </div>
                <div class="staff-card">

                    <?php
                    if (!empty($user['pic'])) {
                        echo "<img src='" . htmlspecialchars($user['pic']) . "' alt='User Picture' class='staff-picture'>";
                    } else {
                        echo "No picture available";
                    }
                    ?>

                    <div class="staff-info">
                        <h2 id="staff-name">Name : Mr.<?php echo htmlspecialchars($user['name']); ?> </h2>
                        <p id="staff-position">Position: <?php echo htmlspecialchars($user['department']); ?></p>
                    </div>
                </div>
            </div>

            <section class="hospital-operations">
                <h3>Hospital Operations</h3>
                <div class="operations-list">
                    <div class="operation-item">Patient Records</div>
                    <div class="operation-item">Appointment Scheduling</div>
                    <div class="operation-item">Medication Management</div>
                    <div class="operation-item">Laboratory Tests</div>
                </div>
            </section>

            <div class="button-container">
                <button id="billing-button" class="billing-button">Proceed to Billing</button>
                <button id="user-button" class="billing-button" onclick="window.location.href='user.html'">Manage
                    Users</button>
            </div>
            <div class="button-container">
                
            </div>

            <div class="user">
                <h2>Users List</h2>


                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for users.."
                    class="search">

                <table id="userTable" border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td class="bbb">
                                    <button class="ubutton"><a
                                            href="update.php?id=<?php echo $row['id']; ?>">Edit</a></button>
                                    <button class="dbutton"><a href="delete.php?id=<?php echo $row['id']; ?>"
                                            onclick="return confirm('Are you sure?');">Delete</a></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

    </section>

    <script src="cashier.js"></script>

    <script>
        function searchTable() {

            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            table = document.getElementById('userTable');
            tr = table.getElementsByTagName('tr');


            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName('td');
                if (td) {
                    var found = false;
                    for (var j = 0; j < td.length; j++) {
                        if (td[j].textContent || td[j].innerText) {
                            txtValue = td[j].textContent || td[j].innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                found = true;
                                break;
                            }
                        }
                    }
                    if (found) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }
    </script>
</body>

</html>