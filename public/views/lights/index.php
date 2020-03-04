<div class="container" >
  <div class="rows">
    <div class="col-sm-12">
      <div class="content">
<h2>List of lights</h2>
<p><?php  echo $title;?></p>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>Street Name</th>
      <th>Light Title</th>
      <th>Light Statut</th>
      <th>Light Avaiable</th>
      <th>Update</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lights as $row) : ?>
    <tr>
      <td><?php echo $row->id ?></td>
      <td><?php echo $row->name_street  ?></td>
      <td><?php echo $row->light_title  ?></td>
      <td><?php echo $row->is_turnon ? 'On' : 'Off'  ?></td>
      <td><?php echo $row->is_available ? 'Yes' : 'No'  ?></td>
      <td><a href="index.php?controller=lights&action=edit&id=<?php echo  $row->id ?>">Edit</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Back to home</a>
<?php
if(isset($_GET['street_id'])){
  echo "<a href= 'index.php?controller=streets&action=edit&id=".$_GET['street_id']."'>Back to view</a>";
}
if(isset($_POST['submit']) && isset($_GET['street_id'])){
  header('Location: ' . "index.php?controller=streets&action=edit&id=".$_GET['street_id']);
  exit();
}
?>
</div>
</div>
</div>
</div>
