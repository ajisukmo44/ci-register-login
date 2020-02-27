<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <?php
    $access = $this->session->userdata('access');
    $queryMenu = "SELECT a.menu_id, a.menu FROM user_menu a JOIN user_access_menu b ON a.menu_id = b.menu_id WHERE b.access_id=$access ORDER BY b.menu_id ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Loopin Menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <?php
        $menuid = $m['menu_id'];
        $querySubMenu = "SELECT * FROM user_sub_menu a JOIN user_menu b ON a.menu_id = b.menu_id WHERE a.menu_id=$menuid AND a.status = 1";

        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>


        <?php foreach ($subMenu as $sm) : ?>

            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>


                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
                </li>
            <?php endforeach; ?>

            <hr class="sidebar-divider d-none d-md-block mt-3">

        <?php endforeach; ?>


        <!-- Divider -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->