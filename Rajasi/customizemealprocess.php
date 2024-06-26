<?php

require "connection.php";

$c = $_GET["id"];

if($c=="1"){
    ?>
    <div class="row mt-5">
                    <div class="col-4 mt-5">
                        <span class="fs-3 fw-bold">Only Breakfast</span>
                    </div>
                    <div class="col-4 mt-2">
                        <span class="fs-4 fw-bold">Foods available for Only Breakfast</span>

                        <div class="row">
                            <div class="col-10 offset-1">
                                
                            </div>
                        </div>
                    </div>
                </div>
    <?php
}

?>