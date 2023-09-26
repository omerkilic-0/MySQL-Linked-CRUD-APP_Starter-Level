<?php
if ($_GET) {
    include("connections.php");

    if ($connect->query("DELETE FROM article WHERE id =" . (int)$_GET['id'])) {
        header("location:index.php");
    }
}
