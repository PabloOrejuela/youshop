<link rel="stylesheet" href="<?= site_url(); ?>public/css/grid-productos.css">
<!--begin::Row-->
<div class="row">
    <!-- Start col -->
    <div class="col-md-9">
        <!-- /.card -->
        <div class="card mb-4">
            <div class="card-header">
                <button class="btn btn-outline-info" type="button" id="btn-new-cliente">Registrar Nuevo cliente</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-1 mb-3">
                <table class="table table-striped mb-3" id="datatablesClientes">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody id="tbody-categorias">
                        <?php
                            if ($clientes) {
                                foreach ($clientes as $cliente) {
                                    echo '<tr>';
                                    echo '<td>'.$cliente->id.'</td>';
                                    echo '<td>'.$cliente->nombres.'</td>';
                                    echo '<td>'.$cliente->num_documento.'</td>';
                                    echo '<td>'.$cliente->direccion.'</td>';
                                    echo '<td>'.$cliente->telefono.'</td>';
                                    echo '<td>'.$cliente->email.'</td>';
                                    
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

<!-- Modal new producto -->
<div class="modal fade" id="modalNewCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-800px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registrar un nuevo Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Categoría:</label>
                    <select class="form-select" aria-label="Default select example">
                        <option value="">Selecciona un tipo de documento</option>
                        <?php foreach ($tipos as $tipo): ?>
                            <option value="<?= $tipo->id ?>"><?= $tipo->tipo_documento ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" placeholder="nombre producto">
                </div>
                <div class="mb-3">
                    <label for="codigo" class="form-label">Código barras:</label>
                    <input type="text" class="form-control" id="codigo" placeholder="00000000">
                </div>
                <div class="mb-3">
                    <label for="precio_venta" class="form-label">Precio de venta:</label>
                    <input type="text" class="form-control" id="precio_venta" placeholder="0.00">
                </div>
                <div class="mb-3">
                    <label for="stock_min" class="form-label">Stock mínimo:</label>
                    <input type="text" class="form-control" id="stock_min" placeholder="0">
                </div>
                <div class="mb-1">
                    <div class="row">
                        <div class="col">
                            <label for="cta1" class="form-label">Cta Contable</label>
                            <input type="text" class="form-control cta" id="stock_min" placeholder="0" value="">
                        </div>
                        <div class="col">
                            <label for="cta1" class="form-label">Cta auxiliar</label>
                            <input type="text" class="form-control cta" id="stock_min" placeholder="0">
                        </div>
                        <div class="col">
                            <label for="cta1" class="form-label">Cta auxiliar 2</label>
                            <input type="text" class="form-control cta" id="stock_min" placeholder="0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagen</label>
                    <input class="form-control" type="file" id="formFile">
                    <img id="previewImg" src="#" alt="Previsualización" style="display:none;max-width:100%;margin-top:10px;" />
                </div>
                <div class="mb-3 mt-5">
                    <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= site_url(); ?>public/js/grid-clientes.js"></script>