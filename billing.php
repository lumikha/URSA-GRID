<?php
    require 'header.php';
?>

    <form id="billing_form">
    <div class="full-width-div">
        <div class="container_12" style="margin-top:3em;">
            <div class="grid_6 push_1 alpha">
                <input type="text" class="form-control" placeholder="Payment Processor ID ">
            </div>
            <div class="grid_3 push_1">
                <select class="form-control">
                    <option>Trial</option>
                    <option>Active</option>
                    <option>Delinquent</option>
                </select>
            </div>
            <div class="grid_3 push_1 omega">
                <input type="number" class="form-control" placeholder="Successful Billing Cycles">
            </div>
        </div>
        <div class="container_12">
            <div class="grid_12 push_1 alpha">
                 <select class="form-control">
                 <option>Product 1</option>
                 <option>Product 2</option>
                 <option>Product 3</option>
                 <option>Product 4</option>
                 </select>
            </div>
        </div>
        <div class="container_12">
            <div class="grid_6 push_1 alpha">
                <input type="text" class="form-control" placeholder="Credit Card Masked Number">
            </div>
            <div class="grid_3 push_1">
                <input type="text" class="form-control" placeholder="Credit Card Expiration Month">
            </div>
            <div class="grid_3 push_1 omega">
                <input type="text" class="form-control" placeholder="Credit Card Expiration Year">
            </div>
        </div>
        <div class="container_12">
            <div class="grid_4 push_1 alpha">
                <input type="text" class="form-control" placeholder="Billing Address Street">
            </div>
            <div class="grid_3 push_1">
                <input type="text" class="form-control" placeholder="Billing City">
            </div>
            <div class="grid_1 push_1">
                <input type="text" class="form-control" placeholder="State">
            </div>
            <div class="grid_2 push_1">
                <input type="text" class="form-control" placeholder="Billing Postcode">
            </div>
            <div class="grid_2 push_1 omega">
                <input type="text" class="form-control" placeholder="Billing Country">
            </div>
        </div>
    </form>

<?php
    require "footer.php";
?>
