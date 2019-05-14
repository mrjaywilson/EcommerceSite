<?php

if (isset($_GET['checkout'])) {
    header("LOCATION: ../views/Checkout.php");
}

if (isset($_GET['shop'])) {
    header("LOCATION: ../views/BrowseProducts.php");
}