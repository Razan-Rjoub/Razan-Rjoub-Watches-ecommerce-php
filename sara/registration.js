document
  .querySelector('input[name="email"]')
  .addEventListener("keyup", function () {
    validateEmail(this.value);
  });

document
  .querySelector('input[name="confirmEmail"]')
  .addEventListener("keyup", function () {
    validateConfirmEmail(this.value);
  });
document
  .querySelector('input[name="confirmPassword"]')
  .addEventListener("keyup", function () {
    validateConfirmPassword(this.value);
  });

document
  .querySelector('input[name="password"]')
  .addEventListener("keyup", function () {
    validatePassword(this.value);
  });
document
  .querySelector('input[name="firstname"]')
  .addEventListener("keyup", function () {
    validateFirstName(this.value);
  });

// Add event listener to last name input
document
  .querySelector('input[name="lastname"]')
  .addEventListener("keyup", function () {
    validateLastName(this.value);
  });

document
  .querySelector('input[name="Username"]')
  .addEventListener("keyup", function () {
    validateLUsername(this.value);
  });

// Regular expression for email
function validateEmail(email) {
  const emailInput = document.querySelector('input[name="email"]');
  const emailPattern = /^[a-zA-Z0-9._-]{4,}@[gmail]{5,}[.][cC][oO][mM]$/;

  if (emailPattern.test(email)) {
    emailInput.classList.remove("is-invalid");
    emailInput.classList.add("is-valid");
  } else {
    emailInput.classList.remove("is-valid");
    emailInput.classList.add("is-invalid");
  }
}

// Regular expression for password validation (at least 8 characters, including a number and a special character)
function validatePassword(password) {
  const passwordInput = document.querySelector('input[name="password"]');
  const passwordPattern =
    /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z0-9\d@$!%*#?&]{8,}$/;

  if (passwordPattern.test(password)) {
    passwordInput.classList.remove("is-invalid");
    passwordInput.classList.add("is-valid");
  } else {
    passwordInput.classList.remove("is-valid");
    passwordInput.classList.add("is-invalid");
  }
}

function validateFirstName(firstname) {
  const firstnameInput = document.querySelector('input[name="firstname"]');
  const firstnamePattern = /^[A-Za-z]{4,30}$/;

  if (firstnamePattern.test(firstname)) {
    firstnameInput.classList.remove("is-invalid");
    firstnameInput.classList.add("is-valid");
  } else {
    firstnameInput.classList.remove("is-valid");
    firstnameInput.classList.add("is-invalid");
  }
}

// Validate last name
function validateLastName(lastname) {
  const lastnameInput = document.querySelector('input[name="lastname"]');
  const lastnamePattern = /^[A-Za-z]{4,30}$/;

  if (lastnamePattern.test(lastname)) {
    lastnameInput.classList.remove("is-invalid");
    lastnameInput.classList.add("is-valid");
  } else {
    lastnameInput.classList.remove("is-valid");
    lastnameInput.classList.add("is-invalid");
  }
}
function validateLUsername(Username) {
  const UsernameInput = document.querySelector('input[name="Username"]');
  const UsernamePattern = /^[A-Za-z0-9\d@$!%*#?&]{5,}$/;

  if (UsernamePattern.test(Username)) {
    UsernameInput.classList.remove("is-invalid");
    UsernameInput.classList.add("is-valid");
  } else {
    UsernameInput.classList.remove("is-valid");
    UsernameInput.classList.add("is-invalid");
  }
}

function validateConfirmEmail(confirmEmail) {
  const emailInput = document.querySelector('input[name="email"]');
  const confirmEmailInput = document.querySelector(
    'input[name="confirmEmail"]'
  );

  if (confirmEmailInput.value === emailInput.value) {
    confirmEmailInput.classList.remove("is-invalid");
    confirmEmailInput.classList.add("is-valid");
  } else {
    confirmEmailInput.classList.remove("is-valid");
    confirmEmailInput.classList.add("is-invalid");
  }
}

// Validate confirm password
function validateConfirmPassword(confirmPassword) {
  const passwordInput = document.querySelector('input[name="password"]');
  const confirmPasswordInput = document.querySelector(
    'input[name="confirmPassword"]'
  );

  if (confirmPasswordInput.value === passwordInput.value) {
    confirmPasswordInput.classList.remove("is-invalid");
    confirmPasswordInput.classList.add("is-valid");
  } else {
    confirmPasswordInput.classList.remove("is-valid");
    confirmPasswordInput.classList.add("is-invalid");
  }
}
