<?php
include "../connect_db.php";
// $query = "UPDATE contact SET ".$field."='".$value."' WHERE id=".$editid;
if(isset($_POST['id']) && isset($_POST['groups'])) {
    $query = "INSERT INTO `contact_in_group`(`id`, `contact_id`, `group_id`) VALUES (NULL,'". $_POST['id']."','". $_POST['groups']."')";
    $result = mysqli_query($con,$query);
}
if(isset($_POST['contact_id']) && isset($_POST['stage'])) {
    $query = "UPDATE `contact` SET `stage`='". $_POST['stage']."' WHERE `id`=" . $_POST['contact_id'];
    $result = mysqli_query($con,$query);
}
?>
