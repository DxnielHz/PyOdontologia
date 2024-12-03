function loginUser(event) {
    event.preventDefault();

    const email = document.getElementById('email').value.trim(); // Cambié 'username' a 'email'
    const password = document.getElementById('password').value.trim();

    if (!email || !password) {
        alert('Por favor, completa todos los campos.');
        return;
    }

    fetch('login.php', { // Cambié la ruta al archivo PHP local
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' // Se usa JSON para la comunicación
        },
        body: JSON.stringify({ email: email, contrasena: password }) // Cambié 'username' por 'email' y 'password' por 'contrasena'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error en el servidor: ${response.status}`);
        }
        return response.json(); // Se espera una respuesta JSON del servidor
    })
    .then(data => {
        if (data.success) {
            alert('Inicio de sesión exitoso');
            window.location.href = '/'; // Redirige a la página principal
        } else {
            throw new Error(data.message || 'Usuario o contraseña incorrectos');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert(error.message || 'Ocurrió un error al iniciar sesión');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', loginUser);
    }
});
