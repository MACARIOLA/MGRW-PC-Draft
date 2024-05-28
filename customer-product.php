<!---------------
       PHP
---------------->
<?php
    include 'PHP/reserve.php';
    include 'PHP/con_db.php';

    if (isset($_GET['id'])) {
        $_SESSION['product_id'] = $_GET['id'];
        header("Location: customer-product.php");
        exit();
    }

    if (isset($_SESSION['product_id'])) {
        $product_id = $_SESSION['product_id'];
        $sql = "SELECT * FROM inventory WHERE id = $product_id";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------------
           TAB
    ---------------->
    <title>MGWR PC | Product Info</title>
    <link rel="icon" href="Images/Tab Icon.png" type="image/x-icon">
    
    <!---------------
         CSS & JS
    ---------------->
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/customer-product.css">
    <script type="text/javascript" src="js/mainscript.js"></script>

    <!---------------
          FONTS
    ---------------->
    <script src="https://kit.fontawesome.com/aa7454d09f.js" crossorigin="anonymous"></script>

    <!---------------
          ICONS
    ---------------->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>



<body class="contactBg">
    <!---------------
          NAVBAR
    ---------------->
    <header class="header">
        <a href="customer-home.php"><img src="Images/MGWR PC Logo.png" alt="" class="logo"></a>

        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <img src="Images/Menu.png" alt="" id="menu-icon">
            <img src="Images/MenuX.png" alt="" id="close-icon">
        </label>

        <nav class="navbar">
            <a href="customer-home.php" style="--i:0">Home</a>
            <a href="customer-aboutus.php" style="--i:1">About Us</a>
            <a href="customer-pricelist.html" style="--i:2">Pricelist</a> 
            <a href="customer-feedback.php" style="--i:3">Feedbacks</a>
            <a href="customer-faqs.php" style="--i:4">FAQs</a> 
        </nav>
    </header>     



    <!---------------
          PRODUCT
    ---------------->
    <section class="about">
        <div class="main">
            <div class="image-container">
                <div class="hover-image">
                    <img src="data:image;base64,<?php echo base64_encode($product['image']); ?>" alt="">
                </div>
                <div class="btn">
                    <button type="button" class="btn2" id="reserveNowBtn">Reserve Now</button>
                </div>
            </div>
            <div class="all-text">
                <h4><?php echo $product['products_name']; ?></h4>
                <h1><?php echo $product['products_id']; ?></h1>
                <div class="price">₱<?php echo $product['unit_price']; ?></div>
                <p><?php echo $product['description']; ?></p>
                <div class="features">
                    <div class="row">
                        <img class="icn" src="Images/icon-cpu.png" alt="">
                        <div class="column c1"><?php echo $product['specs_cpu']; ?></div>
                        <img class="icn" src="Images/icon-mb.png" alt="">
                        <div class="column c2"><?php echo $product['specs_motherboard']; ?></div>
                    </div>
                    <div class="row">
                        <img class="icn" src="Images/icon-ram.png" alt="">
                        <div class="column c3"><?php echo $product['specs_ram']; ?></div>
                        <img class="icn" src="Images/icon-mntr.png" alt="">
                        <div class="column c4"><?php echo $product['specs_monitor']; ?></div>
                    </div>
                    <div class="row">
                        <img class="icn" src="Images/icon-ssd.png" alt="">
                        <div class="column c5"><?php echo $product['specs_ssd']; ?></div>
                        <img class="icn" src="Images/icon-cc.png" alt="">
                        <div class="column c6"><?php echo $product['specs_computercase']; ?></div>
                    </div>
                    <div class="row">
                        <img class="icn" src="Images/icon-ps.png" alt="">
                        <div class="column c7"><?php echo $product['specs_powersupply']; ?></div>
                        <img class="icn" src="Images/icon-fan.png" alt="">
                        <div class="column c8"><?php echo $product['specs_fan']; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---------------
         RESERVE
    ---------------->
    <div id="reserveModal" class="modal">
            <div class="modal-content">
                <h2>Reservation Details</h2>
                <form id="reserveForm" method="POST">
                    <label for="fName">First Name</label>
                    <input type="text" id="fName" name="fname" placeholder="Enter First Name" required>
                    <label for="lName">Last Name</label>
                    <input type="text" id="lName" name="lname" placeholder="Enter Last Name" required>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email" required>
                    <label for="contactNum">Contact Number</label>
                    <input type="tel" id="contactNum" name="contactNum" maxlength="11" value="09" required>
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="999" value="1" required>
                    <div class="btn-container">
                        <button type="submit" id="confirmBtn">Confirm</button>
                        <button type="button" id="cancelBtn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="successModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Reservation Completed!</h2>
                <button type="button" id="goBackBtn">Go Back</button>
            </div>
        </div>

    <?php if(isset($successMessage)): ?>
    <script>
        document.getElementById("successModal").style.display = "block";
    </script>

    <?php elseif(isset($errorMessage)): ?>
    <script>
        alert('<?php echo $errorMessage; ?>');
    </script>
    <?php endif; ?>

    <!---------------
            JS
    ---------------->
    <script>
        document.getElementById("reserveNowBtn").addEventListener("click", function() {
            document.getElementById("reserveModal").style.display = "block";
        });

        document.getElementById("cancelBtn").addEventListener("click", function() {
            document.getElementById("reserveModal").style.display = "none";
        });

        document.getElementById("goBackBtn").addEventListener("click", function() {
            document.getElementById("successModal").style.display = "none";
            window.location.href = "home.php";
        });

        document.querySelectorAll(".close-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                this.closest(".modal").style.display = "none";
            });
        });
    </script>



    <!---------------
       CONTACT US
    ---------------->
    <div class="contactus">
        <p>Leave A Feedback For The Developers</p>
        <a class="btn-fdbck" id="leaveFeedbackBtn" href="customer-survey.php">Questionaires</a>
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
                <li><a href="admin-contact-us.php">Contact Us</a></li>
                <li><a href="customer-faqs.php">FAQs</a></li>
                <li><a href="customer-survey.php">Feedback-Survey</a></li>
            </ul>
        </div>
        
        <div class="footer-content">
            <h4>Help</h4>
            <ul>
                <li><a href="customer-privacy.html">Privacy Policy</a></li>                
                <li><a href="customer-terms.html">Terms of Service</a></li>
            </ul>
        </div>
 
        <div class="footer-content">
            <h4>Connect With Us</h4>
            <div class="icons2">
                <a href="https://www.facebook.com/mgwrpc"><img src="Images/fbicon.png" alt=""></a>
                <a href="https://www.instagram.com/mgwrpc"><img src="Images/igicon.png" alt=""></a>
                <a href="https://www.tiktok.com/@mgwrpctrading"><img src="Images/tticon.png" alt=""></a>
            </div>
        </div>
    </footer>

    <!---------------
       COPYRIGHTS
    ---------------->
    <div class="copyrights">
        <p>Copyrights 2024 <span>MGWR PC</span> All Rights Reserved</p>
    </div>
</body>
</html> 
