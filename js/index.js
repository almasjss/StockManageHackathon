if (document.getElementById('signin-form') && document.getElementById('login-form')) {
  let signinForm = document.getElementById('signin-form').classList;
  let loginForm = document.getElementById('login-form').classList;
  document.getElementById('login-btn').addEventListener('click', function() {
    signinForm.add('hidden');
    document.getElementById('signin-btn').classList.remove('active');
    loginForm.remove('hidden');
    this.classList.add('active');
  });
  document.getElementById('signin-btn').addEventListener('click', function() {
    signinForm.remove('hidden');
    this.classList.add('active');
    loginForm.add('hidden');
    document.getElementById('login-btn').classList.remove('active');
  });
}
if(document.getElementById('suc-update'))
  setTimeout(function() {
    document.getElementById('suc-update').classList.add('hidden');
  }, 6000);
