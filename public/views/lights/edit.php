<div class="container" >
  <div class="rows">
    <div class="col-sm-12">
      <div class="content">
<?php
  echo $title;
?>


  <form method="post">
      <?php foreach ($light as $key => $value) : ?>
        <?php if($key != 'is_turnon' && $key != 'is_available') :?>
          <div  class="form-group">
          <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
           <input type="text" class="form-control"  name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo $value; ?>" <?php echo ($key === 'id' || $key === 'street_id' ||$key === 'name_street' ||$key === 'created_date' || $key === 'update_date' ? 'readonly' : null); ?>>
          </div>
        <?php endif; ?>
        <!--for turnon -->
        <?php if($key === 'is_turnon') :?>
          <div class="checkOnOfff form-group">
            <label for="is_turnon">Is Turn On</label><br/>
            <input type="checkbox" <?php if ($value == 0) echo "checked=\"checked\"";  ?> class="form-check-input"  name="is_turnon" value="0">  ...OFF</input><br/>
            <input type="checkbox" <?php if ($value == 1) echo "checked=\"checked\"";  ?> class="form-check-input"   name="is_turnon" value="1">  ...ON</input><br/>
          </div>
        <?php endif; ?>
        <!--for available -->
        <?php if($key === 'is_available') :?>
          <div class="checkAvailable form-group">
            <label for="is_available">Is Available</label><br/>
            <input type="checkbox" <?php if ($value == 0) echo "checked=\"checked\"";  ?>  class="form-check-input"  name="is_available" value="0">...NO</input><br/>
            <input type="checkbox" <?php if ($value == 1) echo "checked=\"checked\"";  ?>   class="form-check-input" name="is_available" value="1">...YES</input><br/>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
      <input type="submit" name="submit" value="Submit" class="btn btn-primary">

      <?php
  
  if(isset($_POST['submit']) && isset($_GET['street_id'])){
    header('Location: ' . "index.php?controller=streets&action=edit&id=".$_GET['street_id']);
    exit();
  } 
  
  if(isset($_POST['submit']) && isset($_GET['id'])) {
    header('Location: ' . "index.php?controller=lights&action=index");
    exit();
  }

  ?>
      <input type="submit" name="delete" value="delete" class="btn btn-danger">
  </form>

  <script type="text/javascript">
    $('.checkOnOfff input:checkbox').click(function() {
        $('.checkOnOfff input:checkbox').not(this).prop('checked', false);
    });
      $('.checkAvailable input:checkbox').click(function() {
          $('.checkAvailable input:checkbox').not(this).prop('checked', false);
      });
  </script>

<br/>
</div>
</div>
</div>
</div>