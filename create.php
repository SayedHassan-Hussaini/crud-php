<?php
require 'db.php';
$message = '';
if (isset ($_POST['name'])  && isset($_POST['email']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sql = 'INSERT INTO people(name, email) VALUES(:name, :email)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div  class="row p-0 m-0">
  <div class="col-3 p-0 m-0"> <?php require('sidebar.php') ?> </div>
  <div class="col-9">
  <div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Create a customer</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
            <div class="alert alert-success">
                <?= $message; ?>
            </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info mt-2">Create a customer</button>
                </div>
            </form>
        </div>
    </div>
</div>
  </div>
</div>
<?php require 'footer.php'; ?>