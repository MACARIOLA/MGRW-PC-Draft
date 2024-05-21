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
    <link rel="icon" href="./Images/Tab Icon.png" type="image/x-icon">

    <!---------------
         CSS & JS
    ---------------->
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/cms.css">
    <script src="js/mainscript.js"></script>

    <style>
    /* Styles for the white background overlay */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
        z-index: 1000; /* Ensure it's above other content */
        display: none; /* Initially hidden */
    }

    /* Styles for the popup */
    .popup {
        position: fixed;
        top: 5%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff; /* Popup background color */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Optional: Add a shadow */
        z-index: 1001; /* Ensure it's above the overlay */
        max-width: 80%; /* Optional: Set max width */
        max-height: 80%; /* Optional: Set max height */
        overflow-y: auto; /* Optional: Add scrollbars if needed */
        display: none; /* Initially hidden */
    }
    #openPopup {
    background-color: green; /* Change the background color to green */
    color: white; /* Change the text color to white */
    padding: 10px 20px; /* Add padding to the button */
    font-size: 1.2em; /* Increase the font size */
    border: none; /* Remove the border */
    cursor: pointer; /* Add cursor pointer */
    border-radius: 5px; /* Add border radius */
    }

    #openPopup:hover {
    background-color: darkgreen; /* Change the background color on hover */
    }
    </style>
<style>
           /* foooooor aboutus popup*/

        .non-editable {
            border: none;
            resize: none;
            background-color: transparent;
            pointer-events: none;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 35%;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>

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

    <!---------------
     FAQ's + FORM STYLE
    ---------------->

    <style>
        /* Styles for the form */
        #addFaqForm {
            display: none; /* Initially hidden */
            margin-top: 20px;
            width: 80%; /* Adjust the width of the form */
            max-width: 600px; /* Limit the maximum width of the form */
            margin: 20px auto; /* Center the form horizontally */
            padding: 20px; /* Add padding to the form */
            background-color: #8C52FF; /* Add a background color */
            border-radius: 10px; /* Add rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a box shadow */
        }

        /* Styles for the button */
        #toggleFormButton, #toggleDeleteButtons {
            font-size: 25px; /* Increase the font size */
            padding: 10px 20px; /* Add padding */
            border: none; /* Remove the border */
            background-color: #007bff; /* Change the background color */
            color: white; /* Change the text color */
            border-radius: 5px; /* Add rounded corners */
            cursor: pointer; /* Add cursor pointer */
            margin: 0 10px; /* Add space between the buttons */
            display: inline-block; /* Ensure the buttons are displayed inline */

        }

        #toggleFormButton:hover, #toggleDeleteButtons:hover {
            background-color: #0056b3; /* Change the background color on hover */
        }

        /* Styles for form inputs */
        input[type="text"],
        textarea {
            width: 100%; /* Make inputs and textareas full width */
            padding: 10px; /* Add padding */
            margin-bottom: 10px; /* Add margin between inputs */
            border: 1px solid #ccc; /* Add border */
            border-radius: 5px; /* Add rounded corners */
            box-sizing: border-box; /* Include padding and border in the width */
            
        }

        /* Style for the submit button */
        input[type="submit"] {
            background-color: #17E202    ; /* Change the background color */
            color: white; /* Change the text color */
            border: none; /* Remove the border */
            border-radius: 5px; /* Add rounded corners */
            padding: 10px 20px; /* Add padding */
            cursor: pointer; /* Add cursor pointer */
        }

        input[type="submit"]:hover {
            background-color: #11BC00  ; /* Change the background color on hover */
            transition: color 0.3s ease, background-color 0.3s ease; 
        }
    </style>
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
                <a class="active" href="CMS.php" style="--i:2">CMS</a>
                <a href="admin-feedback.php" style="--i:3">Feedbacks</a>
                <a href="admin-contact-us.php" style="--i:4">Contact Us</a>
        </nav>
    </header>    

<!---------------
        POPUP
    ---------------->
   <button id="openPopup">UPDATE PHOTO</button>
<!-- Add a button to open the popup -->
<div class="overlay" id="overlay" style="display: none;">
    <!-- Popup content -->
    <div class="popup" id="popup">
        <h2>Update Photo</h2>
        <form id="updatePhotoForm" enctype="multipart/form-data"  method="POST">
            <label for="photoInput">Choose Photo:</label>
            <input type="file" id="photoInput" name="photo" accept="image/*" >
            <button type="submit" name="submit">Upload</button><br/>
            <!---->
            <label for="photoInput2">Choose Photo:</label>
            <input type="file" id="photoInput2" name="photo2" accept="image/*" >
            <button type="submit" name="submit2">Upload</button><br/>
             <!---->
             <label for="photoInput3">Choose Photo:</label>
            <input type="file" id="photoInput3" name="photo3" accept="image/*" >
            <button type="submit" name="submit3">Upload</button>
 </form>
 
       
        <!-- Close button inside the popup -->
        <button id="closePopup">Close</button>
    </div>
