function login() {
    const user = document.getElementById('user').value;
    const pass = document.getElementById('pass').value;
  
    if (user === 'admin' && pass === '1234') {
      showScreen('home-screen');
    } else {
      alert('Usuário ou senha incorretos!');
    }
  }
  
  function showScreen(id) {
    document.querySelectorAll('.screen').forEach(screen => {
      screen.classList.remove('active');
    });
    document.getElementById(id).classList.add('active');
  }
  
  function navigateTo(id) {
    showScreen(id);
  }
  
  function goBack() {
    showScreen('home-screen');
  }
  