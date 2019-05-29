<?php
  include 'app/views/CustomerNavBar.php';

    $billing = $data['billing'];
    $readOnly = "readonly";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Settings</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
    <!-- CSS
    ================================================== -->
    <link href="/app/css/bootstrap.min.css" rel="stylesheet">

    <!-- script
    ================================================== -->
    <script src="/app/views/js/modernizr.js"></script>
    <script src="/app/views/js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">


</head>

<body>

  <div class="py-5 text-center">
        <h2>Billing Info</h2>
        <p class="lead">You may edit your billing information.</p>
      </div>


        <div style="display: block; width: 50%; margin: auto; margin-bottom: 40px;" class="col-md-8 order-md-1">
          <form action="/Customer/BillingInfo" method="post" role="form">


            <div class="mb-3">
              <label for="email">Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" id="email" name="email" value="<?php if($billing != null){echo $billing->email;}else{echo "";}?>" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="<?php if($billing != null){echo $billing->address;}else{echo "";}?>" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="row">
              <div class="col-md-7 mb-3">
                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" name="address2" value="<?php if($billing != null){echo $billing->address2;}else{echo "";}?>">
                <div class="invalid-feedback">
                  Please select a valid address 2.
                </div>
              </div>
              <div class="col-md-5 mb-3">
               <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" value="<?php if($billing != null){echo $billing->city;}else{echo "";}?>">
                <div class="invalid-feedback">
                  Please select a valid city.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country">
                  <option value="">Choose...</option>
                  <option value="CA" selected="">Canada</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Province</label>
                <select class="custom-select d-block w-100" id="province">
                  <option value="">Choose...</option>
                  <option value="QC" selected="">Quebec</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="" value="<?php if($billing != null){echo $billing->zip;}else{echo "";}?>">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <button style="float:right; margin-right: 5px" type="submit" name="remove" id="remove" class="btn btn-danger">Remove</button>
            <button style="float:right; margin-right: 5px" type="submit" name="save" id="save" class="btn btn-primary">Save</button>

          </form>
        </div>
      </div>
<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
