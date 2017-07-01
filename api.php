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

<?php $SearchTerm = $_GET['search'] ?>
<?php $SourceTerm = $_GET['source'] ?>
<!-- veritabanı bağlantısı-->
<?php
$query = $db->query("SELECT * FROM  `endpoints` 
WHERE endpointUrl LIKE  '%$SearchTerm%'");

$row = mysqli_fetch_assoc($query);
$dbSkill = $row['endpointUrl'];
$dateCreated = $row['dateCreated'];
$sourcesorgu = $row['source'];

 ?>
 <!-- veritabanı bağlantısı-->

 
     
     <?php
     $sourceterm = $_GET['source'];
     


    
   if(!empty($SearchTerm))
       {


       $query2 = $db->query("SELECT * FROM  `endpoints` 
WHERE endpointUrl LIKE  '%$SearchTerm%'");

     if (mysqli_num_rows($query2)>0){
      while($kayit=mysqli_fetch_array($query2)){ 
                
               

      echo $kayit["endpointUrl"];
      echo '<br>';




        
   
      }
    }else{
      echo 'Eşleşen Kayıt Yok.';
    }
     }


   

     ?>

     
 
</div>
</body>
</html>
