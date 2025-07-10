<?php
include_once("conexao.php");
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM vagas WHERE id = $id");
}
header('Location: divolgar.php');
exit();
?>