@include('home.layout.header')
@include('home.aside.menu')
<!-- Product Details Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('public/home/img/banner/banner3.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Chi tiết sản phẩm</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-details spad">
    <div class="container">
        <div class="crumbs mb-5">
            <ul>
                <li><a href="{{asset('/')}}"><i class="fa fa-home"></i>Trang chủ</a></li>
                <li><a href="#">{{$product_name->category_name}}</a></li>
                <li><a href="{{url('loai-san-pham')}}/{{$product_name->child_cate_id}}/{{$product_name->child_slug}}">{{$product_name->child_name}}</a></li>
                <li><a href="#">{{$product_name->name}}</a></li>
            </ul>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="{{asset('public/admin/images/product')}}/{{$product->image}}">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        @foreach($gallerys as $gallery)
                        <img data-imgbigurl="{{asset('public/admin/images/product')}}/{{$gallery->name}}" src="{{asset('public/admin/images/product')}}/{{$gallery->name}}" height="110px" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$product->name}}</h3>
                    @for($count=1; $count<=5; $count++)
                        @php
                            if($count<=$rating){
                                $color = 'color:#ffcc00;';
                            }
                            else {
                                $color = 'color:#ccc;';
                            } 	
                            @endphp
                            <li class="rating" style="cursor:pointer; {{$color}} font-size:25px; margin-top:-7px">&#9733;</li>
                    @endfor
                    <span style="color: red; ">({{$count_rating}} đánh giá)</span>
                    <div class="mt-2">Lượt xem: {{$product->views}}</div>
                    <div class="mt-2">Lượt thích: {{$product->like}}</div>
                    @if(!$product->price_sales)
                        <div class="mt-2">Giá:<span class="product__details__price"> {{number_format($product->price),''}} đ</span></div>
                    @else
                        <div class="mt-2">Giá:<span style="text-decoration: line-through;"> {{number_format($product->price),''}} đ</span></div>
                        <div>Giá Khuyến mãi:<span class="product__details__price"> {{number_format($product->price_sales),''}} đ</span></div>
                    @endif
                    <p>{{$product->summary}}</p>
                    <div class="product__details__quantity mt-4">
                        <div class="quantity">
                            @if(!$product->price_sales)
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}" >
                                    <input type="hidden" value="{{$product->name}}" class="cart_product_name_{{$product->id}}" >
                                    <input type="hidden" value="{{$product->image}}" class="cart_product_image_{{$product->id}}" >
                                    <input type="hidden" value="{{$product->price}}" class="cart_product_price_{{$product->id}}" >
                                    <input type="hidden" value="{{$product->quanlity}}" class="cart_product_quanlity_total_{{$product->id}}">
                                    <div class="pro-qty">
                                        <input type="number" name="amount" min="1" max="{{$product->quanlity}}" value="1" class="cart_product_amount_{{$product->id}}">  
                                    </div>
                                </form> 
                            @else
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" class="cart_product_id_{{$product->id}}" >
                                    <input type="hidden" value="{{$product->name}}" class="cart_product_name_{{$product->id}}" >
                                    <input type="hidden" value="{{$product->image}}" class="cart_product_image_{{$product->id}}" >
                                    <input type="hidden" value="{{$product->price_sales}}" class="cart_product_price_{{$product->id}}" >
                                    <input type="hidden" value="{{$product->quanlity}}" class="cart_product_quanlity_total_{{$product->id}}">
                                    <div class="pro-qty">
                                        <input type="number" name="amount" min="1" max="{{$product->quanlity}}" value="1" class="cart_product_amount_{{$product->id}}">  
                                    </div>                       
                                </form> 
                            @endif
                        </div>
                    </div>
                    <!-- thêm giỏ hàng ajax -->
                        @if ($product->quanlity == 0)
                            <button disabled type="button" class="btn btn-warning" name="add-cart">Hết hàng</button>
                        @else
                            <button type="button" class="btn primary-btn add-to-cart" name="add-cart" data-id = "{{$product->id}}" >Thêm giỏ hàng</button>
                        @endif
                        <button type="button" class="btn heart-icon like-product" name="like-product" data-id = "{{$product->id}}"><span class="icon_heart_alt like"></span></button>
                    <ul>
                        <li><b>Giao hàng</b> <span><samp>Miễn phí vận chuyển trong ngày</samp></span></li>
                        <li><b>Tình trạng</b> <span>{{$product->quanlity >= 1 ? "Còn hàng" : "Tạm hết hàng"}}</span></li>
                    </ul>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Đánh giá <span>({{$count_rating}})</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Mô tả</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active col-md-11" style="margin: 0 auto" id="tabs-1" role="tabpanel">
                        <div class="product__details__tab__desc">
                                <!-- <h6>Đánh giá </h6> -->
                                <div class="container">
                                    <div class="d-flex justify-content-center row">
                                        <div class="col-md-12">
                                            <div class="d-flex flex-column comment-section">
                                            <form>
                                                @csrf
                                                <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product->id}}">
                                                <div id="comment_show"></div>
                                            </form>
                                                <div id="notify_comment"></div>
                                                <!-- <div class="bg-white float-right"> -->
                                                    <!-- <div class="float-right"> -->
                                                    <!-- </div> -->
                                                    @csrf
                                                    <ul class="list-inline rating float-right"  title="Average Rating">
                                                        @for($count=1; $count<=5; $count++)	
                                                        <div id="notifys_comment"></div>
                                                            <input type="hidden" id="index" value="{{$count}}">
                                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                                            <li title="star_rating" id="{{$product->id}}-{{$count}}" value="{{$count}}" name="$count[]" data-index="{{$count}}"  data-product_id="{{$product->id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; color:#ccc;; font-size:30px;">&#9733;</li>
                                                        @endfor
                                                    </ul>
                                                    <div class="bg-light p-2" >
                                                    <!-- <div id="notify_comment float-left"></div> -->
                                                        <div class="col-md-6 float-left">
                                                            <input type="text" class="form-control name_cmt mb-2" placeholder="Họ tên (bắt buộc)">
                                                            <input type="text" class="form-control email_cmt" placeholder="Email">
                                                        </div>
                                                        <div class="col-md-6 float-right">
                                                            <div class="d-flex flex-row align-items-start "><img class="rounded-circle" src="{{asset('public/admin/images/logo/logo.png')}}" width="80">
                                                            <textarea data-index="{{$count}}"  data-product_id="{{$product->id}}" data-rating="{{$rating}}" class="form-control ml-1 shadow-none textarea comment_content"  name="comment" placeholder="Mời bạn bình luận hoặc đặt câu hỏi"></textarea></div>
                                                            <div class="mt-2 text-right"><button class="btn btn-success btn-sm shadow-none send-comment" type="button">Gửi đánh giá</button></div>
                                                        </div>
                                                    </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <div class="product__details__tab__desc col-md-11" style="margin: 0 auto">
                        <div style="border-left: 5px green solid"> <h4 style="margin-left:5px; margin-bottom:10px">Mô tả sản phẩm</h4></div>
                            <p>{!!$product->description!!}</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản Phẩm Liên Quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($product_offer as $offer)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset('public/admin/images/product')}}/{{$offer->image}}">
                        <ul class="product__item__pic__hover">
                            <li><button><i class="fa fa-heart"></i></button></li>
                            <li><a href="{{url('chi-tiet-san-pham')}}/{{$offer->id}}/{{$offer->slug}}"><i class="fa fa-retweet"></i></a></li>
                            <li><button class="add-to-cart" name="add-cart" data-id = "{{$offer->id}}"><i class="fa fa-shopping-cart"></i></button></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{url('chi-tiet-san-pham')}}/{{$offer->id}}/{{$offer->slug}}">{{$offer->name}}</a></h6>
                        @if(!$offer->price_sales)
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$offer->id}}" class="cart_product_id_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->name}}" class="cart_product_name_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->image}}" class="cart_product_image_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->price}}" class="cart_product_price_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->quanlity}}" class="cart_product_quanlity_total_{{$offer->id}}">
                                    <input type="hidden" name="amount" min="1" value="1" class="cart_product_amount_{{$offer->id}}">  
                                    <h5>{{number_format($offer->price),''}} đ</h5>
                                </form> 
                            @else
                                <form>
                                    @csrf
                                    <input type="hidden" value="{{$offer->id}}" class="cart_product_id_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->name}}" class="cart_product_name_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->image}}" class="cart_product_image_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->price}}" class="cart_product_price_{{$offer->id}}" >
                                    <input type="hidden" value="{{$offer->quanlity}}" class="cart_product_quanlity_total_{{$offer->id}}">
                                    <input type="hidden" name="amount" min="1" value="1" class="cart_product_amount_{{$offer->id}}">  
                                    <!-- </div> -->
                                    <h5>{{number_format($offer->price_sales),''}} đ</h5>
                                </form> 
                            @endif
                        <!-- <h5>{{number_format($offer->price),''}} đ</h5> -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->

