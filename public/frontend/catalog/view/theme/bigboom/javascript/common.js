function getURLVar(key) {
    var value = [];
    var query = String(document.location).split('?');
    if (query[1]) {
        var part = query[1].split('&');
        for (i = 0; i < part.length; i++) {
            var data = part[i].split('=');
            if (data[0] && data[1]) {
                value[data[0]] = data[1];
            }
        }
        if (value[key]) {
            return value[key];
        } else {
            return '';
        }
    }
}
$(document).ready(function () {
    /*Highlight any found errors*/
    $('.text-danger').each(function () {
        var element = $(this).parent().parent();
        if (element.hasClass('form-group')) {
            element.addClass('has-error');
        }
    });
    /*Currency*/
    $('#form-currency .currency-select').on('click', function (e) {
        e.preventDefault();
        $('#form-currency input[name=\'code\']').attr('value', $(this).attr('name'));
        $('#form-currency').submit();
    });
    /*Language*/
    $('#form-language .language-select').on('click', function (e) {
        e.preventDefault();
        $('#form-language input[name=\'code\']').attr('value', $(this).attr('name'));
        $('#form-language').submit();
    });
    /* Search */
    $('#search input[name=\'search\']').parent().find('button').on('click', function () {
        var url = $('base').attr('href') + 'index.php?route=product/search';
        var value        = $('header input[name=\'search\']').val(),
            category_id  = $('header select[name=\'category_id\']').val(),
            sub_category = $('header input[name=\'sub_category\']').val();
        if (category_id !== undefined) {
            url += '&category_id=' + category_id;
        }
        if (sub_category !== undefined) {
            url += '&sub_category=' + sub_category;
        }
        if (value) {
            url += '&search=' + encodeURIComponent(value);
        }
        location = url;
    });
    $('#search input[name=\'search\']').on('keydown', function (e) {
        if (e.keyCode == 13) {
            $('header input[name=\'search\']').parent().find('button').trigger('click');
        }
    });
    /*Product List*/
    $('#list-view').on('click', function () {
        $('#content .product-grid > .clearfix').remove();
        $('#content .row > .product-grid').attr('class', 'product-layout product-list col-xs-12');
        localStorage.setItem('display', 'list');
    });
    /*Product Grid*/
    $('#grid-view').on('click', function () {
        /*What a shame bootstrap does not take into account dynamically loaded columns*/
        var cols = $('#column-right, #column-left').length;
        if (cols == 2) {
            $('#content .product-list').attr('class', 'product-layout product-grid col-lg-6 col-md-6 col-sm-12 col-xs-12');
        } else if (cols == 1) {
            $('#content .product-list').attr('class', 'product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12');
        } else {
            $('#content .product-list').attr('class', 'product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12');
        }
        localStorage.setItem('display', 'grid');
    });
    if (localStorage.getItem('display') == 'list') {
        $('#list-view').trigger('click');
    } else {
        $('#grid-view').trigger('click');
    }
    /*Checkout*/
    $(document).on('keydown', '#collapse-checkout-option input[name=\'email\'], #collapse-checkout-option input[name=\'password\']', function (e) {
        if (e.keyCode == 13) {
            $('#collapse-checkout-option #button-login').trigger('click');
        }
    });
    /*tooltips on hover*/
    $('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
    /*Makes tooltips work on ajax generated content*/
    $(document).ajaxStop(function () {
        $('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
    });
});
/*Cart add remove functions*/
var cart = {
    'add'   : function (product_id, quantity) {
        $.ajax({
            url       : 'index.php?route=checkout/cart/add',
            type      : 'post',
            data      : 'product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
            dataType  : 'json',
            beforeSend: function () {
                $('#cart > button').button('loading');
            },
            complete  : function () {
                $('#cart > button').button('reset');
            },
            success   : function (json) {
                $('.alert, .text-danger').remove();
                if (json['redirect']) {
                    location = json['redirect'];
                }
                if (json['success']) {
                    $('.bread-crumb').after('<div class="container"><div class="row" style="position:relative"><div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div></div></div>');
                    /*Need to set timeout otherwise it wont update the total*/
                    var item = json['total'].split(' - ');
                    setTimeout(function () {
                        $('.absolute.count_item.count_item_pr').html(item[0].split(' ')[0]);
                        $('.price_cart.count_item.count_item_pr').html(item[1]);
                    }, 100);
                    $('html, body').animate({scrollTop: 0}, 'fast');
                    $('#cart #cart-sidebar').load('index.php?route=common/cart/info #cart-sidebar > li');
                }
            },
            error     : function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    'update': function (key, quantity) {
        $.ajax({
            url       : 'index.php?route=checkout/cart/edit',
            type      : 'post',
            data      : 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
            dataType  : 'json',
            beforeSend: function () {
                $('#cart > button').button('loading');
            },
            complete  : function () {
                $('#cart > button').button('reset');
            },
            success   : function (json) {
                /*Need to set timeout otherwise it wont update the total*/
                var item = json['total'].split(' - ');
                setTimeout(function () {
                    $('.absolute.count_item.count_item_pr').html(item[0].split(' ')[0]);
                    $('.price_cart.count_item.count_item_pr').html(item[1]);
                }, 100);
                if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
                    location = 'index.php?route=checkout/cart';
                } else {
                    $('#cart #cart-sidebar').load('index.php?route=common/cart/info #cart-sidebar > li');
                }
            },
            error     : function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    'remove': function (key) {
        $.ajax({
            url       : 'index.php?route=checkout/cart/remove',
            type      : 'post',
            data      : 'key=' + key,
            dataType  : 'json',
            beforeSend: function () {
                $('#cart > button').button('loading');
            },
            complete  : function () {
                $('#cart > button').button('reset');
            },
            success   : function (json) {
                /*Need to set timeout otherwise it wont update the total*/
                var item = json['total'].split(' - ');
                setTimeout(function () {
                    $('.absolute.count_item.count_item_pr').html(item[0].split(' ')[0]);
                    $('.price_cart.count_item.count_item_pr').html(item[1]);
                }, 100);
                if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
                    location = 'index.php?route=checkout/cart';
                } else {
                    $('#cart #cart-sidebar').load('index.php?route=common/cart/info #cart-sidebar > li');
                }
            },
            error     : function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
};
var voucher = {
    'add'   : function () {
    },
    'remove': function (key) {
        $.ajax({
            url       : 'index.php?route=checkout/cart/remove',
            type      : 'post',
            data      : 'key=' + key,
            dataType  : 'json',
            beforeSend: function () {
                $('#cart > button').button('loading');
            },
            complete  : function () {
                $('#cart > button').button('reset');
            },
            success   : function (json) {
                /*Need to set timeout otherwise it wont update the total*/
                var item = json['total'].split(' - ');
                setTimeout(function () {
                    $('.absolute.count_item.count_item_pr').html(item[0].split(' ')[0]);
                    $('.price_cart.count_item.count_item_pr').html(item[1]);
                }, 100);
                if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
                    location = 'index.php?route=checkout/cart';
                } else {
                    $('#cart #cart-sidebar').load('index.php?route=common/cart/info #cart-sidebar > li');
                }
            },
            error     : function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
};
var wishlist = {
    'add'   : function (product_id) {
        $.ajax({
            url     : 'index.php?route=account/wishlist/add',
            type    : 'post',
            data    : 'product_id=' + product_id,
            dataType: 'json',
            success : function (json) {
                $('.alert').remove();
                if (json['redirect']) {
                    location = json['redirect'];
                }
                if (json['success']) {
                    /*$('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
                    $('header').before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                }
                $('#wishlist-total span').html(json['total']);
                $('#wishlist-total').attr('title', json['total']);
                $('html, body').animate({scrollTop: 0}, 'slow');
            },
            error   : function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    'remove': function () {
    }
};
var compare = {
    'add'   : function (product_id) {
        $.ajax({
            url     : 'index.php?route=product/compare/add',
            type    : 'post',
            data    : 'product_id=' + product_id,
            dataType: 'json',
            success : function (json) {
                $('.alert').remove();
                if (json['success']) {
                    /*$('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');*/
                    $('header').before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
                    $('#compare-total').html(json['total']);
                    $('html, body').animate({scrollTop: 0}, 'slow');
                }
            },
            error   : function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    },
    'remove': function () {
    }
};
/* Agree to Terms */
$(document).delegate('.agree', 'click', function (e) {
    e.preventDefault();
    $('#modal-agree').remove();
    var element = this;
    $.ajax({
        url     : $(element).attr('href'),
        type    : 'get',
        dataType: 'html',
        success : function (data) {
            html = '<div id="modal-agree" class="modal">';
            html += '  <div class="modal-dialog">';
            html += '    <div class="modal-content">';
            html += '      <div class="modal-header">';
            html += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
            html += '        <h4 class="modal-title">' + $(element).text() + '</h4>';
            html += '      </div>';
            html += '      <div class="modal-body">' + data + '</div>';
            html += '    </div';
            html += '  </div>';
            html += '</div>';
            $('body').append(html);
            $('#modal-agree').modal('show');
        }
    });
});