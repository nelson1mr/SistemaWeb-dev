<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Producción Laminado</title>
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
<title>Tabla BOPP</title>
<style>
  table {
    width: 100%;
    border-collapse: collapse; /* Para que los bordes se vean unidos */
  }
  th, td {
    border: 1px solid black; /* Bordes para las celdas */
    padding: 8px; /* Espacio interno de las celdas */
    text-align: center; /* Texto centrado en las celdas */
  }
  th {
    background-color: #f2f2f2; /* Color de fondo para los encabezados */
  }
</style>
</head>
<body>
<div class="informacion">
  <p><span class="etiqueta">CODIGO:</span>   12</p>
  <p><span class="etiqueta">ENCARGADO:</span>.....................................................................................      <span class="etiqueta">FIRMA:</span>.....................................................................................</p>
</div>

<style>
  .informacion {
    /* Estilos para el contenedor si es necesario */
  }
  .etiqueta {
    font-weight: bold; /* Texto en negrita para las etiquetas */
  }
</style>
    <table class="form-container">
        <thead>
        <thead>
      <tr>
        <th colspan="11">SALIDA DE MATERIAL BOPP PARA LAMINACION </th>
      </tr>
      <tr>
        <th colspan="11">BOPP</th>
      </tr>
      <tr>
        <th colspan="2">CRISTAL</th>
        <th colspan="1">METALIZADO</th>
        <th colspan="2">CAST</th>
        <th colspan="2">PET</th>
        <th colspan="1">MATE</th>
        <th colspan="1">BD</th>
        <th colspan="2">OTROS</th>
      </tr>
      <tr>
        <th colspan="2">Kg</th>
        <th colspan="1">Kg</th>
        <th colspan="2">Kg</th>
        <th colspan="2">Kg</th>
        <th colspan="1">Kg</th>
        <th colspan="1">Kg</th>
        <th colspan="2">Kg</th>
      </tr>
      <tr>
        <th colspan="11">MEDIDA DE BOPP Y MICRONAJE</th>
      </tr>
      <tr>
        <th colspan="2"></th>
        <th colspan="1"></th>
        <th colspan="2"></th>
        <th colspan="2"></th>
        <th colspan="1"></th>
        <th colspan="1"></th>
        <th colspan="2"></th>
      </tr>
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
                        alt="logo de la instutucion" width="85" height="98"></th>
                <th colspan="6" class="header">ORDEN DE PRODUCCIÓN LAMINADO</th>
                <th rowspan="5"><?= $datoPedido['maquina_impresion'] ?></th>
            </tr>
            <tr>
                <td>CLIENTE</td>
                <td colspan="2"><?= $datoPedido['nombre_cliente'] ?></td>
                <td>MEDIDA</td>
                <td colspan="2"><?= $datoPedido['medida_bolsa'] ?></td>
            </tr>
            <tr>
                <td>PESO</td>
                <td colspan="2"><?= $datoPedido['peso'] ?></td>
                <td>MATERIAL 1 IMPRESION</td>
                <td colspan="2"><?= $datoPedido['material1_impresion'] ?></td>
            </tr>
            <tr>
                <td>IMPRESIÓN</td>
                <td colspan="2"><?= $datoPedido['impresion'] ?></td>
                <td>MATERIAL 2 LAMINADO</td>
                <td colspan="2"><?= $datoPedido['material2_laminado'] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="observation">PRECIO POR BOLSA</td>
                <td colspan="3" class="observation"><?= $datoPedido['precio_bolsa'] ?></td>
                <td>MATERIAL 3 LAMINADO</td>
                <td colspan="2"><?= $datoPedido['material3_laminado'] ?></td>
            </tr>
        </thead>
        
</body>

</html>