@include('home.layout.footer')
<script type="text/javascript">
    function remove_background(product_id){
        for(var count = 1; count <= 5; count++)
        {
            $('#'+product_id+'-'+count).css('color', '#ccc');
        }
    }

    load_comment();
    function load_comment(){
        var product_id = $('.comment_product_id').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/load-comment')}}',
            method: 'POST',
            data:{product_id:product_id, _token:_token},
                success:function(data){
                    $('#comment_show').html(data);
                }
        });
    }
    //click đánh giá sao
    $(document).on('click', '.rating', function(){
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        remove_background(product_id);

        for(var count = 0; count<=index; count++)
        {
            $('#'+product_id+'-'+count).css('color', '#ffcc00');
        
        }
        $('.send-comment').click(function(){

        var email = $('.email_cmt').val();
        var name = $('.name_cmt').val();
        var comment_content = $('.comment_content').val();
        var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/send-comment')}}",
                method:"POST",
                data:{index:index,product_id:product_id,email:email,name:name,comment_content:comment_content,_token:_token},
                success:function(data){
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Gửi đánh giá thành công',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    // $('#notify_comment').fadeOut(2000);
                    // remove_background(product_id);
                    // $('.comment_content').val('');
                    window.setTimeout(function(){ 
                        location.reload();
                    } ,2000);
                }
            });
        });
    });
</script>