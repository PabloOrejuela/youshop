<link rel="stylesheet" href="<?= site_url(); ?>public/css/grid-categorias.css">
<!--begin::Row-->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-7 connectedSortable">
        <!-- /.card -->
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="card-title"><?= $subtitle; ?></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 mb-3">
                <table class="table table-striped mb-3" id="datatablesCategorias">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody id="tbody-categorias">
                        <?php
                            if ($categorias) {
                                foreach ($categorias as $categoria) {
                                    echo '<tr>';
                                    echo '<td>'.$categoria->id.'</td>';
                                    echo '<td>'.$categoria->nombre.'</td>';
                                    echo '<td>'.$categoria->descripcion.'</td>';
                                    echo '<td>'.$categoria->tipo.'</td>';
                                    echo '<td>'.$categoria->estado.'</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr>';
                                echo '<td colspan="3">No hay datos que mostrar</td>';
                                echo '</tr>';
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
    <!-- Start col -->
    <div class="col-lg-5 connectedSortable">
        <div class="card text-black bg-default bg-gradient border-default mb-4">
            <div class="card-header border-0">
                <h3 class="card-title">Registrar nueva Categoría</h3>
            </div>
            <div class="card-footer border-0">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Form Validation-->
                    <div class="card card-info card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header"><div class="card-title"></div></div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <form class="needs-validation" novalidate>
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Row-->
                                    <div class="row g-3">
                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="nombre" class="form-label">Nombre *:</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nombre"
                                                value=""
                                                placeholder="categoría"
                                                required
                                            />
                                            <div class="valid-feedback">Correcto!</div>
                                            <div class="invalid-feedback">Por favor ingrese un nombre.</div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="tipo" class="form-label">Tipo *:</label>
                                            <select class="form-select" id="tipo" name="tipo" required>
                                                <option selected disabled value="">-- Seleccione un tipo de categoría --</option>
                                                <option value="PRODUCTO">Producto</option>
                                                <option value="SERVICIO">Servicio</option>
                                            </select>
                                            <div class="valid-feedback">Correcto!</div>
                                            <div class="invalid-feedback">Por favor seleccione un tipo de categoría.</div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6">
                                            <label for="descripcion" class="form-label">Descripción (opcional)</label>
                                            <textarea class="form-control" placeholder="Ingrese una descripción" id="descripcion"></textarea>
                                            <div class="valid-feedback">Correcto!</div>
                                            <div class="invalid-feedback">Por favor ingrese una descipción.</div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <p id="textoObligatorios">Los campos con * son obligatorios</p>
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer">
                                    <button class="btn btn-outline-info" type="button" id="btn-registrar-categoria">Registrar</button>
                                </div>
                                <!--end::Footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Form Validation-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
        </div>
    </div>
    <!-- /.Start col -->
</div>
<!-- /.row (main row) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= site_url(); ?>public/js/grid-categorias.js"></script>
<!--begin::JavaScript-->
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.from(forms).forEach((form) => {
    form.addEventListener(
        'submit',
        (event) => {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
        },
        false,
    );
    });
})();
</script>
<!--end::JavaScript-->