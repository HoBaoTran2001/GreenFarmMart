   <!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container ">
        <div class="row ">
            <div class="col-lg-3 col-md-6 col-sm-6 ">
                <div class="footer__about">
                    <div class="footer__about__logo ">
                        <a href="{{asset('/')}}">
                            <img src="{{asset('public/admin/images/logo/logo.png')}}" alt="">
                        </a>
                    </div>
                    <ul>
                        <li>Address: Thành Phố Hồ Chí Minh</li>
                        <li>Phone: +84 0123456789</li>
                        <li>Email: GFM@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1 ">
                <div class="footer__widget ">
                    <h6>Liên kết hữu ích</h6>
                    <ul>
                        <li><a href="# ">Về Chúng Tôi</a></li>
                        <li><a href="# ">Về Cửa Hàng</a></li>
                        <li><a href="# ">Thông Tin Giao Hàng </a></li>
                        <li><a href="# ">Chính Sách Bảo Mật</a></li>
                        <li><a href="# ">Bản Đồ</a></li>
                    </ul>
                    <ul>
                        <li><a href="# ">Chúng Tôi Là Ai</a></li>
                        <li><a href="# ">Dịch Vụ Của Chúng Tôi </a></li>
                        <li><a href="# ">Dự Án</a></li>
                        <li><a href="# ">Liên Hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 ">
                <div class="footer__widget ">
                    <h6>Đăng ký để nhận tin mới mỗi ngày</h6>
                    <p>Nhận thông tin cập nhật qua Email mới nhất của chúng tôi về cửa hàng và các ưu đãi đặc biệt. </p>
                    <form action="# ">
                        <input type="text " placeholder="Nhập Email ">
                        <button type="submit " class="site-btn ">Đăng Ký</button>
                    </form>
                    <div class="footer__widget__social ">
                        <a href="# "><i class="fab fa-facebook-f "></i></a>
                        <a href="# "><i class="fab fa-instagram "></i></a>
                        <a href="# "><i class="fab fa-twitter "></i></a>
                        <a href="# "><i class="fab fa-pinterest "></i></a>
                    </div>
                </div>
            </div>
            <a class="scrollTop" href="#"><i class="fas fa-arrow-up"></i></a>
        </div>
        <div class="row ">
            <div class="col-lg-12 ">
                <div class="footer__copyright ">
                    <div class="footer__copyright__text ">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart " aria-hidden="true "></i> by <a href="https://colorlib.com " target="_blank ">GFM</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="zalo-chat-widget" data-oaid="508071655872176073" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="" data-height=""></div>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    {{-- <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "106882367785960");
        chatbox.setAttribute("attribution", "biz_inbox");
    
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v12.0'
          });
        };
    
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script> --}}
</footer>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>

<!-- Footer Section End -->
<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/simple.money.format.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="js/main.js "></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
{{-- <script src="{{asset('home/js/sweetalert2.all.js')}}"></script>
@include('sweetalert::alert') --}}

