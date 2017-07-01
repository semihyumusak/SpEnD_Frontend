<!doctype html>
<?php include("config.php") ?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Search Page</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#searchTerm" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
</head>
<body>
 <div class="container">

 
   <center>  <h1><img src="logo.png"></h1></center>
   

<form form action="view.php" method="GET">
  <div class="input-group">
    <input id="searchTerm" type="text" name="search" class="form-control" placeholder="Search" size="10">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
</div>
    
  
      <?php
    
    
  //  $sqll = $db->query("SELECT * From `endpoints` sum(source) as sourceid group by source LIMIT 100");

 
//$sql = $db->query("SELECT source,COUNT(*) FROM `endpoints` GROUP BY source LIMIT 100");
//$sql = $db->query("SELECT source,COUNT(*) FROM `endpoints` where source LIKE '%lodstats%' ");





 //   while($satir= mysqli_fetch_array($sql))
    //{
   //     $sourceterm1 = $satir["source"];
   //     echo $satir["source"] ." ( ". $satir["COUNT(*)"] ." )-<a target='_blank' href='/search3/view.php?ssearch=1&source=". $sourceterm1 ."'>  GO </a><br>";
   //     
  //  }

 
    
    
    
    ?>
</body>
</html>
