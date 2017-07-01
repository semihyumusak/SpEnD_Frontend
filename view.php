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
$sourceterm = $_GET['source'];
 ?>
 <!-- veritabanı bağlantısı-->

 <center>  <h1><img src="logo.png"></h1></center>

     <form form action="view.php" method="GET">
  <div class="input-group">
    <input id="searchTerm" type="text" name="search" class="form-control" 
    <?php
    echo 'value="';
    echo $SearchTerm;
    echo '"';
    ?>
>
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    
 
</form>
</div></div>
     
     <?php
     
     


    
   if(!empty($SearchTerm))
       {


       $query2 = $db->query("SELECT * FROM  `endpoints` 
WHERE endpointUrl LIKE  '%$SearchTerm%'");
 //RAW-START//
 
        echo '<a target=_blank href="/api.php?search=';
        echo $SearchTerm;
        echo '"> <font size=3 color=green> Show RAW version</font></a>';
     //RAW-STOP//
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
        echo '<a target="_blank" href="';
        echo $kayit["endpointUrl"];
        echo '">Visit Link </a>';
                echo '<br/>';

        if(!empty($kayit["source"])){
        echo '<font color=green>Source: </font>';
        echo $kayit["source"]; 
        echo '<br/>';
        if(!empty($kayit["active1"])){
           echo '<font color=green>Active: </font>';
        echo $kayit["active1"]; }
        echo '<br/>';
        }
        if(!empty($kayit["dateCreated"])){
        echo '<font color=green>Date Created: </font>';
        echo $kayit["dateCreated"]; 
        echo '<br/>'; }
        if(!empty($kayit["lastCheckedDate"])){
        echo '<font color=green>Last Checked Date: </font>';
        echo $kayit["lastCheckedDate"]; 
        echo '<br/>'; }
        if(!empty($kayit["subject"])){
        echo '<font color=green>Subject: </font>';
        echo $kayit["subject"]; 
        echo '<br/>'; }
        if(!empty($kayit["totalcheck"])){
        echo '<font color=green>Total Check: </font>';
        echo $kayit["totalcheck"]; 
        echo '<br/>'; }
        if(!empty($kayit["commentsWordCount"])){
        echo '<font color=green>Comments Word Count: </font>';
        echo $kayit["commentsWordCount"]; 
        echo '<br/>'; }
        if(!empty($kayit["triples"])){
        echo '<font color=green>Triples: </font>';
        echo $kayit["triples"]; 
        echo '<br/>'; }
        if(!empty($kayit["entities"])){
        echo '<font color=green>Entities: </font>';
        echo $kayit["entities"]; 
        echo '<br/>'; }
        if(!empty($kayit["distinctResourceURIs"])){
        echo '<font color=green># of Resource URIs: </font>';
        echo $kayit["distinctResourceURIs"]; 
        echo '<br/>'; }
        if(!empty($kayit["distinctClasses"])){
        echo '<font color=green># of Classes: </font>';
        echo $kayit["distinctClasses"]; 
        echo '<br/>'; }
        if(!empty($kayit["distinctPredicates"])){
        echo '<font color=green># of Predicates: </font>';
        echo $kayit["distinctPredicates"]; 
         echo '<br/>'; }
        if(!empty($kayit["distinctSubjectNodes"])){
        echo '<font color=green># of Subject Nodes: </font>';
        echo $kayit["distinctSubjectNodes"]; 
        echo '<br/>'; }
        if(!empty($kayit["distinctObjectNodes"])){
        echo '<font color=green># of Object Nodes: </font>';
        echo $kayit["distinctObjectNodes"]; 
         }
        
        ?>
     
<?
      

        
       echo '</p>';
    echo ' </div>';
  echo ' </div>';


        
    //    echo '</div></div>';

      }
    }else{
      echo 'No Result';
    }
     }


   

     ?>

     
 
</div>
</body>
</html>
