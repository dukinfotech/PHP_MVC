<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="/public/style.css">
</head>
<body>
  <nav class="navbar navbar-success bg-success justify-content-between">
    <a class="navbar-brand">Home</a>
    <form class="form-inline">
      <?php if (isset($_SESSION['user'])) { ?>
        <div class="mr-3">Hello, <?php echo $_SESSION['user']['name'] ?></div>
        <a class="btn btn-primary" href="/logout">Logout</a>
      <?php } else { ?>
        <a class="btn btn-primary" href="/login">Login or Register</a>
      <?php } ?>
    </form>
  </nav>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="/public/js/script.js"></script>
</body>
</html>