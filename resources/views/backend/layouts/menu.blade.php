<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title">
                <i class="fa fa-paw"></i>
                <span>Mobile Store</span>
            </a>
        </div>
        <div class="clearfix"></div>
        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section active">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                    <li class="">
                        <a href="{{ route('home.index') }}">
                            <i class="fa fa-home"></i> Home
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-users" aria-hidden="true"></i> User
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                                <li>
                                    <a href="{{ route('user.index') }}">List User</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.create') }}">Create User</a>
                                </li>
                            </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i> News
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('news.index') }}">List News</a>
                            </li>
                            <li>
                                <a href="{{ route('news.create') }}">Create News</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-file-text" aria-hidden="true"></i> Information
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('information.index') }}">List Information</a>
                            </li>
                            <li>
                                <a href="{{ route('information.create') }}">Create Information</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-camera-retro" aria-hidden="true"></i> Banner
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('banner.index') }}">List Banner</a>
                            </li>
                            <li>
                                <a href="{{ route('banner.create') }}">Create Banner</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Introduces
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('introduce.index') }}">List Introduce</a>
                            </li>
                            <li>
                                <a href="{{ route('introduce.create') }}">Create Introduce</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-gift" aria-hidden="true"></i> Promotions
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('promotion.index') }}">List Promotion</a>
                            </li>
                            <li>
                                <a href="{{ route('promotion.create') }}">Create Promotion</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-list-alt" aria-hidden="true"></i> Factories
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('factory.index') }}">List Factories</a>
                            </li>
                            <li>
                                <a href="{{ route('factory.create') }}">Create Factories</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-suitcase" aria-hidden="true"></i> Offers
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('offer.index') }}">List Offer</a>
                            </li>
                            <li>
                                <a href="{{ route('offer.create') }}">Create Offers</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-calendar" aria-hidden="true"></i> Products
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('product.index') }}">List Product</a>
                            </li>
                            <li>
                                <a href="{{ route('product.create') }}">Create Product</a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="{{ route('bill.index') }}">
                            <i class="fa fa-shopping-cart"></i> Bills
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('contact.index') }}">
                            <i class="fa fa-envelope"></i> Contacts
                        </a>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-building-o" aria-hidden="true"></i> Statistics
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('statistic.getproductbill') }}">Statistics Products</a>
                            </li>
                            <li>
                                <a href="{{ route('statistic.getbill') }}">Statistics Bills</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-list-alt" aria-hidden="true"></i> Services
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('service.index') }}">List Service</a>
                            </li>
                            <li>
                                <a href="{{ route('service.create') }}">Create Service</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>
                            <i class="fa fa-camera-retro" aria-hidden="true"></i> Logo
                            <span class="fa fa-chevron-down"></span>
                        </a>
                        <ul class="nav child_menu">
                            <li>
                                <a href="{{ route('logo.index') }}">List Logo</a>
                            </li>
                            <li>
                                <a href="{{ route('logo.create') }}">Create Logo</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a
                data-toggle="tooltip"
                data-placement="top"
                title=""
                data-original-title="Settings"
            >
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a
                data-toggle="tooltip"
                data-placement="top"
                title=""
                data-original-title="FullScreen"
            >
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a
                data-toggle="tooltip"
                data-placement="top"
                title=""
                data-original-title="Lock"
            >
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a
                data-toggle="tooltip"
                data-placement="top"
                title=""
                href="#"
                data-original-title="Logout"
            >
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
