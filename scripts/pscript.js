const botoes = document.querySelectorAll('.botao-rota');
const listaRecentes = document.getElementById('lista-recentes');
const listaAcessadas = document.getElementById('lista-acessadas');

let historico = JSON.parse(localStorage.getItem('historicoRotas')) || [];

function atualizarListas() {
  listaRecentes.innerHTML = "";
  let recentes = historico.slice(0, 10);
  for (let i = 0; i < recentes.length; i++) {
    let li = document.createElement('li');
    li.textContent = `${i + 1}. ${recentes[i].nome}`;
    listaRecentes.appendChild(li);
  }

  listaAcessadas.innerHTML = "";
  let ordenadas = [...historico];
  ordenadas.sort((a, b) => b.contador - a.contador);
  let top5 = ordenadas.slice(0, 5);
  for (let i = 0; i < top5.length; i++) {
    let li = document.createElement('li');
    li.textContent = `${i + 1}. ${top5[i].nome} — ${top5[i].contador}x`;
    listaAcessadas.appendChild(li);
  }
}

function acessarRota(nome) {
  let achou = false;
  for (let i = 0; i < historico.length; i++) {
    if (historico[i].nome === nome) {
      historico[i].contador++;
      let item = historico.splice(i, 1)[0];
      historico.unshift(item);
      achou = true;
      break;
    }
  }
  if (!achou) {
    historico.unshift({ nome: nome, contador: 1 });
  }
  localStorage.setItem('historicoRotas', JSON.stringify(historico));
  atualizarListas();
}

botoes.forEach(botao => {
  botao.addEventListener('click', () => {
    let nome = botao.dataset.rota;
    acessarRota(nome);
  });
});

atualizarListas();

function validarFormulario() {
  const nome = document.getElementById('usuario').value.trim();

  console.log(usuario);

  if (!usuario) {
    alert('por favor, preencha o seu email');
    return;
  }
}
function validarFormulario()