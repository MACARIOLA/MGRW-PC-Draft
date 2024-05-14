
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!---------------
       TAB
---------------->
<title>MGWR PC | Item Review</title>
<link rel="icon" href="./Images/Tab Icon.png" type="image/x-icon">

<!---------------
     CSS & JS
---------------->
<link rel="stylesheet" href="item_reviews.css">

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
    <?php 
        if(isset($_SESSION['status'])) {
    ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
            unset($_SESSION['status']);
        }
    ?>

    <div class="heading">
        <a href="home.html"><img src="Images/MGWR PC Logo.png" alt="" class="logo"></a>
        <h4>Your answers play a crucial role in our continuous efforts to enhance our offerings and services. Thank you for helping us serve you better!</h4>
    </div>

    <form action="code.php" method="POST">
        <div class="form-group mb-3">
            <label for="name">Name</label><br><br>
            <input type="text" name="name" class="box" />
        </div>

        <div class="form-group mb-3">
            <label for="comment">Please leave a comment for the product:</label><br><br>
            <textarea name="comment" class="box" placeholder="Enter your comment here..."></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Please rate the product you received.</label> <br><br>
            <div class="radio-container">
                <input type="radio" name="radio1" value="5 Star" class="radio-btn" id="5star" />
                <label for="5star" class="radio-text">5 Star</label>
            </div>
            <div class="radio-container">
                <input type="radio" name="radio1" value="4 Star" class="radio-btn" id="4star" />
                <label for="4star" class="radio-text">4 Star</label>
            </div>
            <div class="radio-container">
                <input type="radio" name="radio1" value="3 Star" class="radio-btn" id="3star" />
                <label for="3star" class="radio-text">3 Star</label>
            </div>
            <div class="radio-container">
                <input type="radio" name="radio1" value="2 Star" class="radio-btn" id="2star" />
                <label for="2star" class="radio-text">2 Star</label>
            </div>
            <div class="radio-container">
                <input type="radio" name="radio1" value="1 Star" class="radio-btn" id="1star" />
                <label for="1star" class="radio-text">1 Star</label>
            </div>
        </div>

        <div class="form-group mb-3">
            <label>Customer Type:</label><br><br>
            <div class="checkbox-container">
                <input type="checkbox" name="checkbox1" value="First Time Buyer" class="checkbox-btn" id="firstTime" />
                <label for="firstTime" class="checkbox-text">First Time Buyer</label>
            </div>
            <div class="checkbox-container">
                <input type="checkbox" name="checkbox2" value="Regular Customer" class="checkbox-btn" id="regularCustomer" />
                <label for="regularCustomer" class="checkbox-text">Regular Customer</label>
            </div>
            <div class="checkbox-container">
                <input type="checkbox" name="checkbox3" value="Budget Shopper" class="checkbox-btn" id="budgetShopper" />
                <label for="budgetShopper" class="checkbox-text">Budget Shopper</label>
            </div>
            <div class="checkbox-container">
                <input type="checkbox" name="checkbox4" value="Brand Loyalist" class="checkbox-btn" id="brandLoyalist" />
                <label for="brandLoyalist" class="checkbox-text">Brand Loyalist</label>
            </div>
            <div class="checkbox-container">
                <input type="checkbox" name="checkbox5" value="Gift Shopper" class="checkbox-btn" id="giftShopper" />
                <label for="giftShopper" class="checkbox-text">Gift Shopper</label>
            </div>
            <div class="checkbox-container">
                <input type="checkbox" name="checkbox6" value="Not Interested" class="checkbox-btn" id="notInterested" />
                <label for="notInterested" class="checkbox-text">Not Interested</label>
            </div>
        </div>

        <div class="form-group mb-3">
            <button type="submit" name="save_radio" class="btn btn-primary">SUBMIT</button>
        </div>
    </form>

    <script src="https://kit.fontawesome.com/aa7454d09f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</body>
</html>
