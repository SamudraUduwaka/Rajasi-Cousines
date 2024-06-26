<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"]) && isset($_GET["id"])) {

    $pid = $_GET["id"];
?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Rajasi | Admin | Update products</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="home.css" />
        <link rel="stylesheet" href="admin.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    </head>

    <body style="background-color: rgb(250, 93, 2); background-image: linear-gradient(90deg,rgb(250, 93, 2) 0%,rgb(240, 188, 93) 100%);">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="row bg-light m-2">

                        <div class="col-12 col-lg-5 mt-lg-5">
                            <nav aria-label="breadcrumb">
                                
                                <i class="bi bi-bag-plus-fill"></i>
                                
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admindashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Products</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="col-12 col-lg-7 text-center text-lg-start">
                            <img src="images/rajasilogoo.jpg" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p class="text-center fs-1 p-5 text-dark fw-bolder">Update the Item</p>
                </div>
            </div>

            <?php
            
            $productrs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
            $productd = $productrs->fetch_assoc();
            
            ?>

            <div class="row">
                <div class="col-12">
                    <div class="row border border-1 border-primary p-3 mb-2">
                        <div class="col-12 d-grid">
                            <div class="ui left labeled input">
                                <div class="ui basic label">
                                    Title of the item
                                </div>
                                <input type="text" placeholder="Enter title.." id="ti" value="<?php echo $productd["title"];?>">
                            </div>
                        </div>

                        <hr class="hrbreak1" />

                        <div class="col-12 col-lg-4 d-grid mt-3 mb-3">
                            <div>
                                <span class="fw-bold fs-5">Product Price</span>
                            </div>
                            <div class="ui right labeled input">
                                <label for="price" class="ui label">Rs</label>
                                <input type="text" placeholder="Amount" id="price" value="<?php echo $productd["price"];?>">
                                <div class="ui basic label">.00</div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 d-grid mt-3 mb-3">
                            <div>

                                <span class="fw-bold fs-5">Product Quantity</span>
                            </div>
                            <div class="ui left labeled input">
                                <div class="ui basic label">
                                    Quantity available
                                </div>
                                <input type="number" id="qty" value="<?php echo $productd["qty"];?>">
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 d-grid mt-3 mb-3">
                            <div>

                                <span class="fw-bold fs-5">Product Category</span>
                            </div>
                            <select class="form-select" id="cat">
                                <?php
                                
                                $catrs = Database::search("SELECT * FROM `category` WHERE `id`='".$productd["category_id"]."'");
                                $catd = $catrs->fetch_assoc();
                                
                                ?>
                                <option value="<?php echo $catd["id"];?>"><?php echo $catd["name"];?></option>
                                <?php

                                $cat = Database::search("SELECT * FROM `category` WHERE `id`!='".$productd["category_id"]."' ");
                                $ncat = $cat->num_rows;

                                for ($x = 0; $x < $ncat; $x++) {
                                    $dcat = $cat->fetch_assoc();
                                ?>
                                    <option value="<?php echo $dcat["id"]; ?>"><?php echo $dcat["name"]; ?></option>
                                <?php
                                }

                                ?>
                            </select>
                        </div>

                        <hr class="hrbreak1" />

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fw-bold fs-5">Delivery Costs</label>
                                </div>
                                <div class="offset-lg-1 col-12 col-lg-3">
                                    <label class="form-label fw-bold fs-5">Delivery cost within Colombo</label>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwc" value="<?php echo $productd["delivery_fee_colombo"];?>">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label"></label>
                                </div>
                                <div class="offset-lg-1 col-12 col-lg-3 mt-3">
                                    <label class="form-label fw-bold fs-5">Delivery cost out of Colombo</label>
                                </div>
                                <div class="col-12 col-lg-7 mt-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="doc" value="<?php echo $productd["delivery_fee_other"];?>">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="hrbreak1" />

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fw-bold fs-5">Product Description</label>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" cols="100" rows="10" style="background-color: ghostwhite;" id="desc"><?php echo $productd["description"];?></textarea>
                                </div>
                            </div>
                        </div>

                        <hr class="hrbreak1" />

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label fw-bold fs-5">Add Product Image</label>
                                </div>
                                <?php
                                
                                $imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$pid."'");
                                $imgn = $imgrs->num_rows;

                                $img1;
                                $img2;
                                $img3;

                                for($a=0; $a<$imgn; $a++){
                                    $imgd = $imgrs->fetch_assoc();
                                    if($a==0){
                                        $img1 = $imgd['code'];
                                    }
                                    if($a==1){
                                        $img2 = $imgd['code'];
                                    }
                                    if($a==2){
                                        $img3 = $imgd['code'];
                                    }
                                }
                                
                                ?>
                                <div class="col-12 col-lg-4">
                                    <img src="<?php echo $img1;?>" class="col-5 col-lg-2 ms-2 img-thumbnail productimg" id="prev1" />
                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input class="d-none" type="file" accept="img/*" id="imguploader1" />
                                                        <label class="btn btn-primary col-5 col-lg-7" for="imguploader1" onclick="changeImg();">Upload</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <img src="<?php echo $img2;?>" class="col-5 col-lg-2 ms-2 img-thumbnail productimg" id="prev2" />
                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input class="d-none" type="file" accept="img/*" id="imguploader2" />
                                                        <label class="btn btn-primary col-5 col-lg-7" for="imguploader2" onclick="changeImg();">Upload</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <img src="<?php echo $img3;?>" class="col-5 col-lg-2 ms-2 img-thumbnail productimg" id="prev3" />
                                    <div class="col-12 mb-3">
                                        <div class="row">
                                            <div class="col-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <input class="d-none" type="file" accept="img/*" id="imguploader3" />
                                                        <label class="btn btn-primary col-5 col-lg-7" for="imguploader3" onclick="changeImg();">Upload</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="hrbreak1" />

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 offset-0 col-lg-4 offset-lg-4 d-grid">
                                    <button class="btn btn-dark" onclick="updateProduct(<?php echo $pid;?>);">Update item</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <?php require "footer.php"; ?>
        <script src="updateproduct.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php

}

?>