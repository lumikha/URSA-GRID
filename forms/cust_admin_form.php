<div class="tab-pane fade" id="admin">            
        <div class="container_12">
        <form method="POST" name="add_user">
            <div class="grid_9">
                <div class="grid_3 alpha">
                    <input style="float:left" type="text" class="form-control" placeholder="First Name" name="fname" value="<?php if(@$_GET['action']=='edit'){ echo $user_fname; }?>">
                </div>
                <div class="grid_3">
                    <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php if(@$_GET['action']=='edit'){ echo $user_lname; }?>">
                </div>
                <div class="grid_3 omega">
                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php if(@$_GET['action']=='edit'){ echo $user_email; }?>">
                </div>
            </div>
            <div class="grid_9">
                <div class="grid_4 alpha">
                    <input type="password" class="form-control" placeholder="Password" name="pass" required>
                </div>
                <div class="grid_4">
                    <select name="type" class="form-control">
                        <option <?php if(@$userType=="Customer Service Agent"){ echo "selected"; } ?>>
                            Customer Service Agent
                        </option>
                        <option <?php if(@$userType=="Provisioner"){ echo "selected"; } ?>>
                            Provisioner
                        </option>
                        <option <?php if(@$userType=="Manager"){ echo "selected"; } ?>>
                            Manager
                        </option>
                        <option <?php if(@$userType=="Administrator"){ echo "selected"; } ?>>
                            Administrator
                        </option>
                        <option <?php if(@$userType=="Quality Analyst"){ echo "selected"; } ?>>
                            Quality Analyst
                        </option>
                        <option <?php if(@$userType=="Billing Analyst"){ echo "selected"; } ?>>
                            Billing Analyst
                        </option>
                        <option <?php if(@$userType=="Center Manager"){ echo "selected"; } ?>>
                            Center Manager
                        </option>
                    <select>
                </div>
                <div class="grid_1 omega">
                    <input type="submit" class="btn btn-primary" value="<?php if(@$_GET['action']=='edit'){ echo 'Update'; } else { echo 'Add'; }?>" name="submit_user">
                </div>
            </div> 
        </form>
        </div>
        <br/><br/>
        <div class="grid_9">
            <table class="table" id="users">
            <thead>
            <tr>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $array = $all_users->rows;
                foreach ($array as $object) {
                    $email = $object->value->email;
                    $type = $object->value->userType;
                    $id = $object->value->_id;
                    @$stat = $object->value->status;
                    echo "<tr>
                        <td>".$email."</td>
                        <td>".$type."</td>
                        <td>";
            ?>
                    <a class='<?php if($type == 'Customer'): ?> disabledTab <?php endif;?>' href='?action=edit&user_id=<?php echo $id; ?>' ><span class='btn btn-warning btn-sm glyphicon glyphicon-pencil'></span></a>
                    <a href='?action=delete&user_id=<?php echo $id; ?>'><span class='btn btn-danger btn-sm glyphicon glyphicon-remove'></span></a>
            <?php
                    echo "</td>
                        <td>";
            ?>
                    <a href='?action=status&user_id=<?php echo $id; ?>' class='<?php if($stat=="Active"){ echo "text-primary"; }else { echo "text-danger"; } ?>'><strong><?php echo $stat; ?></strong></a>
            <?php
                    echo  "</td>
                        </tr>";
                }
            ?> 
            </tbody>
            </table>
        </div>
    </div>