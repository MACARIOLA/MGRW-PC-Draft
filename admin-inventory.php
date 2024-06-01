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
        @include 'PHP/admin-config.php';
        @include 'PHP/admin-update.php';
        @include 'PHP/admin-update-reservation.php';
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
            <a class="active" href="admin-inventory.php" style="--i:1">Inventory</a>
            <a href="admin-reservation.php" style="--i:2">Reservation</a>
            <a href="admin-cms.php" style="--i:2">CMS</a>
            <a href="admin-feedback.php" style="--i:3">Feedbacks</a>
            <a href="admin-contact-us.php" style="--i:4">Inbox</a>
        </nav>
    </header> 



    <!---------------
          TABLES
    ---------------->
    <div class="container-main">
        <div class="container1">
            <main class="table" id="customers_table">

                <!---------------
                    INVENTORY
                ---------------->
                <section class="table__header">
                    <h2>INVENTORY</h2>
                    <div class="input-group">
                        <input type="search" placeholder="Search Data..." id="inventorySearchInput" onkeyup="searchTable()">
                        <img src="images/search.png" alt="">
                    </div>
                    <button type="dropdown" class='add' data-toggle="modal" data-target="#openInventoryTypes">ADD</button>
                </section>

                <section class="table__body">
                    <table id="inventoryTable">
                        <thead>
                            <tr>
                                <th> PRODUCT ID </th>
                                <th> PRODUCT NAME </th>
                                <th> IMAGE </th>
                                <th> TOTAL UNITS </th>
                                <th> RESERVED UNITS </th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM inventory";
                                $result = mysqli_query($conn, $sql);
                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['products_id']; ?></td>
                                                <td><?php echo $row['products_name']; ?></td>
                                                <td>
                                                    <div class="image-container" onmouseover="showPreview(this)" onmouseout="hidePreview(this)">
                                                        <img src="data:image;base64,<?php echo base64_encode($row['image']); ?>" alt="Product Image">
                                                        <img id="preview-<?php echo htmlspecialchars($row['id']); ?>" class="preview" src="data:image;base64,<?php echo base64_encode($row['image']); ?>" alt="Preview" style="display: none;">
                                                    </div>
                                                </td>
                                                <td><?php echo htmlspecialchars($row['total_units']); ?></td>
                                                <td><?php echo htmlspecialchars($row['reserved_units']); ?></td>
                                                <td>
                                                    <button class="status edit" data-toggle="modal" data-target="#updateModal" 
                                                        data-id="<?php echo htmlspecialchars($row['id']); ?>" 
                                                        data-products_id="<?php echo htmlspecialchars($row['products_id']); ?>" 
                                                        data-products_name="<?php echo htmlspecialchars($row['products_name']); ?>" 
                                                        data-image="<?php echo base64_encode($row['image']); ?>" 
                                                        data-total_units="<?php echo htmlspecialchars($row['total_units']); ?>" 
                                                        data-reserved_units="<?php echo htmlspecialchars($row['reserved_units']); ?>"
                                                        data-description="<?php echo htmlspecialchars($row['description']); ?>"
                                                        data-unit_price="<?php echo htmlspecialchars($row['unit_price']); ?>"
                                                        data-specs_cpu="<?php echo htmlspecialchars($row['specs_cpu']); ?>"
                                                        data-specs_motherboard="<?php echo htmlspecialchars($row['specs_motherboard']); ?>"
                                                        data-specs_ram="<?php echo htmlspecialchars($row['specs_ram']); ?>"
                                                        data-specs_ssd="<?php echo htmlspecialchars($row['specs_ssd']); ?>"
                                                        data-specs_monitor="<?php echo htmlspecialchars($row['specs_monitor']); ?>"
                                                        data-specs_computercase="<?php echo htmlspecialchars($row['specs_computercase']); ?>"
                                                        data-specs_powersupply="<?php echo htmlspecialchars($row['specs_powersupply']); ?>"
                                                        data-specs_fan="<?php echo htmlspecialchars($row['specs_fan']); ?>">
                                                        Edit
                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="status delete" onclick="deleteProduct(<?php echo $row['id']; ?>)">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>

    <!------------------
    WHAT TYPE OF PRODUCT
    ------------------->
    <div class="modal fade" id="openInventoryTypes">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">What Kind of Product Will Be stored?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body1">
                    <button class='action sulitbuttons' data-toggle="modal" data-target="#addSulitPC">Sulit PC</button>
                    <button class='action sulitbuttons' data-toggle="modal" data-target="#addSulitLaptop">Sulit Laptop</button>
                    <button class='action sulitbuttons' data-toggle="modal" data-target="#addSulitPrinter">Sulit Printer</button>
                    <button class='action sulitbuttons' data-toggle="modal" data-target="#addOthers">Other Accesories</button>
                </div>
            </div>
        </div>
    </div>

    <!---------------
    UPDATE INVENTORY
    ---------------->
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
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="product_id">
                        <div class="form-group">
                            <label for="product_products_id">Product ID</label>
                            <input type="text" class="form-control" id="product_products_id" name="product_products_id" placeholder="Enter product ID" required>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                        </div>
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" class="form-control" id="product_image" name="product_image" accept="image/png, image/jpeg, image/jpg">
                        </div>
                        <div class="form-group">
                            <label for="product_description">Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" placeholder="Enter product description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_unit_price">Unit Price</label>
                            <input type="number" class="form-control" id="product_unit_price" name="product_unit_price" placeholder="Enter unit price" required>
                        </div>
                        <div class="form-group">
                            <label for="product_total_units">Total Units</label>
                            <input type="number" min="0" class="form-control" id="product_total_units" name="product_total_units" placeholder="Enter total units" required>
                        </div>
                        <div class="form-group">
                            <label for="product_reserved_units">Reserved Units</label>
                            <input type="number" min="0" class="form-control" id="product_reserved_units" name="product_reserved_units" placeholder="Enter reserved units" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_cpu">CPU Specs</label>
                            <input type="text" class="form-control" id="specs_cpu" name="specs_cpu" placeholder="Enter CPU specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_motherboard">Motherboard Specs</label>
                            <input type="text" class="form-control" id="specs_motherboard" name="specs_motherboard" placeholder="Enter motherboard specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_ram">RAM Specs</label>
                            <input type="text" class="form-control" id="specs_ram" name="specs_ram" placeholder="Enter RAM specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_ssd">SSD Specs</label>
                            <input type="text" class="form-control" id="specs_ssd" name="specs_ssd" placeholder="Enter SSD specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_monitor">Monitor Specs</label>
                            <input type="text" class="form-control" id="specs_monitor" name="specs_monitor" placeholder="Enter monitor specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_computercase">Computer Case Specs</label>
                            <input type="text" class="form-control" id="specs_computercase" name="specs_computercase" placeholder="Enter computer case specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_powersupply">Power Supply Specs</label>
                            <input type="text" class="form-control" id="specs_powersupply" name="specs_powersupply" placeholder="Enter power supply specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_fan">Fan Specs</label>
                            <input type="text" class="form-control" id="specs_fan" name="specs_fan" placeholder="Enter fan specs" required>
                        </div>
                        <button type="submit" name="update_product" class="action updateproduct">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <!------------------
        ADD SULIT PC
    ------------------->
    <div class="modal fade" id="addSulitPC" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="PHP/insert_product.php">
                        <input type="hidden" name="id" id="product_id">
                        <div class="form-group">
                            <label for="product_products_id">Product ID</label>
                            <input type="text" class="form-control" id="product_products_id" name="product_products_id" placeholder="Enter product ID" required>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" placeholder="Enter product description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_unit_price">Unit Price</label>
                            <input type="number" class="form-control" id="product_unit_price" name="product_unit_price" placeholder="Enter unit price" required>
                        </div>
                        <div class="form-group">
                            <label for="product_total_units">Total Units</label>
                            <input type="number" min="0" class="form-control" id="product_total_units" name="product_total_units" placeholder="Enter total units" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_cpu">CPU Specs</label>
                            <input type="text" class="form-control" id="specs_cpu" name="specs_cpu" placeholder="Enter CPU specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_motherboard">Motherboard Specs</label>
                            <input type="text" class="form-control" id="specs_motherboard" name="specs_motherboard" placeholder="Enter motherboard specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_ram">RAM Specs</label>
                            <input type="text" class="form-control" id="specs_ram" name="specs_ram" placeholder="Enter RAM specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_ssd">SSD Specs</label>
                            <input type="text" class="form-control" id="specs_ssd" name="specs_ssd" placeholder="Enter SSD specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_monitor">Monitor Specs</label>
                            <input type="text" class="form-control" id="specs_monitor" name="specs_monitor" placeholder="Enter monitor specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_computercase">Computer Case Specs</label>
                            <input type="text" class="form-control" id="specs_computercase" name="specs_computercase" placeholder="Enter computer case specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_powersupply">Power Supply Specs</label>
                            <input type="text" class="form-control" id="specs_powersupply" name="specs_powersupply" placeholder="Enter power supply specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_fan">Fan Specs</label>
                            <input type="text" class="form-control" id="specs_fan" name="specs_fan" placeholder="Enter fan specs" required>
                        </div>
            
                        <button type="submit" name="update_product" class="action updateproduct">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!------------------
      ADD SULIT LAPTOP
    ------------------->
    <div class="modal fade" id="addSulitLaptop" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="PHP/insert_product.php">
                        <input type="hidden" name="id" id="product_id">
                        <div class="form-group">
                            <label for="product_products_id">Product ID</label>
                            <input type="text" class="form-control" id="product_products_id" name="product_products_id" placeholder="Enter product ID" required>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" placeholder="Enter product description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_unit_price">Unit Price</label>
                            <input type="number" class="form-control" id="product_unit_price" name="product_unit_price" placeholder="Enter unit price" required>
                        </div>
                        <div class="form-group">
                            <label for="product_total_units">Total Units</label>
                            <input type="number" min="0" class="form-control" id="product_total_units" name="product_total_units" placeholder="Enter total units" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_cpu">CPU Specs</label>
                            <input type="text" class="form-control" id="specs_cpu" name="specs_cpu" placeholder="Enter CPU specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_ram">RAM Specs</label>
                            <input type="text" class="form-control" id="specs_ram" name="specs_ram" placeholder="Enter RAM specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_ssd">SSD Specs</label>
                            <input type="text" class="form-control" id="specs_ssd" name="specs_ssd" placeholder="Enter SSD specs" required>
                        </div>
                        <div class="form-group">
                            <label for="specs_monitor">Monitor Specs</label>
                            <input type="text" class="form-control" id="specs_monitor" name="specs_monitor" placeholder="Enter monitor specs" required>
                        </div>
            
                        <button type="submit" name="update_product" class="action updateproduct">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!------------------
      ADD SULIT PRINTER
    ------------------->
    <div class="modal fade" id="addSulitPrinter" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="PHP/insert_product.php">
                        <input type="hidden" name="id" id="product_id">
                        <div class="form-group">
                            <label for="product_products_id">Product ID</label>
                            <input type="text" class="form-control" id="product_products_id" name="product_products_id" placeholder="Enter product ID" required>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" placeholder="Enter product description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_unit_price">Unit Price</label>
                            <input type="number" class="form-control" id="product_unit_price" name="product_unit_price" placeholder="Enter unit price" required>
                        </div>
                        <div class="form-group">
                            <label for="product_total_units">Total Units</label>
                            <input type="number" min="0" class="form-control" id="product_total_units" name="product_total_units" placeholder="Enter total units" required>
                        </div>
            
                        <button type="submit" name="update_product" class="action updateproduct">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!------------------
         ADD OTHERS
    ------------------->
    <div class="modal fade" id="addOthers" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="PHP/insert_product.php">
                        <input type="hidden" name="id" id="product_id">
                        <div class="form-group">
                            <label for="product_products_id">Product ID</label>
                            <input type="text" class="form-control" id="product_products_id" name="product_products_id" placeholder="Enter product ID" required>
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" placeholder="Enter product description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_unit_price">Unit Price</label>
                            <input type="number" class="form-control" id="product_unit_price" name="product_unit_price" placeholder="Enter unit price" required>
                        </div>
                        <div class="form-group">
                            <label for="product_total_units">Total Units</label>
                            <input type="number" min="0" class="form-control" id="product_total_units" name="product_total_units" placeholder="Enter total units" required>
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
    <script>
        function deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'PHP/delete_product.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        if (xhr.responseText.includes('Product deleted successfully')) {
                            location.reload();
                        } else {
                            alert('Error: ' + xhr.responseText);
                        }
                    } else {
                        alert('Request failed. Returned status of ' + xhr.status);
                    }
                };

                xhr.send('id=' + id);
            }
        }

        $(document).ready(function() {
            $('#updateModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var product_products_id = button.data('products_id');
                var product_name = button.data('products_name');
                var product_image = button.data('image');
                var product_total_units = button.data('total_units');
                var product_reserved_units = button.data('reserved_units');       
                var product_description = button.data('description');
                var product_unit_price = button.data('unit_price');
                var specs_cpu = button.data('specs_cpu');
                var specs_motherboard = button.data('specs_motherboard');
                var specs_ram = button.data('specs_ram');
                var specs_ssd = button.data('specs_ssd');
                var specs_monitor = button.data('specs_monitor');
                var specs_computercase = button.data('specs_computercase');
                var specs_powersupply = button.data('specs_powersupply');
                var specs_fan = button.data('specs_fan');
                
                var modal = $(this);
                modal.find('#product_id').val(id);
                modal.find('#product_products_id').val(product_products_id);
                modal.find('#product_name').val(product_name);
                modal.find('#product_total_units').val(product_total_units);
                modal.find('#product_reserved_units').val(product_reserved_units);
                modal.find('#product_description').val(product_description);
                modal.find('#product_unit_price').val(product_unit_price);
                modal.find('#specs_cpu').val(specs_cpu);
                modal.find('#specs_motherboard').val(specs_motherboard);
                modal.find('#specs_ram').val(specs_ram);
                modal.find('#specs_ssd').val(specs_ssd);
                modal.find('#specs_monitor').val(specs_monitor);
                modal.find('#specs_computercase').val(specs_computercase);
                modal.find('#specs_powersupply').val(specs_powersupply);
                modal.find('#specs_fan').val(specs_fan);
            });
        });
    </script>


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
