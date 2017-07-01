
  ////////////////////////////////////source Search/////////////
echo "Source";
 $sourcesearch = $db->query("SELECT *,COUNT(*) FROM `endpoints` where source LIKE '%$SourceTerm%' GROUP BY source");


if (mysqli_num_rows($sourcesearch)>0){
  echo '<div class="panel panel-success">';
  echo '<div class="panel-body">';
      while($sourceq=mysqli_fetch_array($sourcesearch)){ 
                
                                
                
        echo "<a href='/";
        echo $sourceq["source"];
        echo "/";
        echo $SearchTerm;

        echo "'><font color='red'>Source:</font>";
        echo $sourceq["source"] ."-";
        echo "<font color='red'>Total Source Results:</font></a>";
        echo "  ". $sourceq["COUNT(*)"] ."  </a><br>";
        

      }
      echo '</div>';
      echo '</div>';
       }











////////////////////////////////////source Search finish////////////