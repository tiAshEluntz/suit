<?php
  include 'app/views/CustomerNavBar.php';
  $total = $data['total'];
  $items = $data['items'];
  $prices = $data['prices'];
  $billing = $data['billing'];
  $customer = $data['customer'];
?>

<!DOCTYPE html>
<html>
<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>SuitGarcon</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
<body style="height: 110%;">
<div class="container">
      <div class="py-5 text-center">
        <h2>Checkout</h2>
        <p class="lead">You may now select a payment method <small>(Some of your billing info might already be filled out)</small>.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"><?php echo sizeof($items) ?></span>
          </h4>
          <ul class="list-group mb-3">
            <?php
            for ($i = 0; $i < sizeof($items); $i++) {
              echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>
                    <div>
                      <h6 class='my-0'>$items[$i]</h6>
                    </div>
                    <span class='text-muted'>$$prices[$i]</span>
                    </li>";
            }
            echo "<li class='list-group-item d-flex justify-content-between'>
                    <span>Total (CAD)</span>
                    <strong>$$total</strong>
                  </li>";
            ?>
            

          <form class="card p-2">
          
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button style="margin-left: 8px;" type="button" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
          
          <hr class="mb-4">
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="paypal" action="/Payment/CustomerPay" method="post" id="paypal_form">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName" name="first_name">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $customer->first_name;?>" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName" name="last_name">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $customer->last_name;?>" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" id="email" name="payer_email" value="<?php if($billing != null){echo $billing->email;}else{echo "";}?>" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" value="<?php if($billing != null){echo $billing->address;}else{echo "";}?>" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="row">
              <div class="col-md-7 mb-3">
                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" value="<?php if($billing != null){echo $billing->address2;}else{echo "";}?>">
                <div class="invalid-feedback">
                  Please select a valid address 2.
                </div>
              </div>
              <div class="col-md-5 mb-3">
               <label for="city">City</label>
              <input type="text" class="form-control" id="city" value="<?php if($billing != null){echo $billing->city;}else{echo "";}?>">
                <div class="invalid-feedback">
                  Please select a valid city.
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Choose...</option>
                  <option value="CA" selected="">Canada</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Province</label>
                <select class="custom-select d-block w-100" id="province" required>
                  <option value="">Choose...</option>
                  <option value="QC" selected="">Quebec</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" placeholder="" required value="<?php if($billing != null){echo $billing->zip;}else{echo "";}?>">
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <hr class="mb-4">

            <h4 class='mb-3'>Please Choose a Payment Method</h4>
            <input type="radio" name="toggle" onclick="showCredit()"><label style="margin-left: 10px;">Credit Card</label>
            <br>
            <input type="radio" name="toggle" onclick="showPaypal()"><label style="margin-left: 10px;">Paypal</label>

            <hr class="mb-4">
            <div id="checkout"></div>
            <div style="display: block; text-align: center" id='paypal-button' hidden></div>
            <br>
       </form> 
            <input type="hidden" name="cmd" value="_xclick" />
            <input type="hidden" name="no_note" value="1" />
            <input type="hidden" name="lc" value="CA" />
            <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
            <input type="hidden" name="item_number" value="123456" / >
          </form>
        </div>
      </div>

  <script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '<?php echo $total;?>',
            currency: 'CAD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

  function showCredit() {
      document.getElementById("checkout").innerHTML = "<h4 class='mb-3'>Checkout with Credit Card</h4>" +
            "<div id='checkout'></div>" +
            "<div class='row' >" +
              "<div class='col-md-6 mb-3'>" +
                "<label for='cc-name'>Name on card</label>" +
                "<input type='text' class='form-control' id='cc-name' placeholder='' required>" +
                "<small class='text-muted'>Full name as displayed on card</small>" +
                "<div class='invalid-feedback'>" +
                  "Name on card is required" +
                "</div>" +
              "</div>" +
              "<div class='col-md-6 mb-3'>" +
                "<label for='cc-number'>Credit card number</label>" +
                "<input type='text' class='form-control' id='cc-number' placeholder='' required>" +
                "<div class='invalid-feedback'>" +
                  "Credit card number is required" +
                "</div>" +
              "</div>" +
            "</div>" +
            "<div class='row'>" +
              "<div class='col-md-3 mb-3'>" +
                "<label for='cc-expiration'>Expiration</label>" +
                "<input type='text' class='form-control' id='cc-expiration' placeholder='' required>" +
                "<div class='invalid-feedback'>" +
                  "Expiration date required" +
                "</div>" +
              "</div>" +
              "<div class='col-md-3 mb-3'>" +
                "<label for='cc-cvv'>CVV</label>" +
                "<input type='text' class='form-control' id='cc-cvv' placeholder='' required>" +
                "<div class='invalid-feedback'>" +
                  "Security code required" +
                "</div>" +
              "</div>" +
            "</div>" + 
            "<hr class='mb-4'>" + 
            "<input class='btn btn-primary btn-lg btn-block' type='submit' name='pay' value='Submit Payment'/>";
            $('#paypal-button').attr("hidden", "hidden");
            window.scrollBy(0, 1000);
  }

  function showPaypal() {
      document.getElementById("checkout").innerHTML = "";
       $('#paypal-button').removeAttr("hidden");
       window.scrollBy(0, 1000);

  }

</script>
</body>
</html>