<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> 

    <?php 
      if (!isset($_SESSION['username'])){
          echo "Not logged In";
      }
      else{
        echo "Logged In As: " .  $_SESSION['username'];
      }
    ?>

    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">     
      <li class="nav-item">
        <a class="nav-link" href="/Customer/CompanyOrders">Company's Orders</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" name="transactions" href="/Customer/Transactions">Transactions</a>
      </li>
      
      
      
      
      
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Reviews
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" name="transactions" href="/Customer/Review">Review Our Services</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/Customer/viewAllReviews">View All Reviews</a>
        </div>
      </li>
      
     

      
    

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Home/accountInfo/<?php echo $_SESSION['username'];?>">Account Info</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/Customer/BillingInfo">Billing Info</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/Company/unsubscribeRedirect">Delete account</a>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" name="transactions" href="/Customer/customerSupport">Customer Support</a>
      </li>
      
     
      <li class="nav-item">
        <?php 
          if (!isset($_SESSION['username'])){
            echo "<a class='nav-link' style='margin-left: 99%px;' href='/Default/Login'>Login";
          }
          else{
            echo "<a class='nav-link' style='margin-left: 99%px;' href='/Home/Logout'>Logout";
          }
        ?>
        </a>
      </li>

      
       <?php
      $checker = false;
    for($i=0; $i < 100; $i++){
        if(isset($_SESSION['message'."$i"])){
     
        if(!$checker){ echo '<li class="nav-item">
        <a class="nav-link" name="messages" href="/Customer/showNewMessages"><p style="color:red;">NEW MESSAGE(S)</p></a>
     </li>';
         $checker = true;
        }
        
        }
     }
      ?>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
   </form>
  </div>
<ul class="nav navbar-nav navbar-right">
    <li><a href="/Customer/CompanyOrders"> <img src="/app/views/images/logo.png" class="img-fluid" width="200" height="40" alt="Logo" ></a></li>
</ul>
</nav>