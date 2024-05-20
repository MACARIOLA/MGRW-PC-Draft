<?php
include 'PHP/customer-contactUS.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Contact Us</title>
    <link rel="icon" href="./Images/Tab Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/admin-contactus.css">
</head>
<body>
      <main>
        <section>
            <h1>Contact Messages</h1>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database connection settings
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "mgwrpcdtb";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // SQL query to fetch contact messages
                    $sql = "SELECT customer_name, email, subject, message FROM tbl_admin_contacts_us";
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
    <script src="js/admin-contactus.js"></script>
    <script>
        function toggleAdmincontactus(element) {
            const shortText = element.querySelector('.short-admincontactus');
            const fullText = element.querySelector('.full-admincontactus');
            
            if (shortText.style.display === 'inline') {
                fullText.style.display = 'none';
            } else {
                shortText.style.display = 'none';
                fullText.style.display = 'inline';
            }
        }
    </script>
</body>
</html>
