<?php
    require 'header.php';
?>

    <form id="sales_form" style="margin-top: -30px;">
        <div class="container_12">
            <div class="grid_1 push_11 alpha" >
                <button class="btn btn-danger" type="submit">Ticket</button>
            </div>
        </div>
        <div class="container_12" style="margin-top:1.5em;">
            <div class="grid_5 push_2 alpha">
                <input type="text" class="form-control" placeholder="Business Name" value="<?php echo $business_name; ?>">
            </div>
            <div class="grid_1 push_2">
                <p>06.20.2016</p>
            </div>
            <div class="grid_4 push_2 omega">
                <input type="text" class="form-control" placeholder="Trial/Bill/Cancel Date" value="<?php echo $cust_search_state; ?>">
            </div>
        </div>
        <div class="container_12">
            <div class="grid_5 push_2 alpha">
                <input type="text" class="form-control" placeholder="Sales Center" value="">
            </div>
            <div class="grid_5 push_2 omega">
                <input type="text" class="form-control" placeholder="Sales Agent" value="">
            </div>
        </div>
        
        <div class="container_12">
            <div class="grid_4 push_2 alpha">
                <select class="form-control">
                    <option value=""><?php echo $result_customer_id[0]->product->name; ?></option>
                    <option role="separator" class="divider">-----------------</option>
                <?php
                    $i = 0;
                    while(!empty($result_products[$i])) {
                        echo "<option>".$result_products[$i]->name."</option>";
                        $i++;
                    }
                ?>
                </select>
            </div>
            <div class="grid_3 push_2">
                <input type="text" class="form-control" placeholder="Component" value="">
            </div>
            <div class="grid_3 push_2 omega">
                <input type="text" class="form-control" placeholder="Coupon" value="">
            </div>
        </div>
        <div class="container_12">
            <div class="dropdown grid_5 push_2 alpha">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Cancellation Reason
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="grid_4 push_3 omega">
                <input type="text" class="form-control" placeholder="Refund Amount">
            </div>
        </div>
        <div class="container_12">
            <div class="dropdown grid_2 push_2 alpha">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Salutation
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="grid_4 push_2">
                <input type="text" class="form-control" placeholder="First Name">
            </div>
            <div class="grid_4 push_2 omega">
                <input type="text" class="form-control" placeholder="Last Name">
            </div>
        </div>
        <div class="container_12">
            <div class="dropdown grid_4 push_2 alpha">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Title
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="dropdown grid_5 omega">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Business Category
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
       <br>
        <div class="container_12">
            <div class="grid_4 push_2 alpha">
                <input type="text" class="form-control" placeholder="Primary Phone">
            </div>
            <div class="grid_3 push_2">
                <input type="text" class="form-control" placeholder="Altername Phone">
            </div>
            <div class="grid_3 push_2">
                <input type="text" class="form-control" placeholder="Mobile Phone">
            </div>
        </div>
        <div class="container_12">
            <div class="grid_5 push_2 alpha">
                <input type="text" class="form-control" placeholder="Primary Email">
            </div>
            <div class="grid_5 push_2 omega">
                <input type="text" class="form-control" placeholder="Altername Email">
            </div>
        </div>
        <div class="container_12">
            <div class="grid_5 push_2 alpha">
                <input type="text" class="form-control" placeholder="Office Address 1">
            </div>
            <div class="grid_5 push_2 omega">
                <input type="text" class="form-control" placeholder="Office Address 2">
            </div>
        </div>
        <div class="container_12">
            <div class="grid_4 push_2 alpha">
                <input type="text" class="form-control" placeholder="Office City">
            </div>
            <div class="dropdown grid_3 push_2">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu8" data-toggle="dropdown">
                    Office State/Province
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
            <div class="grid_3 push_2 omega">
                <input type="text" class="form-control" placeholder="Postal Code">
            </div>
        </div>
        <div class="container_12">
            <div class="grid_10 push_2 alpha">
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 35%">
                        <span class="sr-only">35% Complete (success)</span>
                    </div>
                    <div class="progress-bar progress-bar-warning" style="width: 20%">
                        <span class="sr-only">20% Complete (warning)</span>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: 10%">
                        <span class="sr-only">10% Complete (danger)</span>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php
    require "footer.php";
?>