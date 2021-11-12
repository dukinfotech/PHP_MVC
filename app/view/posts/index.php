<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="d-flex justify-content-between">
    <h1>List posts</h1>
    <div><a href="/admin/posts/create" class="btn btn-success">Create</a></div>
  </div>

  <table class="table table-hover bg-white">
    <thead class="bg-dark">
      <td>#</td>
      <td>Title</td>
      <td>Content</td>
      <td>Action</td>
    </thead>
    <tbody>
    <?php foreach ($posts as $post) { ?>
      <tr>
        <td><?php echo $post['id'] ?></td>
        <td><?php echo $post['title'] ?></td>
        <td><?php echo $post['content'] ?></td>
        <td>
          <form action="">
            <button class="btn btn-warning">Edit</button>
            <button class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</body>
</html>