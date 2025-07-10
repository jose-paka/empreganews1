// ===== Notificação/Alerta =====
const notificationBanner = document.getElementById("notification-banner");
const closeNotificationBtn = document.getElementById("close-notification");
closeNotificationBtn.onclick = () => notificationBanner.style.display = "none";

// ===== Modal de Login/Cadastro =====
const modal = document.getElementById("modal-portal");
const portalEmpresaLink = document.getElementById("portal-empresa-link");
const portalCandidatoLink = document.getElementById("portal-candidato-link");
const portalTitle = document.getElementById("portal-title");
const closeModal = document.getElementById("close-modal");

portalEmpresaLink.addEventListener("click", function(e) {
    e.preventDefault();    
    
    modal.style.display = "flex";

});

portalCandidatoLink.addEventListener("click", function(e) {
    e.preventDefault();
    
    modal.style.display = "flex";
});

closeModal.addEventListener("click", function() {
    modal.style.display = "none";
});
window.onclick = function(event) {
    if (event.target === modal) modal.style.display = "none";
}


// ===== Vagas (dados simulados) =====
const vagas = [
    {
        id: 1, titulo: "Desenvolvedor Web", empresa: "Tech Solutions",
        tipo: "Temporário", area: "TI", nivel: "Pleno", cidade: "Malange",
        descricao: "Desenvolvimento de aplicações web modernas usando JavaScript e frameworks atuais.",
        requisitos: "Experiência com JS e frameworks (React, Vue ou Angular).",
        beneficios: "Plano de saúde, VR, home-office.",
        detalhes: "Remuneração compatível com o mercado. Oportunidade de crescimento.",
    },
    {
        id: 2, titulo: "Analista Financeiro", empresa: "Grupo Financeiro Angolano",
        tipo: "Efetivo", area: "Financeiro", nivel: "Júnior", cidade: "Huambo",
        descricao: "Controle de fluxo de caixa, lançamentos e conciliação bancária.",
        requisitos: "Formação em Administração ou áreas afins.",
        beneficios: "Vale transporte, VR, assistência médica.",
        detalhes: "Ambiente colaborativo e possibilidade de desenvolvimento.",
    },
    {
        id: 3, titulo: "Estagiário TI", empresa: "ABC Corp",
        tipo: "Estágio", area: "TI", nivel: "Sênior", cidade: "Luanda",
        descricao: "Suporte técnico, manutenção de computadores e redes.",
        requisitos: "Cursando Superior em TI.",
        beneficios: "Bolsa estágio, VT, curso de capacitação.",
        detalhes: "Possibilidade de efetivação após o estágio.",
    },
    {
        id: 4, titulo: "Assistente Administrativo", empresa: "Empresa XPTO",
        tipo: "Temporário", area: "Administração", nivel: "Pleno", cidade: "Benguela",
        descricao: "Atendimento telefônico, organização de arquivos e apoio ao RH.",
        requisitos: "Ensino Médio completo. Desejável vivência administrativa.",
        beneficios: "VR, VT, plano odontológico.",
        detalhes: "Horário comercial. Ambiente descontraído.",
    },
    
    // ...adicione mais vagas conforme desejar
];

// Renderiza as vagas da lista
const listaVagas = document.getElementById("lista-vagas");
function renderVagas(vagasParaExibir) {
    listaVagas.innerHTML = "";
    if (!vagasParaExibir.length) {
        listaVagas.innerHTML = "<p style='padding:12px;'>Nenhuma vaga encontrada.</p>";
        return;
    }
    vagasParaExibir.forEach(vaga => {
        const div = document.createElement("div");
        div.className = "ad";
        div.innerHTML = `
            <span class="tipo-vaga">${vaga.tipo}</span>
            <h3>${vaga.titulo}</h3>
            <p>${vaga.empresa} - ${vaga.cidade}</p>
            <p><b>Área:</b> ${vaga.area} | <b>Nível:</b> ${vaga.nivel}</p>
            <button class="ver-detalhes-btn" data-id="${vaga.id}">Ver detalhes</button>
        `;
        listaVagas.appendChild(div);
    });
}
renderVagas(vagas);

// ===== Filtros e Busca =====
const filtroTipo = document.getElementById("filtro-tipo");
const filtroArea = document.getElementById("filtro-area");
const filtroNivel = document.getElementById("filtro-nivel");
const filtroCidade = document.getElementById("filtro-cidade");
const buscaForm = document.getElementById("busca-form");
const buscaPalavra = document.getElementById("busca-palavra");

