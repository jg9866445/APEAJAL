                            <?php
                                $resultado = $conexion->getSalidaPlanta();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idSalida'] . "</td>";
                                        echo "<td>" . $row['idPago'] . "</td>";
                                        echo "<td>" . $row['idResponsable'] . "</td>";
                                        echo "<td>" . $row['fechaEntrega'] . "</td>";
                                        echo "</tr>";
                                    }
                            ?>