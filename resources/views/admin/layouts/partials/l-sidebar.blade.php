<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ asset('be/assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">

                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">Nowak Helme</a>

                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false">Nowak Helme</a>

                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">Admin Head</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{asset('./be/index.html')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end">9+</span>
                        <span> Dashboard </span>
                    </a>

                </li>
                <li class="menu-title mt-2">Danh mục </li>
                <li>
                    <a href="{{asset('./be/#email')}}" data-bs-toggle="collapse">
                        <i class="fe-folder-minus"></i>
                        <span>Danh mục phòng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="email">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('categoryrooms.create')}}">Thêm mới</a>
                            </li>
                            <li>
                                <a href="{{route('categoryrooms.index')}}">Danh sach </a>
                            </li>
                            <li>
                                <a href="{{route('categoryrooms.deleted')}}">Thùng rác</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="{{asset('./be/apps-calendar.html')}}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Calendar </span>
                    </a>

                </li>
                <li>

                    <a href="#sidebarTasks" data-bs-toggle="collapse">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span> Dịch Vụ </span>
                        <span class="menu-arrow"></span>

                    </a>
                    <div class="collapse" id="sidebarTasks">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('services.index')}}">Danh Sách</a>
                            </li>
                            <li>
                                <a href="{{route('services.create')}}">Thêm Dịch Vụ</a>
                            </li>
                            <li>
                                <a href="{{route('services.deleted')}}">Thùng Rác</a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li>
                    <a href="{{asset('./be/#email')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-outline"></i>
                        <span> Người dùng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="email">
                        <ul class="nav-second-level">
                            <li>

                                <a href="{{asset('./be/email-inbox.html')}}">Inbox</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/email-templates.html')}}">Email Templates</a>

                                <a href="{{ route('users.create') }}">Thêm mới người dùng</a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}">Danh sách</a>

                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{asset('./be/#sidebarTasks')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span> Tasks </span>

                    <a href="#email" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-outline"></i>
                        <span> Cài đặt </span>

                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="email">
                        <ul class="nav-second-level">
                            <li>

                                <a href="{{asset('./be/task-kanban-board.html')}}">Kanban Board</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/task-details.html')}}">Details</a>

                                <a href="{{route('setting.index')}}">Giao diện người dùng</a>
                                <a href="email-inbox.html">Inbox</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li>
                    <a href="{{asset('./be/apps-projects.html')}}">
                        <i class="mdi mdi-briefcase-variant-outline"></i>
                        <span> Projects </span>
                    </a>
                </li>

                <li>
                    <a href="{{asset('./be/#contacts')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-book-open-page-variant-outline"></i>
                        <span> Mã giảm giá </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="contacts">
                        <ul class="nav-second-level">
                            <li>

                                <a href="{{asset('./be/contacts-list.html')}}">Members List</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/contacts-profile.html')}}">Profile</a>

                                <a href="{{ route('coupon.create') }}">Thêm mã giảm giá</a>
                            </li>
                            <li>
                                <a href="{{ route('coupon.deleted') }}">Thùng rác</a>

                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="{{asset('./be/#sidebarAuth')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-plus-outline"></i>
                        <span> Auth Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{asset('./be/auth-login.html')}}">Log In</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/auth-register.html')}}">Register</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/auth-recoverpw.html')}}">Recover Password</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/auth-lock-screen.html')}}">Lock Screen</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/auth-confirm-mail.html')}}">Confirm Mail</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/auth-logout.html')}}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-file-multiple-outline"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{asset('./be/pages-starter.html')}}">Starter</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/pages-pricing.html')}}">Pricing</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/pages-timeline.html')}}">Timeline</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/pages-invoice.html')}}">Invoice</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/pages-faqs.html')}}">FAQs</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/pages-gallery.html')}}">Gallery</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/pages-404.html')}}">Error 404</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/pages-500.html')}}">Error 500</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/pages-maintenance.html')}}">Maintenance</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/pages-coming-soon.html')}}">Coming Soon</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{asset('./be/#sidebarLayouts')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-dock-window"></i>
                        <span> Layouts </span>
                        <span class="menu-arrow"></span>

                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{asset('./be/layouts-horizontal.html')}}">Horizontal</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/layouts-preloader.html')}}">Preloader</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Components</li>

                <li>
                    <a href="{{asset('./be/#sidebarBaseui')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-briefcase-outline"></i>
                        <span> Base UI </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBaseui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{asset('./be/ui-buttons.html')}}">Buttons</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-cards.html')}}">Cards</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-avatars.html')}}">Avatars</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-tabs-accordions.html')}}">Tabs & Accordions</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-modals.html')}}">Modals</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-progress.html')}}">Progress</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-notifications.html')}}">Notifications</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-offcanvas.html')}}">Offcanvas</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-placeholders.html')}}">Placeholders</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-spinners.html')}}">Spinners</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-images.html')}}">Images</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-carousel.html')}}">Carousel</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-video.html')}}">Embed Video</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-dropdowns.html')}}">Dropdowns</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-tooltips-popovers.html')}}">Tooltips & Popovers</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-general.html')}}">General UI</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-typography.html')}}">Typography</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/ui-grid.html')}}">Grid</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{asset('./be/widgets.html')}}">
                        <i class="mdi mdi-gift-outline"></i>
                        <span> Widgets </span>
                    </a>
                </li>

                <li>
                    <a href="{{asset('./be/#sidebarExtendedui')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-layers-outline"></i>
                        <span class="badge bg-info float-end">Hot</span>
                        <span> Extended UI </span>
                    </a>
                    <div class="collapse" id="sidebarExtendedui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{asset('./be/extended-range-slider.html')}}">Range Slider</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/extended-sweet-alert.html')}}">Sweet Alert</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/extended-draggable-cards.html')}}">Draggable Cards</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/extended-tour.html')}}">Tour Page</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/extended-notification.html')}}">Notification</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/extended-treeview.html')}}">Tree View</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{asset('./be/#sidebarIcons')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-shield-outline"></i>
                        <span> Icons </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{asset('./be/icons-feather.html')}}">Feather Icons</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/icons-mdi.html')}}">Material Design Icons</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/icons-dripicons.html')}}">Dripicons</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/icons-font-awesome.html')}}">Font Awesome 5</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/icons-themify.html')}}">Themify</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{asset('./be/#sidebarForms')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-texture"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{asset('./be/forms-elements.html')}}">General Elements</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/forms-advanced.html')}}">Advanced</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/forms-validation.html')}}">Validation</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/forms-wizard.html')}}">Wizard</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/forms-quilljs.html')}}">Quilljs Editor</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/forms-pickers.html')}}">Picker</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/forms-file-uploads.html')}}">File Uploads</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/forms-x-editable.html')}}">X Editable</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{asset('./be/#sidebarTables')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-table"></i>
                        <span> Tables </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{asset('./be/tables-basic.html')}}">Basic Tables</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/tables-datatables.html')}}">Data Tables</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/tables-editable.html')}}">Editable Tables</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/tables-responsive.html')}}">Responsive Tables</a>
                            </li>
                            <li>
                                <a href="{{asset('./be/tables-tablesaw.html')}}">Tablesaw Tables</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{asset('./be/#sidebarCharts')}}" data-bs-toggle="collapse">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Charts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCharts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="charts-flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="charts-morris.html">Morris Charts</a>
                            </li>
                            <li>
                                <a href="charts-chartjs.html">Chartjs Charts</a>
                            </li>
                            <li>
                                <a href="charts-chartist.html">Chartist Charts</a>
                            </li>
                            <li>
                                <a href="charts-sparklines.html">Sparkline Charts</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i class="mdi mdi-map-outline"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="maps-google.html">Google Maps</a>
                            </li>
                            <li>
                                <a href="maps-vector.html">Vector Maps</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMultilevel" data-bs-toggle="collapse">
                        <i class="mdi mdi-share-variant"></i>
                        <span> Multi Level </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMultilevel">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#sidebarMultilevel2" data-bs-toggle="collapse">
                                    Second Level <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Item 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarMultilevel3" data-bs-toggle="collapse">
                                    Third Level <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel3">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="#sidebarMultilevel4" data-bs-toggle="collapse">
                                                Item 2 <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel4">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="javascript: void(0);">Item 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);">Item 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
