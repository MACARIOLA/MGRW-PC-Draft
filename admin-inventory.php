<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!---------------
           TAB
    ---------------->
    <title>MGWR PC | Inventory</title>
    <link rel="icon" href="Images/Tab Icon.png" type="image/x-icon">

    <!---------------
         CSS & JS
    ---------------->
    <link rel="stylesheet" href="css/admin-inventory.css">
    <link rel="stylesheet" href="css/admin-mainstyle.css">
    <script src="js/admin-inventory.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!---------------
         PHP
    ---------------->
    <?php


if (isset($_POST['update_product'])) {
    @include 'PHP/admin-config.php';
   
    @include 'PHP/admin-update-add-reservation.php';
}
else{
    @include 'PHP/admin-config.php';
 @include 'PHP/admin-update-reservation.php';

}
?>


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-oP7mI/HC6pVx2jzrLnMlqA25eXHVTQwYb3CgeCLHq/9ItT5qro5BxxL5tWnfqFi/OA7NTVAtTAjyQq62oyC7Ig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



<body>
    <!---------------
          NAVBAR
    ---------------->
    <header class="header">
        <a href="admin-analytics.php"><img src="Images/MGWR PC Logo.png" alt="" class="logo"></a>

        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <img src="Images/Menu.png" alt="" id="menu-icon">
            <img src="Images/MenuX.png" alt="" id="close-icon">
        </label>

        <nav class="navbar">
            <a href="admin-analytics.php" style="--i:0">Analytics</a>
            <a href="admin-inventory.php" style="--i:0">Inventory</a>
            <a class="active" href="admin-inventory.php" style="--i:1">Reservation</a>
            <a href="admin-cms.php" style="--i:2">CMS</a>
            <a href="admin-feedback.php" style="--i:3">Feedbacks</a>
            <a href="admin-contact-us.php" style="--i:4">Inbox</a>
        </nav>
    </header> 

<!---------------
   RESERVATION
---------------->
<div class="container-main">
    <div class="container1">
        <main class="table" id="customers_table">
            <section class="table__header">
                <h2>RESERVATION</h2>
                <div class="input-group">
                    <input type="search" placeholder="Search Data..." id="reservationSearchInput" onkeyup="searchTable2()">
                    <img src="images/search.png">
                </div>
                <button class="add" data-toggle="modal" data-target="#addModalReservation">ADD</button>
            </section>

            <section class="table__body">
                <table id="reservationTable">
                    <thead class="thead">
                        <tr>
                            <th> RESERVATION ID </th>
                            <th> CUSTOMER ID </th>
                            <th> PRODUCT ID </th>
                            <th> EMAIL</th>
                            <th> CONTACT#</th>
                            <th> QUANTITY </th>
                            <th> STATUS </th>
                            <th> UPDATE </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $select = mysqli_query($conn, "SELECT * FROM reservation");
                            while($row = mysqli_fetch_assoc($select)){ 
                                ?>
                                <tr>
                                    <td><?php echo $row['IDreservation']; ?></td>
                                    <td><?php echo $row['customer']; ?></td>
                                    <td><?php echo $row['product']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['num']; ?></td>
                                    <td><?php echo $row['reserved_units']; ?></td>
                                    <td>
                                        <p class="status <?php echo $row['status']; ?>"><?php echo strtoupper($row['status']); ?></p>
                                    </td>
                                    <td>
                                        <button class="status edit" data-toggle="modal" data-target="#reservationmodal" 
                                                data-id="<?php echo $row['IDreservation']; ?>" 
                                                data-status="<?php echo $row['status']; ?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            <?php 
                            } 
                        ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</div>

<!---------------
RESERVATION POPUP
---------------->
<div class="modal fade" id="reservationmodal" tabindex="-1" role="dialog" aria-labelledby="reservationmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationmodalLabel">Update Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reservationForm" method="post" >
                    <div class="form-group">
                        <label for="reservation_id">Reservation ID</label>
                        <input type="text" class="form-control" id="reservation_id" name="reservation_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Confirmed">Confirmed</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="action closebtn" data-dismiss="modal">Close</button>
                <button type="button" class="action save" onclick="$('#reservationForm').submit();" name="Save_content">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>

<!------------------
  ADD RESERVATION
------------------->
<div class="modal fade" id="addModalReservation" tabindex="-1" role="dialog" aria-labelledby="addModalReservationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalReservationLabel">Add Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="product_id">PRODUCT ID</label>
                        <input type="text"  class="form-control" id="product_id" name="product_id" placeholder="Product ID" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" min="0" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
                    </div>
        
                    <button type="submit" name="update_product" class="action updateproduct">SAVE</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!---------------
   JS
---------------->
<script src="admin-inventory.js"></script>
<script src="https://kit.fontawesome.com/865faf11ce.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    let navVisible = false;
    
    function toggleClick() {
        const body = $('body');
        const navContainer = $('#nav-container');
        
        if (!navVisible) {
            navContainer.css('left', '0');
            body.css('overflow', 'hidden');
        } else {
            navContainer.css('left', '-800px');
            body.css('overflow', 'auto');
        }
        
        navVisible = !navVisible;
    }
    
    $(document).ready(function() {
        // Function to show preview
        function showPreview(element) {
            var preview = element.querySelector(".preview");
            preview.style.display = "block";
        }

        // Function to hide preview
        function hidePreview(element) {
            var preview = element.querySelector(".preview");
            preview.style.display = "none";
        }
        
        // Edit Reservation Button Click
        $('button.status.edit').click(function() {
            var reservationId = $(this).data('id');
            var status = $(this).data('status');

            $('#reservation_id').val(reservationId);
            $('#status').val(status); 
        });

        // Example for Product Edit Button Click
        $('button.btn-secondary').click(function() {
            var id = $(this).data('id');
            var products_id = $(this).data('products_id');
            var products_name = $(this).data('products_name');
            var image = $(this).data('image');
            var total_units = $(this).data('total_units');
            var reserved_units = $(this).data('reserved_units');
            var description = $(this).data('description'); 
            var unit_price = $(this).data('unit_price'); 
            var specs_cpu = $(this).data('specs_cpu');
            var specs_motherboard = $(this).data('specs_motherboard'); 
            var specs_ram = $(this).data('specs_ram');
            var specs_ssd = $(this).data('specs_ssd');
            var specs_monitor = $(this).data('specs_monitor'); 
            var specs_computercase = $(this).data('specs_computercase'); 
            var specs_powersupply = $(this).data('specs_powersupply'); 
            var specs_fan = $(this).data('specs_fan'); 

            $('#product_id').val(id);
            $('#product_products_id').val(products_id);
            $('#product_name').val(products_name);
            $('#product_image').attr('src', 'Images/' + image);
            $('#product_total_units').val(total_units);
            $('#product_reserved_units').val(reserved_units);
            $('#product_description').val(description); 
            $('#product_unit_price').val(unit_price); 
            $('#specs_cpu').val(specs_cpu); 
            $('#specs_motherboard').val(specs_motherboard); 
            $('#specs_ram').val(specs_ram); 
            $('#specs_ssd').val(specs_ssd); 
            $('#specs_monitor').val(specs_monitor);
            $('#specs_computercase').val(specs_computercase); 
            $('#specs_powersupply').val(specs_powersupply); 
            $('#specs_fan').val(specs_fan); 
        });
    });
</script>

</body>
</html>
