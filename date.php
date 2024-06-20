<?php
       $presentTime = new DateTime();
       // echo $presentTime->getTimeZone()->getName();
       $presentTime->setTimezone(new DateTimeZone('Europe/Paris'));
       
       // echo $presentTime->format("m-d-Y  h:i A");
       
       // echo PHP_EOL; // 03/10/2007 à 19h39:53
       $dateString = '2006-07-25 19:39';
       $destinationTime =  DateTime::createFromFormat('Y-m-d H:i', $dateString);
       // echo $destinationTime->format('Y-m-d h:i A');
       
       // $destinationTime = new DateTime();
       // $destinationTime->setDate(2007,10,03);
       // $destinationTime->setTime(19,39,53);
       // echo $destinationTime->format("m/d/Y  H\hi:s"); // 03/10/2007 à 19h39:53
?>       
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Date</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <div class="link">
        <h1 ><a href="index.php">Liste d'amis</a></h1>
        <h1><a href="date.php">Retour vers le futur</a></h1>
        </div>
       
               <h2>Retour vers le futur</h2>
               <div class="count">
                   <div class="counter" id="counter1">
                       
                       <div class="label">
                           <p>Month</p>
                           <div><?php echo $destinationTime->format("m"); ?></div>
                       </div>
                       <div class="label">
                           <p>Day</p>
                           <div><?php echo $destinationTime->format("d"); ?></div>
                       </div>
                       <div class="label">
                           <p>Year</p>
                           <div><?php echo $destinationTime->format("Y"); ?></div>
                       </div>
                       <div class="am_pm">
                           <label>
                               <input type="radio" name="am_pm" value="AM" <?php echo $destinationTime->format("A") == "AM" ? "checked" : ""; ?>> AM
                           </label>
                           <label>
                               <input type="radio" name="am_pm" value="PM" <?php echo $destinationTime->format("A") == "PM" ? "checked" : ""; ?>> PM
                           </label>
                       </div>
                       <div class="label">
                           <p>Hour</p>
                           <div><?php echo $destinationTime->format("h"); ?></div>
                       </div>
                       <div class="label">
                           <p>Min</p>
                           <div><?php echo $destinationTime->format("i"); ?></div>
                       </div>
                      
                   </div>
                   <div><h3 class="title">DESTINATION TIME</h3></div>
               
                   <div class="counter" id="counter2">
                      
                       <div class="label">
                           <p>Month</p>
                           <div><?php echo $presentTime->format("m"); ?></div>
                       </div>
                       <div class="label">
                           <p>Day</p>
                           <div><?php echo $presentTime->format("d"); ?></div>
                       </div>
                       <div class="label">
                           <p>Year</p>
                           <div><?php echo $presentTime->format("Y"); ?></div>
                       </div>
                       <div class="am_pm">
                           <label>
                               <input type="radio" name="ampm" value="AM" <?php echo $presentTime->format("A") == "AM" ? "checked" : ""; ?>> AM
                           </label>
                           <label>
                               <input type="radio" name="ampm" value="PM" <?php echo $presentTime->format("A") == "PM" ? "checked" : ""; ?>> PM
                           </label>
                       </div>
                       <div class="label">
                           <p>Hour</p>
                           <div><?php echo $presentTime->format("h"); ?></div>
                       </div>
                       <div class="label">
                           <p>Min</p>
                           <div><?php echo $presentTime->format("i"); ?></div>
                       </div>
                     
                   </div>
                   <div> <h3 class="title">PRESENT TIME</h3>
                   </div>
               </div>
               
      </body>
        
     