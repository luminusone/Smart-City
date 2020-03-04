<div class="container" >
  <div class="rows">
    <div class="col-sm-12">
      <div class="content">
<p>Delete Success</p>


<?php
if( isset($_GET['street_id'])){
  header('Location: ' . "index.php?controller=streets&action=edit&id=".$_GET['street_id']);
  exit();
}
else if(isset($_GET['id'])) {
  // code...
  header('Location: ' . "index.php?controller=lights&action=index");
  
  exit();
}
?>
</div>
</div>
</div>
</div>
