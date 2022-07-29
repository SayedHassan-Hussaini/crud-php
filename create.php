<?php
require 'db.php';
$message = '';
// .............
if(isset($_POST['submit'])){
    $target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $message= "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $message= "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
    $message= "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $message= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $message= "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    $src = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
    if (isset ($_POST['name'])  && isset($_POST['email'] ) ) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $photo=$src;
        $sql = 'INSERT INTO people(name, email,photo) VALUES(:name, :email,:photo)';
        $statement = $connection->prepare($sql);
        if ($statement->execute([':name' => $name, ':email' => $email,':photo'=>$photo])) {
          $message = 'data inserted successfully';
        }
      }

  } else {
    $message= "Sorry, there was an error uploading your file.";
  }
}
// ............
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
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phot">Photo</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info mt-2">Create a customer</button>
                </div>
            </form>
        </div>
    </div>
</div>
  </div>
</div>
<?php require 'footer.php'; ?>