<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];
?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Rajasi | Chat with us</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/rajasilogoo.jpg" />

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="singleproductview.css" />
        <link rel="stylesheet" href="home.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="font&hr.css" />

        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body style="background-color: rgba(247, 177, 96, 0.89); background-image: linear-gradient(90deg,rgba(247, 177, 96, 0.89) 0%,white 100%);" onload="refresher('<?php echo $email;?>');">

        <div class="container-fluid">
            <div class="row">
                <?php
                require "header.php";
                ?>

                <div class="col-12">
                    <nav>
                        <ol class="d-flex flex-wrap mb-0 list-unstyled bg-white">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active">
                                <a href="#" class="text-black-50 text-decoration-none">Chat with us</a>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="col-12 text-center">
                    <span class="fs-1 fw-bolder"><i class="bi bi-chat-quote-fill"></i> Chat corner</span>
                </div>

                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <img src="images/chat.svg"/>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row border border-dark border-1 rounded">
                                <div class="col-12">
                                    <div class="row px-4 py-5 text-white chatbox" id="chatrow">
                                        
                                    </div>
                                </div>
                                <div class="col-12">
                                    <d1 class="row">
                                        <div class="input-group">
                                            <input type="text" placeholder="Type a message" ares-describebdy="sendbtn" class="form-control rounded-0 border-0 py-4 me-1 bg-light" id="msgtxt"/>
                                            <div class="input-group-append">
                                                <button id="sendbtn" class="btn btn-link fs-2" onclick="sendmessage('<?php echo $email; ?>');"><i class="bi bi-cursor-fill"></i></button>
                                            </div>

                                        </div>
                                    </d1>
                                </div>

                                <!-- text -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

        <?php
        require "footer.php";
        ?>

        <script src="bootstrap.bundle.js"></script>
        <script src="chat.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>

<?php
}

?>