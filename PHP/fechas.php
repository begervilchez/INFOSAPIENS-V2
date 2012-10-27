<?php 

$fechNac=$_GET['fecha']; //elegimos por ejemplo 01/08/2012. Esta en formato cadena
$fechNac2 = substr($fechNac,6,4) . "-" . substr($fechNac,3,2) . "-" .substr($fechNac,0,2);


print "Fecha: ".$fechNac."<br>"; //Fecha: 01/08/2012
print "FechaSubString: ".$fechNac2."<br>"; //FechaSubString: 2012-08-01

print "date(Fecha): ". date($fechNac)."<br>"; //date(Fecha): 01/08/2012. Esto es una cadena
print "date('j/n/Y',Fecha): ". date("j/n/Y", $fechNac)."<br>"; //date('j/n/Y',Fecha): 31/12/1969 . No funciona debido a que Fecha es una cadena
print "date('j/n/Y',Fecha): ". date("j/n/Y", date($fechNac))."<br>"; //date('j/n/Y',Fecha): 31/12/1969 . No funciona debido a que date da formato en cadena.

print "strtotime(Fecha): ". strtotime($fechNac)."<br>";//strtotime(Fecha): 1325998800. Este valor es un TIMESTAMP(Aunque se almacena como int)
print "date('j/n/Y',strtotime(Fecha)): ". date("n/j/Y", strtotime($fechNac))."<br>"; //date('j/n/Y',strtotime(Fecha)): 1/8/2012 No reconoce correctamente los formatos mes y dia
print "date('Y-m-d',strtotime(Fecha)): ". date("Y-m-d", strtotime($fechNac))."<br>"; //date('Y-m-d',strtotime(Fecha)): 2012-01-08 Reconoce los formatos m d
print "date('Y-m-d H:i:s',strtotime(Fecha)): ". date("Y-m-d H:i:s", strtotime($fechNac))."<br>"; //date('Y-m-d',strtotime(Fecha)): 2012-01-08 00:00:00'














-----------------
// definir la zona horaria predeterminada a usar. Disponible desde PHP 5.1

	date_default_timezone_set('America/Lima');
	$fecha_actual = new DateTime(date("Y-m-d"));
	$db_giro->query("CALL `USP_DELETE_TEMP_BY_IDITEM`
					(
						@vERROR
						, @vMSJ_ERROR
						, $ID_USUARIO
						, $ID_OFIC
						, '$CODIGO'
						, '$NUM_ITEM'
						, '".$fecha_actual->format("Y-m-d")."'
					);");
------------------
$horas_diferencia=0;
$tiempo=time() + ($horas_diferencia * 60 *60);
$fecha = date('Y-m-d H:i:s',$tiempo); 
------------
$info['fecha'] = date("d-m-Y");
$info['hora'] = date("h:m:s A"); 
-------------------------------------------------------------------------
$date = $_GET['FECHA'];
$date = substr($date,6,4) . "-" . substr($date,3,2) . "-" .substr($date,0,2);
$fecha_giro = new DateTime($date);

// INGRESAMOS A LA TABLA MOVIMIENTO
	$db_giro->query("DELETE FROM `bd_giro`.`temp_liq_detalle`
					WHERE `temp_liq_detalle`.`id_codigo` = '".$CODIGO."'
					AND `temp_liq_detalle`.`id_movimiento` = ".$ID_MOVIMIENTO."
					AND `temp_liq_detalle`.`e_num_item` = ".$ITEM."
					AND `temp_liq_detalle`.`id_usuario` = ".$ID_USUARIO."
					AND `temp_liq_detalle`.`id_oficina` = ".$ID_OFIC."
					AND `temp_liq_detalle`.`tld_fecha` = '".$fecha_giro->format("Y-m-d")."'");

---------------------------------------------------------------------
`ope_fecha` = CURDATE(),
`ope_hora` = CURTIME(),
`mdo_fecha` = DATE(NOW()),
`mdo_hora` = TIME(NOW())
----------------------------------------------
<input value="<? echo date("Y-m-d h:i:s A"); ?>" name="fecha" type="text" /></label><br />

----------------------------
trim($_POST['modelo']); //Trim, borrar espacios al inicio y final
ucwords($modelo);//Primera Letra de cada palabra en Mayusculas
