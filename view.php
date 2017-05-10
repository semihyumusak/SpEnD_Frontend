<?php include("config.php") ?>
<!doctype html>
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

  </head>
<body>
 <div class="container">
<?php $SearchTerm = $_GET['search'] ?>
<?php $SourceTerm = $_GET['source'] ?>
<!-- veritabanı bağlantısı-->
<?php
//$query = $db->query("SELECT * FROM endpoints WHERE endpointUrl='$SearchTerm' LIMIT 100");
$query = $db->query("SELECT * FROM  `endpoints` 
WHERE endpointUrl LIKE  '%$SearchTerm%'");

$row = mysqli_fetch_assoc($query);
$dbSkill = $row['endpointUrl'];
$dateCreated = $row['dateCreated'];
$sourcesorgu = $row['source'];

 ?>
 <!-- veritabanı bağlantısı-->

 <center>  <h1><img src="logo.jpg"></h1></center>

     <form form action="view.php" method="GET">
  <div class="input-group">
    <input id="searchTerm" type="text" name="search" class="form-control" placeholder="Search">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    
 
</form>
</div></div>
     
     <?php
     $sourceterm = $_GET['source'];
     


    
   if(!empty($SearchTerm))
       {


       $query2 = $db->query("SELECT * FROM  `endpoints` 
WHERE endpointUrl LIKE  '%$SearchTerm%'");

     if (mysqli_num_rows($query2)>0){
      while($kayit=mysqli_fetch_array($query2)){ 
                
             //   echo '<div class="panel panel-success">';
              //  echo '<div class="panel-body">';
                
              echo '<div data-role="main" class="ui-content">';
    echo ' <div data-role="collapsible">';
      echo ' <h1>';
      echo $kayit["endpointUrl"];
   echo '</h1>';
        echo '<p>';
        echo '<font color=green>Source: </font>';
        echo $kayit["source"];
        echo '<br/>';
           echo '<font color=green>Active: </font>';
        echo $kayit["active1"];
        echo '<br/>';
        echo '<font color=green>Date Created: </font>';
        echo $kayit["dateCreated"];
        echo '<br/>';
        echo '<font color=green>Last Checked Date: </font>';
        echo $kayit["lastCheckedDate"];
        echo '<br/>';
        echo '<font color=green>Subject: </font>';
        echo $kayit["subject"];
        echo '<br/>';
        echo '<font color=green>Total Check: </font>';
        echo $kayit["totalcheck"];
        echo '<br/>';
        echo '<font color=green>Source Code: </font>';
        echo $kayit["sourceCode"];
        echo '<br/>';
        echo '<font color=green>Comments Word Count: </font>';
        echo $kayit["commentsWordCount"];
      

        
       echo '</p>';
    echo ' </div>';
  echo ' </div>';


        
    //    echo '</div></div>';

      }
    }else{
      echo 'Eşleşen Kayıt Yok.';
    }
     }


   

     ?>

     
 
</div>
</body>
</html>
