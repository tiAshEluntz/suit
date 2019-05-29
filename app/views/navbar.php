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
      <li class="nav-item active">
        <a class="nav-link" href="/Company/approuveEmployee">Home <span class="sr-only">(current)</span></a>
      </li>
      
      
      
      <li class="nav-item">
        <a class="nav-link" href="/Company/companyOrder">Employees' Orders</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="/Order/CompanyOrders">Your Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Order/Rates">My Rate</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Home/accountInfo/<?php echo $_SESSION['username'];?>">Account Info</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/Company/unsubscribeRedirect">Delete Account</a>
        </div>
      </li>
      <?php
        if (isset($_SESSION['type']) and  $_SESSION['type'] === 'Admin'){
            echo "<li class='nav-item'><a class='nav-link' style='margin-left: 99%px;' href='/Default/RegisterEmployee'>Register Employee</a></li>";
          }

      ?>
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

      
    </ul>
    <form class="form-inline my-2 my-lg-0">
   </form>
  </div>




</nav>