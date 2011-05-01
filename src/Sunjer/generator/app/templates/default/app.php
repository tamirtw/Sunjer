<?php 
     $path = getcwd();
     $projectFolder = $path."/".$_data_['projectName'];

     if(!is_dir($_data_['projectName'])){
     mkdir($path."/".$_data_['projectName'], 0700);
     mkdir($projectFolder."/Control", 0700);
     mkdir($projectFolder."/Model", 0700);
     mkdir($projectFolder."/View", 0700);
     }
?>
