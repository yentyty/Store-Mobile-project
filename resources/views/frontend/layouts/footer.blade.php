<footer class="footer">
    <div class="site-footer">
        <div class="newsletter-footer">
            <div class="container">
                <div class="row">
                    <div class="block-banner-left col-md-6 hidden-sm hidden-xs">
                        <img class="img-responsive" src="frontend/image/catalog/banner/banner-newsletter.png"
                            alt="Đăng ký nhận tin">
                    </div>
                    <div class="block-subscribe col-md-6 col-sm-12 col-xs-12">
                        <div class="footer-widget no-border">
                            <form action="http://yennguyen.myzozo.net/index.php?route=tool/newsletter" method="post"
                                id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                                <input type="email" value="" class="email" placeholder="Nhập email tại đây..."
                                    name="email" id="mail-footer" aria-label="">
                                <button class="btn subscribe" name="subscribe" id="subscribe-footer">
                                    <span>Đăng ký!</span>
                                </button>
                            </form>
                            <div class="valid"></div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            var id = '#mc-embedded-subscribe-form';
                            $(id).on('submit', function () {
                                var email = $(id + ' .email').val();
                                if (!isValidEmailAddress(email)) {
                                    $(id + ' + .valid').html("Email không hợp lệ");
                                    $(id + ' .email').focus();
                                    return false;
                                }
                                var url = "indexd801.json?route=tool/newsletter";
                                $.ajax({
                                    type: "post",
                                    url: url,
                                    data: $(id).serialize(),
                                    dataType: 'json',
                                    success: function (json) {
                                        $(".success_inline, .warning_inline, .error").remove();
                                        if (json['error']) {
                                            $(id + ' + .valid').html(json['error']);
                                        }
                                        if (json['success']) {
                                            $(id + ' + .valid').html(json['success']);
                                            $(id)[0].reset();
                                        }
                                    }
                                });
                                return false;
                            });
                        });
                        function isValidEmailAddress(emailAddress) {
                            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                            return pattern.test(emailAddress);
                        }
                    </script>
                </div>
            </div>
        </div>
        <div class="top-footer mid-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-4 width-320">
                        <h4 class="title-menu"
                            style="font-family: Roboto, HelveticaNeue, 'Helvetica Neue', sans-serif; font-weight: bold; line-height: normal; color: #363636; margin: 40px 0px 30px; font-size: 16px; letter-spacing: 0.5px; cursor: default; position: relative; background-color: #f5f5f5;">
                            Hệ thống cửa h&agrave;ng</h4>
                        <h4 class="title-menu4 icon_none_first"
                            style="font-family: Roboto, HelveticaNeue, 'Helvetica Neue', sans-serif; line-height: normal; color: #ffffff; margin: 10px 0px 5px; font-size: 1.28571em; letter-spacing: 0.5px; position: relative;">
                            <a
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #707070; transition: all 150ms ease-in-out; font-weight: bold; cursor: default; font-size: 14px; position: relative;">Tại
                                H&agrave; Nội</a></h4>
                        <div id="collapseListMenu01" class="collapse1"
                            style="color: #555555; font-family: Roboto, HelveticaNeue, 'Helvetica Neue', sans-serif; font-size: 14px; text-transform: none; background-color: #f5f5f5;">
                            <div class="list-menu" style="line-height: 30px;">
                                <div class="widget-ft wg-logo" style="margin-bottom: 20px;">
                                    <div class="item">
                                        <ul class="contact contact_x"
                                            style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none outside;">
                                            <li
                                                style="font-family: Arial, sans-serif; position: relative; color: #707070; margin-bottom: 20px; line-height: 20px;">
                                                <span class="txt_content_child" style="display: inherit;">A12 Đinh
                                                    Ti&ecirc;n Ho&agrave;ng, Quận Ho&agrave;n Kiếm, H&agrave;
                                                    Nội</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="title-menu4 icon_none_first"
                            style="font-family: Roboto, HelveticaNeue, 'Helvetica Neue', sans-serif; line-height: normal; color: #ffffff; margin: 10px 0px 5px; font-size: 1.28571em; letter-spacing: 0.5px; position: relative;">
                            <a
                                style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: #707070; transition: all 150ms ease-in-out; font-weight: bold; cursor: default; font-size: 14px; position: relative;">Tại
                                Hồ Ch&iacute; Minh</a></h4>
                        <div class="collapse1"
                            style="color: #555555; font-family: Roboto, HelveticaNeue, 'Helvetica Neue', sans-serif; font-size: 14px; text-transform: none; background-color: #f5f5f5;">
                            <div class="list-menu" style="line-height: 30px;">
                                <div class="widget-ft wg-logo" style="margin-bottom: 20px;">
                                    <div class="item">
                                        <ul class="contact contact_x"
                                            style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none outside;">
                                            <li
                                                style="font-family: Arial, sans-serif; position: relative; color: #707070; margin-bottom: 20px; line-height: 20px;">
                                                <span class="txt_content_child" style="display: inherit;">Số 123,
                                                    KP2, Quận 1, Tp.Hồ Ch&iacute; Minh</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-3">
                        <div class="widget-ft">
                            <h4 class="title-menu tittle_time">Điện thoại:</h4>
                            <div class="time_work">
                                <ul class="list-menu">
                                    <li class="li_menu li_menu_xxx">
                                        <a class="rc yeloww" href="tel:0123456789">0123456789</a>
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
                                    <li class="li_menu">
                                        <a href="gioi-thieu.html">Giới thiệu</a>
                                    </li>
                                    <li class="li_menu">
                                        <a href="van-chuyen.html">Chính sách vận chuyển</a>
                                    </li>
                                    <li class="li_menu">
                                        <a href="quy-dinh.html">Quy định &amp; Chính sách</a>
                                    </li>
                                    <li class="li_menu">
                                        <a href="chinh-sach-bao-mat.html">Chính sách bảo mật</a>
                                    </li>
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
