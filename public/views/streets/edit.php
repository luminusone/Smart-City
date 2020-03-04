<div class="container" >
<div class="rows">
  <div class="col-sm-12">
    <div class="content">
        <h3><?php  echo $title;?></h3>


          <form method="post">
              <?php foreach ($street as $key => $value) : ?>
                <div class="form-group">
                <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
                <?php if($key != 'current_trafic' && $key != 'current_pollution') :?>
          	       <input type="text" name="<?php echo $key; ?>" class="form-control" id="<?php echo $key; ?>" value="<?php echo $value; ?>" <?php echo ($key === 'id' ||$key === 'total_light' ||$key === 'current_trafic' ||$key === 'current_pollution' ||$key === 'created_date' || $key === 'update_date' ? 'readonly' : null); ?>>
                <?php endif; ?>

                <!--for traffic -->
                <?php if($key === 'current_trafic') :?>
                  <select class="form-control" name="<?php echo $key; ?>">
                    <option value="">--Select--</option>
                    <option <?php if ($value == 0) echo "selected=\"selected\"";  ?> value="0">Faible</option>
                    <option <?php if ($value == 1) echo "selected=\"selected\"";  ?> value="1">Normal</option>
                    <option <?php if ($value == 2) echo "selected=\"selected\"";  ?> value="2">Élevé</option>
                  </select>
                <?php endif; ?>
                <!--for pollution -->
                <?php if($key === 'current_pollution') :?>
                  <select class="form-control" name="<?php echo $key; ?>">
                    <option value="">--Select--</option>
                    <option <?php if ($value == 0) echo "selected=\"selected\"";  ?> value="0">Pur</option>
                    <option <?php if ($value == 1) echo "selected=\"selected\"";  ?> value="1">Pollution</option>
                  </select>
                <?php endif; ?>
                
                </div>
              <?php endforeach; ?>
              <input type="submit" name="submit" value="Submit" class="btn btn-primary">
          </form>
        <br/>
        <!--List Light-->
        <br/>
        <h3> List Light of Street</h3>
        <br/>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Light title</th>
              <th>On/Off</th>
              <th>Available</th>
              <th>Update State</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($lights as $index=>$row) : ?>
            <tr>
              <td><?php echo $index ?></td>
              <td><?php echo  $row->light_title  ?></td>
              <td><?php echo $row->	is_turnon == 1 ? "on" : "off" ?></td>
              <td><?php echo $row->	is_available == 1 ? "yes" : "no"  ?></td>
              <td><a href="index.php?controller=lights&action=edit&street_id=<?php echo $street->id?>&id=<?php echo  $row->id ?>">Edit</a></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>

        <p align="right">
        <a href="index.php?controller=lights&action=create&street_id=<?php echo $street->id?>">Add new light</a>
        <br>
        <a href="index.php?controller=trafics&action=create&street_id=<?php echo $street->id?>">Add trafic log</a>
        <br>
        <a href="index.php?controller=pollutions&action=create">Add pollution log</a>
        </p>

    </div>
  </div>
</div>
</div>
