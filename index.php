<?php include './modules/header.php'; ?>

<?php
session_start();
if ($_SESSION['user_role'] == "admin") {
    include './modules/register.php';
}
?>
<?php include './modules/footer.php'; ?>