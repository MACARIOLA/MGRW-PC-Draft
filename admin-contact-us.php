<?php
    include 'php/customer-contact-us.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------------
           TAB
    ---------------->
    <title>MGWR PC | Contact Us</title>
    <link rel="icon" href="Images/Tab Icon.png" type="image/x-icon">
     
    <!---------------
         CSS & JS
    ---------------->
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/admin-contact-us.css">

    <!---------------
          FONTS
    ---------------->
    <script src="https://kit.fontawesome.com/aa7454d09f.js" crossorigin="anonymous"></script>

    <!---------------
          ICONS
    ---------------->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
    


<body>
    <!---------------
          NAVBAR
    ---------------->
    <header class="header">
        <a href="adminAnalytics.html"><img src="Images/MGWR PC Logo.png" alt="" class="logo"></a>

        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <img src="Images/Menu.png" alt="" id="menu-icon">
            <img src="Images/MenuX.png" alt="" id="close-icon">
        </label>

        <nav class="navbar">
            <a href="adminAnalytics.html" style="--i:0">Analytics</a>
            <a href="admin-inventory.php" style="--i:1">Inventory</a>
            <a href="admin-cms.php" style="--i:2">CMS</a>
            <a href="admin-feedback.php" style="--i:0">Feedback</a>
            <a class="active" href="admin-contact-us.php" style="--i:4">Inbox</a>
        </nav>
    </header> 


    
    <!---------------
          TABLES
    ---------------->
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Inbox</h1>
        </section>
    
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>

                <tbody class="center-align">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "mgwrpcdtb";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT customer_name, email, subject, message FROM admin_contact_us";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data for each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . htmlspecialchars($row['customer_name'], ENT_QUOTES, 'UTF-8') . "</td>
                                        <td>" . htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8') . "</td>
                                        <td>" . htmlspecialchars($row['subject'], ENT_QUOTES, 'UTF-8') . "</td>
                                        <td class='admincontactus-cell' onclick='toggleAdmincontactus(this)'>
                                            <span class='short-admincontactus'>" . htmlspecialchars(substr($row['message'], 0, 50), ENT_QUOTES, 'UTF-8') . "...</span>
                                            <span class='full-admincontactus' style='display:none;'>" . htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8') . "</span>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No contact messages found.</td></tr>";
                        }

                        $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
    </main>


    
    <!---------------
            JS
    ---------------->
    <script>
        function toggleAdmincontactus(element) {
            const shortText = element.querySelector('.short-admincontactus');
            const fullText = element.querySelector('.full-admincontactus');

            if (shortText.style.display === 'none') {
                shortText.style.display = 'inline';
                fullText.style.display = 'none';
            } else {
                shortText.style.display = 'none';
                fullText.style.display = 'inline';
            }
        }
    </script>
</body>
</html>