<script type="text/javascript">
    //đổi hướng mũi tên danh mục
    $(document).ready(function (){
        $( ".chevron-left" ).click(function() {
            var id = $(this).data('id');
            if ($(".chevron-left"+id).css( "transform" ) == 'none' ){
                $(".chevron-left"+id).css("transform","rotate(-90deg)");
            } else {
                $(".chevron-left"+id).css("transform","" );
            }
        });
    });

    //bộ lọc sản phẩm
    $(document).ready(function(){
        $('#sort').on('change',function(){
            var url = $(this).val();
            if(url){
                window.location = url;
            }return false;
        });
    });

    //Lọc sản phẩm theo giá
    $(document).ready(function(){
        $( ".price-range" ).slider({
            range: true,
            min: {{$min_price_range}},
            max: {{$max_price_range}},
            steps:1000,
            values: [ {{$min_price}}, {{$max_price}} ],
            slide: function( event, ui ) {
                $( "#amount_start" ).val(ui.values[ 0 ]).simpleMoneyFormat();
                $( "#amount_end" ).val(ui.values[ 1 ]).simpleMoneyFormat();
                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val(ui.values[ 1 ]);
            }
        });
        $( "#amount_start" ).val($( ".price-range" ).slider( "values", 0 )).simpleMoneyFormat();
        $( "#amount_end" ).val($( ".price-range" ).slider( "values", 1 )).simpleMoneyFormat();
    });

    //Scroll Trang
    window.addEventListener('scroll', function(){
        var scroll = document.querySelector('.scrollTop');
        scroll.classList.toggle("active", window.scrollY > 500)

        var menu = document.querySelector('.hero');
        menu.classList.toggle("sticky", window.scrollY > 250)
    });

    //Tìm kiếm sản phẩm
    $('#keywords').keyup(function(){
        var keywords = $(this).val();
        if(keywords != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/timkiem-ajax')}}",
                method: "POST",
                data:{keywords:keywords,_token:_token},
                success:function(data){
                    $('#timkiem_ajax').fadeIn();
                    $('#timkiem_ajax').html(data);
                }
            });
        }else{
            $('#timkiem_ajax').fadeOut();
        }
    });

    $(document).on('click', '.li_search_ajax',function(){
        $('#keywords').val($(this).text());
        $('#timkiem_ajax').fadeOut();
    });
</script>

<!--  Thêm sản phẩm ajax -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id = $(this).data('id');
            var cart_product_id = $('.cart_product_id_'+ id).val();
            var cart_product_name = $('.cart_product_name_'+ id).val();
            var cart_product_image = $('.cart_product_image_'+ id).val();
            var cart_product_price = $('.cart_product_price_'+ id).val();
            // var cart_product_price_sales = $('.cart_product_price_sales_'+ id).val();
            var cart_product_amount = $('.cart_product_amount_'+ id).val();
            var cart_product_quanlity_total = $('.cart_product_quanlity_total_'+ id).val();
            var _token = $('input[name="_token"]').val();
            if(cart_product_quanlity_total < cart_product_amount){
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Số lượng sản phẩm không đủ',
                    showConfirmButton: true,
                })
            }else{
                $.ajax({
                    url: '{{url('/add-cart')}}',
                    method: 'POST',
                    data:{cart_product_id :cart_product_id , cart_product_name: cart_product_name,cart_product_image :
                        cart_product_image,cart_product_price:cart_product_price,cart_product_amount:cart_product_amount,_token :_token, cart_product_quanlity_total:cart_product_quanlity_total },
                        success:function(data){
                            $('.count_cart').html(data);
                            Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: 'Thêm sản phẩm thành công',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                })
            }
        });
    });
</script>

{{-- -- Ship -- --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id =  $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action=='city'){
                result = 'district';
            }else{
                result = 'village';
            }
            // console.log("ma_id", ma_id);
            $.ajax({
                url: '{{url('/select-delivery-home')}}',
                method: 'POST',
                data: {action:action, ma_id:ma_id, _token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });
</script>

{{-- Feeship --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var city_id = $('.city').val();
            var district_id = $('.district').val();
            var village_id = $('.village').val();
            var _token = $('input[name="_token"]').val();

            if(city_id == '' && district_id == '' && village_id == ''){
                Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Thêm sản phẩm thành công',
                        showConfirmButton: false,
                        timer: 1500
            })
            }else{
                $.ajax({
                url: '{{url('/calculate-fee')}}',
                method: 'POST',
                data:{city_id:city_id, district_id:district_id, village_id:village_id, _token:_token},
                    success:function(data){
                        location.reload();
                    }
                })
            }
        })
    });
</script>

