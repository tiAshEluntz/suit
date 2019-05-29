<?php 

if($_SESSION['type']==="Customer")
include 'app/views/CustomerNavBar.php';

if($_SESSION['type'] == "Admin")
 include 'app/views/AdminNavBar.php';

$ratings = $data['ratings'];
$reviews = $data['reviews'];
?>


<!DOCTYPE html>
<html>
<head>
	<title>SuitGarcon</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
        <!--GOOD BOOTSTRAP LINK HERE LINE 13,14 AND BEFORE THE </body> TAG-->
        <link href="/app/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/app/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
<style>
.checked {
    color: orange;
}
</style>
        

</head>
    <body>
        
        
    
<div class="container">
  <div class="row">
    <div class="col-sm">

 <div class="py-5 text-center">
        <h2>Our Reviews</h2>
      </div>

   <?php  
// <!----------->  
foreach ($reviews as $review) {
    
  
echo '  
 <div class="card">
  <div class="card-header">
    Review # '."$review->review_id".
  '</div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>'."$review->comment".'.</p>
      <footer class="blockquote-footer">'."$review->first_name $review->last_name".' <cite title="Source Title">using SuitGarcon</cite></footer>
    </blockquote>
<button style="float:right;" type="button" class="btn btn-outline-danger" onClick="document.location.href = \'/Customer/flagReview/'."$review->review_id".'\'">Flag</button>

</div>
</div>';


echo '<br>';
}

//  <!--------------------------->      
        ?>
    </div>
    <div class="col-sm">
 <div class="py-5 text-center">
        <h2>Our Ratings</h2>
      </div>
        
  <?php      
//        <!------------------------>
foreach ($ratings as $rating) {
    

  
  echo '<div class="card">
  <div class="card-header">
    Rating #'."$rating->rating_id".'
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">';
  
  $nbStar = $rating->rating;
  for($i=0; $i < 5; $i++){
      
      if($i<$nbStar){
         echo '<span class="fa fa-star checked"></span>';
      }
      else{
          echo '<span class="fa fa-star"></span>';
      }
  }
//<span class="fa fa-star checked"></span>
//<span class="fa fa-star checked"></span>
//<span class="fa fa-star checked"></span>
//<span class="fa fa-star"></span>
//<span class="fa fa-star"></span>  

     echo '   
      <footer class="blockquote-footer">'."$rating->first_name $rating->last_name".' <cite title="Source Title">On order '."$rating->order_id".'</cite></footer>
    </blockquote>
  </div>
</div>';
  
  
  
  echo '<br>';
}
  
        ?>
        
    </div>
  </div>
<script src="/app/views/Js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/app/views/Js/popper.min.js" type="text/javascript"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/app/views/Js/bootstrap.min.js" type="text/javascript"></script>    
</body>
</html>
