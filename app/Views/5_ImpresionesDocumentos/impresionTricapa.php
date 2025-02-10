<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Producción Tricapa</title>
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

        .form-container th,
        .form-container td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }

        .header {
            background-color:rgb(234, 119, 247);
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

        th,
        td {
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
                <th><?= $datoPedido['mes'] ?></th>
                <th>SEMANA</th>
                <th colspan="2"><?= $datoPedido['semana'] ?></th>
                <th>OP</th>
                <th><?= $datoPedido['op'] ?></th>
                <th>MAQUINA PARA IMPRESIÓN</th>

            </tr>
            <tr>
                <th colspan="2" rowspan="4"> <img src="data:image/png;base64,<?php echo $logo ?>"
                        alt="logo de la instutucion" width="90" height="100"></th>
                <th colspan="6" class="header">ORDEN DE PRODUCCIÓN TRICAPA</th>
                <th rowspan="5"><?= $datoPedido['maquina_impresion'] ?></th>
            </tr>
            <tr>
                <td>CLIENTE</td>
                <td colspan="5"><?= $datoPedido['nombre_cliente'] ?></td>

            </tr>
            <tr>
                <td>PESO</td>
                <td colspan="2"><?= $datoPedido['peso'] ?></td>
                <td>MEDIDA</td>
                <td colspan="2">MATERIAL</td>
            </tr>
            <tr>
                <td>IMPRESIÓN</td>
                <td colspan="2"><?= $datoPedido['impresion'] ?></td>
                <td><?= $datoPedido['medida_bolsa'] ?></td>
                <td colspan="2"><?= $datoPedido['material'] ?></td>
            </tr>
            <tr>
                <td colspan="5" class="observation">PRECIO POR BOLSA</td>
                <td colspan="4" class="observation"><?= $datoPedido['precio_bolsa'] ?></td>
            </tr>
        </thead>



        <tbody>
            <tr class="section-title">
                <td colspan="7">MATERIA PRIMA ENTREGADA</td>
                <td colspan="2" rowspan="2">DESPACHOS</td>
            </tr>
            <tr>
                <td>N</td>
                <td>KILOS</td>
                <td colspan="5">DETALLES</td>

            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="5"></td>
                <td>D1</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="5"></td>
                <td>D2</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="5"></td>
                <td>D3</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="5"></td>
                <td>D4</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="5"></td>
                <td>D5</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="5"></td>
                <td>D6</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="5"></td>
                <td>D7</td>
                <td></td>
            </tr>
            
            <tr>
                <td></td>
                <td></td>
                <td colspan="5"></td>
                <td>TOTAL DESPACHOS</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="2"></td>
                <td>TOTAL SCRAF</td>
                <td colspan="2"></td>
                <td>FALTANTE</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">TOTAL EN KILOS</td>
                <td colspan="2"></td>
                <td>TOTAL SCRAF +<Br>TOTAL DESPACHO</td>
                <td colspan="2"></td>
                <td>DEMASIA</td>
                <td></td>
            </tr>
            <!-- Add more rows as needed -->


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
            <th rowspan="3"> <img src="data:image/png;base64,<?php echo $logo ?>" alt="Logo de empresa" width="90"
                    height="100"></th>
            <th colspan="3">ORDEN DE PRODUCCIÓN TRICAPA</th>

        </tr>
        <tr>
            <th>M. PARA IMPRESIÓN</th>
            <td colspan="2"><?= $datoPedido['maquina_impresion'] ?></td>
        </tr>
        <tr>
            <th>OP</th>
            <td colspan="2"><?= $datoPedido['op'] ?></td>
        </tr>
        <tr>
            <th>CLIENTE</th>
            <td><?= $datoPedido['nombre_cliente'] ?></td>
            <th>MEDIDA</th>
            <td><?= $datoPedido['medida_bolsa'] ?></td>

        </tr>
        <tr>
            <th>PESO</th>
            <td><?= $datoPedido['peso'] ?></td>
            <th>MATERIAL</th>
            <td><?= $datoPedido['medida_bolsa'] ?></td>
        </tr>
        <tr>
            <th>IMPRESIÓN</th>
            <td><?= $datoPedido['impresion'] ?></td>
            <th>PRECIO POR BOLSA</th>
            <td><?= $datoPedido['precio_bolsa'] ?></td>
        </tr>
    </table>

    <h2 class="section-title yellow">CONTROL DE CALIDAD IMPRESION</h2>
    <table>
        <tr>
            <th style="font-size: 10px;">N</th>
            <th style="font-size: 10px;">MÁQUINA</th>
            <th style="font-size: 10px;">VELOCIDAD</th>
            <th style="font-size: 10px;">COLOR DE TONALIDAD</th>
            <th style="font-size: 10px;">ADHERENCIA</th>
            <th style="font-size: 10px;">BA.</th>
            <th style="font-size: 10px;">AM.</th>
            <th style="font-size: 10px;">MA.</th>
            <th style="font-size: 10px;">AZ.</th>
            <th style="font-size: 10px;">NE.</th>
            <th style="font-size: 10px;">OT.</th>
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
            <th style="width: 10px; text-align: center;">N</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">MÁQUINA</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">VELOCIDAD</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">ANCHO DE<br>REF.</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">REF. UNIFORME</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">ADHERENCIA</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">CONT. COMPLETO</th>
            <th style="writing-mode: vertical-rl; text-align: center; font-size: 10px; padding: 6px;">NOMBRE Y FIRMA</th>
        </tr>


        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td rowspan="7"></td>
        </tr>
        
        <tr>
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
           
        </tr>
        <tr>
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
           
        </tr>
        <tr>
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
        </tr>
    </table>
</body>

</html>