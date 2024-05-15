    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!---------------
            TAB
        ---------------->
        <title>MGWR PC | Feedbacks</title>
        <link rel="icon" href="./Images/Tab Icon.png" type="Images/x-icon">

        <!---------------
            CSS & JS
        ---------------->
        <link rel="stylesheet" href="css/mainstyle.css">
        <link rel="stylesheet" href="css/admin_feedback.css">
        <script src="js/mainscript.js"></script>
        <script src="js/admin_feedback.js"></script>

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
        <main class="table" id="customers_table">
            <section class="table__header">
                <h1>Customer's Feedback</h1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Feedback</th>
                            <th>Rating</th>
                            <th>Tags</th>
                            <th>Status</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
        <?php

            // Define a function to generate star icons based on the rating value
            function generateStars($rating) {
                $stars = "";
                // Convert rating to float to ensure it's treated as a numeric value
                $rating = floatval($rating);
                // Loop through the rating and append a filled star for each whole number
                for ($i = 0; $i < $rating; $i++) {
                    $stars .= "<i class='bx bxs-star'></i>";
                }
                // If the rating has a decimal part (e.g., 4.5), append a half-filled star
                if ($rating - floor($rating) > 0) {
                    $stars .= "<i class='bx bxs-star-half'></i>";
                }
                // Fill remaining stars to make it 5 stars in total
                for ($i = ceil($rating); $i < 5; $i++) {
                    $stars .= "<i class='bx bx-star'></i>";
                }
                return $stars;
            }

            // Function to get the background color, width, height, and border for a tag
            function getTagStyle($tag) {
            $baseStyle =
            "display: inline-block;
            padding: 5px 10px;
            margin: 5px;
            border-radius: 10px;
            width: 200px;
            height: 40px;
            line-height: 30px;
            text-align: center;"; 
                switch($tag) {
                    case "First Time Buyer":
                        return $baseStyle . "background-color: gray; color: white; border: 1px solid black;";
                    case "Regular Customer":
                        return $baseStyle . "background-color: gray; color: white; border: 1px solid black;";
                    case "Budget Shopper":
                        return $baseStyle . "background-color: gray; color: white; border: 1px solid black;";
                    case "Brand Loyalist":
                        return $baseStyle . "background-color: gray; color: white; border: 1px solid black;";
                    case "Gift Shopper":
                        return $baseStyle . "background-color: gray; color: white; border: 1px solid black;";
                    case "Not Interested":
                        return $baseStyle . "background-color: gray; color: white; border: 1px solid black;";
                    default:
                        return $baseStyle;
                }
            }
            

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

        $sql = "SELECT 
            id,
            name,
            comment,
            rating,
            first_time_buyer,
            regular_customer,
            budget_shopper,
            brand_loyalist,
            gift_shopper,
            not_interested
        FROM customer_product_reviews";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $stars_html = generateStars($row['rating']);

                $tags = [];
                    if ($row['first_time_buyer']) $tags[] = "<span style='" . getTagStyle("First Time Buyer") . "'>First Time Buyer</span>";
                    if ($row['regular_customer']) $tags[] = "<span style='" . getTagStyle("Regular Customer") . "'>Regular Customer</span>";
                    if ($row['budget_shopper']) $tags[] = "<span style='" . getTagStyle("Budget Shopper") . "'>Budget Shopper</span>";
                    if ($row['brand_loyalist']) $tags[] = "<span style='" . getTagStyle("Brand Loyalist") . "'>Brand Loyalist</span>";
                    if ($row['gift_shopper']) $tags[] = "<span style='" . getTagStyle("Gift Shopper") . "'>Gift Shopper</span>";
                    if ($row['not_interested']) $tags[] = "<span style='" . getTagStyle("Not Interested") . "'>Not Interested</span>";
                $tags_str = implode(" ", $tags);
                echo "<tr>
                    <td>{$row['name']}</td>
                    <td class='feedback-cell' onclick='toggleFeedback(this)'>
                        <span class='short-feedback'>" . substr($row['comment'], 0, 50) . "...</span>
                        <span class='full-feedback' style='display:none;'>{$row['comment']}</span>
                    </td>
                    <td>{$stars_html}</td>
                    <td>{$tags_str}</td>
                    <td><button class='status post'>Post</button></td>
                    <td><button class='status delete' onclick='deleteFeedback({$row['id']}, this)'>Delete</button></td>
                    <input type='hidden' name='id' value='{$row['id']}'> <!-- Hidden input field for ID -->
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No feedback available</td></tr>";
        }

        $conn->close();
        ?>

                    </tbody>
                </table>
            </section>
        </main>
    </body>
    </html>
