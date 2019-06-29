<?php

session_start();
  if (isset($_SESSION['Username'])){

    $pageTitle = 'Playstation4';
    include 'connect.php';
    include 'includes/functions/functions.php';
    include 'includes/templates/header.php';
    include "includes/languages/english.php";
    include 'includes/templates/mainNav.php';
    

 ?>


<section class="container">
  <div class="additem">
      <h3 class="text-center">Add Item</h3>
  </div>         
<div class="contant">
  <form action="?do=Add" method="POST" enctype="multipart/form-data">
           <p>Game Name</p> 
          <input class="form-control input-lg " type="text" name="Name" placeholder="70 charcter left">
          <input class="form-control input-lg" type="text" name="description" placeholder="Description">
          <input class="choospic" type="file" name="Image" accept="image/*"> 
          <textarea rows="4" cols="50" class="form-control input-lg faco" type="text" name="requirements" placeholder="requirements"></textarea>
          <textarea rows="4" cols="50" class="form-control input-lg faco" type="text" name="other" placeholder="Others"></textarea>

          <center><input type="Submit" class="btn-custom data-aos-delay=50" style="margin:20px auto "></input></center> 


  </form>
  
</div>
</section>

<?php

          $do = '';
  if( isset($_GET['do'])){
    $do = $_GET['do'];
} 

if ($do == 'Add') {
    
    
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $imgName = $_FILES['Image']['name'];
        $imgSize = $_FILES['Image']['size'];
        $imgTmp = $_FILES['Image']['tmp_name'];
        $imgType = $_FILES['Image']['type'];

        $imgAllowedExtension = array("jpeg", "jpg", "png");

        $imgExtension = strtolower(end(explode('.', $imgName)));

     

        $name   = $_POST['Name'];
        $desc   = $_POST['description'];
        
        $reqs   = $_POST['requirements'];
        $other   = $_POST['other'];
    
        $userid = $_SESSION['ID'];

        $errors = array();

        if (empty($name))

          $errors[] = 'Item name cannot be empty</div>';


        if (empty($imgName))

          $errors[] = 'please put and image</div>';

        if (empty($reqs))

          $errors[] = 'Put your requirements for your item</div>';

       if (! in_array($imgExtension, $imgAllowedExtension)){

          $errors[] = 'Image format is not allowed</div>';
        
        }

        foreach ($errors as $error) {
          echo '<div class="alert alert-danger">' . $error . '</div>' ; 
        } 

        if (empty($errors)){

          $imagee = rand(0, 100000) . '_' . $imgName;
          move_uploaded_file($imgTmp, "Imgs\Games\\" . $imagee);
        
          $stmt = $con->prepare("INSERT INTO playstation4(Name, Description, ImageGames, Requirements, Other, user_id) VALUES(:zname, :zdesc, :zimg, :zreqs, :zother, :zmember)");
          $stmt->execute(array(
            'zname' => $name,
            'zdesc' => $desc,
            'zimg' => $imagee,
            'zreqs' => $reqs,
            'zother' => $other,
            'zmember' => $userid
          ));

          echo '<div class="alert alert-success">' . $stmt->rowCount(). 'record inserted</div>';
        }


  
}
}

include "includes/templates/footer.php";


}else{
  echo 'Not allowed';
}

