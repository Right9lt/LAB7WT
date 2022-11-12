<?php
header('Access-Control-Allow-Origin: *');
session_start(); ?>
<html>

<head>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Відгуки</title>
    <?php
    require_once('headCommon.php');
    
    ?>

    <script> 
   // getData();
           $(document).ready(function(){
      
     yes();
            
         });
       
       function yes(){
       	
         $.getJSON('http://lab.vntu.vn.ua/webusers/api-server/lab7.php', function(json){
                let str='<table id=\"maint\" class=\"table\"><thead><tr><th scope=\"col\"><button onclick="sortTable(0)" style="background-color:FFFFFF;border-width: 0;" type="button" class="btn btn-light"><b>Name</b></button></th><th scope=\"col\"><button onclick="sortTable(1)" style="background-color:FFFFFF;border-width: 0;" type="button" class="btn btn-light"><b>Affiliaione</b></button></th><th scope=\"col\"><button onclick="sortTable(2)" style="background-color:FFFFFF;border-width: 0;" type="button" class="btn btn-light"><b>Rake</b></button></th><th scope=\"col\"><button onclick="sortTable(3)" style="background-color:FFFFFF;border-width: 0;" type="button" class="btn btn-light"><b>Location</b></button></th></tr></thead><tbody>';
                for(let item of json){
                
   	str+="<tr><td>"+item.name+"</td><td>"+item.affiliation+"</td><td>"+item.rank+"</td><td>"+item.location+"</td></tr>";
   
   }
   str+=' </tbody></table>';
   	const el = document.getElementById('qww');
   el.innerHTML=str;
               });
       }
       function sortTable(f) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("maint");
  switching = true;

  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[parseInt(f)];
      y = rows[i + 1].getElementsByTagName("TD")[parseInt(f)];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
       function sortTableByAffiliation() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("maint");
  switching = true;

  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

    </script>
</head>

<body>
    <header>
        <div class="header-img">
            <div class="header-blur">
                
                <p class="header-title" id="title">jQuery</p>
            </div>
        </div>
    </header>
    <div class="row main">
        <div class="col-1">

        </div>
        <div class="col-10">
       
<button onclick="yes()" type="button" class="btn btn-outline-primary">Оновити</button>
<div id="qww">

</div>
           
        </div>
        <div class="col-1"> </div>
    </div>
</body>

</html>