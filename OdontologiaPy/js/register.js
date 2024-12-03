function registerUser(event) {
    event.preventDefault();

    const email = document.getElementById('email').value.trim();
    const nombre = document.getElementById('nombre').value.trim(); // Cambié 'newUsername' a 'nombre'
    const password = document.getElementById('newPassword').value.trim();

    if (!email || !nombre || !password) {
        alert('Por favor, completa todos los campos.');
        return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Por favor, ingresa un correo electrónico válido.');
        return;
    }

    fetch('register.php', { // Cambié la ruta para apuntar al archivo PHP
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email: email, nombre: nombre, contrasena: password }) // Cambié 'username' por 'nombre'
    })
    .then(response => {
        if (!response.ok) {
            return response.text().then(text => {
                try {
                    const data = JSON.parse(text);
                    throw new Error(data.message || 'No se pudo completar el registro. Verifica tus datos.');
                } catch (error) {
                    throw new Error('Respuesta inesperada del servidor');
                }
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('Registro exitoso');
            localStorage.setItem('isLoggedIn', 'true');
            localStorage.setItem('nombre', nombre); // Cambié 'username' por 'nombre'
            window.location.href = '/index.php'; // Redirige al index después del registro
        } else {
            throw new Error(data.message || 'No se pudo completar el registro.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert(error.message || 'Ocurrió un error al registrarse');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', registerUser);
    }
});
