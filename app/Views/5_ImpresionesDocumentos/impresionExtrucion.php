<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Producción Extrución</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .form-container {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }

        .form-container th, .form-container td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }

        .header {
            background-color: #f7b977;
            font-weight: bold;
        }

        .section-title {
            background-color: #d9e8f5;
            font-weight: bold;
        }

        .observation {
            background-color: #fff200;
            font-weight: bold;
        }

        .despachos {
            background-color: #d6e8d0;
        }

        .control-calidad {
            background-color: #d9e8f5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .section-title {
            background-color: #ffe066;
            text-align: center;
            font-weight: bold;
        }
        .blue {
            background-color: #cceeff;
        }
        .yellow {
            background-color: #ffffcc;
        }
    </style>
</head>
<body>
    <table class="form-container">
        <thead>
            <tr>
                <th colspan="2">MES</th>
                <th ><?= $datoPedido['mes'] ?></th>
                <th>SEMANA</th>
                <th colspan="2"><?= $datoPedido['semana'] ?></th>
                <th >OP</th>
                <th><?= $datoPedido['op'] ?></th>
                <th  >MAQUINA PARA IMPRESIÓN</th>
                
            </tr>
            <tr>
                <th  colspan="2" rowspan="5" >  <img src="data:image/png;base64,<?php echo $logo ?>"
                alt="Escudo Centro Educativo Mutual La Paz" width="90" height="100"></th>
                <th colspan="6" class="header">ORDEN DE PRODUCCIÓN EXTRUSIÓN</th>
                <th rowspan="5" ><?= $datoPedido['maquina_impresion'] ?></th>
            </tr>
            <tr>
                <td >CLIENTE</td>
                <td colspan="5"><?= $datoPedido['nombre_cliente'] ?></td>
                
            </tr>
            <tr>
                <td >PESO</td>
                <td colspan="2"><?= $datoPedido['peso'] ?></td>
                <td >MÁQUINA DE EXTRUSIÓN</td>
                <td colspan="2" ><?= $datoPedido['maquina_extrucion'] ?></td>
            </tr>
            <tr>
                <td>MEDIDA DE BOLSA</td>
                <td colspan="2"><?= $datoPedido['medida_bolsa'] ?></td>
                <td>MEDIDA DE EXTRUSIÓN</td>
                <td colspan="2"><?= $datoPedido['medida_extrucion'] ?></td>
            </tr>
            <tr>
                <td>IMPRESIÓN</td>
                <td colspan="2"><?= $datoPedido['impresion'] ?></td>
                <td>MATERIAL</td>
                <td colspan="2"><?= $datoPedido['material'] ?></td>
            </tr>
            <tr>
                <td colspan="5" class="observation">PRECIO POR BOLSA</td>
                <td colspan="4" class="observation"><?= $datoPedido['precio_bolsa'] ?></td>
            </tr>
            <tr>
                <td colspan="9">OBSERVACIONES: CONTROLAR MEDIDAS, MICRONAJE Y DOSIFICACIÓN.</td>
            </tr>
        </thead>
        <tbody>
            <tr class="section-title">
                <td>N°</td>
                <td>PESO BRUTO</td>
                <td>PESO NETO</td>
                <td>FORRO</td>
                <td>PESO NETO 2</td>
                <td>METROS</td>
                <td>KILO POR SEMANA</td>
                <td >JOSE LUIS</td>
                <td>MARCELO</td>
            </tr>
            <!-- Rows for data -->
             
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
            
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
           
            <tr>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
                <td style="height: 15px;"></td>
            </tr>
           
            <tr>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td colspan="2" class="section-title" style="height: 10px;">TOTAL DE PROD MANUAL</td>
                
            </tr>
            <tr>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td colspan="2" rowspan="2" style="height: 10px;"></td>
            </tr>
            <tr>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td style="height: 10px;"></td>
                <td colspan="1" style="height: 10px;"></td>
                
            </tr>
           
           

            <!-- Add more rows as needed -->
            <tr>
                <td colspan="2">JOSE LUIS</td>
                <td colspan="2">MARCELO</td>
                <td colspan="3">TOTAL SCRAF</td>
                <td colspan="2" class="despachos">DESPACHOS</td>
            </tr>
            <tr>
                <td colspan="2"  style="height: 10px;"></td>
                <td colspan="2"  style="height: 10px;"></td>
                <td colspan="3"  style="height: 10px;"></td>
                <td style="text-align: left;">D1=</td>
                <td style="text-align: left;"></td>
            </tr>
            <tr>
                <td colspan="2"  style="height: 10px;"></td>
                <td colspan="2"  style="height: 10px;"></td>
                <td colspan="3"  style="height: 10px;"></td>
                <td  style="text-align: left;">D2=</td>
                <td ></td>
            </tr>
            <tr>
                <td colspan="2"  style="height: 10px;">FIRMA</td>
                <td colspan="2"  style="height: 10px;">FIRMA</td>
                <td colspan="3"  style="height: 10px;">CONTROL ADM</td>
                 <td  style="text-align: left;">D3=</td>
                <td ></td>
            </tr>
            
            <tr>
                <td class="section-title" colspan="7">CONTROL DE CALIDAD</td>
                <td style="text-align: left;">D4</td>
                <td ></td>
             </tr>
            <tr>
                <td >N</td>
                <td colspan="2">MICRO</td>
                <td >RESIST</td>
                <td >TRANS</td>
                <td colspan="2">MEDIDA</td>
                <td style="text-align: left;">D5=</td>
                <td style="text-align: left;">DT=</td>
            </tr>
            <tr >
                <td ></td>
                <td colspan="2"></td>
                <td ></td>
                <td ></td>
                <td colspan="2"></td>
                <td style="text-align: left;">D6=</td>
                <td style="text-align: left;">T.scrat+dt=</td>
            </tr>
            <tr>
                <td ></td>
                <td colspan="2"></td>
                <td ></td>
                <td ></td>
                <td colspan="2"></td>
                <td style="text-align: left;">scraf=</td>
                <td style="text-align: left;">CINTA=</td>
            </tr>
            <tr>
                <td ></td>
                <td colspan="2"></td>
                <td ></td>
                <td ></td>
                <td colspan="2"></td>
                <td style="text-align: left;">DEMASIA=</td>
                <td style="text-align: left;"> FALTANTE=</td>
            </tr>
            <tr>
                <td ></td>
                <td colspan="2"></td>
                <td ></td>
                <td ></td>
                <td colspan="2"></td>
                <td style="text-align: left;">TOTAL DE PROD.</td>
                <td></td>
            </tr>
           
           
            <tr class="control-calidad">
                <td colspan="9">NOMBRE Y FIRMA</td>
            </tr>
            <!-- Rows for control calidad -->
            <tr>
                <td style="height: 30px;" colspan="9"></td>
            </tr>
        </tbody>
    </table>
    <h1>Orden de Producción</h1>
    <table>
        <tr>
            <th>MES</th>
            <td style="width: 200px;"><?= $datoPedido['mes'] ?></td>
            <th>SEMANA</th>
            <td style="width: 120px;"><?= $datoPedido['semana'] ?></td>
        </tr>
        <tr>
            <th rowspan="3"> <img src="data:image/png;base64,<?php echo $logo ?>"
            alt="Escudo Centro Educativo Mutual La Paz" width="90" height="100"></th>
            <th colspan="3">ORDEN DE PRODUCCIÓN EXTRUSIÓN</th>
            
        </tr>
        <tr>
            <th >M. PARA IMPRESIÓN</th>
            <td colspan="2"><?= $datoPedido['maquina_extrucion'] ?></td>
        </tr>
        <tr>
            <th >OP</th>
            <td colspan="2"><?= $datoPedido['op'] ?></td>
        </tr>
        <tr>
            <th>CLIENTE</th>
            <td colspan="3"><?= $datoPedido['nombre_cliente'] ?></td>
        </tr>
        <tr>
            <th>PESO</th>
            <td ><?= $datoPedido['peso'] ?></td>
            <th>MEDIDA DE LA BOLSA</th>
            <td><?= $datoPedido['medida_bolsa'] ?></td>
        </tr>
        <tr>
            <th>IMPRESIÓN</th>
            <td><?= $datoPedido['impresion'] ?></td>
            <th>PRECIO POR BOLSA</th>
            <td ><?= $datoPedido['precio_bolsa'] ?></td>
        </tr>
    </table>

    <h2 class="section-title yellow">CONTROL DE CALIDAD CONFECCIÓN</h2>
    <table>
        <tr>
            <th style="font-size: 10px;">N</th>
            <th style="font-size: 10px;" >MÁQUINA</th>
            <th style="font-size: 10px;">VELOCIDAD</th>
            <th style="font-size: 10px;">LARGO (CM)</th>
            <th style="font-size: 10px;">ANCHO (CM)</th>
            <th style="font-size: 10px;" >MICRONAJE</th>
            <th style="font-size: 10px;" >NOMBRE Y FIRMA</th>
        </tr>
        <tr>
            <td></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td ></td>
        </tr>
        <tr>
            <td></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td ></td>
        </tr>
        <tr>
            <td></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td ></td>
        </tr>
        <tr>
            <td></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td ></td>
        </tr>
        <tr>
            <td></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td ></td>
        </tr>
        <tr>
            <td></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td ></td>
        </tr>
        <tr>
            <td></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td ></td>
        </tr>
        <tr>
            <td></td>
            <td ></td>
            <td></td>
            <td></td>
            <td></td>
            <td ></td>
            <td ></td>
        </tr>
    </table>

    <h2 class="section-title blue">CONTROL DE CALIDAD IMPRESIÓN</h2>
    <table>
        <tr>
            <th style="width: 10px; text-align: center;">N</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">MÁQUINA</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">VELOCIDAD</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">COLOR<br>TONALIDAD</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">ADHERENCIA</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">BLANCO</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">AMARILLO</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">MAGENTA</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">AZUL</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">NEGRO</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">OTRO</th>
        </tr>
        

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

    <h2 class="section-title blue">CONTROL DE CALIDAD REFILADO</h2>
    <table>
        <tr>
            <th style="font-size: 10px;" >N</th>
            <th style="font-size: 10px;">MÁQUINA</th>
            <th style="font-size: 10px;">VELOCIDAD</th>
            <th style="font-size: 10px;">ANCHO REF.</th>
            <th style="font-size: 10px;">REF. BOBINAS</th>
            <th style="font-size: 10px;">RECUBRIMIENTO</th>
            <th style="font-size: 10px;">COST. COMPLETO</th>
            <th style="font-size: 10px;">NOMBRE Y FIRMA</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>

</body>
</html>