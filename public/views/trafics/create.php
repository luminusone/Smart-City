<div class="container" >
  <div class="rows">
    <div class="col-sm-12">
      <div class="content trafic">
  <h2>Add traffic log</h2>

  <form method="post">
    <div class="form-group">
      <label for="street_id">Street</label>
      <select  class="form-control" name="street_id">
        <?php foreach ($streets as $row) : ?>
          <option <?php if (isset($_GET['street_id']) && $row -> id == $_GET['street_id']) echo "selected=\"selected\"";  ?> value="<?php echo $row -> id?>"><?php echo $row -> name_street?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group form">
      <label for="status_trafic">State</label>
      <br>
      <select name="status_trafic" class="form-control col-xs-12 col-sm-3">
        <option value="0">Faible</option>
        <option value="1">Normal</option>
        <option value="2">Élevé</option>
      </select>
      <br><p></p>
      <br><p></p>
      <input type="submit" name="submit" value="Submit" class="btn btn-primary"></div>
  </form>

  <a href="index.php">Back to home</a>
</div>
</div>
</div>
</div>
