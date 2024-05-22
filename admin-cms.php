<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------------
           PHP
    ---------------->
    <?php include "PHP/PROMOTION.php"; ?>
    <?php include "PHP/save_content.php"; ?>

    <!---------------
           TAB
    ---------------->
    <title>MGWR PC | CMS</title>
    <link rel="icon" href="Images/Tab Icon.png" type="image/x-icon">

    <!---------------
         CSS & JS
    ---------------->
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/cms.css">
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
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
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
            <a class="active" href="admin-cms.php" style="--i:2">CMS</a>
            <a href="admin-feedback.php" style="--i:3">Feedbacks</a>
            <a href="admin-contact-us.php" style="--i:4">Contact Us</a>
        </nav>
    </header>    

    <!---------------
          POPUP
    ---------------->
    <button id="openPopup">UPDATE PHOTO</button>
    <div id="overlay" style="display: none;">
    
        <div id="popup">
            <h2 id="updatephotohead">Update Photo</h2>
            <form id="updatePhotoForm" enctype="multipart/form-data"  method="POST">
                <label for="photoInput">Choose Photo:</label>
                <input type="file" id="photoInput" name="photo" accept="image/*" >
                <span id="fileName1"></span>
                <button type="submit" name="submit">Upload</button><br/>

                <label for="photoInput2">Choose Photo:</label>
                <input type="file" id="photoInput2" name="photo2" accept="image/*" >
                <span id="fileName2"></span>
                <button type="submit" name="submit2">Upload</button><br/>

                <label for="photoInput3">Choose Photo:</label>
                <input type="file" id="photoInput3" name="photo3" accept="image/*" >
                <span id="fileName3"></span>
                <button type="submit" name="submit3">Upload</button>
            </form>
 
            <button id="closePopup">Close</button>
        </div>
    </div>

    <script>
        document.getElementById('photoInput').addEventListener('change', function() {
            var fileName = this.files[0] ? this.files[0].name : '';
            document.getElementById('fileName1').textContent = fileName;
        });

        document.getElementById('photoInput2').addEventListener('change', function() {
            var fileName = this.files[0] ? this.files[0].name : '';
            document.getElementById('fileName2').textContent = fileName;
        });

        document.getElementById('photoInput3').addEventListener('change', function() {
            var fileName = this.files[0] ? this.files[0].name : '';
            document.getElementById('fileName3').textContent = fileName;
        });
    </script>

    <!---------------
        PROMOTIONS
    ---------------->
    <section class="slider-container">
        <div class="slider">
            <div class="list">
                <div class="item">
                    <img src="<?php echo $promoImage; ?>" alt="" value="1">
                </div>
                <div class="item">
                    <img src="<?php echo $promoImage2; ?>" alt="" value="2">
                </div>
                <div class="item">
                    <img src="<?php echo $promoImage3; ?>" alt="" value="3">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openButton = document.getElementById('openPopup');
            const popup = document.getElementById('popup');
            const overlay = document.getElementById('overlay');
            const closeButton = document.getElementById('closePopup');

            function openPopup() {
                overlay.style.display = 'flex'; 
                popup.style.display = 'block'; 
            }

            function closePopup() {
                overlay.style.display = 'none'; 
                popup.style.display = 'none'; 
            }

            openButton.addEventListener('click', openPopup);
            closeButton.addEventListener('click', closePopup);
        });
    </script>



   <!---------------
         ABOUT US
    ---------------->
    <section class="about">
        <div class="main">
            <div class="image-container">
                <label for="imageInput1">
                    <img id="previewImage" src="<?php echo $abt; ?>" alt="Company Image">
                </label>
            </div>
            <div class="all-text">
                <h4>WHO ARE WE</h4>
                <h1>MGWR PC</h1>
                <p><?php echo $compinf; ?></p>
                <p><?php echo $compdef; ?></p>
                <button type="button" class="button" id="editButton">Edit</button>
            </div>
        </div>
    </section>


    <!---------------
         EDIT POPUP
    ---------------->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <form id="editForm"  method="POST" enctype="multipart/form-data">
                <h2 id="aboutHead">Edit Company Details</h2>
                <label id="comInfo" for="popupCompanyInfo">Company Info:</label>
                <textarea id="popupCompanyInfo" name="company_info" rows="10" cols="50"></textarea>
                
                <label for="ABTPHOTO">Choose Photo:</label>
                <input type="file" id="ABTPHOTO" name="ABTPHOTO" accept="image/*">
                <span id="aboutfileName"></span>
                <button type="submit" name="ABTPHOTOSUB">Upload</button><br/>
                
                <div class="btn-container">
                    <button type="submit" id="aboutSaveButton" name="saveButton">Save</button>
                    <button type="button" id="aboutBackButton">Back</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editButton = document.getElementById("editButton");
            const editModal = document.getElementById("editModal");
            const popupCompanyInfo = document.getElementById("popupCompanyInfo");
            const editForm = document.getElementById("editForm");
            const saveButton = document.getElementById("aboutSaveButton");
            const cancelButton = document.getElementById("aboutBackButton");

            editButton.addEventListener("click", function () {
                editModal.style.display = "block";
            });

            cancelButton.addEventListener("click", function () {
                editModal.style.display = "none";
            });

            window.addEventListener("click", function (event) {
                if (event.target == editModal) {
                    editModal.style.display = "none";
                }
            });
        });

        document.getElementById('ABTPHOTO').addEventListener('change', function() {
            var fileName = this.files[0] ? this.files[0].name : '';
            document.getElementById('aboutfileName').textContent = fileName;
        });
    </script>
    
    
    
   <!---------------
        PRICELIST
    ---------------->
    <section class="wrapper">
        <h1 class="heading">Price List</h1>

        <div class="content-box">
            <div class="card">
                <i class="bx bx-desktop bx-md"></i>
                <h2>Pricelist For PCs</h2>
                <p>Explore our range of high-performance desktop computers. Check our price list to find the perfect fit for your needs.</p>
                <form action="php/pc_upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <button type="submit" class="btn">Upload</button>
                </form>
            </div>

            <div class="card">
                <i class="bx bx-laptop bx-md"></i>
                <h2>Pricelist For Laptops</h2>
                <p>Discover our selection of reliable and portable laptops. Don't forget to check our price list for great deals.</p>
                <form action="php/laptop_upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <button type="submit" class="btn">Upload</button>
                </form>
            </div>
            
            <div class="card">
                <i class="bx bx-printer bx-md"></i>
                <h2>Pricelist For Printers</h2>
                <p>Find the ideal printer for your home or office needs among our quality selection. Check out our price list for competitive pricing.</p>     
                <form action="php/printer_upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <button type="submit" class="btn">Upload</button>
                </form>
            </div>

            <div class="card">
                <i class="bx bx-package bx-md"></i>
                <h2>Pricelist For Others</h2>
                <p>Enhance your computing experience with our range of accessories. From cables to peripherals, find what you need in our price list.</p>        
                <form action="php/others_upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <button type="submit" class="btn">Upload</button>
                </form>
            </div>
        </div>
    </section>



    <!---------------
          FAQs
    ---------------->
    <h1 class="heading" id="question">FAQs</h1>
    <p class="sentence1">Got questions? Find answers to commonly asked questions here.</p>

    <section class="faqs">
        <div class="container">
            <div class="list">
                
            <?php include "php/display_faqs.php"; ?>

                <button id="toggleFormButton">Add</button>
                <button id="toggleDeleteButtons">Delete</button>
                    
                <form id="addFaqForm" action="php/add_faq.php" method="post" style="display: none;">
                    <input type="text" id="new_question" name="new_question" placeholder="Question"><br>
                    <textarea id="new_answer" name="new_answer" rows="4" cols="50" placeholder="Answer"></textarea><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </section>

    <script>
        const toggleFormButton = document.getElementById('toggleFormButton');
        const addFaqForm = document.getElementById('addFaqForm');

        toggleFormButton.addEventListener('click', function() {
            if (addFaqForm.style.display === 'none') {
                addFaqForm.style.display = 'block';
                document.getElementById('new_question').scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                addFaqForm.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const toggleDeleteButton = document.getElementById('toggleDeleteButtons');
            const deleteButtons = document.querySelectorAll('.delete-faq');

            deleteButtons.forEach(button => {
                button.classList.add('hidden');
            });

            toggleDeleteButton.addEventListener('click', function() {
                deleteButtons.forEach(button => {
                    button.classList.toggle('hidden');
                });
            });
        });
    </script>
</body>
</html>
