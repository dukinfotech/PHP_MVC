$('#registerForm').on('submit', function (e) {
  var registerPassword = $('#registerPassword').val();
  var registerRePassword = $('#registerRePassword').val();
  if (registerPassword !== registerRePassword) {
    $('#registerError').text('Password not match');
    e.preventDefault();
  }
});