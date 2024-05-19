<?php
    include 'PHP/customer-contactUS.php';
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
        <link rel="icon" href="./Images/Tab Icon.png" type="image/x-icon">
        
        <!---------------
            CSS & JS
        ---------------->
        <link rel="stylesheet" href="css/mainstyle.css">
        <link rel="stylesheet" href="css/contact.css">

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
                <a href="faqs.html" style="--i:4">FAQs</a> 
            </nav>
        </header>        


        
        <!---------------
        CONTACT FORM
        ---------------->

        <section class="contact-form">
            <h1 class="heading">Get In Touch!</h1>
            <p class="sentence1">We're here to help! Reach out to us with any inquiries or feedback you may have.</p>
            <div class="contactForm">
            
    <form class="cForm" action="" method="POST">
                    <h1 class="sub-heading">Need Support!</h1>
                    <p class="sentence1 senleft">You Have Any Questions? Problems? Tell Us!</p>
                    <input type="text" class="input" name="name" placeholder="your name" required>
                    <input type="text" class="input" name="email" placeholder="your email" required>
                    <input type="text" class="input" name="subject" placeholder="your Subject" required>
                    <textarea class="input" name="message" cols="30" rows="5" placeholder="Your message..." required></textarea>
                    <input type="submit" class="inputbtn submitbtn" value="Send Message">
                </form>
                
                
                <!---------------
                    MAP
                ---------------->
                <div class="map-container">
                <div class="mapBg"></div>
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3865.683397191603!2d121.07415227591599!3d14.329813983647268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d7485e8057bd%3A0x5b33b4fe692e4d5f!2sMGWR%20PC%20COMPUTER%20PARTS%20AND%20ACCESSORIES%20SHOP!5e0!3m2!1sen!2sph!4v1712210736257!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    
        <div class="contactMethod">
            <div class="method">
                <i class="fa-solid fa-location-dot contactIcon"></i>
                <article class="text">
                    <h1 class="sub-heading">Location</h1>
                    <p class="sentence2">206 Governors Drive Biñan City Laguna</p>
                </article>
            </div>
    
            <div class="method">
                <i class="fa-solid fa-envelope contactIcon"></i>
                <article class="text">
                    <h1 class="sub-heading">Email</h1>
                    <p class="sentence2">Email: mgwr.cp.accs@gmail.com</p>
                </article>
            </div>
    
            <div class="method">
                <i class="fa-solid fa-phone contactIcon"></i>
                <article class="text">
                    <h1 class="sub-heading">Phone</h1>
                    <p class="sentence2">+49 5401 581</p>
                </article>
            </div>
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
    </body>
    </html>
