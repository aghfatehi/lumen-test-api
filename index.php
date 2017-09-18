<?php


//$fetchPosts = file_get_contents('http://localhost:8000/api/v1/posts/index');


//$decodedPosts = json_decode($fetchPosts,true);

//Guzzle is a PHP HTTP client that makes it easy to send HTTP requests and trivial 
//to integrate with web services.

//require '/vendor/autoload.php';

require_once __DIR__.'/vendor/autoload.php';

$client = new GuzzleHttp\Client();

$res = $client->request('GET', 'http://localhost:8000/api/v1/users/index', [
        'headers'=>[
        'id' => 'testing/1.0',
        'Accept'     => 'application/vnd.api+json',
        'Content-Type'=>'application/vnd.api+json',
        'api_token1' => ['$2y$10$pdZs.8S7gpUOT6Udyv.T8OCDTgvPxpIyoIWAzj4I84/YlJg6DVzzy']
        ]
]);

//echo $res->getStatusCode();
// "200"
//echo $res->getHeader('content-type');
// 'application/json; charset=utf8'

//200 means the code is OK
$decodedPosts="something else";
if($res->getStatusCode()==200){
$decodedPosts= json_decode($res->getBody(),true);  
}else{


}


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Test the lumen project </title>

    <!-- Bootstrap core CSS -->
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        
        <form class="form-inline my-2 my-lg-0" action="http://localhost:8000/api/v1/users/add" 
        method="post">

          <!--<input type="hidden" name="_method" value="put">-->

          <div class="orm-group">
            <input class="form-control mr-sm-2" type="text" placeholder="Enter your name" name="name">
          </div>
          
          <div class="orm-group">
            <input class="form-control mr-sm-2" type="text" placeholder="Enter your email" name="email">
          </div>

          <div class="orm-group">
            <input class="form-control mr-sm-2" type="password" placeholder="Your Password" name="password">
          </div>      
  
          <button class="btn btn-success my-2 my-sm-0" type="submit">Sign Up</button>
        </form>
      </div>
    </nav>

    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Test lumen project !</h1>
        <p>This is a website to test the JSON API for input user date into database.</p>
      </div>
    </div>


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">

      	
        <?php
      		foreach ($decodedPosts as $post) {?>
		
		    <div class="col-md-4">
	         <h2><?php echo $post['name']; ?></h2>
	         <p><?php echo $post['email']; ?></p>
	         <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
	      </div>		
		
		<?php } ?>


      </div>

      <hr>

      <footer>
        <p>&copy; Fatehi AL-AGHBARI 2017</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
