const mensagens = {
    setor1: {
      titulo: "SETOR 1 ▶ SETOR 3",
      status: "TUDO CERTO!<br>NENHUMA MANUTENÇÃO PROGRAMADA!",
      imagem: "/mnt/data/f88758d1-242e-4af9-a19d-8a9837c3d568.png"
    },
    setor2: {
      titulo: "SETOR 2 ▶ SETOR 5",
      status: "Acidente nos trilhos, fechado temporariamente para conserto de trens e do trilho.<br>Previsão para normalização: 10 dias úteis.",
      imagem: "/mnt/data/7bebb151-a8bb-4073-9992-3cb9e2db0055.png"
    },
    setor3: {
      titulo: "SETOR 4 ▶ SETOR 2",
      status: "Check up realizado a cada 6 meses para garantir a segurança dos trilhos, dos trens e dos passageiros.<br>Previsão para normalização: 3 dias úteis.",
      imagem: "/mnt/data/7dbc8ec3-ddff-40fe-ad02-19e3795cbd1e.png"
    },
    setor4: {
      titulo: "SETOR 5 ▶ SETOR 1",
      status: "TUDO CERTO!<br>NENHUMA MANUTENÇÃO PROGRAMADA!",
      imagem: "/mnt/data/8678d6c1-e856-44c6-8fd5-f2325ab7e57c.png"
    }
  };
  
  function verificar(setor) {
    const info = document.getElementById("info");
    const data = mensagens[setor];
  
    if (!data) return;
  
    document.querySelector(".container").style.display = "none";
  
    info.innerHTML = `
      <h2>${data.titulo}</h2>
      <div class="mensagem">${data.status}</div>
      <img src="${data.imagem}" alt="imagem do setor" />
      <div class="footer">
        <img src="/mnt/data/b7cb1583-8a4d-4e81-9703-eb8a1617cecc.png" alt="trem" class="trem" />
        <a href="#" onclick="voltarInicio()">VOLTAR À MANUTENÇÃO</a>
      </div>
    `;
  
    info.style.display = "block";
  }
  
  function voltarInicio() {
    document.getElementById("info").style.display = "none";
    document.querySelector(".container").style.display = "block";
  }
  