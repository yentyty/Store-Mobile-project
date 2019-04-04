<footer class="footer">
    <div class="site-footer">
        <div class="newsletter-footer">
            <div class="container">
                <div class="row">
                    <div class="block-banner-left col-md-6 hidden-sm hidden-xs">
                        <img class="img-responsive" src="frontend/image/catalog/banner/banner-newsletter.png"
                            alt="Đăng ký nhận tin">
                    </div>
                </div>
            </div>
        </div>
        <div class="top-footer mid-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-4 width-320">
                        <h4 class="title-menu"
                            style="font-family: Roboto, HelveticaNeue, 'Helvetica Neue', sans-serif; font-weight: bold; line-height: normal; color: #363636; margin: 40px 0px 30px; font-size: 16px; letter-spacing: 0.5px; cursor: default; position: relative; background-color: #f5f5f5;">
                            Hệ thống cửa hàng</h4>
                        @foreach ($introducesAll as $intro)
                            <h4 class="title-menu4 icon_none_first"
                                style="font-family: Roboto, HelveticaNeue, 'Helvetica Neue', sans-serif; line-height: normal; color: #ffffff; margin: 10px 0px 5px; font-size: 1.28571em; letter-spacing: 0.5px; position: relative;">
                                <a style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #707070; transition: all 150ms ease-in-out; font-weight: bold; cursor: default; font-size: 14px; position: relative;">
                                    {{ $intro->name }}</a></h4>
                            <div id="collapseListMenu01" class="collapse1"
                                style="color: #555555; font-family: Roboto, HelveticaNeue, 'Helvetica Neue', sans-serif; font-size: 14px; text-transform: none; background-color: #f5f5f5;">
                                <div class="list-menu" style="line-height: 30px;">
                                    <div class="widget-ft wg-logo" style="margin-bottom: 20px;">
                                        <div class="item">
                                            <ul class="contact contact_x"
                                                style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none outside;">
                                                <li
                                                    style="font-family: Arial, sans-serif; position: relative; color: #707070; margin-bottom: 20px; line-height: 20px;">
                                                    <span class="txt_content_child" style="display: inherit;">
                                                        {{ $intro->address }}
                                                    </span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-3">
                        <div class="widget-ft">
                            <h4 class="title-menu tittle_time">Điện thoại:</h4>
                            <div class="time_work">
                                <ul class="list-menu">
                                    <li class="li_menu li_menu_xxx">
                                        @foreach ($introducesAll as $intro)
                                            <a class="rc yeloww">{{ $intro->phone }}</a>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="socials-footer">
                            <h4 class="title-menu tittle_time">Theo dõi chúng tôi</h4>
                            <div class="social_content">
                                <ul class="list-unstyled">
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/FacebookVietnam" target="_blank"><i
                                                class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li class="youtube">
                                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <li class="instagram">
                                        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix visible-sm"></div>
                    <div class="col-xs-12 col-sm-5 col-md-2 width-320">
                        <div class="widget-ft">
                            <h4 class="title-menu">Thông tin</h4>
                            <div class="collapse1" id="collapseListMenu02">
                                <ul class="list-menu list-menu22">
                                    @foreach ($informations as $inf)
                                        <li class="li_menu">
                                            <a href="{{ route('fe.information.detail', ['slug'=>str_slug($inf->title), 'id'=>$inf->id]) }}">{{ $inf->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-3">
                        <div class="widget-ft">
                            <h4 class="title-menu"></h4>
                            <div class="fb-page" data-href="https://www.facebook.com/FacebookVietnam"
                                data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                                data-show-facepile="true"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
