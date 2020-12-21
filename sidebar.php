        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src="img/sidebar-logo.png" alt="" style="width: 95%;">
            </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if(basename($_SERVER["PHP_SELF"]) == "index.php"){echo"active";}?>">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
            Pages
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if(basename($_SERVER["PHP_SELF"]) == "product.php"){echo"active";}?>">
            <a class="nav-link" href="product.php" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-cubes"></i>
                <span>Our Products</span>
            </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item <?php if(basename($_SERVER["PHP_SELF"]) == "test.php"){echo"active";}?>">
            <a class="nav-link" href="test.php" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-clipboard-list"></i>
                <span>Product Testing</span>
            </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if(basename($_SERVER["PHP_SELF"]) == "about.php"){echo"active";}?>">
            <a class="nav-link" href="about.php" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-info-circle"></i>
                <span>About Us</span>
            </a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?php if(basename($_SERVER["PHP_SELF"]) == "contact.php"){echo"active";}?>">
            <a class="nav-link" href="contact.php">
                <i class="fas fa-phone-square-alt"></i>
                <span>Contact Us</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->