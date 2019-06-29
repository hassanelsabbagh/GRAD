
 <?php
  session_start();
  if (isset($_SESSION['Username'])){

    $pageTitle = 'Games';
    include 'connect.php';
    include 'includes/functions/functions.php';
    include 'includes/templates/header.php';
    include "includes/languages/english.php";
    include 'includes/templates/mainNav.php';
    
?>


<!-- start games -->
<section class="ourgames text-center">
    <div class="container">
      <div class="infogames">
        <h3 class="uppercase">our games</h3>
        
      </div>
      <div class="performance capitalize">
        <div class="row">
      <?php

      $do = '';

      if( isset($_GET['do'])){

        $do = $_GET['do'];

      }else{

        $do = 'Manage';
            }



        foreach (getGames() as $game){
          

        //echo "<form method='POST' action='?do=add'>";
         
          echo ' <div class=" col-md-3 opaas ">';
          echo "<img src='Imgs/Games/" . $game['ImageGame'] . "' alt='' >";
          echo '<h5 class="underline uppercase">' . $game['Name']. '</h5>';
          echo '<a href="profilevis.php?do=view&user=' . $game['username'] . '"<p><span>Posted by: </span>' . $game['username'] . '</a>';
          echo '<p><span>description: </span>' . $game['Description'] . '</p>';
          echo '<p><span>reqirment: </span>' . $game['Requirements'] . '</p>';
          echo  '<p><span>others: </span>' . $game['Other'] . '</p>';
          
          echo '<center> <a href="?do=addToCart&id=' . $game['ID'] . '&name=' . $game['username'] . '" class="btn-custom "><span>Add to cart</span></a></center>';

         echo '</div>';


        }
?>

  </div>
  </div>
    </div>  

  </section>
  <?php

$name = '';
if ($do == 'addToCart'){

  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 'l2a';

  if (isset($_GET['name'])){

    $name = ($_GET['name']);

  }

  $check = checkItem2("cartUsrID", "itemID", "cart", $_SESSION['ID'], $id);

  if ($check == 1 ){

    echo '<div class="alert alert-danger">item is already added to cart</div>';

  }

  if($_SESSION['Username'] == $name){

      
    echo '<div class="alert alert-danger">Cannot add item posted by YOU</div>';


    }else{
  //$items .= "," . $_GET['id'];
  //$_SESSION['cart'] = $items;

   $stmt2 = $con->prepare("INSERT INTO cart(cartUsrID, itemID) VALUES(:zuser, :zitem)");
               $stmt2->execute(array(
               'zuser' => $_SESSION['ID'],
               'zitem' => $id

                ));

              echo '<div class="alert alert-success">item is added to cart</div>';

  
}


}
/*$items = $_SESSION['cart'];
$cartitems = explode(",", $items);
if(in_array($_GET['id'], $cartitems)){
   
   unset($_SESSION['cart']);

}*/
?>

<!-- end games -->






  <?php

  include "includes/templates/footer.php";

}else{
  echo ' Not Allowed';
    header('Location: index.php');
    exit();
}