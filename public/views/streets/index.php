<div class="container">
  <div class="rows">
    <div class="col-sm-12">
      <div class="content street">
        <h2>List of streets</h2>
        <p><?php  echo $title;?></p>


        <a href="index.php?controller=streets&action=create"><button class="btn btn-primary">Add street</button></a>  
        <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Street Name</th>
            <th>Total lights</th>
            <th>Trafic</th>
            <th>Pollution</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($streets as $row) : ?>
          <tr>
            <td><?php echo  $row->id ?></td>
            <td><?php echo  $row->name_street  ?></td>
            <td><?php echo $row->total_light  ?></td>
            <td><?php switch ( $row->current_trafic) {
                case 0:
                    echo "faible";
                    break;
                case 1:
                    echo "normal";
                    break;
                case 2:
                    echo "élevé";
                    break;
                default:
                   echo  "unknow";
            } ?></td>
            <td><?php switch ( $row->current_pollution) {
                case 0:
                    echo "pur";
                    break;
                case 1:
                    echo "pollution";
                    break;
                default:
                   echo  "unknow";
            } ?></td>
            <td><a href="index.php?controller=streets&action=edit&id=<?php echo  $row->id ?>">Edit</a></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        <a href="index.php">Back to home</a>
      </div>
    </div>
  </div>
</div>
