<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/style.css">
</head>
<body style="background: url('/public/img/bg_auth.jpg') no-repeat center center;background-size: cover">
  <?php if (isset($isSuccess) && $isSuccess) { ?>
    <div class="alert alert-success" role="alert">
      Registered successfully. Please login with your account.
    </div>  
  <?php } ?>
  <div class="d-flex justify-content-center">
    <form id="loginForm" method="POST" action="/login">
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" id="loginEmail" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" id="loginPassword" required>
      </div>
      <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="/register">Register</a>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="/public/js/script.js"></script>
</body>
</html>