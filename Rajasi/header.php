<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="bootstrap.css"/> -->
    <style>
        .logo {
            background-image: url("images/rajasilogoo.jpg");
            /* background-position: center; */
            background-repeat: no-repeat;
            background-size: contain;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="col-12 rounded">
        <div class="row  bg-white p-3 border border-warning border-1 rounded">
            <div class="col-5 mt-4 text-end">
                <span class="text-dark fw-bold fs-2">Welcome to Rajasi </span>
            </div>

            <div class="col-4 logo text-start bg-white">

            </div>
            
            <div class="col-3 dropdown text-end mt-4">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Account
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="wishlist.php"><i class="bi bi-heart-fill"></i>Wishlist</a></li>
                    <li><a class="dropdown-item" href="purchasehistory.php"><i class="bi bi-bag-check-fill"></i>Purchase History</a></li>
                    <li><a class="dropdown-item" href="cart.php"><i class="bi bi-cart-check-fill"></i>Cart</a></li>
                    <!-- <li><a class="dropdown-item" href="sellerproductview.php">My Products</a></li> -->
                    <li><a class="dropdown-item" href="userprofile.php"><i class="bi bi-people-fill"></i>Profile Settings</a></li>
                    <!-- <li><a class="dropdown-item" href="ProductSellingHistory.php">My Sellings</a></li> -->
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-caret-left-square-fill"></i>Log Out</a></li>
                </ul>
            </div>

            
            
        </div>
    </div>
</body>

</html>