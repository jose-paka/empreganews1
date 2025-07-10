<?php
session_start();
include_once("conexao.php");
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'candidato') {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style_Version2.css">
    <link rel="shortcut icon" href="./img/img/4.png" type="image/x-icon">
    <title>Vagas Disponivies</title>
     <style type="text/css">
   .watch-btn1 {
    text-decoration: none;
    padding: 7px 14px;
    border-radius: 6px;
    border: none;
    background: #ccc;
    color: #2d8cff;
    font-weight: bold;
    cursor: pointer;
    transition: background .2s, color .2s;
}
    .watch-btn1:hover {
    background: #225fa2;
    color: #fff;
}
    .watch-btn2 {
    text-decoration: none;
    padding: 7px 14px;
    border-radius: 6px;
    border: none;
    background: #ccc;
    color: #225fa2;
    font-weight: bold;
    cursor: pointer;
    transition: background .2s, color .2s;
}
    .watch-btn2:hover {
    background: #2d8cff;
    color: #fff;
} 
/**/

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
    
    </style>
</head>
<body>
	
    <!-- Cabeçalho -->
    <header>
      <div class="logo">
        <h1>Emprega<span style="color: #ffc20a;">News</span></h1>
      </div>
          <nav>
            <a href="index.php" class="nav-login">HOME</a>
        <!-- Barra de busca -->
        <form id="busca-form" class="busca-form" method="POST" action="vagas.php">
            <input type="text" id="busca-palavra" name="pesquisar" placeholder="Buscar vaga, cidade ou área...">
            <button type="submit">Buscar</button>
        </form>
          </nav>
    </header>
	
   <main>
        <section class="publicidades">
            <h2>Vagas Diponíveis</h2>
            <!-- Filtros -->
            <div class="filtros-vagas" >
              <?php
		 
	  //Receber o número da página
        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);       
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        
        //Setar a quantidade de itens por pagina
        $qnt_result_pg = 3;
        
        //calcular o inicio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
        
        $result_usuarios = "SELECT * FROM vagas LIMIT $inicio, $qnt_result_pg";
        $resultado_usuarios = mysqli_query($conn, $result_usuarios);
        while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
             
            echo "Titulo da vaga: " . $row_usuario['nome'] . "<br>";
            echo "Tipo de vaga: " . $row_usuario['tipo'] . "<br>";
            echo "Areia: " . $row_usuario['area'] . "<br>";
            echo "Nivel: " . $row_usuario['nivel'] . "<br>";
            echo "Cidade: " . $row_usuario['cidade'] . "<br>";
            echo "Descricao: " . $row_usuario['descricao'] . "<br>";
            echo "<a class='watch-btn2' href='./basecan/enviar_can.php?id=" . $row_usuario['id'] . "'>Candidatar-se a Vaga</a><br>";
            echo "_______________________________________________<br>";
        }
        
        //Paginção - Somar a quantidade de usuários
        $result_pg = "SELECT COUNT(id) AS num_result FROM vagas";
        $resultado_pg = mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        //echo $row_pg['num_result'];
        
        //Quantidade de pagina 
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
        
        //Limitar os link antes depois
        $max_links = 2;
        echo "<br><a class='watch-btn2' href='vagas.php?pagina=1'>Primeira</a> ";
        
        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                echo "<a href='vagas.php?pagina=$pag_ant'>$pag_ant</a> ";
            }
        }
            
        echo "$pagina ";
        
        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                echo "<a href='vagas.php?pagina=$pag_dep'>$pag_dep</a> ";
            }
        }
        
        echo "<a class='watch-btn2' href='vagas.php?pagina=$quantidade_pg'>Ultima</a>";
        
        ?>  
       
            </div>

</section>

 <div id="vagas-section" class="publicidades">
            <h2>Resulrados da busca</h2>

   <?php
    $pesquisar = $_POST['pesquisar'];
    $result_cursos = "SELECT * FROM vagas WHERE nome LIKE '%$pesquisar%' LIMIT 5";
    $resultado_cursos = mysqli_query($conn, $result_cursos);
    
    while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
        echo "Titulo: ".$rows_cursos['nome']."<br>";}
        ?>


        </div>    
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