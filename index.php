<?php
date_default_timezone_set('America/Guayaquil');

require_once './Classes/PHPExcel.php';
$archivo = 'ListaPersonal.xlsx'; //echo file_exists($archivo)? 'true':'false';
$inputFileType = PHPExcel_IOFactory::identify($archivo);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($archivo);
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow();
$highestColumn = $sheet->getHighestColumn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <table>
        <thead>
            <tr>
                <th>#</th>
                <th>COL. A</th>
                <th>COL. B</th>
                <th>COL. C</th>
                <th>COL. D</th>
                <th>COL. E</th>
                <th>COL. F</th>
                <th>COL. G</th>
                <th>COL. H</th>
                <th>COL. I</th>
                <th>COL. J</th>
                <th>COL. K</th>
                <th>COL. L</th>
                <th>COL. M</th>
                <th>COL. N</th>
                <th>COL. O</th>
                <th>COL. P</th>
                <th>COL. Q</th>
                <th>COL. R</th>
                <th>COL. S</th>
                <th>COL. T</th>
                <th>COL. U</th>
                <th>COL. V</th>
                <th>COL. W</th>
                <th>COL. X</th>
                <th>COL. Y</th>
                <th>COL. Z</th>
                <th>COL. AA</th>
                <th>COL. AB</th>
                <th>COL. AC</th>
                <th>COL. AD</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $num = 0;
            for ($row = 2; $row <= $highestRow; $row++) {
                $num++; ?>
                <tr>
                    <th scope='row'><?= $num; ?></th>
                    <td><?= $sheet->getCell("A" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("B" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("C" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("D" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("E" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("F" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("G" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("H" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("I" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("J" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("K" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("L" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("M" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("N" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("O" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("P" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("Q" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("R" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("S" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("T" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("U" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("V" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("W" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("X" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("Y" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("Z" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("AA" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("AB" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("AC" . $row)->getValue(); ?></td>
                    <td><?= $sheet->getCell("AD" . $row)->getValue(); ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table> -->
    <table>
        <tbody>
            <?php
            $aProc =
                array(
                    'Subastas Inversa Electrónica' => 3,
                    'Subasta Inversa Electrónica' => 3,
                    'Lista corta' => 10,
                    'Contratacion directa' => 9,
                    'Concurso publico' => 11,
                    'Licitación' => 6,
                    'Cotización' => 5,
                    'Repuestos o Accesorios' => 30,
                    'Obra artística, científica o literaria' => 29,
                    'Comunicación Social – Selección de Proveedores' => 'null',
                    'Catalogo Electrónico' => 1,
                    'Contratos entre Entidades Públicas o sus subsidiarias' => 33,
                    'Menor cuantia' => 4,
                    'Menor Cuantía' => 4,
                    'Bienes y Servicios únicos' => 31,
                    'Asesoría y Patrocinio Jurídico' => 'null',
                    'Infima Cuantía' => 2,
                    'Adquisición de Bienes Inmuebles' => 24,
                    'Comunicación Social – Contratación Directa' => 9,
                    'Arrendamiento de Bienes Inmuebles' => 25,
                    '' => 'null'
                );
            $ubicacion = htmlentities('<ubicacions></ubicacions>');
            $entregable = htmlentities('<entregables></entregables>');
            $ordencompra = htmlentities('<ordencompras></ordencompras>');

            $num = 0;

            for ($row = 2; $row <= $highestRow; $row++) {
                // var_dump($sheet->rangeToArray('A'.$row.':'.$highestColumn.$row)); exit;
                $rowContent = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row);
                $rowText = implode($rowContent[0]);
                $isRowFill = ($rowText != '');

                if ($isRowFill) {
                    $num++;

                    $iddireccionreq = ($sheet->getCell("AD" . $row)->getValue() == '' ? 'null' : $sheet->getCell("AD" . $row)->getValue());
                    $idiestadocontractual = ($sheet->getCell("T" . $row)->getValue() == 'Adjudicado - Registro de Contratos' || $sheet->getCell("T" . $row)->getValue() == 'Ejecución de Contrato' ? 1 : ($sheet->getCell("T" . $row)->getValue() == 'En Recepción' ? 7 : 'null'));
                    $idtipocompra = ($sheet->getCell("E" . $row)->getValue() == 'Consultoria' ? 6 : ($sheet->getCell("E" . $row)->getValue() == 'Servicio' ? 3 : ($sheet->getCell("E" . $row)->getValue() == 'Bien' ? 1 : ($sheet->getCell("E" . $row)->getValue() == 'Obra' ? 5 : 'null'))));
                    $idprocedimiento = $aProc[$sheet->getCell("K" . $row)->getValue()];
                    $idicuatrimestre = substr($sheet->getCell("R" . $row)->getValue(), 0, 2);
                    $anio = ($sheet->getCell("A" . $row)->getValue() == '' ? 'null' : $sheet->getCell("A" . $row)->getValue());
                    $numerocontrato = trim($sheet->getCell("V" . $row)->getValue());

                    $hayfecha = ($sheet->getCell("X" . $row)->getValue() != '');
                    if ($hayfecha) {
                        $colX = str_replace('/', '-', str_replace(' 00:00:00,000000', '', $sheet->getCell("X" . $row)->getValue()));
                        $fecha = new DateTime(substr($colX, 0, 6) . '20' . substr($colX, 6));
                        $fechasuscripcion = $fecha->format('d/m/Y');
                    } else {
                        $fechasuscripcion = '';
                    }

                    $plazo = ($sheet->getCell("Y" . $row)->getValue() == '' ? 'null' : $sheet->getCell("Y" . $row)->getValue());
                    $montopresupuestado = ($sheet->getCell("Z" . $row)->getValue() == '' ? 'null' : $sheet->getCell("Z" . $row)->getValue());
            ?>
                    <tr>
                        <td>PL_PQ_TPROYECTO.p_insert(
                            0/** a.idproyecto */,
                            null/** a.idcompetencia */,
                            null/** a.ididp */,
                            null/** a.iddireccionadm */,
                            <?= $iddireccionreq;  ?>/** a.iddireccionreq */,
                            null/** a.idadministrador */,
                            null/** a.idfiscalizador */,
                            null/** a.idsupervisor */,
                            <?= $idiestadocontractual; ?>/** a.idiestadocontractual */,
                            'ESTA_CONT',
                            null/** a.idetapa */,
                            1/** a.idorigenfondo */,
                            <?= $idtipocompra ?>/** a.idtipocompra */,
                            <?= $idprocedimiento ?>/** a.idprocedimiento */,
                            'TIPO_EJEC',
                            2/** a.iditipoejecucion */,
                            'TIEM_CUAT',
                            '<?= $idicuatrimestre ?>',
                            <?= $anio ?>/** a.anio */,
                            '<?= $numerocontrato ?>'/** a.numerocontrato */,
                            '<?= $sheet->getCell("S" . $row)->getValue();
                                /** PROCESO */ ?>',
                            '<?= $sheet->getCell("L" . $row)->getValue();
                                /** DESCRIPCION */ ?>',
                            null/** a.tiempoestimado */,
                            null/** a.porcentaje */,
                            null/** a.planillacontrato */,
                            null/** a.planillatramitada */,
                            null/** a.numerobeneficiario */,
                            'N'/** a.garantiabua */,
                            'N'/** a.garantiafcc */,
                            'N'/** a.garantiatecnica */,
                            ''/** a.fechafinplazo */,
                            ''/** a.fechaentrega */,
                            ''/** a.fechaentregadefinitiva */,
                            ''/** a.observacion */,
                            'ADMIN',
                            '127.0.0.1',
                            'EA',
                            '',
                            '',
                            '<?= $fechasuscripcion ?>'/** a.fechasuscripcion */,
                            <?= $plazo ?>/** a.plazo */,
                            <?= $montopresupuestado ?>/** a.montopresupuestado */,
                            '<?= $ubicacion ?>'/** ic_ubicacion */,
                            '<?= $entregable ?>'/** ic_entregable */,
                            '<?= $ordencompra ?>'/** ic_ordencompra */,
                            false, on_errCode, ov_errMsg); if not (on_errCode = 0) then RAISE_APPLICATION_ERROR(num => -20011, msg => ov_errMsg); else dbms_output.put_line(ov_errMsg||' linea: '||$$PLSQL_LINE); end if;</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>