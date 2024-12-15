// Modal Handling
const loginModal = document.getElementById('loginModal');
const signupModal = document.getElementById('signupModal');

function showLoginModal() {
    loginModal.style.display = 'flex';
}

function closeLoginModal() {
    loginModal.style.display = 'none';
}

function showSignupModal() {
    signupModal.style.display = 'flex';
}

function closeSignupModal() {
    signupModal.style.display = 'none';
}

// Close modals on clicking outside of them
window.onclick = function(event) {
    if (event.target === loginModal) {
        loginModal.style.display = 'none';
    }
    if (event.target === signupModal) {
        signupModal.style.display = 'none';
    }
};

// Form submission handlers
const loginForm = document.getElementById('loginForm');
const signupForm = document.getElementById('signupForm');

loginForm.addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Login functionality is not implemented yet.');
});

signupForm.addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Signup functionality is not implemented yet.');
});

const navToggle = document.createElement('button');
navToggle.classList.add('nav-toggle');
navToggle.textContent = 'Menu';
document.querySelector('.navbar').prepend(navToggle);

const navLinks = document.querySelector('.nav-links');

navToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});
