<?php

@include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MGWR PC | Inventory</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="./Images/Tab Icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/mainstyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-oP7mI/HC6pVx2jzrLnMlqA25eXHVTQwYb3CgeCLHq/9ItT5qro5BxxL5tWnfqFi/OA7NTVAtTAjyQq62oyC7Ig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/admin-inventory.css">
    <script src="js/mainscript.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       

  
</head>
<body>
    <header class="header m-header">
        <a href="adminAnalytics.html"
        id="logl"><img src="Images/MGWR PC Logo.png" alt="" class="logo"></a>

        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <img src="Images/Menu.png" alt="" id="menu-icon">
            <img src="Images/MenuX.png" alt="" id="close-icon">
        </label>
        
        
   <div class="nav-container" id="nav-container">
        <nav class="navbar" id="navbar">
                <a href="adminAnalytics.html" style="--i:0">Analytics</a>
                <a class="active" href="admin-inventory.html" style="--i:1">Inventory</a>
                <a href="admin-inventory.html" style="--i:2">CMS</a>
                <a href="feedback.html" style="--i:3">Feedbacks</a>
                <a href="contact.html" style="--i:4">Contact Us</a>
        </nav>
       </div>
<i class="fa-solid fa-bars" id="menu" onclick="toggleClick()"></i>


    </header> 

<div class="container-main">
   <div class="container1">
   <main class="table" id="customers_table">
        <section class="table__header">
          
            <h2>INVENTORY</h2>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">

            </div>
            

        </section>

<section class="table__body">

    <table>

    <thead>
            <tr>
                <th> PRODUCT ID </th>
                <th> PRODUCT NAME </th>
                <th> IMAGE </th>
                <th> TOTAL UNITS </th>
                <th> RESERVED UNITS </th>
                <th>UPDATE</th>
            </tr>
        </thead>
      

      
      <tbody>
      
       <?php 
         $select = mysqli_query($conn, "SELECT * FROM inventory");
         while($row = mysqli_fetch_assoc($select)){ 
         ?>
         <tr>
            <td><?php echo $row['products_id']; ?></td>
            <td><?php echo $row['products_name']; ?></td>
            <td>
            <div class="image-container" onmouseover="showPreview()" onmouseout="hidePreview()">
                                <img src="uploaded_img/<?php echo $row['image']; ?>">
                                <img id="preview" src="uploaded_img/<?php echo $row['image']; ?>" alt="Preview">
                            </div>
                        </td>
            <td><?php echo $row['total_units']; ?></td>
            <td><?php echo $row['reserved_units']; ?></td>
            <td>
              <button style="background:none;border:none;" class="btn btn-secondary edit-btn" data-toggle="modal" data-target="#updateModal" data-id="<?php echo $row['id']; ?>" data-products_id="<?php echo $row['products_id']; ?>" data-products_name="<?php echo $row['products_name']; ?>" 
              data-image="<?php echo $row['image']; ?>" 
            
              data-total_units="<?php echo $row['total_units']; ?>" data-reserved_units="<?php echo $row['reserved_units']; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"/><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"/></svg> 
</button>
          
              
            </td>
         </tr>
         
         <?php } ?>
         
      </tbody>
      

    </table>
</section>

   <section class="table__header">



        <h2>RESERVATION</h2>
        <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="images/search.png">
        </div>
    </section>

    <section class="table__body">
        <table>
            <thead class="thead">
                <tr>
                    <th> RESERVATION ID </th>
                    <th> CUSTOMER ID </th>
                    <th> PRODUCT ID </th>
                    <th> QUANTITY </th>
                    <th> STATUS </th>
                    <th>UPDATE</th>
        
                </tr>
            </thead><tbody>
    <?php 
    $select = mysqli_query($conn, "SELECT * FROM reservation");
    while($row = mysqli_fetch_assoc($select)){ 
    ?>
    <tr>
        <td><?php echo $row['reservation_name']; ?></td>
        <td><?php echo $row['customer']; ?></td>
        <td><?php echo $row['product']; ?></td>
        <td><?php echo $row['reserved_units']; ?></td>

        
        <td>
            <p class="status <?php echo $row['status']; ?>"><?php echo strtoupper($row['status']); ?></p>
        </td>
        <td>
       <button style="background:none;border:none;" class="btn btn-info edit-btn" data-toggle="modal" data-target="#reservationmodal" data-id="<?php echo $row['id']; ?>" data-reservation="<?php echo $row['reservation_name']; ?>" data-customer="<?php echo $row['customer']; ?>" data-product="<?php echo $row['product']; ?>" data-reserved_units="<?php echo $row['reserved_units']; ?>" 
      
       data-status="<?php echo $row['status']; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"/><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"/></svg> 
</button>
          
              
        </td>
        
    </tr>
    <?php } ?> 
