const alertas = [
  "Novo horário para o trajeto ‘Setor 2 ➤ Setor 5’ a partir de 01/05.",
  "Trem do trajeto ‘Setor 4 ➤ Setor 2’ está com check up em andamento.",
  "Trem do trajeto ‘Setor 5 ➤ Setor 1’ terá um atraso de aproximadamente 15 minutos.",
  "O trem do trajeto ‘Setor 1 ➤ Setor 3’ chega à plataforma em 5 min.",
  "Relatório do dia 28/03 disponível na aba Relatório e análises."
];

function renderAlertas() {
  const container = document.getElementById("alertsList");
  container.innerHTML = "";

  alertas.forEach(texto => {
    const item = document.createElement("div");
    item.className = "alert-item";

    item.innerHTML = `
      <div class="timeline"></div>
      <div class="alert-text">${texto}</div>
    `;
    container.appendChild(item);
  });
}

function voltarInicio() {
  alert("Voltando ao início...");
}

document.getElementById("refreshBtn").addEventListener("click", () => {
  const msg = document.getElementById("updatedMessage");
  msg.style.display = "block";
  setTimeout(() => {
    msg.style.display = "none";
  }, 2000);
  renderAlertas();
});

renderAlertas();
