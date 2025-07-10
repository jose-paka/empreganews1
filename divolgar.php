<?php
session_start();
include_once("conexao.php");
if(!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'empresa') {
    header('Location: index.php');
    exit;
}
$result = $conn->query("SELECT * FROM vagas ORDER BY created DESC");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style_Version2.css">
    <link rel="shortcut icon" href="./img/img/4.png" type="image/x-icon">
    <title>Divolgar Vagas</title>
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

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1em;
    background: #fff;
}
th, td {
    border: 1px solid #eee;
    padding: 8px;
    text-align: left;
}
th {
    background: #2a6dad;
    color: #fff;
}
/**/
form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-bottom: 16px;
}
input, textarea, button {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #b3c3db;
    font-size: 16px;
}
input:focus, textarea:focus {
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
/**/

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
    <!-- Área para empresas -->

     <main>
        <section class="motivacional">
            <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <h2>Área da Empresa Cadastrar Vagas</h2>
        <form method="POST" class="form"  action="./proc_vaga/proc_cad_candidato.php">
            
        <input type="text" name="nome_empresa" placeholder="Nome da Empresa" required><br><br>

        <input type="text" name="nome" placeholder="Titulo da Vaga" required><br><br>

        <input type="text" name="tipo" placeholder="Tipo da Vaga" required><br><br>

        <input type="text" name="area" placeholder="Areia de atuação" required><br><br>

        <input type="text" name="nivel" placeholder="Nivel da Vaga" required><br><br>

        <input type="text" name="cidade" placeholder="Localidade" required><br><br>

        <label>Descrição:</label><br><br>
        <textarea name="descricao" placeholder="Qual é a descrição desta vaga" required></textarea>
        <br><b>
        <input type="submit"  class="watch-btn2" value="Cadastrar">
        
        </form>
        </section>

        <section class="motivacional">
            <h2>Minhas Vagas Publicadas</h2>
 <?php
    /* if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
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
            echo "Nº: " . $row_usuario['id'] . "<br>";
            echo "Empresa: " . $row_usuario['nome_empresa'] . "<br>";
            echo "Titulo da vaga: " . $row_usuario['nome'] . "<br>";
            echo "Tipo de vaga: " . $row_usuario['tipo'] . "<br>";
            echo "Areia: " . $row_usuario['area'] . "<br>";
            echo "Nivel: " . $row_usuario['nivel'] . "<br>";
            echo "Cidade: " . $row_usuario['cidade'] . "<br>";
            echo "Descricao: " . $row_usuario['descricao'] . "<br>";
            echo "<br><a class='watch-btn2' href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
            echo "<br><a class='watch-btn2' onclick='return confirm('Tem certeza que deseja excluir?')' href='delete.php?id=" .$row_usuario['id']. "'>Exclurir</a><br><hr>";

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
        echo "<br><a class='watch-btn2' href='divolgar.php?pagina=1'>Primeira</a> ";
        
        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                echo "<a href='divolgar.php?pagina=$pag_ant'>$pag_ant</a> ";
            }
        }
            
        echo "$pagina ";
        
        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                echo "<a href='divolgar.php?pagina=$pag_dep'>$pag_dep</a> ";
            }
        }
        
        echo "<a class='watch-btn2' href='divolgar.php?pagina=$quantidade_pg'>Ultima</a>";
        */  ?>  
        
<table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Tipo</th>
                <th>Area</th>
                <th>Nivel</th>
                <th>Cidade</th>
                <th>Descrição</th>
                <th>Criada em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($vaga = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($vaga['nome']); ?></td>
                <td><?php echo htmlspecialchars($vaga['tipo']); ?></td>
                <td><?php echo htmlspecialchars($vaga['area']); ?></td>
                <td><?php echo htmlspecialchars($vaga['nivel']); ?></td>
                <td><?php echo htmlspecialchars($vaga['cidade']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($vaga['descricao'])); ?></td>
                <td><?php echo $vaga['created']; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $vaga['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    <a href='edit_usuario.php?id=" . $vaga['id'] . "'>Editar</a>
                </td>
              
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>


    </section>
  </main>

         <!-- Footer -->
    <footer>
        <div class="footer-main">
            <div class="footer-logo">
               <h1>Emprega<span style="color: #ffc20a;">News</span></h1>
            </div>
             <div class="footer-links">
                <a href="mailto:empreganews@gmail.com?subject=Contato%20via%20site&body=Olá, gostaria de entrar em contato.">Contato</a>
                <a href="https://wa.me/932906604?text=Olá, gostaria de saber mais sobre a plataforma." target="_blank">WhatsApp</a>
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