<link rel="stylesheet" href="<?= site_url(); ?>public/css/grid-productos.css">
<!--begin::Row-->
<div class="row">
    <!-- Start col -->
    <div class="col-md-9">
        <!-- /.card -->
        <div class="card mb-4">
            <!-- /.card-header -->
            <div class="card-body p-1 mb-3">
                <table class="table table-striped mb-3" id="datatablesCtas">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>COD</th>
                        <th>CUENTA</th>
                        <th>GRUPO</th>
                    </tr>
                    </thead>
                    <tbody id="tbody-categorias">
                        <?php
                            if ($cuentas) {
                                foreach ($cuentas as $cuenta) {
                                    echo '<tr>';
                                    echo '<td>'.$cuenta->id.'</td>';
                                    echo '<td>'.$cuenta->cod_cta.'</td>';
                                    echo '<td>'.$cuenta->nombre_cta.'</td>';
                                    echo '<td>'.$cuenta->grupo.'</td>';
                                    
                                    echo '</tr>';
                                }
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
 <script src="<?= site_url(); ?>public/js/plan-ctas.js"></script>