</tbody>

        </table>
    </section>
</main>
   </div>
   </div>





<!-- Modal for inventory -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="product_id">
                    <div class="form-group">
                        <label for="product_products_id">Product ID</label>
                        <input type="text" class="form-control" id="product_products_id" name="product_products_id" placeholder="Enter product ID" required="">
                    </div>
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required="">
                    </div>
                    <div class="form-group">
                        <label for="product_image">Product Image</label>
                        <input type="file" class="form-control" id="product_image" name="product_image" accept="image/png, image/jpeg, image/jpg">
                    </div>
                    <div class="form-group">
                        <label for="product_total_units">Total Units</label>
                        <input type="number" min="0" class="form-control" id="product_total_units" name="product_total_units" placeholder="Enter total units" required="">
                    </div>
                    <div class="form-group">
                        <label for="product_reserved_units">Reserved Units</label>
                        <input type="number" min="0" class="form-control" id="product_reserved_units" name="product_reserved_units" placeholder="Enter reserved units" required="">
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_product">Update Inventory</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- Modal for reservation -->
    <div class="modal fade" id="reservationmodal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservationModalLabel">Update Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update_reservation.php" method="post">
                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label for="reservation_name">Reservation Name</label>
                            <input type="text" class="form-control" id="reservation_name" name="reservation" required="">
                        </div>
                        <div class="form-group">
                            <label for="customer">Customer</label>
                            <input type="text" class="form-control" id="customer" name="customer">
                        </div>
                        <div class="form-group">
                            <label for="product">Product</label>
                            <input type="text"class="form-control" id="product" name="product" required="">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" min="0" class="form-control" id="quantity" name="reserved_units" required="">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                                <option value="pending">Pending</option>
                                <option value="shipped">Shipped</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update_reservation">Update Reservation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

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
        ////for inventory
        $(document).ready(function() {
            $('button.btn-secondary').click(function() {
                var id = $(this).data('id');
                var products_id = $(this).data('products_id');
                var products_name = $(this).data('products_name');
                var image = $(this).data('image');
                var total_units = $(this).data('total_units');
                var reserved_units = $(this).data('reserved_units');

                $('#product_id').val(id);
                $('#product_products_id').val(products_id);
                $('#product_name').val(products_name);
                $('#product_image').attr('src', 'uploaded_img/' + image);

                $('#product_total_units').val(total_units);
                $('#product_reserved_units').val(reserved_units);
            });
        });
        
const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');


search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}
    
        function showPreview() {
            document.getElementById("preview").style.display = "block";
        }

        function hidePreview() {
            document.getElementById("preview").style.display = "none";
        }

        
function toggleClick() {
  const navContainer = document.getElementById("nav-container");
  if (navContainer.style.left === '-800px') {
    navContainer.style.left = '0';
  } else {
    navContainer.style.left = '-800px';
  }
}

        ////for reservation
        $(document).ready(function() {
            $('button.btn-info').click(function() {
                var id = $(this).data('id');
                var reservation = $(this).data('reservation');
                var customer = $(this).data('customer');
                var product = $(this).data('product');
                var quantity = $(this).data('reserved_units'); 
                var status = $(this).data('status');
                
                $('#id').val(id);
                $('#reservation_name').val(reservation);
                $('#customer').val(customer);
                $('#product').val(product);
                $('#quantity').val(quantity);
                
                $('#status').val(status);
            });
        });
    </script>
</body>

</html>
