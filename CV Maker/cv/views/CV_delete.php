<?php
include '../controller/CVController.php';
$cvC = new CVController();
$cvC->deleteCv($_POST['cvid']);
header('Location: cv_list.php');
?>