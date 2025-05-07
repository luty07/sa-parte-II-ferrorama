const alertas = [
  "Novo horário para o trajeto ‘Setor 2 ➤ Setor 5’ a partir de 01/05.",
  "Trem do trajeto ‘Setor 4 ➤ Setor 2’ está com check up em andamento.",
  "Trem do trajeto ‘Setor 5 ➤ Setor 1’ terá um atraso de aproximadamente 15 minutos.",
  "O trem do trajeto ‘Setor 1 ➤ Setor 3’ chega à plataforma em 5 min.",
  "Relatório do dia 28/03 disponível na aba Relatório e análises."
];

function carregarAlertas() {
  const listEl = document.getElementById("alertsList");
  listEl.innerHTML = "";
  alertas.forEach(texto => {
    const box = document.createElement("div");
    box.className = "alert-box";
    box.innerHTML = `<div class="timeline"></div><div>${texto}</div>`;
    listEl.appendChild(box);
  });
}

function voltarInicio() {
  alert("Voltando ao início...");
  // Aqui você pode redirecionar se quiser: window.location.href = 'index.html';
}

document.getElementById("refreshBtn").addEventListener("click", () => {
  const msg = document.getElementById("updatedMessage");
  msg.style.display = "block";
  setTimeout(() => {
    msg.style.display = "none";
  }, 1500);
  carregarAlertas();
});

carregarAlertas();
