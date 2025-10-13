<?php
    //Polo Moro Anton Kuzanaji
    if ( count($_REQUEST)>0)
        {   echo "Recibiendo los datos de " .
                 count($_REQUEST). " Alumnos";

        $aprob = 0;
        $reprob = 0;
        $alum_np = 0;
        $suma_calif = 0;
        $alum_cn_calif = 0; 
        $mejor_calif = null; 
        $peor_calif = null;

        foreach($_REQUEST as $valor_calif) {

            if ($valor_calif == "NP") {
                $alum_np = $alum_np + 1; 
            }
         
            else {
                
                $calif_num = (int) $valor_calif;

                $suma_calif = $suma_calif + $calif_num; //suma para trabajar el promedio
                $alum_cn_calif = $alum_cn_calif + 1;

              
                if ($calif_num >= 6) {
                    $aprob = $aprob + 1;
                } else {
                    $reprob = $reprob + 1;
                }

                if ($mejor_calif === null || $calif_num > $mejor_calif) {
                    $mejor_calif = $calif_num;
                }
                if ($peor_calif === null || $calif_num < $peor_calif) {
                    $peor_calif = $calif_num;
                }
            }
        }

        echo "<h1>Estadisticas del Grupo</h1>";

       
        if ($alum_cn_calif > 0) {
          
            $porcent_aprob = ($aprob / $alum_cn_calif) * 100;
            $porcent_reprob = ($reprob / $alum_cn_calif) * 100;

            // Calculo del promedio general
            $promedio = $suma_calif / $alum_cn_calif;

            echo "<b>Porcentaje de aprobados:</b> " . $porcent_aprob . "%<br>";
            echo "<b>Porcentaje de reprobados:</b> " . $porcent_reprob . "%<br>";
            echo "<b>Aprovechamiento general (promedio):</b> " . $promedio . "<br>";
            echo "<b>Mejor calificacion:</b> " . $mejor_calif . "<br>";
            echo "<b>Peor calificacion:</b> " . $peor_calif . "<br>";

        } else {

            echo "No se registraron calificaciones para poder calcular las estadisticas.<br>";
        }

        echo "<b>Alumnos que no presentaron (NP):</b> " . $alum_np . "<br>";

    } else {
        
        echo "Acceso no valido";
    }
?>