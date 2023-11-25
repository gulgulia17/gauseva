<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link text-center">
    <span class="brand-text font-weight-light">Akhandgauseva</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'AdminAuthController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'UserController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.contact.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'ContactController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.news.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'BlogController') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blogs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.testimonial.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'TestimonialController') ? 'active' : ''}}">
                    <i class="nav-icon far fa-address-book"></i>
                        <p>
                            Testimonials
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.category.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'CategoryController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.product.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'ProductController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.campaign.index')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'CampaignController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Campaigns
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('admin.profile')}}" class="nav-link
                {{(App\Helper\Common::getCurrentController() == 'ProfileController') ? 'active' : ''}}">
                <i class="nav-icon fas fa-image"></i>
                <p>
                    Profile
                </p>
                </a>
                </li> --}}
               {{-- <li class="nav-item">
                    <a href="{{route('admin.settings')}}" class="nav-link
                    {{(App\Helper\Common::getCurrentController() == 'SettingsController') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Website Settings
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
