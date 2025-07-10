<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = $conn->query("SELECT * FROM vagas WHERE id = '$id'");

/*
$result_usuario = "SELECT * FROM `vagas` WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
*/
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style_Version2.css">
    <link rel="shortcut icon" href="./img/img/4.png" type="image/x-icon">
    <title>Editar Vagas</title>
    <style type="text/css">

main {
    display: flex;
    gap: 40px;
    max-width: 1000px;
    margin: 30px auto;
    flex-wrap: wrap;
    justify-content: center;
}
section {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px #0001;
    padding: 28px 24px;
    min-width: 320px;
    max-width: 420px;
    flex: 1 0 320px;
}
form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 16px;
}
input, select, button {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #b3c3db;
    font-size: 16px;
}
input:focus, select:focus {
    outline: 2px solid #1976d2;
    border-color: #1976d2;
}
button {
    background: #1976d2;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background .2s;
}
button:hover {
    background: #1250a5;
}

    </style>
</head>
<body>

	<!-- Cabeçalho -->
    <header>
      <div class="logo">
        <h1>Emprega<span style="color: #ffc20a;">News</span></h1>
      </div>
          <nav>
          <div class="link">
          <a href="index.php" class="nav-login">HOME</a>
          </div>
      </nav>
    </header>
     <main> 
         <!-- Área para empresas -->
		<section  id="empresa-login-section" class="publicidades">
		<h1>Editar Vagas da Empresa <?php echo $row_usuario['nome_empresa']; ?></h1>
		  <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
		<form method="POST" action="proc_edit_usuario.php">
       <input type="text" name="nome_empresa" placeholder="Titulo da Vaga" value="<?php echo $vaga['nome_empresa']; ?>" required><br><br>

       <input type="text" name="nome" placeholder="Titulo da Vaga" value="<?php echo $vaga['nome']; ?>" required><br><br>

        <input type="text" name="tipo" placeholder="Tipo da Vaga" value="<?php echo $vaga['tipo']; ?>" required><br><br>

        <input type="text" name="area" placeholder="Areia de atuação" value="<?php echo $vaga['area']; ?>"  required><br><br>

        <input type="text" name="nivel" placeholder="Nivel da Vaga" value="<?php echo $vaga['nivel']; ?>"  required><br><br>

        <input type="text" name="cidade" placeholder="Provincia" value="<?php echo $vaga['cidade']; ?>" required><br><br>

        <label>Descrição:</label><br><br>
        <textarea name="descricao" placeholder="Qual é a descrição desta vaga" value="<?php echo $vaga['descricao']; ?>"  required></textarea>
        <br><br>
			
			<input type="submit" value="Editar">
		</form>
			</section>

 </main> 

		<!-- Footer -->
		 <footer>
        <div class="footer-main">
            <div class="footer-logo">
               <h1>Emprega<span style="color: #ffc20a;">News</span></h1>
            </div>
            <div class="footer-links">
                <a href="#">Contato</a>
                <a href="#">Política de Privacidade</a>
                <a href="#">Termos de Uso</a>
            </div>
        </div>
        <div class="footer-copy">
            &copy; 2025 EmpregaNews. Todos os direitos reservados.
        </div>
    </footer>

    <script src="script_Version2.js"></script>
	</body>
</html>


    
    
    
           