<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>EmpregaNews</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style_Version2.css">
    <link rel="shortcut icon" href="./img/img/4.png" type="image/x-icon">
</head>
<style type="text/css">
select {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #b3c3db;
    font-size: 16px;
}
select:focus,{
    outline: 2px solid #1976d2;
    border-color: #1976d2;
}
</style>
<body>
    <!-- Notificações -->
    <div id="notification-banner" class="notification-banner">
        <span id="notification-message">Novas vagas de TI em destaque!</span>
        <span class="close-notification" id="close-notification">&times;</span>
    </div>

    <header>
      <div class="logo">
        <h1>Emprega<span style="color: #ffc20a;">News</span></h1>
      </div>
        <nav>
            <a href="#" id="portal-empresa-link">Portal Empresa</a>
            <a href="#" id="portal-candidato-link">Portal Candidato</a>
        </nav>
        <!-- Barra de busca -->
        <form id="busca-form" class="busca-form">
            <input type="text" id="busca-palavra" placeholder="Buscar vaga, veje em Destaque...">
            <button type="submit">Buscar</button>
        </form>
    </header>

    <!-- imagem-box -->
    <section class="publicidades1">
        <div class="banner">

            <div class="notificacoes">
                
            <span>🔔"Não espere por oportunidades, crie-as."</span>
            </div>
            
        </div>
    </section> 


    <main>
        <section class="publicidades">
            <h2>Vagas em Destaque</h2>
            <!-- Filtros -->
            <div class="filtros-vagas">
                <select id="filtro-tipo">
                    <option value="">Tipo</option>
                    <option value="PJ">Efetivo</option>
                    <option value="Estágio">Estágio</option>
                    <option value="Profissional">Temporário</option>
                </select>
                <select id="filtro-area">
                    <option value="">Área</option>
                    <option value="TI">TI</option>
                    <option value="Administração">Administração</option>
                    <option value="Financeiro">Financeiro</option>
                </select>
                <select id="filtro-nivel">
                    <option value="">Nível</option>
                    <option value="Júnior">Júnior</option>
                    <option value="Pleno">Pleno</option>
                    <option value="Sênior">Sênior</option>
                </select>
                <select id="filtro-cidade">
                    <option value="">Cidade</option>
                    <option value="São Paulo">Luanda</option>
                    <option value="Remoto">Huambo</option>
                    <option value="Rio de Janeiro">Benguela</option>
                </select>
            </div>
            <!-- Lista dinâmica de vagas -->
            <div class="ads" id="lista-vagas">
                <!-- Preenchido via JS -->
            </div>
        </section>

        <!-- Modal de Detalhe da Vaga -->
        <div class="modal" id="modal-vaga">
            <div class="modal-content">
                <span class="close-btn" id="close-modal-vaga">&times;</span>
                <div id="detalhes-vaga">
                    <!-- Detalhes preenchidos via JS -->
                </div>
            </div>
        </div>

        <!-- Carrossel motivacional -->
        <section class="motivacional">
            <h2>Motivação do Dia</h2>
            <div class="carrossel" id="carrossel-motivacional">
                <div class="carrossel-item ativo">
                    <img src="img/img/5.png" alt="Motivacional 1">
                    <blockquote>"O sucesso é a soma de pequenos esforços repetidos dia após dia."</blockquote>
                </div>
                <div class="carrossel-item">
                    <img src="img/img/b.jpg" alt="Motivacional 2">
                    <blockquote>"Acredite em você e todo o resto virá naturalmente."</blockquote>
                </div>
                <div class="carrossel-item">
                    <img src="img/img/6.png" alt="Motivacional 3">
                    <blockquote>"Não espere por oportunidades, crie-as."</blockquote>
                </div>
                <button id="carrossel-prev">&#10094;</button>
                <button id="carrossel-next">&#10095;</button>
            </div>
        </section>

        <!-- Depoimentos -->
        <section class="depoimentos">
            <h2>Depoimentos</h2>
            <div class="depoimentos-container">
                <div class="depoimento">
                    <p>"Consegui meu primeiro emprego graças ao EmpregaNews! Recomendo para todos!"</p>
                    <span>- Ines Andre, Desenvolvedora Júnior</span>
                </div>
                <div class="depoimento">
                    <p>"Divulgamos nossas vagas e tivemos ótimos candidatos. Plataforma simples e eficiente."</p>
                    <span>- Fernando Miranda, RH da ABC Corp</span>
                </div>
                <div class="depoimento">
                    <p>"Achei um estágio perfeito para mim, foi muito fácil e rápido!"</p>
                    <span>- Adilson Molumbila, Estagiário Financeiro</span>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="faq">
            <h2>Perguntas Frequentes</h2>
            <div class="faq-lista">
                <details>
                    <summary>Como me cadastro como candidato?</summary>
                    <p>Clique em "Portal Candidato" no topo da página e preencha o formulário com seus dados.</p>
                </details>
                <details>
                    <summary>Como empresas divulgam vagas?</summary>
                    <p>Clique em "Portal Empresa", faça o cadastro e anuncie suas oportunidades.</p>
                </details>
                <details>
                    <summary>O cadastro é gratuito?</summary>
                    <p>Sim! Tanto para candidatos quanto para empresas o cadastro é 100% gratuito.</p>
                </details>
                <details>
                    <summary>Como entro em contato com o suporte?</summary>
                    <p>Pelo e-mail  empreganews@gmail.com ou pelo formulário no rodapé do site.</p>
                </details>
            </div>
        </section>

        <!-- Blog / Dicas de Carreira -->
        <section class="blog">
            <h2>Dicas de Carreira</h2>
            <div class="blog-cards">
                <div class="blog-card">
                    <h3>Como preparar um bom currículo</h3>
                    <p>Dicas essenciais para destacar seu CV no mercado.</p>
                </div>
                <div class="blog-card">
                    <h3>Como se sair bem em entrevistas</h3>
                    <p>Veja o que os recrutadores mais valorizam em entrevistas online e presenciais.</p>
                </div>
                <div class="blog-card">
                    <h3>Tendências do mercado de trabalho</h3>
                    <p>Descubra as profissões em alta e como se preparar para elas.</p>
                </div>
            </div>
        </section>

        <!-- Depoimentos -->
       <section class="depoimentos1"></section>
    </main>

    <!-- Modal de Login/Cadastro (igual antes) -->
    <div class="modal" id="modal-portal">
        <div class="modal-content">
            <span class="close-btn" id="close-modal">&times;</span>
            <h2 id="portal-title">Login</h2> 
           
           <form  method="POST" action="./cadastro/process_login.php"  id="form-login">
              
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email"  placeholder="Digite seu e-mail" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="password" id="senha"  placeholder="Digite sua senha" required>
                </div>
               
                <button type="submit" id="btn-entrar">Entrar</button><br>
               <p>Não tem conta? <a style="text-decoration:none;" href="./cadastro/register.php">Cadastre-se</a></p>
            </form>


        </div>
    </div>

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

    <script src="script.js"></script>
</body>
</html>