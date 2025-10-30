<link rel="stylesheet" href="<?= site_url(); ?>public/css/side-menu.css">
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
      <nav class="mt-2">
        <!--begin::Sidebar Menu-->
        <ul
          class="nav sidebar-menu flex-column"
          data-lte-toggle="treeview"
          role="menu"
          data-accordion="false"
        >
          <?php
          echo '<pre>'.var_export($session->membresia, true).'</pre>';exit;
            if ($session->membresia == 1) {
              
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Membresías
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Lista de membresías</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Transferencias</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Asignar membresía</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //USUARIOS
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Usuarios
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Lista de usuarios</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Registrar nuevo usuario</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //MIEMBROS
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Miembros
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Lista de miembros</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Registrar nuevo miembro</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //INSTRUCTORES
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Instructores
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Registar asistencia Instructor</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Lista de Instructores</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //REPORTES
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Reportes
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Reporte lista de miembros</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Reporte lista de membresías</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Reporte de clases por instructor</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Reporte de movimientos</p>
                      </a>
                    </li>
                  </ul>
                </li>';
            }
          ?>
        </ul>
        <!--end::Sidebar Menu-->
      </nav>
    </div>
    <!--end::Sidebar Wrapper-->
  </aside>
  <!--end::Sidebar-->