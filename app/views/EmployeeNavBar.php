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
        <a class="nav-link" href="/Home/Index">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/Home/accountInfo/<?php echo $_SESSION['username'];?>">Account Info</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/Company/unsubscribeRedirect">Delete account</a>
        </div>
      </li>
 
            <li class='nav-item'><a class='nav-link' style='margin-left: 99%px;' href='/Employee/viewMyOrders'>Orders</a></li>

               
            
               <li class="nav-item">

            <a class='nav-link' style='margin-left: 99%px;' href='/Employee/EmployeeViewTickets'>View Tickets</a>
      </li>
            
            <li class="nav-item">

            <a class='nav-link' style='margin-left: 99%px;' href='/Home/Logout'>Logout</a>
      </li>

      
    </ul>
    <form class="form-inline my-2 my-lg-0">
   </form>
  </div>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="/Employee/Index"> <img src="/app/views/images/logo.png" class="img-fluid" width="200" height="40" alt="Logo" ></a></li>
</ul>
</nav>