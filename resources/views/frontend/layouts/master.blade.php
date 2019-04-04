<!DOCTYPE html>
<html dir="ltr" lang="vi">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="theme-color" content="#FFFFFF" />
    <title>Cửa hàng Mobile</title>
    <meta name="twitter:image" content="frontend/image/http_/yennguyen.myzozo.net/image/catalog/logo/logo.html" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=vietnamese" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" type="text/css"
        href="frontend/catalog/view/theme/bigboom/stylesheet/bootstrap.mine47b.css?v=1522720225" />
    <link rel="stylesheet" type="text/css"
        href="frontend/catalog/view/theme/bigboom/stylesheet/owl.carousel.mine47b.css?v=1522720225" />
    <link rel="stylesheet" type="text/css"
        href="frontend/catalog/view/theme/bigboom/stylesheet/owl.theme.default.mine47b.css?v=1522720225" />
    <link rel="stylesheet" type="text/css" href="frontend/catalog/view/theme/bigboom/stylesheet/stylee47b.css?v=1522720225" />
    <link rel="stylesheet" type="text/css"
        href="frontend/catalog/view/theme/bigboom/stylesheet/font-awesome.mine47b.css?v=1522720225" />
    <link rel="stylesheet" type="text/css" href="frontend/catalog/view/theme/bigboom/stylesheet/basee47b.css?v=1522720225" />
    <link rel="stylesheet" type="text/css" href="frontend/catalog/view/theme/bigboom/stylesheet/modulee47b.css?v=1522720225" />
    <!--<link rel="stylesheet" type="text/css" href="catalog/view/theme/bigboom/stylesheet/lightbox.css?v=1522720225" />-->
    <link rel="stylesheet" type="text/css"
        href="frontend/catalog/view/theme/bigboom/stylesheet/jquery.fancybox.mine47b.css?v=1522720225" />
    <link rel="stylesheet" type="text/css"
        href="frontend/catalog/view/theme/bigboom/stylesheet/responsivee47b.css?v=1522720225" />
    <link rel="stylesheet" type="text/css"
        href="frontend/catalog/view/theme/bigboom/stylesheet/stylesheete47b.css?v=1522720225" />

    <script type="text/javascript"
        src="frontend/catalog/view/theme/bigboom/javascript/jquery-3.3.1.mine47b.js?v=1522720225"></script>
    <script type="text/javascript" src="../code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link href="frontend/catalog/view/theme/bigboom/stylesheet_custom/stylesheete47b.css?v=1522720225" rel="stylesheet" />
</head>

<body class="common-home">
    @include('frontend.layouts.header')
    @include('frontend.layouts.banner')
    @yield('content')
    @include('frontend.layouts.footer')
    <link rel="stylesheet" href="catalog/view/theme/default/stylesheet/social_login_button.css" />
    <button id="btn_show_cart" type="button" class="btn btn-primary" data-toggle="modal"
        data-target=".bs-popupcart-modal-lg" style="display: none;"></button>
    <div class="modal fade bs-popupcart-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;
                        </span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ
                        hàng </h4>
                </div>
                <div class="modal-body" id="load_info_cart"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tiếp tục mua hàng</button>
                    <a href="indexf1a8.html?route=checkout/checkout" class="btn btn-primary">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        /* Sau khi tat khung popup cart, cap nhat lai gio hang tren header */
        $('.bs-popupcart-modal-lg').on('hidden.bs.modal', function (e) {
            $.ajax({
                url: 'index.php?route=checkout/cart/getTotalProductInCart',
                type: 'post',
                dataType: 'json',
                beforeSend: function () {
                },
                complete: function () {
                },
                success: function (json) {
                    var out = json['total'].substr(0, json['total'].indexOf(' '));
                    $('#cart-total').html(out);
                    $('#cart > ul').load('index1e1c.html?route=common/cart/info%20ul%20li');
                }
            });
        });
    </script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/option-selectors.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/api.jquery.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/owl.carousel.min.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/cs.script.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/appear.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/main.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/jquery.elevatezoom.min.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/jquery.prettyphoto.in1t.min.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/jquery.prettyphoto.min.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/common.js"></script>
    <script type="text/javascript" src="frontend/catalog/view/theme/bigboom/javascript/custom.js"></script>
    <!-- Facebook script -->
    <div id="fb-root"></div>
    <script type="text/javascript">
        (function (d, s, id) {
            var js,
                fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "../connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=829732533863539";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</body>
</html>
