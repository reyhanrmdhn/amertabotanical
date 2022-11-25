<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <?php $role = $this->db->get_where('user_role', ['role_id' => $user['role_id']])->row_array() ?>
            <?php $menu = $this->m_global->get_menu_joined($user['role_id']); ?>
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title"><?= $role['role']; ?></li>
                <?php foreach ($menu as $m) { ?>
                    <li>
                        <a href="<?= base_url($m['url']) ?>" class="waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="<?= $m['icon'] ?>"></i></div>
                            <span><?= $m['title']; ?></span>
                        </a>
                    </li>
                <?php } ?>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->