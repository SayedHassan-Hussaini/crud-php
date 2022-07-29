<?php
require 'db.php';
if(!$_COOKIE['username']){
    header('location:index.php');
}
if(isset($_POST['username'])){
    setcookie('username',$_POST['username']);
};
if(!isset($_POST['remmber'])){
    setcookie('remmber',"on");
};
$sql = 'SELECT * FROM people';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>

    <div class="row p-0 m-0">
        <div class="col-3 m-0 p-0">
            <?php require 'sidebar.php' ?>
        </div>
        <div class="col-9">
            <div class="container">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>All customer</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach($people as $person): ?>
                            <tr>
                                <td><?= $person->id; ?></td>
                                <td><?= $person->name; ?></td>
                                <td><?= $person->email; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this entry?')"
                                        href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>