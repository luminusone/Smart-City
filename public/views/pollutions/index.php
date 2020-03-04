<div class="container" >
  <div class="rows">
    <div class="col-sm-12">
      <div class="content">
<h2>Results</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>#</th>
      <th>State</th>
      <th>Time Update</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pollutions as $index=>$row) : ?>
    <tr>
      <td><?php echo  $index + 1 ?></td>
      <td><?php echo  $row->status_pollution == 0 ? "oui" :"non" ?></td>
      <td><?php echo $row->update_date  ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>



<a href="index.php">Back to home</a>
</div>
</div>
</div>
</div>
