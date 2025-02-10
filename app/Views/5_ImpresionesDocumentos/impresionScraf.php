<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagen/logo.png" />
    <title>REGISTRO DE SCRAF</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th,
        td {
            text-align: center;
            padding: 5px 10px;
            word-wrap: break-word;
            overflow: hidden;
            min-width: 120px;
            /* Aumenta el ancho mínimo de cada celda */
            border: 1px solid #ddd;
        }

        th {
            background-color: #f7b977;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            font-size: 13px;
            padding: 8px;
            border-bottom: 3px solid #e58a44;
        }

        .header {
            background-color: #f7b977;
            font-weight: bold;
        }

        .section-title {
            background-color: #ffe066;
            font-weight: bold;
        }

        img {
            width: 60px;
            height: 70px;
        }

        td[contenteditable="true"] {
            background-color: #f9f9f9;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <table>
        
            <tr>
                <th colspan="2" rowspan="3">
                    <img src="data:image/png;base64,<?php echo $logo; ?>" alt="logo">
                </th>
                <th colspan="21" class="header">REGISTRO DE SCRAF</th>
            </tr>
            <tr>
                <td colspan="2">GESTIÓN</td>
                <td colspan="8" contenteditable="true"></td>
                <td colspan="2" >ENCARGADO</td>
                <td colspan="9" contenteditable="true"></td>
            </tr>
            <tr>
                <td colspan="3" >MES</td>
                <td colspan="7" contenteditable="true"></td>
                <td colspan="3" >SEMANA</td>
                <td colspan="19" contenteditable="true"></td>
            </tr>
     
        <tbody>
            <tr class="section-title">
                <td>MES</td>
                <td>SEMANA</td>
                <td>OP</td>
                <td>CLIENTE</td>
                <td>PESO</td>
                <td>MAQ_IMP</td>
                <td>MED_BOL</td>
                <td>PRE_BOL</td>
                <td>IMP</td>
                <td>MATERIAL</td>
                <td>TIPO</td>
                <td style="font-size: 7px;" >KILOS <br> ENTREGADO <br>MATERIAL</td>
                <td>ITEM</td>
                <td>COL1</td>
                <td>COL2</td>
                <td>COL3</td>
                <td>COL4</td>
                <td>COL5</td>
                <td>COL6</td>
                <td>COL7</td>
                <td>COL8</td>
                <td>SUBTOTAL</td>
                <td>TOTAL</td>
                <td style="font-size: 7px;" >CONTROL ADM</td>
            </tr>

            <?php
            // Supongamos que $datos contiene la información del array proporcionado.
            foreach ($datos as $dato) {
                echo "<tr>";
                echo "<td contenteditable='true'>{$dato['mes']}</td>";
                echo "<td contenteditable='true'>{$dato['semana']}</td>";
                echo "<td contenteditable='true'>{$dato['op']}</td>";
                echo "<td contenteditable='true'>{$dato['nombre_cliente']}</td>";
                echo "<td contenteditable='true'>{$dato['peso']}</td>";
                echo "<td contenteditable='true'>{$dato['maquina_impresion']}</td>";
                echo "<td contenteditable='true'>{$dato['medida_bolsa']}</td>";
                echo "<td contenteditable='true'>{$dato['precio_bolsa']}</td>";
                echo "<td contenteditable='true'>{$dato['impresion']}</td>";
                echo "<td contenteditable='true'>{$dato['material']}</td>";
                echo "<td contenteditable='true'>{$dato['nombre']}</td>";
                echo "<td contenteditable='true'></td>";
                echo "<td contenteditable='true'>{$dato['item']}</td>";
                echo "<td contenteditable='true'>{$dato['columna1']}</td>";
                echo "<td contenteditable='true'>{$dato['columna2']}</td>";
                echo "<td contenteditable='true'>{$dato['columna3']}</td>";
                echo "<td contenteditable='true'>{$dato['columna4']}</td>";
                echo "<td contenteditable='true'>{$dato['columna5']}</td>";
                echo "<td contenteditable='true'>{$dato['columna6']}</td>";
                echo "<td contenteditable='true'>{$dato['columna7']}</td>";
                echo "<td contenteditable='true'>{$dato['columna8']}</td>";
                echo "<td contenteditable='true'>{$dato['suma']}</td>";
                echo "<td contenteditable='true'></td>"; // TOTAL (puedes calcularlo)
                // CONTROL ADM
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>