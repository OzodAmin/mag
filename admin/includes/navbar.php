<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?= (basename($_SERVER['SCRIPT_NAME']) == 'home.php') ? 'active' : '';?>">
        <a class="nav-link" href="/admin/home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item <?= (basename($_SERVER['SCRIPT_NAME']) == 'orders.php') ? 'active' : '';?>">
        <a class="nav-link" href="/admin/orders.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Orders</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?= (basename($_SERVER['SCRIPT_NAME']) == 'products.php') ? 'active' : '';?>">
        <a class="nav-link" href="/admin/products.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Products</span></a>
      </li>

      <li class="nav-item <?= (basename($_SERVER['SCRIPT_NAME']) == 'categories.php') ? 'active' : '';?>">
        <a class="nav-link" href="/admin/categories.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Categories</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/admin/logout.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->