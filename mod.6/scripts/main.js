const authBtn = document.querySelector('#auth-btn');
const logoutBtn = document.querySelector('#logout-btn');

if (authBtn) {
    authBtn.addEventListener('click', () => {
        window.location = window.location.origin + '?login=yes'
    })
}

if (logoutBtn) {
    logoutBtn.addEventListener('click', () => {
        window.location = window.location.href + '?logout=yes'
    })
}
