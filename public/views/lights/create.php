<div class="container" >
  <div class="rows">
    <div class="col-sm-12">
      <div class="content light">
  <h2>Add lights</h2>

  <form method="post">
    <!--bind streets-->

      <div class="form-group">
    <label for="street_id">Street</label>
    <select  class="form-control" name="street_id">
      <?php foreach ($streets as $row) : ?>
        <option <?php if(isset($_GET['street_id']) && $row -> id == $_GET['street_id']) echo "selected=\"selected\"";  ?> value="<?php echo $row -> id?>"><?php echo $row -> name_street?></option>
      <?php endforeach; ?>
    </select>
</div>

  <div class="form-group">
    <label for="light_title">Light Title</label>
    <input type="text" name="light_title" id="name_street" class="form-control">

</div>

  <div class="form-group">
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </div>
  </form>

  <a href="index.php?controller=lights&action=index">All light</a>

  <?php
  if(isset($_POST['submit']) && isset($_GET['street_id'])){
    header('Location: ' . "index.php?controller=streets&action=edit&id=".$_GET['street_id']);
    exit();
  }
  ?>

</div>
</div>
</div>
</div>
