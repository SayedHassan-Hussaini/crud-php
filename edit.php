<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM people WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['email']) ) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sql = 'UPDATE people SET name=:name, email=:email WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':email' => $email, ':id' => $id])) {
    header("Location: index.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="row p-0 m-0">
    <div class="col-3  m-0 p-0">
      <?php require('sidebar.php')?>
    </div>
    <div class="col-9">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>Update customer</h2>
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
                            <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="<?= $person->email; ?>" name="email" id="email"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="mt-2 btn btn-info">Update customer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>