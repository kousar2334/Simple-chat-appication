<?php
session_start();
if (isset($_SESSION['err_msg']) && !empty($_SESSION['err_msg'])) {
    echo "<h2>". $_SESSION['err_msg']. "</h2>";
    unset($_SESSION['err_msg']);
}
