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
      </li>
      
      <li class="nav-item">
       
           <a class='nav-link' style='margin-left: 99%px;' href='/Default/Login'>Login</a>
           
      </li>
      
      <li class="nav-item">
       
           <a class='nav-link' style='margin-left: 99%px;' href='/Default/RegisterCustomer'>Register As Customer</a>
           
      </li>
      
      <li class="nav-item">

          <a class='nav-link' style='margin-left: 99%px;' href='/Default/RegisterCompany'>Register As Company</a>

      </li>
    <form class="form-inline my-2 my-lg-0">
   </form>
  </div>
      </ul>

</nav>