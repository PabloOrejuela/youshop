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
          
            if ($session->administracion == 1) {
              //ADMINISTRACION
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Administración
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Registar nuevo usuario</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'lista-usuarios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Lista de usuarios</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'datos-empresa" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Datos empresa</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'frm-importar-datos-ventas" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Importar datos ventas</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //INVENTARIOS
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Inventarios
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'categorias" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Categorías</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'productos" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Productos</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Ingreso de gastos mensuales</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Movimientos de stock</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Kardex de productos</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //COMPRAS
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Gestión de compras
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'grid-proveedores" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Proveedores</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Compras</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Ingreso Retenciónes Compras</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //Contabilidad
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Contabilidad
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'plan-ctas" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Plan de cuentas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'reporte-pagos-socios" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Período contable</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //Ventas
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Ventas
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'ventas" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Ventas</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              
              //CAJAS
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Cajas
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'cajas" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Cajas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'cierres-caja" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Cierres de caja</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'nuevo-cierre-caja" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Registrar nuevo cierre de caja</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Movimientos de caja</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //Facturación
              echo '
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi fa-hammer"></i>
                    <p>
                      Facturación
                      <i class="nav-arrow bi bi-chevron-right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="'.site_url().'clientes" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Clientes</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Ventas Fact. Electrónica</p>
                      </a>
                    </li>
                  </ul>
                </li>';
              //MEMBRESÍAS
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
                        <p>Módulo Membresías</p>
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
                      <a href="'.site_url().'reporte-cierres-caja" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Reporte de cierres de caja</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Reporte de ventas</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Reporte de compras</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Lista de productos</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Proveedores</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="'.site_url().'admin-socios-list" class="nav-link">
                        <i class="nav-icon bi bi-circle"></i>
                        <p>Reporte de resultados</p>
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