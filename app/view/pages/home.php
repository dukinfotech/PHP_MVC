@title='Home'
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