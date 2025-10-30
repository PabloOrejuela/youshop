<link rel="stylesheet" href="<?= site_url(); ?>public/css/grid-ventas.css">
<!--begin::Row-->
<div class="row">
    <!-- Start col -->
    <div class="col-md-12">
        <!-- /.card -->
        <div class="card mb-4">
            <!-- /.card-header -->
            <div class="card-body p-1 mb-3">
                <table class="table table-striped mb-3" id="datatablesVentas">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Código</th>
                        <th>Fecha</th>
                        <th>Valor neto</th>
                        <th>IVA</th>
                        <th>Total</th>
                        <th>Forma Pago</th>
                        <th>Vendedor</th>
                        <th>Estado</th>
                        <th>Estado autorización</th>
                        <th>Enviado</th>
                    </tr>
                    </thead>
                    <tbody id="tbody-categorias">
                        <?php
                            if ($ventas) {
                                foreach ($ventas as $venta) {
                                    echo '<tr>';
                                    echo '<td>'.$venta->id.'</td>';
                                    echo '<td>'.$venta->nombres.'</td>';
                                    echo '<td>'.$venta->num_comprobante.'</td>';
                                    echo '<td>'.$venta->fecha.'</td>';
                                    echo '<td>'.$venta->valor_neto.'</td>';
                                    echo '<td>'.$venta->iva.'</td>';
                                    echo '<td>'.$venta->total.'</td>';
                                    echo '<td>'.$venta->idformaPago.'</td>';
                                    echo '<td>'.$venta->idusuario.'</td>';
                                    echo '<td>'.$venta->estado.'</td>';
                                    echo '<td>'.$venta->auth_sri.'</td>';
                                    echo '<td>'.$venta->enviado.'</td>';
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
<script src="<?= site_url(); ?>public/js/grid-ventas.js"></script>