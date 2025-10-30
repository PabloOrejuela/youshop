<link rel="stylesheet" href="<?= site_url(); ?>public/css/grid-productos.css">
<!--begin::Row-->
<div class="row">
    <!-- Start col -->
    <div class="col-md-12">
        <!-- /.card -->
        <div class="card mb-4">
            <!-- /.card-header -->
            <div class="card-body p-1 mb-3">
                <table class="table table-striped mb-3" id="datatablesClientes">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Documento</th>
                        <th>Fecha</th>
                        <th>IVA</th>
                        <th>Impuesto</th>
                        <th>Valor neto</th>
                        <th>Total</th>
                        <th>Forma de pago</th>
                    </tr>
                    </thead>
                    <tbody id="tbody-categorias">
                        <?php
                        $total = 0;
                            if ($ventas) {
                                foreach ($ventas as $venta) {
                                    echo '<tr>';
                                    echo '<td>'.$venta->id.'</td>';
                                    echo '<td>'.$venta->nombres.'</td>';
                                    echo '<td>'.$venta->serie.'-'.$venta->subserie.'-'.$venta->num_comprobante.'</td>';
                                    echo '<td>'.$venta->fecha.'</td>';
                                    echo '<td>'.$venta->iva.'%</td>';
                                    echo '<td>'.$venta->impuesto.'</td>';
                                    echo '<td>'.$venta->valor_neto.'</td>';
                                    echo '<td>'.$venta->total.'</td>';
                                    if ($venta->idformaPago == 7) {
                                        echo '<td>TRTANSFERENCIA</td>';
                                    }else if($venta->idformaPago == 9){
                                        echo '<td>EFECTIVO</td>';
                                    }
                                    
                                    echo '</tr>';
                                    $total += $venta->total;
                                }
                                echo '<tr><td colspan="7"></td><td colspan="2">'.number_format($total, 2).'</td></tr>';
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= site_url(); ?>public/js/grid-clientes.js"></script>