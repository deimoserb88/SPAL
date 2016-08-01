<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
        <title></title>
        
        <style type="text/css">
            table.t1{
                border-width: 1px 0 0 1px;
                border-style: solid;
                border-color: #999;
            }
            table.t1 th, table.t1 td{
                background-color: #EEE;
                border-width: 0 1px 1px 0;
                border-style: solid;
                border-color: #999;
            }
            table.t1 td{
                background-color: #FFF;
                padding: 2px;
                
            }
        </style>
    </head>
    <body style="font-family:sans-serif; font-size: 12px;"><br /><br />
        <div id="header" style="text-align: center;">            
            ENCUESTA SOBRE EL PROCESO DE ADMISI&Oacute;N PARA ACEPTADOS<br /><br />
            <span style="font-size: 18px; color: #F66; font-weight: bold;">RESULTADOS GENERALES</span>
            <br /><br />                        
            
        </div>
    <div id="principal" class="container" style="">

        
        <?php //inicia ciclo por delegacion
            
            $rd = mysqli_query($sal,"select * from deleg");
            while ($fd = mysqli_fetch_array($rd)){        
        
                echo '<div style="font-size:16px; font-weight:bold; margin:auto; width:822px; color:#900">'.$fd['delegacion'].' </div><br />'."\n";
            
                           
                
                            $rf = mysqli_query($sal,"select plant,nomplant from des where id_deleg = '".$fd['id']."' order by nomplant");
                            while($ff = mysqli_fetch_array($rf)){
                                echo '<div style="font-size:13px; font-weight:bold; width:822px;margin: auto;">'.$ff['nomplant'].'</div>'."\n";
                                echo '<table cellpadding="0" cellspacing="0" summary="" style="margin: auto; width: 822px; border:1px dotted #999; padding:10px;" >'."\n";
                                echo '<tr>'."\n";
                                $sql = "SELECT a.carr, a.nomcarr,b.insc FROM `programa` a join inscritos b on a.id = b.id_programa WHERE b.anio = ".$anio." and plant = '".$ff['plant']."'";
                                $rpe = mysqli_query($sal,$sql) or die(mysqli_error($sal));
                                $tpe = mysqli_num_rows($rpe);                                
                                $esprimero = true;
                                
                                while($fpe = mysqli_fetch_array($rpe)){
                                    $PROM = 0;
                                    echo '<td width="25%" style="vertical-align: bottom;">'."\n"; 
                                        echo $fpe['nomcarr'].'<br />'."\n";
                                        echo '<table cellpadding="0" cellspacing="0" width="100%" class="t1">';                                    
                                        echo '<tr><td>Inscritos:</td><td style="text-align:right;">'.$fpe['insc'].'</td></tr>'."\n";
                                        $rea = mysqli_query($sal,"select count(*) ea from encuesta where carr = '".$fpe['carr']."' and plant = '".$ff['plant']."' and year(feap)='".$anio."' and ter = 1");
                                        $fea = mysqli_fetch_array($rea);
                                        echo '<tr><td>Encuestas:</td><td style="text-align:right;">'.$fea['ea'].'</td></tr>\n<tr><td>%</td><td style="text-align:right;">';
                                        printf("%.0f%%",$fea['ea']*100/$fpe['insc']);
                                        echo '</td></tr></table>'."\n";
                                        
                                        /*PRIMERA SECCION INFORMACION GENERAL=========================================================*/
                                        echo '<div style="width:100%; background-color: #FF0;">'."\n";
                                        if($esprimero) echo '<strong>Informaci&oacute;n General</strong>'."\n"; else echo "&nbsp;";
                                        echo '</div>';
                                        //$esprimero = false;
                                    
                                        $rgene1_1 = mysqli_query($sal,"select count(gene1) as tgene1_1 from encuesta where gene1 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $rgene1_2 = mysqli_query($sal,"select count(gene1) as tgene1_2 from encuesta where gene1 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fgene1_1 = mysqli_fetch_array($rgene1_1);
                                        $fgene1_2 = mysqli_fetch_array($rgene1_2);
                                        $gene1t = $fgene1_1['tgene1_1'] + $fgene1_2['tgene1_2'];
                                        
                                        echo '<table ellpadding="0" cellspacing="0" width="100%" class="t1" >';
                                        echo '<tr><th>Tot. Sat.</th><th>Sat.</th><th>Suma</th></tr>'."\n";
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fgene1_1['tgene1_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fgene1_2['tgene1_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>';

                                        $rgene2_1 = mysqli_query($sal,"select count(gene2) as tgene2_1 from encuesta where gene2 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $rgene2_2 = mysqli_query($sal,"select count(gene2) as tgene2_2 from encuesta where gene2 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fgene2_1 = mysqli_fetch_array($rgene2_1);
                                        $fgene2_2 = mysqli_fetch_array($rgene2_2);
                                        $gene2t = $fgene2_1['tgene2_1'] + $fgene2_2['tgene2_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fgene2_1['tgene2_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fgene2_2['tgene2_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";

//                                        echo '<tr><td style="text-align:left;" colspan="2">'."\n";
//                                        echo "Promedio";            
//                                        echo '</td><th style="text-align:center;">'."\n";
//                                            $SUM = $TS + $S;
//                                            $PROM /= 2;
//                                            printf("%3.0f%%",$PROM);
//                                        echo '</th></tr>'."\n";                                                                                                            
                                        //echo '</table>'."\n";
                                        
                                        $rgene3_1 = mysqli_query($sal,"select count(gene3) as tgene3_1 from encuesta where gene3 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $rgene3_2 = mysqli_query($sal,"select count(gene3) as tgene3_2 from encuesta where gene3 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fgene3_1 = mysqli_fetch_array($rgene3_1);
                                        $fgene3_2 = mysqli_fetch_array($rgene3_2);
                                        $gene3t = $fgene3_1['tgene3_1'] + $fgene3_2['tgene3_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fgene3_1['tgene3_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fgene3_2['tgene3_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";

                                        echo '<tr><td style="text-align:left;" colspan="2">'."\n";
                                        echo "Promedio";            
                                        echo '</td><th style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM /= 3;
                                            printf("%3.0f%%",$PROM);
                                        echo '</th></tr>'."\n";                                                                                                            
                                        echo '</table>'."\n";

                                        
                                        
                                        
                                        /*FIN PRIMERA SECCION INFORMACION GENERAL ========================================================*/
                                        $PROM = 0; 

                                        /*SEGUNDA SECCION INSCRIPCIONES AL PROCESO DE ADMISIÒN=========================================================*/
                                        echo '<div style="width:100%; background-color: #FF0;">'."\n";
                                        if($esprimero) echo '<strong>Inscrip. al Proceso de Admi.</strong>'."\n"; else echo "&nbsp;";
                                        echo '</div>';
                                       
                                    
                                        $ripa1_1 = mysqli_query($sal,"select count(ipa1) as tipa1_1 from encuesta where ipa1 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $ripa1_2 = mysqli_query($sal,"select count(ipa1) as tipa1_2 from encuesta where ipa1 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fipa1_1 = mysqli_fetch_array($ripa1_1);
                                        $fipa1_2 = mysqli_fetch_array($ripa1_2);
                                        $ipa1t = $fipa1_1['tipa1_1'] + $fipa1_2['tipa1_2'];
                                        
                                        echo '<table ellpadding="0" cellspacing="0" width="100%" class="t1" >';
                                        echo '<tr><th>Tot. Sat.</th><th>Sat.</th><th>Suma</th></tr>'."\n";
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fipa1_1['tipa1_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fipa1_2['tipa1_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>';

                                        $ripa2_1 = mysqli_query($sal,"select count(ipa2) as tipa2_1 from encuesta where ipa2 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $ripa2_2 = mysqli_query($sal,"select count(ipa2) as tipa2_2 from encuesta where ipa2 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fipa2_1 = mysqli_fetch_array($ripa2_1);
                                        $fipa2_2 = mysqli_fetch_array($ripa2_2);
                                        $ipa2t = $fipa2_1['tipa2_1'] + $fipa2_2['tipa2_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fipa2_1['tipa2_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fipa2_2['tipa2_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";

                                        
//                                        $ripa3_1 = mysqli_query($sal,"select count(ipa3) as tipa3_1 from encuesta where ipa3 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
//                                        $ripa3_2 = mysqli_query($sal,"select count(ipa3) as tipa3_2 from encuesta where ipa3 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
//                                        $fipa3_1 = mysqli_fetch_array($ripa3_1);
//                                        $fipa3_2 = mysqli_fetch_array($ripa3_2);
//                                        $ipa3t = $fipa3_1['tipa3_1'] + $fipa3_2['tipa3_2'];
//                                
//                                        echo '<tr><td style="text-align:center;">'."\n";
//                                            $TS = $fipa3_1['tipa3_1']*100/$fea['ea'];
//                                            printf("%3.0f%%",$TS);
//                                        echo '</td><td style="text-align:center;">'."\n";
//                                            $S = $fipa3_2['tipa3_2']*100/$fea['ea'];
//                                            printf("%3.0f%%",$S);
//                                        echo '</td><td style="text-align:center;">'."\n";
//                                            $SUM = $TS + $S;
//                                            $PROM += $SUM;
//                                            printf("%3.0f%%",$SUM);
//                                        echo '</td></tr>'."\n";

                                        $ripa4_1 = mysqli_query($sal,"select count(ipa4) as tipa4_1 from encuesta where ipa4 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $ripa4_2 = mysqli_query($sal,"select count(ipa4) as tipa4_2 from encuesta where ipa4 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fipa4_1 = mysqli_fetch_array($ripa4_1);
                                        $fipa4_2 = mysqli_fetch_array($ripa4_2);
                                        $ipa4t = $fipa4_1['tipa4_1'] + $fipa4_2['tipa4_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fipa4_1['tipa4_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fipa4_2['tipa4_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";
                                        
                                        
                                        echo '<tr><td style="text-align:left;" colspan="2">'."\n";
                                        echo "Promedio";            
                                        echo '</td><th style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM /= 3;
                                            printf("%3.0f%%",$PROM);
                                        echo '</th></tr>'."\n";                                                                                
                                        
                                        
                                        echo '</table>'."\n";
                                        /*FIN SEGUNDA SECCION INSCRIPCIONES AL PROCESO DE ADMISION ========================================================*/
                                        $PROM = 0;
                                       /*TERCERA SECCION EXAMEN NACIONAL=========================================================*/
                                        echo '<div style="width:100%; background-color: #FF0;">'."\n";
                                        if($esprimero) echo '<strong>Examen Nacional</strong>'."\n"; else echo "&nbsp;";
                                        echo '</div>';
//                                        $esprimero = false;
                                    
                                        $ren1_1 = mysqli_query($sal,"select count(en1) as ten1_1 from encuesta where en1 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $ren1_2 = mysqli_query($sal,"select count(en1) as ten1_2 from encuesta where en1 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fen1_1 = mysqli_fetch_array($ren1_1);
                                        $fen1_2 = mysqli_fetch_array($ren1_2);
                                        $en1t = $fen1_1['ten1_1'] + $fen1_2['ten1_2'];
                                        
                                        echo '<table ellpadding="0" cellspacing="0" width="100%" class="t1" >';
                                        echo '<tr><th>Tot. Sat.</th><th>Sat.</th><th>Suma</th></tr>'."\n";
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fen1_1['ten1_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fen1_2['ten1_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>';

                                        $ren2_1 = mysqli_query($sal,"select count(en2) as ten2_1 from encuesta where en2 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $ren2_2 = mysqli_query($sal,"select count(en2) as ten2_2 from encuesta where en2 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fen2_1 = mysqli_fetch_array($ren2_1);
                                        $fen2_2 = mysqli_fetch_array($ren2_2);
                                        $en2t = $fen2_1['ten2_1'] + $fen2_2['ten2_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fen2_1['ten2_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fen2_2['ten2_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";

 /*                                       
                                        $ren3_1 = mysqli_query($sal,"select count(en3) as ten3_1 from encuesta where en3 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $ren3_2 = mysqli_query($sal,"select count(en3) as ten3_2 from encuesta where en3 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fen3_1 = mysqli_fetch_array($ren3_1);
                                        $fen3_2 = mysqli_fetch_array($ren3_2);
                                        $en3t = $fen3_1['ten3_1'] + $fen3_2['ten3_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fen3_1['ten3_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fen3_2['ten3_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";
*/                                        
                                        
                                        echo '<tr><td style="text-align:left;" colspan="2">'."\n";
                                        echo "Promedio";            
                                        echo '</td><th style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM /= 2;
                                            printf("%3.0f%%",$PROM);
                                        echo '</th></tr>'."\n";                                                                                
                                        
                                           
                                        echo '</table>'."\n";
                                        /*FIN TERCERA SECCION EXAMEN NACIONAL ========================================================*/
                                        $PROM = 0;
                                       /*CUARTA SECCION CURSO PROPEDEUTICO=========================================================
                                        echo '<div style="width:100%; background-color: #FF0;">'."\n";
                                        if($esprimero) echo '<strong>Curso Proped&eacute;utico</strong>'."\n"; else echo "&nbsp;";
                                        echo '</div>';
                                        $esprimero = false;
                                        $rcp1_1 = mysqli_query($sal,"select count(cp1) as tcp1_1 from encuesta where cp1 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $rcp1_2 = mysqli_query($sal,"select count(cp1) as tcp1_2 from encuesta where cp1 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fcp1_1 = mysqli_fetch_array($rcp1_1);
                                        $fcp1_2 = mysqli_fetch_array($rcp1_2);
                                        $cp1t = $fcp1_1['tcp1_1'] + $fcp1_2['tcp1_2'];
                                        
                                        echo '<table ellpadding="0" cellspacing="0" width="100%" class="t1" >';
                                        echo '<tr><th>Tot. Sat.</th><th>Sat.</th><th>Suma</th></tr>'."\n";
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fcp1_1['tcp1_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fcp1_2['tcp1_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>';

                                        $rcp2_1 = mysqli_query($sal,"select count(cp2) as tcp2_1 from encuesta where cp2 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $rcp2_2 = mysqli_query($sal,"select count(cp2) as tcp2_2 from encuesta where cp2 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fcp2_1 = mysqli_fetch_array($rcp2_1);
                                        $fcp2_2 = mysqli_fetch_array($rcp2_2);
                                        $cp2t = $fcp2_1['tcp2_1'] + $fcp2_2['tcp2_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fcp2_1['tcp2_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fcp2_2['tcp2_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";

                                        
                                        $rcp3_1 = mysqli_query($sal,"select count(cp3) as tcp3_1 from encuesta where cp3 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $rcp3_2 = mysqli_query($sal,"select count(cp3) as tcp3_2 from encuesta where cp3 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fcp3_1 = mysqli_fetch_array($rcp3_1);
                                        $fcp3_2 = mysqli_fetch_array($rcp3_2);
                                        $cp3t = $fcp3_1['tcp3_1'] + $fcp3_2['tcp3_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fcp3_1['tcp3_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fcp3_2['tcp3_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";

                                        $rcp4_1 = mysqli_query($sal,"select count(cp4) as tcp4_1 from encuesta where cp4 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $rcp4_2 = mysqli_query($sal,"select count(cp4) as tcp4_2 from encuesta where cp4 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fcp4_1 = mysqli_fetch_array($rcp4_1);
                                        $fcp4_2 = mysqli_fetch_array($rcp4_2);
                                        $cp4t = $fcp4_1['tcp4_1'] + $fcp4_2['tcp4_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fcp4_1['tcp4_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fcp4_2['tcp4_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";

                                        $rcp5_1 = mysqli_query($sal,"select count(cp5) as tcp5_1 from encuesta where cp5 = 1 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $rcp5_2 = mysqli_query($sal,"select count(cp5) as tcp5_2 from encuesta where cp5 = 2 and plant = '".$ff['plant']."' and carr = '".$fpe['carr']."' and year(feap)='".$anio."' and ter = 1");
                                        $fcp5_1 = mysqli_fetch_array($rcp5_1);
                                        $fcp5_2 = mysqli_fetch_array($rcp5_2);
                                        $cp5t = $fcp5_1['tcp5_1'] + $fcp5_2['tcp5_2'];
                                
                                        echo '<tr><td style="text-align:center;">'."\n";
                                            $TS = $fcp5_1['tcp5_1']*100/$fea['ea'];
                                            printf("%3.0f%%",$TS);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $S = $fcp5_2['tcp5_2']*100/$fea['ea'];
                                            printf("%3.0f%%",$S);
                                        echo '</td><td style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM += $SUM;
                                            printf("%3.0f%%",$SUM);
                                        echo '</td></tr>'."\n";

                                        
                                        
                                        echo '<tr><td style="text-align:left;" colspan="2">'."\n";
                                        echo "Promedio";            
                                        echo '</td><th style="text-align:center;">'."\n";
                                            $SUM = $TS + $S;
                                            $PROM /= 5;
                                            printf("%3.0f%%",$PROM);
                                        echo '</th></tr>'."\n";                                                                                
                                        
                                        
                                        echo '</table>'."\n";
                                        
                                        
                                        /*FIN CUARTA SECCION CURSO PROPEDEUTICO ========================================================*/
                                        
                                   echo '</td>'."\n";
                            
                                }
                                for($i=0;$i<4-$tpe;$i++) echo '<td>&nbsp</td>';
                                echo '</tr></table>\n<br />';
                            }
            
                                                                   
                        ?>

          
                
          
            <?php //echo $tt;?>

        <?php }//termina el ciclo por delegacion ?>
    </div>
        <table width="200" border="0" cellspacing="0" cellpadding="0" style="margin: auto;">
            <tr>
                <td onclick="window.print();" style="cursor:pointer;background-image: url(../../images/imprimir.png);width: 85px;">&nbsp;</td>
                <td width="30">&nbsp;</td>
                <td onclick="window.close();" style="cursor:pointer;background-image: url(../../images/cerrar.png);width: 85px;">&nbsp;</td>
            </tr>
        </table>
        <br />   
</body>
</html>
