<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link header-admin">
      <img style="scale: 75%;
      position: relative;
      left: -10%;" src="/template/images/icons/image-logo-icon.png" alt="AdminLTE Logo" class="brand-image elevation-3" >
      <span style="position: relative;
            right: 10%;" class="brand-text font-weight-light">Admin</span>
      <a class="btn btn-sm btn-primary" href="{{ route('logout') }}" class="brand-text font-weight-light">Log out</a>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/template/admin/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Session::get('email') }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
              <a href="/admin" class="nav-link active">
                  <i class="fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
              </a>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bars"></i>
                <p> Category
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/menus/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/menus/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Category List</p>
                    </a>
                </li>
            </ul>
          </li>
          {{--  --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-store-alt"></i>
                <p> Product
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/admin/products/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>More Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/products/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List of products</p>
                    </a>
                </li>
            </ul>
        </li>
        {{--  --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
            <p>
              Banner
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/sliders/add" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>add Banner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/sliders/list" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Banner List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cart-plus"></i>
            <p>
              Order
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/orders" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Order List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-user-tie"></i>
            <p>
              Client
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/customers" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List of customers</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-ticket-alt"></i>
              <p> Promotion
                  <i class="right fas fa-angle-left"></i>
              </p>
          </a>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="/admin/coupons/add" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>More Promotions</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/admin/coupons/list" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Promotion List</p>
                  </a>
              </li>
          </ul>
        </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>