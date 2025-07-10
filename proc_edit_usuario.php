<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome_empresa = filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);

$result = $conn->query("UPDATE SET `vagas` nome_empresa='$nome_empresa', nome='$nome', tipo='$tipo', area='$area', nivel='$nivel', cidade='$cidade', descricao='$descricao', modified=NOW() WHERE id='$id'";);
if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>vaga alterada com sucesso</p>";
	header("Location: divolgar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>não foi editado com sucesso</p>";
	header("Location: edit_usuario.php?id=$id");
}

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

/*
$result_usuario = "UPDATE SET `vagas` nome_empresa='$nome_empresa', nome='$nome', tipo='$tipo', area='$area', nivel='$nivel', cidade='$cidade', descricao='$descricao', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>vaga alterada com sucesso</p>";
	header("Location: divolgar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>não foi editado com sucesso</p>";
	header("Location: edit_usuario.php?id=$id");
}
*/
?>