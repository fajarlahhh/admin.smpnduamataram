<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Admin SMPN 2 MTR</span>
    </a>

        <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->pengguna_nama }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @php
                    $currentUrl = (Request::path() != '/') ? '/'. explode('/', Request::path())[0] : '/';

                    function renderSubMenu($value, $currentUrl) {
                        $subMenu = '';
                        $GLOBALS['sub_level'] += 1 ;
                        foreach ($value as $key => $menu) {
                            $GLOBALS['active'][$GLOBALS['sub_level']] = '';
                            $currentLevel = $GLOBALS['sub_level'];
                                $GLOBALS['subparent_level'] = '';

                                $subSubMenu = '';
                                $hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
                                $hasCaret = (!empty($menu['sub_menu'])) ? '<i class="fas fa-angle-left right"></i>' : '';
                                $hasTitle = (!empty($menu['title'])) ? $menu['title'] : '';
                                $hasHighlight = (!empty($menu['highlight'])) ? '<i class="fa fa-paper-plane text-theme m-l-5"></i>' : '';

                                if (!empty($menu['sub_menu'])) {
                                    $subSubMenu .= '<ul class="nav nav-treeview">';
                                    $subSubMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
                                    $subSubMenu .= '</ul>';
                                }

                                $active = $currentUrl == $menu['url'] ? 'active' : '';

                                if ($active) {
                                    $GLOBALS['parent_active'] = true;
                                    $GLOBALS['active'][$GLOBALS['sub_level'] - 1] = true;
                                }
                                if (!empty($GLOBALS['active'][$currentLevel])) {
                                    $active = 'active';
                                }
                                $subMenu .= '
                                    <li class="nav-item '. $hasSub .'">
                                        <a href="'.($menu['url'] == 'javascript:;'? $menu['url']: url($menu['url'])) .'" class="nav-link '. $active .'"><i class="far fa-circle nav-icon"></i><p>'. $hasCaret . $hasTitle . $hasHighlight .'</p></a>
                                        '. $subSubMenu .'
                                    </li>
                                ';
                        }
                        return $subMenu;
                    }

                    foreach (config('sidebar.menu') as $key => $menu) {
                            $GLOBALS['parent_active'] = '';

                            $hasSub = (!empty($menu['sub_menu'])) ? 'has-treeview' : '';
                            $hasCaret = (!empty($menu['caret'])) ? '<i class="fas fa-angle-left right"></i>' : '';
                            $hasIcon = (!empty($menu['icon'])) ? '<i class="nav-icon '. $menu['icon'] .'"></i>' : '';
                            $hasTitle = (!empty($menu['title'])) ? '<p>'. $menu['title'] .'</p>' : '';

                            $subMenu = '';

                            if (!empty($menu['sub_menu'])) {
                                $GLOBALS['sub_level'] = 0;
                                $subMenu .= '<ul class="nav nav-treeview">';
                                $subMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
                                $subMenu .= '</ul>';
                            }
                            $active = $currentUrl == $menu['url']? 'menu-open' : '';
                            $active = empty($active) && !empty($GLOBALS['parent_active']) ? 'menu-open' : $active;
                            echo '
                                <li class="nav-item '. $hasSub .' '. $active .'">
                                    <a href="'. url($menu['url']) .'"  class="nav-link '. $active .'">
                                        '. $hasCaret .'
                                        '. $hasIcon .'
                                        '. $hasTitle .'
                                    </a>
                                    '. $subMenu .'
                                </li>
                            ';
                    }
                @endphp
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
        <!-- /.sidebar -->
</aside>
