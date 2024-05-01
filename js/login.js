document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('loginForm');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (email === 'MGWRPCAdmin' && password === 'Admin123') {
            window.location.href = 'home.html';
        } else {
            alert('Invalid email or password');
        }
    });
});