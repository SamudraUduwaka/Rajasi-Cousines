<?php

session_start();

require "connection.php";

if (isset($_SESSION["a"])) {
    $fname = $_SESSION["a"]["fname"];
    $lname = $_SESSION["a"]["lname"];
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Rajasi | Admin | Chat</title>

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

    <body style="background-color: rgb(250, 93, 2); background-image: linear-gradient(90deg,rgb(250, 93, 2) 0%,rgb(240, 188, 93) 100%);" onload="refreshrecentarea();">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row bg-light m-2">

                        <div class="col-12 col-lg-5 mt-lg-5">
                            <nav aria-label="breadcrumb">

                                <i class="bi bi-bag-plus-fill"></i>

                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admindashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Admin chat</li>
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
                    <p class="text-center fs-1 p-5 text-dark fw-bolder">Messages</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-3">
                    <div class="row">
                        <div class="col-12 col-lg-4" id="rcv">

                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row border border-dark border-1 rounded">
                                <div class="col-12">
                                    <div class="row px-4 py-5 text-white chatbox" id="chatrow">
                                        <div class="col-12 mb-3 text-center">
                                            <div class="msgbodyimg"></div>
                                            <p class="fs-4 mt-3 fw-bold text-black-50">No Messages To Show.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- text -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="adminchat.js"></script>
    </body>

    </html>

<?php
}
?>