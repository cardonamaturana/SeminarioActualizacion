<?php
include_once 'app/Conexion.inc.php';
include_once 'app/Paciente.inc.php';
include_once 'app/Paciente.inc.php';


class ListaPacientes {

    public static function listar_pacientes() {
        $pacientes = Paciente :: obtener_pacientes(Conexion :: obtener_conexion());

        if (count($pacientes)) {
            foreach ($pacientes as $paciente) {
                self::listar_paciente($paciente);
            }
        }
    }

    public static function listar_paciente($paciente) {
        if (!isset($paciente)) {
            return;
        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        echo $paciente -> getNombre().' '. $paciente -> getApellido();
                        ?>
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>
                                <?php
                                echo $paciente -> getId();
                                ?>
                            </strong>
                        </p>
                        <p>
                            <strong>
                                <?php
                                echo $paciente -> getDireccion();
                                ?>
                            </strong>
                        </p>
                        <p>
                            <strong>
                                <?php
                                echo $paciente -> getTelefono();
                                ?>
                            </strong>
                        </p>
                        <p>
                            <strong>
                                <?php
                                echo $paciente -> getCorreo();
                                ?>
                            </strong>
                        </p>
                        <p>
                            <strong>
                                <?php
                                echo nl2br($paciente -> getDescripcion());
                                ?>
                            </strong>
                        </p>
                        

                    </div>
                </div>
            </div>


        </div>




        <?php
    }

}
