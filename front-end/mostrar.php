<?php 
$inc = include("con_db.php");
$cont=0;
$aray=[];
$araytemp=[];
$aray2=[];
if ($inc) {
	$consulta = "SELECT * FROM datos";
	$resultado = mysqli_query($conex,$consulta);
	if ($resultado) {
		while ($row = $resultado->fetch_array()) {
	    $id = $row['id'];
	    $temp = $row['temp'];
	    $hum = $row['hum'];
            $aray[$cont]=$temp;
            $araytemp[$cont]=$temp;
            $aray2[$cont]=$hum;
            $cont++;
}
?>
<?php
sort($aray);
$loga=log10(count($aray));
$tres=3.322*$loga;
$r=($aray[$cont-1])-($aray[0]);
$k=(1+$tres);
$K=ceil($k);
$a=ceil($r/$K);
?>
        <div>
<h1>Calculos de temperatura</h1>
<h2 style="font-size:15pt;"><?php echo "El Rango es: ".$r  ?></h2>
<h2 style="font-size:15pt;"><?php echo "Los intervalos son: ".$K  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La amplitud es de: ".$a  ?></h2>
<table>
<thead>
<tr>
           <th><h2> clase </h2></th>
           <th><h2> L.Ifnf </h2></th>
           <th><h2> L.Sup </h2></th>
           <th><h2> marca de clase </h2></th>
           <th><h2> Frecuencia </h2></th>
           <th><h2> Frecuencia acumulada </h2></th>
           <th><h2> Lim. Inf. Exacto </h2></th>
           <th><h2> Lim. Sup. Exacto </h2></th>

</tr>
</thead>
</table>
<?php 
$i=1;
$o=0;
$u=1;
$y=0;
$parafrec=[];
$v=array_count_values($araytemp);
$bajo=$aray[0];
$alto=$aray[0]+$a;
$lims=[];
$limi=[];
$limiex=[];
$limsuex=[];
$marca=[];
$frecabs=[];
$aux=0;
while($i<=$K){
$lims[$o]=$bajo;
$limi[$o]=$alto;
$limiex[$o]=($lims[$o])-(1/2);
$limsuex[$o]=($limi[$o])+(1/2);
$marca[$o]=($lims[$o]+$limi[$o])/(2);
$bajo=$bajo+$a+1;
$alto=$alto+$a+1;
$i++;
$o++;
}
for($x=0;$x<count($lims); $x++){
  for($j=0;$j<count($aray);$j++){
    if(($aray[$j]>=$lims[$x])&&($aray[$j]<=$limi[$x])){
    $aux++;
    }
  }
  array_push($parafrec,$aux);
  $aux=0;
}
$h=0;
while($u<=$K){
$frecabs[$u-1]=$frecabs[$h-1]+$parafrec[$h];
?>
<table>
<tr>
    <td><h2 style="font-size:15pt;"><?php echo " - - ".($u)." - - - - - - ".$lims[$u-1]." - - - - - - ".$limi[$u-1]." - - - - - - - - - - - ".$marca[$u-1]." - - - - - - - - - - - - - - ".$parafrec[$u-1]." - - - - - - - - - - - - - - - - - - - ".$frecabs[$u-1]." - - - - - - - - - - - - - - - - - - - - - - ".$limiex[$u-1]." - - - - - - - - - - - - - - - - - - ".$limsuex[$u-1]."<br>";?></h2></td>
</tr>
</table>
        </div> 
	    <?php
          $h++;
          $u++;
          }
$au=1;
$ua=0;
$clase=0;
$sumamed=[];
$sumaDM=[];
$sumaDE=[];
$sumaV=[];
$posmed=(($frecabs[$K-1])+1)/(2);
for($auxi=0;$auxi<$K; $auxi++){if($frecabs[$auxi]>$posmed){ $clase=$auxi;break;}}
while($au<=$K){
$sumamed[$ua]=($marca[$ua]*$parafrec[$ua]);
$ua++;
$au++;
}
$media=((array_sum($sumamed))/($frecabs[$K-1]));
$arriba=(($frecabs[$K-1])/2)-($frecabs[$clase-1]);
$arriba2=$parafrec[$clase]-$parafrec[$clase-1];
$abajo=2*($parafrec[$clase])-($parafrec[$clase-1])-($parafrec[$clase+1]);
$mediana=($limiex[$clase])+($arriba/$parafrec[$clase]);
$moda=$limiex[$clase]+($arriba2/$abajo)*1;
$dis=0;
$sid=1;
while($sid<=$K){
$sumaDM[$dis]=abs($parafrec[$dis]-$media);
$sumaV[$dis]=pow(($marca[$dis]-$media),2)*($parafrec[$dis]);
$sid++;
$dis++;
}
$DM=((array_sum($sumaDM))/($frecabs[$K-1]));
$V=((array_sum($sumaV))/($frecabs[$K-1]));
$DE=sqrt($V);
?>
<h1 style="font-size:30pt;">Calculos de tendencia central para temperatura</h1>
<h2 style="font-size:15pt;"><?php echo "La media es de: ".$media  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La mediana es de: ".$mediana  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La moda es de: ".$moda  ?></h2>
<h1 style="font-size:30pt;">Calculos de medidas de dispersion para temperatura</h1>
<h2 style="font-size:15pt;"><?php echo "La Desviacion media es de: ".$DM  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La Desviacion estandar es de: ".$DE  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La Varianza es de: ".$V  ?></h2>
<h2>_______________________________________________________________________</h2>
<?php
sort($aray2);
$loga2=log10(count($aray2));
$tres2=3.322*$loga2;
$r2=($aray2[$cont-1])-($aray2[0]);
$k2=(1+$tres2);
$K2=ceil($k2);
$a2=ceil($r2/$K2);
?>
        <div>
<h1 style="font-size:30pt;">Calculos de humedad</h1>
<h2 style="font-size:15pt;"><?php echo "El Rango es: ".$r2  ?></h2>
<h2 style="font-size:15pt;"><?php echo "Los intervalos son: ".$K2  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La amplitud es de: ".$a2  ?></h2>
<table>
<thead>
<tr>
           <th><h2> clase </h2></th>
           <th><h2> L.Ifnf </h2></th>
           <th><h2> L.Sup </h2></th>
           <th><h2> marca de clase </h2></th>
           <th><h2> Frecuencia </h2></th>
           <th><h2> Frecuencia acumulada </h2></th>
           <th><h2> Lim. Inf. Exacto </h2></th>
           <th><h2> Lim. Sup. Exacto </h2></th>

</tr>
</thead>
</table>
<?php 
$i2=1;
$o2=0;
$u2=1;
$y2=0;
$parafrec2=[];
$v2=array_count_values($araytemp);
$bajo2=$aray2[0];
$alto2=$aray2[0]+$a2;
$lims2=[];
$limi2=[];
$limiex2=[];
$limsuex2=[];
$marca2=[];
$frecabs2=[];
$aux2=0;
while($i2<=$K2){
$lims2[$o2]=$bajo2;
$limi2[$o2]=$alto2;
$limiex2[$o2]=($lims2[$o2])-(1/2);
$limsuex2[$o2]=($limi2[$o2])+(1/2);
$marca2[$o2]=($lims2[$o2]+$limi2[$o2])/(2);
$bajo2=$bajo2+$a2+1;
$alto2=$alto2+$a2+1;
$i2++;
$o2++;
}
for($x2=0;$x2<count($lims2); $x2++){
  for($j2=0;$j2<count($aray2);$j2++){
    if(($aray2[$j2]>=$lims2[$x2])&&($aray2[$j2]<=$limi2[$x2])){
    $aux2++;
    }
  }
  array_push($parafrec2,$aux2);
  $aux2=0;
}
$h2=0;
while($u2<=$K2){
$frecabs2[$u2-1]=$frecabs2[$h2-1]+$parafrec2[$h2];
?>
<table>
<tr>
        <td><h2 style="font-size:15pt;"><?php echo " - - ".($u2)." - - - - - - ".$lims2[$u2-1]." - - - - - - ".$limi2[$u2-1]." - - - - - - - - - - - ".$marca2[$u2-1]." - - - - - - - - - - - - - - ".$parafrec2[$u2-1]." - - - - - - - - - - - - - - - - - - - ".$frecabs2[$u2-1]." - - - - - - - - - - - - - - - - - - - - - - ".$limiex2[$u2-1]." - - - - - - - - - - - - - - - - - - ".$limsuex2[$u2-1]."<br>";?></h2></td>
</tr>
</table>
        </div> 
	    <?php
          $h2++;
          $u2++;
          }
$au2=1;
$ua2=0;
$clase2=0;
$sumamed2=[];
$sumaDM2=[];
$sumaDE2=[];
$sumaV2=[];
$posmed2=(($frecabs2[$K2-1])+1)/(2);
for($auxi2=0;$auxi2<$K2; $auxi2++){if($frecabs2[$auxi2]>$posmed2){ $clase2=$auxi2;break;}}
while($au2<=$K2){
$sumamed2[$ua2]=($marca2[$ua2]*$parafrec2[$ua2]);
$ua2++;
$au2++;
}
$media2=((array_sum($sumamed2))/($frecabs2[$K2-1]));
$arriba2=(($frecabs2[$K2-1])/2)-($frecabs2[$clase2-1]);
$arriba22=$parafrec2[$clase2]-$parafrec2[$clase2-1];
$abajo2=2*($parafrec2[$clase2])-($parafrec2[$clase2-1])-($parafrec2[$clase2+1]);
$mediana2=($limiex2[$clase2])+($arriba2/$parafrec2[$clase2]);
$moda2=$limiex2[$clase2]+($arriba22/$abajo2)*1;
$dis2=0;
$sid2=1;
while($sid2<=$K2){
$sumaDM2[$dis2]=abs($parafrec2[$dis2]-$media2);
$sumaV2[$dis2]=pow(($marca2[$dis2]-$media2),2)*($parafrec2[$dis2]);
$sid2++;
$dis2++;
}
$DM2=((array_sum($sumaDM2))/($frecabs2[$K2-1]));
$V2=((array_sum($sumaV2))/($frecabs2[$K2-1]));
$DE2=sqrt($V2);
?>
<h1>Calculos de tendencia central para humedad</h1>
<h2 style="font-size:15pt;"><?php echo "La media es de: ".$media2  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La mediana es de: ".$mediana2  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La moda es de: ".$moda2  ?></h2>
<h1>Calculos de medidas de dispersion para humedad</h1>
<h2 style="font-size:15pt;"><?php echo "La Desviacion media es de: ".$DM2  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La Desviacion estandar es de: ".$DE2  ?></h2>
<h2 style="font-size:15pt;"><?php echo "La Varianza es de: ".$V2  ?></h2>

<?php
	}

}
?>
