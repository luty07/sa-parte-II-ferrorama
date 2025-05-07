const notificacoes = [
    "Novo horário para o trajeto ‘Setor 2 ➤ Setor 5’ a partir de 01/05.",
    "Trem do trajeto ‘Setor 4 ➤ Setor 2’ está com check up em andamento.",
    "Trem do trajeto ‘Setor 5 ➤ Setor 1’ terá um atraso de aproximadamente 15 minutos.",
    "O trem do trajeto ‘Setor 1 ➤ Setor 3’ chega à plataforma em 5 min.",
    "Relatório do dia 28/03 disponível na aba Relatório e análises."
  ];
  
  function carregarNotificacoes() {
    const container = document.getElementById('notificacoes');
    container.innerHTML = '';
  
    notificacoes.forEach((texto, index) => {
      if (index > 0) {
        const connector = document.createElement('div');
        connector.className = 'connector';
        connector.innerHTML = `
          <div class="dashed-line"></div>
          <div class="dot"></div>
        `;
        container.appendChild(connector);
      }
  
      const div = document.createElement('div');
      div.className = 'notification';
      div.textContent = texto;
      container.appendChild(div);
    });
  }
  
  function atualizarNotificacoes() {
    alert("Notificações atualizadas!");
    carregarNotificacoes();
  }
  
  function voltarInicio() {
    alert("Voltando à tela inicial...");
    // Redirecione conforme sua estrutura de app
  }
  
  window.onload = carregarNotificacoes;
  