{{-- Order  --}}
<script type="text/javascript">
     $(document).ready(function(){
        $('.send_order').click(function(){
            var total_after = $('.total_after').val();
            Swal.fire({
                title: 'Tiếp tục để thanh toán',
                text: "Sau khi đặt hàng 24h sẽ không giải quyết đổi trả!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tiếp tục'
                }).then((result) => {
                if (result.isConfirmed) {
                    var id_customer = $('.id_customer').val();
                    var name = $('.last').val() +' '+ $('.first').val();
                    var phone = $('.phone').val();
                    var email = $('.email').val();
                    var address = $('.address').val();
                    var note = $('.note').val();
                    var order_feeship = $('.order_feeship').val();
                    var shipping_method = 1;
                    var order_coupon = $('.order_coupon').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '{{url('/confirm-order')}}',
                        method: 'POST',
                        data:{id_customer:id_customer, name:name, phone:phone, email:email,address:address,note:note,
                            order_feeship:order_feeship, order_coupon:order_coupon,_token :_token,shipping_method:shipping_method},
                            success:function(){
                                Swal.fire(
                                    'Thành công!',
                                    'Thanh toán thành công.',
                                    'success'
                                );
                            }
                        });
                        window.setTimeout(function(){ 
                            window.location.href = "profile/"+id_customer;
                        } ,2000);
                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                });
            });
        });
</script>

<!-- // thích sản phẩm -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.like-product').click(function(){
            var id = $(this).data('id');
            var product_id =  $('.cart_product_id_'+ id).val();
            var _token = $('input[name="_token"]').val();
                $.ajax({
                url: '{{url('/like-product')}}',
                method: 'POST',
                data:{product_id:product_id,_token:_token},
                    success:function(data){
                    Swal.fire(
                            'Thành công!',
                            'Tim thành công.',
                            'success'
                        );
                    }
                    
                })
            })
        });
</script>

<!-- // Thanh toán online Paypal -->
<script>
    var usd = document.getElementById("vnd_to_usd").value;
    paypal.Button.render({
      env: 'sandbox',
      client: {
        sandbox: 'ATJj24mqET2rlGWkit0P6tLqbHKf44GpXmIOufIlYrjAsABQEJnoAHAjxZb5ZkIMXCcg-JlHeGHBEhMp',
        production: 'ATJj24mqET2rlGWkit0P6tLqbHKf44GpXmIOufIlYrjAsABQEJnoAHAjxZb5ZkIMXCcg-JlHeGHBEhMp'
      },
      locale: 'en_US',
      style: {
        size: 'medium',
        color: 'gold',
        shape: 'pill',
      },
  
      commit: true,
  
      payment: function(data, actions) {
        return actions.payment.create({
          transactions: [{
            amount: {
              total: `${usd}`,
              currency: 'USD'
            }
          }]
        });
      },
      
      onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
            var id_customer = $('.id_customer').val();
            var name = $('.last').val() +' '+ $('.first').val();
            var phone = $('.phone').val();
            var email = $('.email').val();
            var address = $('.address').val();
            var note = $('.note').val();
            var order_feeship = $('.order_feeship').val();
            var shipping_method = 2;
            var order_coupon = $('.order_coupon').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/confirm-order')}}',
                method: 'POST',
                data:{id_customer:id_customer, name:name, phone:phone, email:email,address:address,
                    note:note, order_feeship:order_feeship, order_coupon:order_coupon,_token :_token,shipping_method:shipping_method},
                    success:function(){
                        Swal.fire(
                            'Thành công!',
                            'Thanh toán thành công.',
                            'success'
                        );
                    }
                });
                window.setTimeout(function(){ 
                    window.location.href = "profile/"+id_customer;
                } ,2000);
        });
      }
    }, '#paypal-button');
</script>

<script>
    $(document).ready(function(){
        $('#imgUploadProfile').click(function(){
        $('#OpenImgUploadProfile').click();

        $('#OpenImgUploadProfile').change(function(){
            previewURLInfo(this)
        })

        function previewURLInfo(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#imgUploadProfile').attr('src',e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
        }
    })
    })
</script>

</body>
</html>