<link rel="stylesheet" href="<?= site_url(); ?>public/css/grid-productos.css">
<!--begin::Row-->
<div class="row">
    <!-- Start col -->
    <div class="col-md-9">
        <!-- /.card -->
        <div class="card mb-4">
            <!-- /.card-header -->
            <div class="card-body p-1 mb-3">
                <table class="table table-bordered mb-3" id="datatablesClientes">
                    <tbody id="tbody-categorias">
                        <?php
                            if ($empresa) {
                                    echo '<tr><td>Nombre Empresa: </td><td>'.$empresa->nombre_empresa.'</td></tr>';
                                    echo '<td>Razon social: </td><td>'.$empresa->razon_social.'</td></tr>';
                                    echo '<td>RUC: </td><td>'.$empresa->ruc.'</td></tr>';
                                    echo '<td>Dirección Matriz: </td><td>'.$empresa->dir_matriz.'</td></tr>';
                                    echo '<td>Dirección Sucursal: </td><td>'.$empresa->dir_sucursal.'</td></tr>';
                                    echo '<td>Contribuyente especial: </td><td>'.$empresa->num_contrib_esp.'</td></tr>';
                                    echo '<td>Obligado a llevar Contabilidad: </td><td>'.$empresa->obligado_contabilidad.'</td></tr>';
                                    echo '<td>Fact. Electrónica: </td><td>'.$empresa->fact_electronica.'</td></tr>';
                                    echo '<td>Fecha de Autorización: </td><td>'.$empresa->fecha_autorizacion.'</td></tr>';
                                    echo '<td>Teléfono: </td><td>'.$empresa->telefono.'</td></tr>';
                            }
                            
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.Start col -->
</div>
<!-- /.row (main row) -->