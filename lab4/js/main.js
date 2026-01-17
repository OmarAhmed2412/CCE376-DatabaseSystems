// function createErrorDiv(txt) {
//   const div = document.createElement('div')
//   const form = document.getElementById('frm')
//   const text = document.createElement('span')
//   text.innerText = txt
//   const btn = document.createElement('i')
//   btn.setAttribute('class', 'closebtn fa-solid fa-xmark fa-1x')
//   btn.setAttribute("onclick", "this.parentElement.style.display='none'")
//   div.appendChild(text)
//   div.appendChild(btn)
//   div.setAttribute('class', 'error flx-space')
//   form.prepend(div)
// }
function validateFormInputs() {
  const inputs = document.querySelectorAll('input');
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirm');
  const email = document.getElementById('email');
  const emailRegex = /^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,3}$/;
  for (const input of inputs) {
    if (input.value === '') {
      // createErrorDiv('All fields are required');
      alert('All fields are required');
      return false;
    }
  }
  if (!emailRegex.test(email.value)) {
    // createErrorDiv('Email is invaild');
    alert('Email is invaild');
    return false;
  }
  if (password.value !== confirmPassword.value) {
    // createErrorDiv('Passwords do not match.');
    alert('Passwords do not match.');
    return false;
  }
  return true;
}

