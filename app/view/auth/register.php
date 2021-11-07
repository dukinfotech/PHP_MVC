<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/style.css">
</head>
<body class="d-flex justify-content-center" style="background: url('/public/img/bg_auth.jpg') no-repeat center center;background-size: cover">
  <form id="registerForm" method="POST" action="/register">
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter name" required>
    </div>
    <div class="form-group">
      <label>Email address</label>
      <input type="email" name="email" class="form-control"  placeholder="Enter email" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required id="registerPassword">
    </div>
    <div class="form-group">
      <label>Re-Password</label>
      <input type="password" name="password" class="form-control" placeholder="Re-Password" required id="registerRePassword">
    </div>
    <p class="text-danger" id="registerError"></p>
    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-primary">Register</button>
      <a href="/login">Login</a>
    </div>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="/public/js/script.js"></script>
</body>
</html>