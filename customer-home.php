<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------------
           TAB
    ---------------->
    <title>MGWR PC | Home</title>
    <link rel="icon" href="Images/Tab Icon.png" type="image/x-icon">

    <!---------------
           PHP
    ---------------->
    <?php 
        include "PHP/PROMOTION.php";
        session_start();
    ?>

    <!---------------
         CSS & JS
    ---------------->
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/customer-home.css">
    <script src="js/mainscript.js"></script>

    <!---------------
          FONTS
    ---------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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
        <a href="customer-home.php"><img src="Images/MGWR PC Logo.png" alt="" class="logo"></a>

        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <img src="Images/Menu.png" alt="" id="menu-icon">
            <img src="Images/MenuX.png" alt="" id="close-icon">
        </label>

        <nav class="navbar">
            <a class="active" href="customer-home.php" style="--i:0">Home</a>
            <a href="customer-aboutus.php" style="--i:1">About Us</a>
            <a href="customer-pricelist.html" style="--i:2">Pricelist</a> 
            <a href="customer-feedback.php" style="--i:3">Feedbacks</a>
            <a href="customer-faqs.php" style="--i:4">FAQs</a> 
        </nav>
    </header>     



    <!---------------
        PROMOTIONS
    ---------------->
    <section class="slider-container">
        <div class="slider">
            <div class="list">
                <div class="item">
                    <img src="<?php echo $promoImage; ?>" alt="" >
                </div>
                <div class="item">
                    <img src="<?php echo $promoImage2; ?>" alt="" >
                </div>
                <div class="item">
                    <img src="<?php echo $promoImage3; ?>" alt="" >
                </div>
                <div class="item">
                    <img src="<?php echo $promoImage4; ?>" alt="" >
                </div>
                <div class="item">
                    <img src="<?php echo $promoImage5; ?>" alt="" >
                </div>
            </div>
            <div class="buttons">
                <button id="prev"><</button>
                <button id="next">></button>
            </div>
            <ul class="dots">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </section>



   
    <!---------------
    SULIT PCS
---------------->
<section class="sulitPc">
    <div class="text-center">
        <h2>Sulit PC Sets</h2>
        <p class="sentence1">Check out our best-selling computers, designed for performance and reliability.</p>
    </div>

    <div class="sulitPcContents">
        <?php 
            $sql = "SELECT * FROM inventory WHERE 	products_id  LIKE '%SULIT PC%'  ORDER BY RAND()  LIMIT 3"; // Fetch only the first 3 products
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $url = "customer-product.php?id=" . $row['id'];
        ?>
        <div class="row">
            <a href="<?php echo $url; ?>"><img src="data:image;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['products_name']; ?>"></a>
            <h4><?php echo $row['products_name']; ?></h4>
            <h5><?php echo $row['products_id']; ?></h5>
            <h6>₱<?php echo $row['unit_price']; ?></h6>
        </div>
        <?php
                }
            }
        ?>
    </div>

    <div class="shortcut">
        <a class="btn-fdbck" href="customer-pricelist.html">Check Our Pricelists</a>
    </div>
</section>





    <!---------------
      SULIT LAPTOPS
    ---------------->
    <section class="sulitLaptop">
        <div class="text-center">
            <h2>Sulit Laptop Sets</h2>
            <p class="sentence1">Discover our best-selling laptops, offering portability and power for your needs.</p>
        </div>

        <div class="sulitLaptopContents">
        <?php 
            $sql = "SELECT * FROM inventory WHERE 	products_id  LIKE '%SULIT LAPTOP%'  ORDER BY RAND()  LIMIT 3"; // Fetch only the first 3 products
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $url = "customer-product.php?id=" . $row['id'];
        ?>
        <div class="row">
            <a href="<?php echo $url; ?>"><img src="data:image;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['products_name']; ?>"></a>
            <h4><?php echo $row['products_name']; ?></h4>
            <h5><?php echo $row['products_id']; ?></h5>
            <h6>₱<?php echo $row['unit_price']; ?></h6>
        </div>
        <?php
                }
            }
        ?>
        </div>

        <div class="shortcut">
            <a class="btn-fdbck2" href="customer-pricelist.html">Check Our Pricelists</a>
        </div>
    </section>



    <!---------------
      SULIT LAPTOPS
    ---------------->
    <section class="sulitPrinter">
        <div class="text-center">
            <h2>Sulit Printer Sets</h2>
            <p class="sentence1">Explore our best-selling printers, known for their quality and efficiency.</p>
        </div>

        <div class="sulitPrinterContents">
        <?php 
            $sql = "SELECT * FROM inventory WHERE 	products_id  LIKE '%SULIT PRINTER%'  ORDER BY RAND()  LIMIT 3"; // Fetch only the first 3 products
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $url = "customer-product.php?id=" . $row['id'];
        ?>
        <div class="row">
            <a href="<?php echo $url; ?>"><img src="data:image;base64,<?php echo base64_encode($row['image']); ?>" alt="<?php echo $row['products_name']; ?>"></a>
            <h4><?php echo $row['products_name']; ?></h4>
            <h5><?php echo $row['products_id']; ?></h5>
            <h6>₱<?php echo $row['unit_price']; ?></h6>
        </div>
        <?php
                }
            }
        ?>
        </div>

        <div class="shortcut">
            <a class="btn-fdbck" href="customer-pricelist.html">Check Our Pricelists</a>
        </div>
    </section>



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
                <li><a href="customer-contact-us.php">Contact Us</a></li>
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
