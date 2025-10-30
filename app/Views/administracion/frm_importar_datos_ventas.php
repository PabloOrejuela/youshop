<link rel="stylesheet" href="<?= site_url(); ?>public/css/grid-productos.css">
<!--begin::Row-->
<div class="row">
    <!-- Start col -->
    <div class="col-md-9">
        <!-- /.card -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?= site_url().'importar-datos-ventas'; ?>" method="post" id="form-subir-excel" enctype="multipart/form-data">
                <?= csrf_field() ?> <!-- si usas CI4 -->
                <div class="mb-3">
                    <label for="excelFile" class="form-label">Archivo Excel (.xlsx, .xls, .csv)</label>
                    <input class="form-control" type="file" id="excelFile" name="excelFile" accept=".xlsx,.xls,.csv" required>
                </div>
                <button type="submit" class="btn btn-primary">Subir</button>
                </form>
            </div>
            <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <?php
                if (session('mensaje')) {
                  echo'<div class="alert alert-danger mt-2" role="alert">'.session('mensaje').'</div>';
                }
              ?>
              
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.Start col -->
</div>
<!-- /.row (main row) -->