<?php 
require_once("gabarit/header.php");
require_once("gabarit/menu.php"); 
$msg_error = "";

if( isset($_GET['error']) ) {

    switch( $_GET['error'] )
    {
    case '403':
        $msg_error = "Accès Interdit";
        header('refresh:3;url=index.php');
    break;
    }
} else {
    header('Location: index.php');
}

?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="bg-danger text-white"><?= $msg_error ?></h1>
      </div>
    </div>
  </section>';
<?php require_once("gabarit/footer.php");