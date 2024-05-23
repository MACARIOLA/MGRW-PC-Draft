<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mgwrpcdtb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT question, answer FROM cms_faqs";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGWR PC | FAQs</title>
    <link rel="icon" href="./Images/Tab Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/faqs.css">
    <script src="https://kit.fontawesome.com/aa7454d09f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
</head>

<body class="contactBg">
    <header class="header">
        <a href="home.html"><img src="Images/MGWR PC Logo.png" alt="" class="logo"></a>
        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <img src="Images/Menu.png" alt="" id="menu-icon">
            <img src="Images/MenuX.png" alt="" id="close-icon">
        </label>
        <nav class="navbar">
            <a href="home.html" style="--i:0">Home</a>
            <a href="aboutus.html" style="--i:1">About Us</a>
            <a href="pricelist.html" style="--i:2">Pricelist</a> 
            <a href="feedback.html" style="--i:3">Feedbacks</a>
            <a class="active" href="faqs.html" style="--i:4">FAQs</a> 
        </nav>
    </header>     

    <h1 class="heading" id="question">FAQs</h1>
    <p class="sentence1">Got questions? Find answers to commonly asked questions here.</p>

    <section class="faqs">
        <div class="container">
            <div class="list">

                <?php
                include 'db_connection.php';

                $sql = "SELECT question, answer FROM cms_faqs";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="list-items">';
                        echo '<span class="list-link">';
                        echo htmlspecialchars($row["question"]);
                        echo '<i class="icon ion-md-add"></i>';
                        echo '<i class="icon ion-md-remove"></i>';
                        echo '</span>';
                        echo '<div class="answer">';
                        echo '<p>' . nl2br(htmlspecialchars($row["answer"])) . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <div class="contactus">
        <p>You Can Always Reach Us Here</p>
        <a class="btn-fdbck" id="leaveFeedbackBtn" href="contact.html">Contact Us</a>
    </div>

    <!---------------
         FOOTER
    ---------------->
    <footer class="footer">
        <div class="footer-content">
            <span class="logo2">MGWR PC</span>
            <p>Committed in providing you with the best Computer parts and accessories, with a focus on product quality, best service, and real-time assistance.</p>
        </div>

        <div class="footer-content">
            <h4>Company</h4>
            <ul>    
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="faqs.html">FAQs</a></li>
            </ul>
        </div>
        
        <div class="footer-content">
            <h4>Help</h4>
            <ul>
                <li><a href="privacy.html">Privacy Policy</a></li>                
                <li><a href="term.html">Terms of Service</a></li>
            </ul>
        </div>

        <div class="footer-content">
            <h4>Connect With Us</h4>
            <div class="icons2">
                <a href="https://www.facebook.com/mgwrpc"><img src="Images/fbicon.png" alt=""></a>
                <a href="https://www.instagram.com/mgwrpc?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="Images/igicon.png" alt=""></a>
                <a href="https://www.tiktok.com/@mgwrpctrading?is_from_webapp=1&sender_device=pc"><img src="Images/tticon.png" alt=""></a>
            </div>
        </div>
    </footer>

    <!---------------
       COPYRIGHTS
    ---------------->
    <div class="copyrights">
        <p>Copyrights 2024 <span>MGWR PC</span> All Rights Reserved</p>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const listLinks = document.querySelectorAll('.list-link');

            listLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                    const answer = this.nextElementSibling;
                    const allAnswers = document.querySelectorAll('.answer');
                    const allIconsAdd = document.querySelectorAll('.ion-md-add');
                    const allIconsRemove = document.querySelectorAll('.ion-md-remove');

                    allAnswers.forEach(ans => {
                        ans.style.maxHeight = null;
                    });

                    allIconsAdd.forEach(icon => {
                        icon.style.display = 'inline';
                    });

                    allIconsRemove.forEach(icon => {
                        icon.style.display = 'none';
                    });

                    if (answer.classList.contains('expanded')) {
                        answer.classList.remove('expanded');
                        this.querySelector('.ion-md-add').style.display = 'inline';
                        this.querySelector('.ion-md-remove').style.display = 'none';
                    } else {
                        allAnswers.forEach(ans => {
                            ans.classList.remove('expanded');
                            ans.style.maxHeight = null;
                        });

                        answer.classList.add('expanded');
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        this.querySelector('.ion-md-add').style.display = 'none';
                        this.querySelector('.ion-md-remove').style.display = 'inline';
                    }
                });
            });
        });
    </script>
</body>
</html>

