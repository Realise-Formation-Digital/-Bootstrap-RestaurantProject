const passwordInput = document.getElementById('password');
const togglePasswordButton = document.getElementById('toggle-password');

passwordInput.addEventListener('input', resetCustomValidity); 
function resetCustomValidity() {
  console.log("Function Reset custom value")
  passwordInput.setCustomValidity('');
}

// A production site would use more stringent password testing. 
function validatePassword() {
  let message= '';
  if (!/.{8,}/.test(passwordInput.value)) {
		message = 'At least eight characters. ';
  }
	if (!/.*[A-Z].*/.test(passwordInput.value)) {
		message += 'At least one uppercase letter. ';
  }
	if (!/.*[a-z].*/.test(passwordInput.value)) {
    message += 'At least one lowercase letter.';
  }

  console.log("Function validate password")
  passwordInput.setCustomValidity(message);
}

const form = document.querySelector('form');
const signinButton = document.querySelector('button#sign-in');

form.addEventListener('submit', handleFormSubmission);                       

function handleFormSubmission(event) {
  event.preventDefault();
  validatePassword();
  form.reportValidity();
  if (form.checkValidity() === false) {
  } else {
    alert('Logging in!')
    $('#myModal').modal('hide')
  }
}

function checkValidity() {
  console.log("Check validity called")
}