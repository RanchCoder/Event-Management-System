<div class="main" style="color:#8d6e63; text-align:center;">
            <?php
              $stmt = mysqli_query($con,"SELECT * FROM jobseeker");
              if (mysqli_num_rows($stmt) > 0) {
                  // output data of each row
                while ($row = mysqli_fetch_assoc($stmt)) {
                    ?>


            <table class="striped">
              <thead>
                <tr>
                    <th>username</th>
                    <th>seeker Id</th>
                    <th>seeker Name</th>
                    <th>seeker lastname</th>
                    <th>seeker contact</th>
                    <th>seeker location</th>
                    
                    <th>seeker education</th>
                </tr>
              </thead>

              <tbody>
                  <tr>
                      <td><?php echo $row['username']?></td>
                      <td><?php echo $row['seekerId']?></td>
                      <td><?php echo $row['seekerName']?></td>
                      <td><?php echo $row['seekerLastName']?></td>
                      <td><?php echo $row['seekerContact']?></td>
                      <td><?php echo $row['seekerLocation']?></td>
                      <td><?php echo $row['seekerEducation']?></td>
                  </tr>

                <?php
                }
              }?>
                
              </tbody>
            </table>
            


        </div>