</div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const openButton = document.getElementById('openPopup');
        const popup = document.getElementById('popup');
        const overlay = document.getElementById('overlay');
        const closeButton = document.getElementById('closePopup');

        function openPopup() {
            overlay.style.display = 'flex'; // Show the overlay
            popup.style.display = 'block'; // Show the popup
        }

        function closePopup() {
            overlay.style.display = 'none'; // Hide the overlay
            popup.style.display = 'none'; // Hide the popup
        }

        // Event listener for the open button
        openButton.addEventListener('click', openPopup);

        // Event listener for the close button
        closeButton.addEventListener('click', closePopup);
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
                <h2>Edit Company Details</h2>
                <label for="popupCompanyInfo">Company Info:</label>
                <textarea id="popupCompanyInfo" name="company_info" rows="10" cols="50"></textarea>
                <br/>
                <label for="popupCompanyDetails">Company Details:</label>
                <textarea id="popupCompanyDetails" name="company_details" rows="10" cols="50"></textarea>
            <!---->
                    <label for="ABTPHOTO">Choose Photo:</label>
                     <input type="file" id="ABTPHOTO1" name="ABTPHOTO" accept="image/*" >
                     <button type="submit" name="ABTPHOTOSUB">Upload</button><br/>
                     
                         <div class="btn-container">
                             <button type="submit" name="saveButton">Save</button>
                             <button type="button" id="cancelButton">Back</button>
                        </div>
                </div>

            </form>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const editButton = document.getElementById("editButton");
        const editModal = document.getElementById("editModal");
        const popupCompanyInfo = document.getElementById("popupCompanyInfo");
        const popupCompanyDetails = document.getElementById("popupCompanyDetails");
        const editForm = document.getElementById("editForm");
        const saveButton = document.getElementById("saveButton");
        const cancelButton = document.getElementById("cancelButton");

        editButton.addEventListener("click", function () {
            // Populate the edit form with current values
         

            // Display the edit modal
            editModal.style.display = "block";
        });


        cancelButton.addEventListener("click", function () {
            // Hide the edit modal
            editModal.style.display = "none";
        });

        window.addEventListener("click", function (event) {
            // Close the edit modal if clicked outside
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
        });
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
            <div class="list" >
                

         <!---------------
         FAQ's in Database
        ---------------->             
                <?php
// Include display_faqs.php to show FAQs
include "php/display_faqs.php";
?>

<!-- Button to toggle the form for Add and Delete -->
<button id="toggleFormButton">Add</button>
<button id="toggleDeleteButtons">Delete</button>
    
<!-- Form for adding a new FAQ -->
<form id="addFaqForm" action="php/add_faq.php" method="post" style="display: none;">
    <input type="text" id="new_question" name="new_question" placeholder="Question"><br>
    <textarea id="new_answer" name="new_answer" rows="4" cols="50" placeholder="Answer"></textarea><br>
    <input type="submit" value="Submit">
</form>

<!---------------
    Add Button Script
---------------->  

<script>
    // Get references to the button and the form
    const toggleFormButton = document.getElementById('toggleFormButton');
    const addFaqForm = document.getElementById('addFaqForm');

    // Event listener for the button click
    toggleFormButton.addEventListener('click', function() {
        // Toggle the visibility of the form
        if (addFaqForm.style.display === 'none') {
            addFaqForm.style.display = 'block';
            // Scroll to the form's question input field
            document.getElementById('new_question').scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            addFaqForm.style.display = 'none';
        }
    });

    //For Delete functionality
    document.addEventListener('DOMContentLoaded', function() {
    const toggleDeleteButton = document.getElementById('toggleDeleteButtons');
    const deleteButtons = document.querySelectorAll('.delete-faq');

    // Hide delete buttons initially
    deleteButtons.forEach(button => {
        button.classList.add('hidden');
    });

    toggleDeleteButton.addEventListener('click', function() {
        // Toggle visibility of delete buttons
        deleteButtons.forEach(button => {
            button.classList.toggle('hidden');
        });
    });
});

</script>
</body>
</html>