function filtrarVagas() {
    const tipo = filtroTipo.value;
    const area = filtroArea.value;
    const nivel = filtroNivel.value;
    const cidade = filtroCidade.value;
    const palavra = buscaPalavra.value.trim().toLowerCase();

    let filtradas = vagas.filter(v => {
        return (!tipo || v.tipo === tipo)
            && (!area || v.area === area)
            && (!nivel || v.nivel === nivel)
            && (!cidade || v.cidade === cidade)
            && (
                !palavra ||
                v.titulo.toLowerCase().includes(palavra) ||
                v.empresa.toLowerCase().includes(palavra) ||
                v.area.toLowerCase().includes(palavra) ||
                v.descricao.toLowerCase().includes(palavra) ||
                v.cidade.toLowerCase().includes(palavra)
            );
    });
    renderVagas(filtradas);
}
[filtroTipo, filtroArea, filtroNivel, filtroCidade].forEach(filtro =>
    filtro.addEventListener("change", filtrarVagas)
);
buscaForm.addEventListener("submit", function(e) {
    e.preventDefault();
    filtrarVagas();
});

// ===== Modal Detalhes da Vaga =====
const modalVaga = document.getElementById("modal-vaga");
const closeModalVaga = document.getElementById("close-modal-vaga");
const detalhesVaga = document.getElementById("detalhes-vaga");

listaVagas.addEventListener("click", function(e) {
    if (e.target.classList.contains("ver-detalhes-btn")) {
        const id = parseInt(e.target.getAttribute("data-id"));
        showDetalhesVaga(id);
    }
});
function showDetalhesVaga(id) {
    const vaga = vagas.find(v => v.id === id);
    if (!vaga) return;
    detalhesVaga.innerHTML = `
       <form action="./basecan/enviar_can.php" method="POST">
        <h2>${vaga.titulo}</h2>
        <div class="detalhe-info"><b>Empresa:</b> ${vaga.empresa}</div>
        <div class="detalhe-info"><b>Tipo:</b> ${vaga.tipo} | <b>Área:</b> ${vaga.area} | <b>Nível:</b> ${vaga.nivel}</div>
        <div class="detalhe-info"><b>Cidade:</b> ${vaga.cidade}</div>
        <div class="detalhe-descricao"><b>Descrição:</b> ${vaga.descricao}</div>
        <div class="detalhe-info"><b>Requisitos:</b> ${vaga.requisitos}</div>
        <div class="detalhe-beneficios"><b>Benefícios:</b> ${vaga.beneficios}</div>
        <div class="detalhe-info">${vaga.detalhes}</div>
        <button class="btn-candidatar" onclick="alert('Enviar sua Candidatura agora!')">Candidatar-se</button>
       </form>
        `;
    modalVaga.style.display = "flex";
}
closeModalVaga.onclick = () => modalVaga.style.display = "none";
window.addEventListener("click", function(event) {
    if (event.target === modalVaga) modalVaga.style.display = "none";
});

// ===== Carrossel Motivacional =====
const carrossel = document.getElementById("carrossel-motivacional");
const carrosselItens = carrossel.querySelectorAll(".carrossel-item");
const btnPrev = document.getElementById("carrossel-prev");
const btnNext = document.getElementById("carrossel-next");
let indexCarrossel = 0;
function showCarrossel(idx) {
    carrosselItens.forEach((item, i) => {
        item.classList.toggle("ativo", i === idx);
    });
}
function nextCarrossel() {
    indexCarrossel = (indexCarrossel + 1) % carrosselItens.length;
    showCarrossel(indexCarrossel);
}
function prevCarrossel() {
    indexCarrossel = (indexCarrossel - 1 + carrosselItens.length) % carrosselItens.length;
    showCarrossel(indexCarrossel);
}
btnNext.onclick = nextCarrossel;
btnPrev.onclick = prevCarrossel;
setInterval(nextCarrossel, 6000);

// ====== Dashboard fake após login =====
// Para demo apenas, ficaria melhor em SPA real
//if (window.location.hash === "#dashboard-empresa") {
    //alert("Bem-vindo ao painel de empresa! (demo)");
//}
//if (window.location.hash === "#dashboard-candidato") {
    //alert("Bem-vindo ao painel do candidato! (demo)");
//}