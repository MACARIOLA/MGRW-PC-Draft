<?php

$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mgwrpcdtb";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

            $sql = "SELECT * FROM promotions WHERE ID = 1";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $promoImage = "data:image;base64," . base64_encode($row['PHOTO']);
                }
            }


            $sql2 = "SELECT * FROM promotions WHERE ID = 2";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2 && mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $promoImage2 = "data:image;base64," . base64_encode($row2['PHOTO']);
                }
            }


            $sql3 = "SELECT * FROM promotions WHERE ID = 3";
            $result3 = mysqli_query($conn, $sql3);
            if ($result3 && mysqli_num_rows($result3) > 0) {
                while ($row3 = mysqli_fetch_assoc($result3)) {
                    $promoImage3 = "data:image;base64," . base64_encode($row3['PHOTO']);
                }
            }
        
            //// for inserting photo

            if(isset($_POST['submit'])) {
 

                // Handle photo upload based on photoId
                $photo = $_FILES['photo']['tmp_name'];
                $photoData = addslashes(file_get_contents($photo)); // Addslashes to escape special characters
            
                $sql = "UPDATE promotions SET PHOTO = '$photoData' WHERE ID = 1";
            
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<meta http-equiv="refresh" content="0">';
                } else {
                    echo "Error updating profile photo!";
                }
            }
            
            
            elseif(isset($_POST['submit2'])) {
                // Handle photo upload for photo2
                $photo = $_FILES['photo2']['tmp_name'];
               
                // Read the contents of the file
                $photoData = addslashes(file_get_contents($photo)); // Addslashes to escape special characters
            
                $sql = "UPDATE promotions SET PHOTO = '$photoData' WHERE ID = 2";
            
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<meta http-equiv="refresh" content="0">';
                } else {
                    echo "Error updating profile photo!";
                }
            }
             elseif(isset($_POST['submit3'])) {
                // Handle photo upload for photo3
                $photo = $_FILES['photo3']['tmp_name'];
                
                // Read the contents of the file
                $photoData = addslashes(file_get_contents($photo)); // Addslashes to escape special characters
            
                $sql = "UPDATE promotions SET PHOTO = '$photoData' WHERE ID = 3";
            
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<meta http-equiv="refresh" content="0">';
                } else {
                    echo "Error updating profile photo!";
                }
            } else {
                // Handle error (no submit button clicked)
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
    <title>MGWR PC | Home</title>
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
                <a href="admin-inventory.html" style="--i:1">Inventory</a>
                <a class="active" href="admin-inventory.html" style="--i:2">CMS</a>
                <a href="feedback.html" style="--i:3">Feedbacks</a>
                <a href="contact.html" style="--i:4">Contact Us</a>
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
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/><br/>
<br/>
<br/>
<br/>
<br/>
<br/>

    <!---------------
         ABOUT US
    ---------------->
    <section class="about">
        <div class="main">
            <div class="image-container">
                <label for="imageInput1">
                    <img id="previewImage" src="Images/SulitPc1.jpg" alt="">
                </label>
                <label for="imageInput1" class="upload-button">Choose Photo</label>
                <input type="file" name="image" id="imageInput1" class="image-input" style="display: none;" required>
                <button class="submit-Button3" id="submitImage">SUBMIT</button>
            </div>
            <div class="all-text">
                <h4>WHO ARE WE</h4>
                <h1>MGWR PC</h1>
                <p id="companyInfo" contenteditable="false">As a dynamic and innovative organization, we focus on providing the best computer and building a long-term relationship with our valued clients.</p>
                <p id="companyDetails" contenteditable="false">At MGWR PC, we are dedicated with passion to excellence and commitment in delivering premium solutions to meet your specific needs. Our dedicated team works diligently to ensure your satisfaction and success.</p>
                <button class="button" id="editButton">Edit</button>
                <button id="saveButton" style="display: none;">Save</button>
            </div>
        </div>
    </section>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const companyInfo = document.getElementById("companyInfo");
            const companyDetails = document.getElementById("companyDetails");
            const saveButton = document.getElementById("saveButton");
            const editButton = document.getElementById("editButton");
    
            let originalCompanyInfo;
            let originalCompanyDetails;
    
            editButton.addEventListener("click", function () {
                if (editButton.textContent === "Edit") {
                    // Save original content
                    originalCompanyInfo = companyInfo.textContent;
                    originalCompanyDetails = companyDetails.textContent;
                    companyInfo.contentEditable = true;
                    companyDetails.contentEditable = true;
                    editButton.textContent = "Back";
                    saveButton.style.display = "block";
                } else {
                    // Revert to original content
                    companyInfo.textContent = originalCompanyInfo;
                    companyDetails.textContent = originalCompanyDetails;
                    companyInfo.contentEditable = false;
                    companyDetails.contentEditable = false;
                    editButton.textContent = "Edit";
                    saveButton.style.display = "none";
                }
            });
    
            // Event listener for save button
            saveButton.addEventListener("click", function () {
                saveContent();
                saveButton.style.display = "none";
                editButton.textContent = "Edit";
                companyInfo.contentEditable = false;
                companyDetails.contentEditable = false;
            });
    
            function saveContent() {
                console.log("Company Info: " + companyInfo.textContent);
                console.log("Company Details: " + companyDetails.textContent);
            }
    
            // Trigger file input when clicking on the image
            submitImageButton.addEventListener("click", function () {
                document.getElementById("imageInput1").click();
            });
    
            // Preview selected image
            document.getElementById("imageInput1").addEventListener("change", function (event) {
                var preview = document.getElementById('previewImage');
                var file = event.target.files[0];
                var reader = new FileReader();
    
                reader.onloadend = function () {
                    preview.src = reader.result;
                }
    
                if (file) {
                    reader.readAsDataURL(file);
                } else {
                    preview.src = "";
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
                <a href="/PDFs/laptop-catalog.pdf" class="btn" target="_blank">Download Now!</a>
            </div>

            <div class="card">
                <i class="bx bx-laptop bx-md"></i>
                <h2>Pricelist For Laptops</h2>
                <p>Discover our selection of reliable and portable laptops. Don't forget to check our price list for great deals.</p>
                <a href="/PDFs/laptop-catalog.pdf" class="btn" target="_blank">Download Now!</a>
            </div>
            
            <div class="card">
                <i class="bx bx-printer bx-md"></i>
                <h2>Pricelist For Printers</h2>
                <p>Find the ideal printer for your home or office needs among our quality selection. Check out our price list for competitive pricing.</p>     
                <a href="/PDFs/laptop-catalog.pdf" class="btn" target="_blank">Download Now!</a>
            </div>

            <div class="card">
                <i class="bx bx-package bx-md"></i>
                <h2>Pricelist For Others</h2>
                <p>Enhance your computing experience with our range of accessories. From cables to peripherals, find what you need in our price list.</p>        
                <a href="/PDFs/laptop-catalog.pdf" class="btn" target="_blank">Download Now!</a>
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
                <div class="list-items">
                    <span class="list-link">What payment methods do you accept?
                        <button class="edit2-btn" onclick="editContent(this)">Edit</button>
                        <button class="save3-btn" style="display: none;" onclick="editContent(this)">Save</button>
                        <button class="remove1-btn" onclick="removeQuestion(this)">Remove</button>
                        <i class="icon ion-md-remove"></i>
                    </span>
                    <div class="answer">
                        <p>
                            We Accept Cash, Online Payment And Bank Transfer.<br>
                            For Online Payment And Bank Transfer Please Use Official MGWR PC Bank Account:<br><br>
    
                            Union Bank<br>
                            Account Name: MGWR PC COMPUTER PARTS AND ACCESSORIES SHOP<br>
                            Account Number: 0027-4001-3341<br><br>
    
                            Bank of the Philippines Island<br>
                            Account Name: MGWR PC COMPUTER PARTS AND ACCESSORIES SHOP<br>
                            Account Number: 0989-644-661
                        </p>
                    </div>
                </div>
    
    
                <div class="list-items">
                    <span class="list-link">
                        How Do I apply in Home Credit?
                        <button class="edit2-btn" onclick="editContent(this)">Edit</button>
                        <button class="save3-btn" style="display: none;" onclick="editContent(this)">Save</button>
                        <button class="remove1-btn" onclick="removeQuestion(this)">Remove</button>
                        <i class="icon ion-md-remove"></i>
                    </span>
                    <div class="answer">
                        <p>
                            You Can Apply In Home Credit In Just Simple Way:<br><br>
    
                            &#8226;&nbsp;&nbsp;&nbsp;Download "My Home Credit App" (Not compatible in IOS)<br>
                            &#8226;&nbsp;&nbsp;&nbsp;Create an account and kindly fill up all required information<br>
                            &#8226;&nbsp;&nbsp;&nbsp;Check if you are qualified for product loan by answering those necessary questions.<br>
                            &#8226;&nbsp;&nbsp;&nbsp;If you already finished those steps. Home credit will give you an offer for up to 60k product loan and together with your Valid ID you can now go to our shop to process your loan.
                        </p>
                    </div>
                </div>
    
                <div class="list-items">
                    <span class="list-link">
                        Are your products covered by warranty?
                        <button class="edit2-btn" onclick="editContent(this)">Edit</button>
                        <button class="save3-btn" style="display: none;" onclick="editContent(this)">Save</button>
                        <button class="remove1-btn" onclick="removeQuestion(this)">Remove</button>
                        <i class="icon ion-md-remove"></i>
                    </span>
                    <div class="answer">
                        <p>
                            All MGWR PC Products Carry A Standard One (1) Year Warranty Except Of The Following:<br><br>
    
                            One Month Warranty Applies Only For:<br>
                            &#8226;&nbsp;&nbsp;&nbsp;External batteries of Laptops<br>
                            &#8226;&nbsp;&nbsp;&nbsp;Bundled Items ( mouse, keyboards, speaker,etc.)<br>
                            &#8226;&nbsp;&nbsp;&nbsp;Chargers, Adaptors<br><br>		
    
                            One Week Warranty Applies Only For:<br>
                            &#8226;&nbsp;&nbsp;&nbsp;Tables and Chairs<br>					
                            &#8226;&nbsp;&nbsp;&nbsp;Generic Fans,Laptop coolers,Heatsink, LAN tester<br>	
                            &#8226;&nbsp;&nbsp;&nbsp;Power cord , Display Cables<br><br>	
    
                            There Is No Warranty For:<br>
                            &#8226;&nbsp;&nbsp;&nbsp;Consumables (ink,disc, etc)<br>				
                            &#8226;&nbsp;&nbsp;&nbsp;Software ( OS, Office)<br>					
                            &#8226;&nbsp;&nbsp;&nbsp;Accessories, promotional/sale items, freebies,cables<br>	
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="new-item-template">
        <div class="list-items">
            <span class="list-link">
                <input type="text" class="new-question" placeholder="New Question">
                <button class="add-btn" onclick="addNewContent(this)">Add</button>
                <button class="edit2-btn" onclick="editContent(this)">Edit</button>
                <button class="save3-btn" style="display: none;" onclick="editContent(this)">Save</button>
                <button class="remove-btn" onclick="removeQuestion(this)">Remove</button>
            </span>
            <div class="answer" contenteditable="true">
                <p>Answer</p>
            </div>
        </div>
    </div>


    <script>
        function editContent(button) {
            var answer = button.parentElement.nextElementSibling;
            var isEditable = answer.getAttribute('contenteditable') === 'true';

            if (!isEditable) {
                answer.setAttribute('contenteditable', 'true');
                button.textContent = 'Save';
                button.classList.remove('edit2-btn');
                button.classList.add('save3-btn');
            } else {
                // Save the edited content (you can save to local storage or send to server)
                var editedContent = answer.innerHTML;
                console.log('Edited Content:', editedContent);
                
                answer.setAttribute('contenteditable', 'false');
                button.textContent = 'Edit';
                button.classList.remove('save3-btn');
                button.classList.add('edit2-btn');
            }
        }

        function addNewQuestion() {
            var list = document.querySelector('.list');
            var newQuestion = `
                <div class="list-items">
                    <span class="list-link">
                        <input type="text" placeholder="New Question" class="new-question">
                        <button class="add-btn" onclick="addNewContent(this)">Add</button>
                        <button class="remove-btn" onclick="removeQuestion(this)">Remove</button>
                    </span>
                    <div class="answer" contenteditable="true">
                        <p>Answer</p>
                    </div>
                </div>
            `;
            list.insertAdjacentHTML('afterbegin', newQuestion);
        }

        function addNewContent(button) {
            var listItem = button.parentElement.parentElement;
            var newQuestion = listItem.querySelector('.new-question').value;
            var answer = listItem.querySelector('.answer');
            var list = document.querySelector('.list');

            if (newQuestion.trim() !== '') {
                var newContent = `
                    <div class="list-items">
                        <span class="list-link">
                            ${newQuestion}
                            <button class="edit2-btn" onclick="editContent(this)">Edit</button>
                            <i class="icon ion-md-remove" onclick="removeQuestion(this)"></i>
                        </span>
                        <div class="answer" contenteditable="false">
                            <p>Answer</p>
                        </div>
                    </div>
                `;
                list.insertAdjacentHTML('afterbegin', newContent);
            }
        }

        function removeQuestion(button) {
            var listItem = button.parentElement.parentElement;
            listItem.remove();
        }
    </script>

    <!---------------
            JS
    ---------------->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const listLinks = document.querySelectorAll('.list-link');

            listLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default behavior
                    event.stopPropagation(); // Stop the event from propagating up the DOM tree
                    
                    const answer = this.nextElementSibling;
                    const allAnswers = document.querySelectorAll('.answer');
                    const allIconsAdd = document.querySelectorAll('.ion-md-add');
                    const allIconsRemove = document.querySelectorAll('.ion-md-remove');

                    // Hide all answers
                    allAnswers.forEach(ans => {
                        ans.style.maxHeight = null;
                    });

                    // Reset all icons to add state
                    allIconsAdd.forEach(icon => {
                        icon.style.display = 'inline';
                    });

                    // Hide all remove icons
                    allIconsRemove.forEach(icon => {
                        icon.style.display = 'none';
                    });

                    // Toggle clicked answer
                    if (answer.classList.contains('expanded')) {
                        answer.classList.remove('expanded');
                        this.querySelector('.ion-md-add').style.display = 'inline';
                        this.querySelector('.ion-md-remove').style.display = 'none';
                    } else {
                        // Collapse all answers
                        allAnswers.forEach(ans => {
                            ans.classList.remove('expanded');
                            ans.style.maxHeight = null;
                        });

                        // Toggle clicked answer
                        answer.classList.add('expanded');
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        this.querySelector('.ion-md-add').style.display = 'none';
                        this.querySelector('.ion-md-remove').style.display = 'inline';
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const items = document.querySelectorAll(".item");

            items.forEach((item, index) => {
                const input = item.querySelector("input[type=file]");
                const image = item.querySelector("img");
                const uploadButton = item.querySelector("button");

                uploadButton.addEventListener("click", function() {
                    input.click();
                });

                input.addEventListener("change", function() {
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            image.src = e.target.result;
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                });
            });
        });
    </script>
</body>
</html>
