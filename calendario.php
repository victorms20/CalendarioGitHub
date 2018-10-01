<!DOCTYPE html>
<html >
    <head>
        <title>Pràctica arrais associatius</title>
        <meta charset="UTF-8">
        <style type="text/css">
            table {
                border: 1px solid black; 
                border-collapse:collapse;
            }
            tr,td,th { border: 1px solid black;}
        </style>
    </head>
<body>


<table>
    <tr>
        <th>dl</th>
        <th>dm</th>
        <th>dx</th>
        <th>dj</th>
        <th>dv</th>
        <th>ds</th>
        <th>dg</th>
    </tr>
    
<?php

   //calculem en que cau el dia 1
   $dia_1_cau_en= intval (date("N"))+1;
   $dia_del_mes_actual = intval(date("d"));
   for($i=$dia_del_mes_actual;$i>0;$i--){
       $dia_1_cau_en -= 1;
       if ($dia_1_cau_en == 0) {
           $dia_1_cau_en = 7;
       } 
   }

   //mirem quants de dies té el mes
   $num_dies_mes = intval( date("t") );
   
   //forats davant
   $forats_davant = $dia_1_cau_en - 1;
   
   //forats darrera
   $forats_darrera = 7 - ( $num_dies_mes + $forats_davant ) % 7;
   
   //total_caselles
   $total_caselles = $forats_davant + $num_dies_mes + $forats_darrera;
   
   echo "<tr>";
   $num_dia_mes_actual = 1;
   for ($i=0; $i<$total_caselles; $i++ ){
       
       $cal_salt_de_linia = ($i%7==0 && $i > 0 && $i <>$total_caselles-1);
       if ($cal_salt_de_linia) {
           echo "</tr><tr>";
       }
       
       echo "<td>";
       
       if ($forats_davant>0) {
           echo "-";
           $forats_davant--;
       } elseif ( $num_dia_mes_actual <= $num_dies_mes ) {
           echo $num_dia_mes_actual;
           $num_dia_mes_actual+=1;
       } 
       
       echo "</td>";
       
   }
   echo "</tr>";
   
?>
</table>

</body>
</html>