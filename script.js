const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirm-password');

// Register form validation
const registerForm = document.querySelector('form[action="register.php"]');
registerForm.addEventListener('submit', (event) => {
  event.preventDefault();

  // Check if username is empty
  if (!usernameInput.value.trim()) {
    alert('Username cannot be empty');
    return;
  }

  // Check if email is valid
  if (!/\S+@\S+\.\S+/.test(emailInput.value)) {
    alert('Please enter a valid email address');
    return;
  }
  // Add validation to check if passwords match
    registerForm.addEventListener('submit', (event) => {
        if (passwordInput.value !== confirmPasswordInput.value) {
        event.preventDefault();
        alert('Passwords must match');
        return;
        }
    // ... rest of validation logic
  });

  // Check if password is strong enough
  if (passwordInput.value.length < 8) {
    alert('Password must be at least 8 characters long');
    return;
  }

  // Submit the form if everything is valid
  registerForm.submit();
});

// Login form validation
const loginForm = document.querySelector('form[action="login.php"]');
loginForm.addEventListener('submit', (event) => {
  event.preventDefault();

  // Check if email is empty
  if (!emailInput.value.trim()) {
    alert('Email cannot be empty');
    return;
  }

  // Check if password is empty
  if (!passwordInput.value.trim()) {
    alert('Password cannot be empty');
    return;
  }

  // Submit the form if everything is valid
  loginForm.submit();
});

// Optional features:
// - Show/hide password on click
// - Implement password strength meter
// - Add error messages for specific validation errors



// Add validation to check if passwords match
registerForm.addEventListener('submit', (event) => {
  if (passwordInput.value !== confirmPasswordInput.value) {
    event.preventDefault();
    alert('Passwords must match');
    return;
  }
  // ... rest of validation logic
});


