$('#registerForm').on('submit', function (e) {
  var registerPassword = $('#registerPassword').val();
  var registerRePassword = $('#registerRePassword').val();
  if (registerPassword !== registerRePassword) {
    $('#registerError').text('Password not match');
    e.preventDefault();
  }
});

$('#loginForm').on('submit', function (e) {
  e.preventDefault();
  var loginEmail = $('#loginEmail').val();
  var loginPassword = $('#loginPassword').val();
  $.ajax({
    url: '/login',
    method: 'POST',
    data: {email: loginEmail, password: loginPassword},
    processData: false,
    success: function (result) {
      console.log(result);
    }
  });
});