<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bán hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<style>
    .tabs {
  display: flex;
  box-sizing: border-box;
  flex-direction: column;
  padding: 1rem;
  /* width: 100%; */
/*  Use fixed height for animation on change tab  */
  height: 100dvh;
  background-color: #efeef3;
}
.tabs .tabs-nav {
  display: flex;
  width: max-content;
  /* margin: 0 auto; */
  /* background-color: rgb(117,209,255); */
  /* padding: 5px; */
  gap: 5px;
  border-radius: 9999px;
  /* box-shadow: 2px 2px 10px #3333; */
}
.tabs .tab-nav {
  display: block;
  outline: none;
  border: 1px solid rgb(0,34,51);
  color: rgb(0,34,51);
  border-radius: 9999px;
  padding: 0.5em 1em;
  cursor: pointer;
  background-color: inherit;
  transition: background-color 300ms, color 300ms;
}
.tabs .tab-nav {
  background-color:white;
  padding:2px 10px !important;
 
}
.tabs .tab-nav:hover {
  /* background-color: rgb(0,34,51); */
  border:1px solid #2d50b2;

  color: #2d50b2;
}
.tabs .tab-content input[name="tab-index"] {
  display: none !important;
}
.tabs .tab-contents {
  display: block;
  position: relative;
  height: 100%;
  margin-top: 1rem;
  background-color: inherit;
  overflow: hidden;
}
.tabs .tab-content {

  background-color: inherit;
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  max-height: 100%;
  top: 0; left: 100%;
  overflow: hidden;
  box-sizing: border-box;
  /* border: 5px solid rgb(117,209,255); */
  border-radius: 10px;
  padding: 0;
}
.tabs.animate .tab-content {
  transition: left 500ms;
}
.tabs .tab-content .content {
  max-height: 100%;
  width: 100%;
 
}

.tabs .tab-content:has(input[name="tab-index"]:checked) {
  left: 0;
  z-index: 100;
}
:root{
    --bs-white: #fff;
    --bs-gray: #6c757d;
    --bs-hover:#192a56;
    --bs-primary:#565c64;
}
.product-grid{
  background-color: #fff;
  font-family: 'Montserrat', sans-serif;
  text-align: center;
}
.product-grid .product-image{
  overflow: hidden;
  position: relative;
}
.product-grid .product-image a.image{ display: block; }
.product-grid .product-image img{
  width: 100%;
  height: auto;
}
.product-grid .product-image .pic-1{ transition: all 0.3s ease 0s; }
.product-grid .product-image:hover .pic-1{ transform: translateX(100%); }
.product-grid .product-image .pic-2{
  width: 100%;
  height: 100%;
  transform: translateX(-101%);
  position: absolute;
  top: 0;
  left: 0;
  transition: all 0.3s ease 0s;
}
.product-grid .product-image:hover .pic-2{ transform: translateX(0); }
.product-grid .product-sale-label{
  color: #fff;
  background: var(--bs-hover);
  font-size: 13px;
  text-transform: uppercase;
  letter-spacing: 1px;
  padding: 2px 8px;
  position: absolute;
  top: 15px;
  left: 15px;
}
.product-grid .product-like-icon{
  color: #696969;
  font-size: 22px;
  line-height: 20px;
  position: absolute;
  top: 15px;
  right: 15px;
}
.product-grid .product-like-icon:hover{ color: var(--bs-hover); }
.product-grid .product-like-icon:before,
.product-grid .product-like-icon:after{
  content: attr(data-tip);
  color: #fff;
  background-color: #000;
  font-size: 12px;
  line-height: 18px;
  padding: 7px 7px 5px;
  visibility: hidden;
  position: absolute;
  right: 0;
  top: 15px;
  transition: all 0.3s ease 0s;
}
.product-grid .product-like-icon:after{
  content: '';
  height: 15px;
  width: 15px;
  padding: 0;
  transform: translateX(-50%) rotate(45deg);
  right: auto;
  left: 50%;
  top: 15px;
  z-index: -1;
}
.product-grid .product-like-icon:hover:before,
.product-grid .product-like-icon:hover:after{
  visibility: visible;
  top: 30px;
}
.product-grid .product-links{
  width: 170px;
  padding: 0;
  margin: 0;
  list-style: none;
  opacity: 0;
  transform: translateX(-50%);
  position: absolute;
  bottom: 0;
  left: 50%;
  transition: all 0.3s ease 0s;
}
.product-grid:hover .product-links{
  bottom: 40px;
  opacity: 1;
}
.product-grid .product-links li{
  display: inline-block;
  margin: 0 2px;
}
.product-grid .product-links li a{
  color: #fff;
  background: #507eff;
  font-size: 16px;
  line-height: 48px;
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: block;
  transition: all 0.3s ease 0s;
}
.product-grid:hover .product-links li a:hover{ background: #333; }
.product-grid .product-content{
  text-align: left;
  padding: 15px 0 0;
}
.product-grid .title{
  font-size: 14px;
  font-weight: 500;
  text-transform: capitalize;
  margin: 0 0 8px;
}
.product-grid .title a{
  color: #333;
  transition: all 0.3s ease 0s;
  text-decoration:none;
  font-weight:600;
  font-size:18px;
}
.product-grid .title a:hover{ color: var(--bs-hover); }
.product-grid .price{
  color: var(--bs-hover);
  font-size: 16px;
  font-weight: 500;
}
.product-grid .price span{
  color: #555;
  font-size: 14px;
  font-weight: 400;
  text-decoration: line-through;
  margin: 0 5px 0 0;
}
@media screen and (max-width: 990px){
  .product-grid{ margin: 0 0 30px; }
}
.btn_css{
  border:none;
  background: #626ed4;
  color:white; 
  border-radius:5px;
  margin:0px 5px;
}
.bg-primaryPos{
  border:none !important;
   color:white;
   background: #507eff;
}
</style>
<body>
    
    <div class="row container-fluid" style="height: 100vh; width:100%;">
        <div class="col-md-8 pr-0 pl-0">
          <div class="tabs"> <!-- use class 'animate' to set change tab transition animation -->
            <div>
              <div class="tabs-nav">
                <label class="tab-nav" for="tab-index-0"  onclick="functioncheck_()">Tất cả</label>
                  @foreach($category as $key => $value)
                    <label class="tab-nav" for="tab-index{{$key+1}}" onclick="functioncheck()">{{$value->name}}</label>
                  @endforeach
              </div>
              <hr>
            </div>
            
            <div class="d-flex justify-content-end" id="form_search">
              <input type="text" class="form-control" 
              style="width:300px; border:1px solid #7ca2fa; 
              border-top-left-radius:20px; 
              border-bottom-left-radius:20px;
              backgroud: #efeef3 !important;
              " placeholder="Tìm kiếm"  onkeyup="myFunction()" id="myFilter">
              <button class="bg-white" style="border-top-right-radius:20px; border-bottom-right-radius:20px; 
               border:1px solid #7ca2fa; " ><i class="fa-solid fa-magnifying-glass" style=" color:#7ca2fa;"></i></button>
            </div>
            <div class="tab-contents">
              <div class="tab-content">
                <input type="radio" name="tab-index" id="tab-index-0" checked/>
                <div class="content" style="overflow-y: auto; overflow-x: hidden;" id="myProducts">
                  
                  <div class="row">
                    @foreach($products as $index => $pro)
                      @if($pro->quantity > 0 && $pro->status == 1)
                        <div class="col-md-3 col-sm-6 mt-2 mb-2 card_ ">
                          <div class="product-grid p-2 " style="border-radius:20px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                              <div class="product-image">
                                  <a  class="image" style="border-radius:20px; height:200px;">
                                      <img class="pic-1" src="{{ asset($pro->image) ? '' . asset($pro->image) : $pro->name }}" 
                                      style="height: 80%; object-fit:contain" >
                                      <img class="pic-2" src="{{ asset($pro->image) ? '' . asset($pro->image) : $pro->name }}" 
                                      style="height: 80%; object-fit:contain" >
                                  </a>
                                  
                                  <ul class="product-links">
                                      <li><a href="#" onclick="AddProductCart({{$pro->id}})"><i class="fas fa-shopping-cart"></i></a></li>
                                      
                                  </ul>
                              </div>
                              <div class="product-content">
                                  <h3 class="title text-center card-title">
                                    @php
                                        $limitedMessage = Str::limit(
                                            $pro->name,
                                            10,
                                            '...',
                                        );
                                    @endphp
                           
                                    <a> {!! $limitedMessage !!}</a>
                                  </h3>
                                  <div class="price text-center text-success">
                                    @if($pro->discount)                             
                                      <span class="text-danger" style="text-decoration-line: line-through; font-size:12px;"> {{ number_format($pro->price ?? 0 + $pro->discount) }}</span>
                                      {{number_format($pro->price - $pro->discount)}}     

                                      @else
                                      {{number_format($pro->price ?? 0)}}     
                                    @endif
                                    
                                     /vnđ</div>
                              </div>
                          </div>
                        </div>
                      @endif
                    @endforeach
                 
                   
                    
                 
                    
                </div>
                </div>
              </div>
              @foreach($category as $key => $value)
          
                <div class="tab-content">
                  <input type="radio" name="tab-index" id="tab-index{{$key+1}}" @if($key+1 == 1) @endif/>
                  <div class="content" style="overflow-y: auto; overflow-x: hidden;" >
                    
                    <div class="row">
                      @foreach($value->product as $index => $pro)
                      @if($pro->quantity > 0 && $pro->status == 1)
                        <div class="col-md-3 col-sm-6 mt-2 mb-2 card_">
                          <div class="product-grid p-2" style="border-radius:20px;">
                              <div class="product-image">
                                  <a  class="image" style="border-radius:20px; height:200px;">
                                      <img class="pic-1" src="{{ asset($pro->image) ? '' . asset($pro->image) : $pro->name }}" style="height: 100%;" >
                                      <img class="pic-2" src="{{ asset($pro->image) ? '' . asset($pro->image) : $pro->name }}" style="height: 100%;" >
                                  </a>
                                  
                                  <ul class="product-links">
                                      <li><a href="#" onclick="AddProductCart({{$pro->id}})"><i class="fas fa-shopping-cart"></i></a></li>
                                      
                                  </ul>
                              </div>
                              <div class="product-content">
                                  <h3 class="title text-center card-title"><a>{{$pro->name}}</a></h3>
                                  <div class="price text-center text-success">{{number_format($pro->price ?? 0)}} /vnđ</div>
                              </div>
                          </div>
                        </div>
                      @endif
                      @endforeach
                      
                   
                      
                  </div>
                  </div>
                </div>
              @endforeach
              
            </div>
          </div>
        </div>
        <div class="col-md-4 ">
            <div class="d-flex justify-content-end mr-2 mt-2">
              <a class="btn" href="{{route('route_BackEnd_Dashboard')}}">
                <i class="fa-solid fa-house" style="color:#507eff; font-size:25px;">
                </i>
              </a>
            </div>
            <div class="mt-2" style="height: 80vh; overflow-y:auto;" id="cart_products">
              @php 
                $total = 0;
              @endphp
              @if($a)
                @foreach($a as $key => $product)

                    <div>
                            <div class="d-flex" style="align-items: center;">
                              <img class="mt-3 " src="{{ asset($product[1]) }}" alt="" 
                              style="height: 50px; width:50px; border-radius:5px;">
                              <div class="d-flex" style="align-items:center;">
                                <div class="ml-2" style="width:200px;">
                                  <p  style="font-weight:bold;" class="ml-1"">{{$product[2]}}</p>
                                  <div class="d-flex">
                                    <button class="btn_css" style="width:30px; height:30px;" onclick="CheckMinus({{$key}})">-</button>
                                    <input class="text-center" type="text" id="input_{{$key}}" onchange="Change({{$key}})" style="width:50px;" value="{{$product[4]}}">
                                    <button class="btn_css" style="width:30px; height:30px;" onclick="CheckPlus({{$key}})">+</button>
                                  </div>
                                </div>
                                <div style="width:150px;">
                                    <p class="text-success" style="margin:0; padding:0; font-size:10px;">Số tiền: {{number_format($product[6])}} /vnđ </p>
                                    <div class="text-info d-flex" style="align-items:center; font-size:10px;">
                                      Số lượng tồn:  
                                      <p  class="text-info" id="quantity_product_{{$key}}" style="margin:0; padding:0; font-size:10px;">{{$product[8]}}</p>
                                   </div>
                                    <p class="text-danger"  style="margin:0; padding:0; font-size:10px;">Tổng cộng: {{number_format($product[7])}} /vnđ</p>
                                </div>
                                <div>
                                  <i class="fa-solid fa-trash"  
                                  style="padding:5px; border:1px solid #C92127 !important; border-radius:20px; cursor: pointer; color:#C92127 !important;"
                                  onclick="Delete({{$key}})"
                                  ></i>
                                </div>
                              </div>
                            
                            </div>
                          </div>
                          <hr>
                          @php 
                            $total = $total + $product[7];
                          @endphp
                @endforeach
              @endif
           
               
              
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 d-flex" style="align-items: center;">
                    <div class="bg-danger" style="width:20px; height:20px;">
                     
                    </div>

                    <p class="ml-3 mb-0 mt-0 p-0">Tổng tiền: 
                      <span id="total_product">{{number_format($total)}} /vnđ</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <a href="{{route('route_FrontEnd_Checkout_admin')}}" 
                    class="btn w-100" 
                    style="border-radius:10px; background-color:#507eff; color:white;">Thanh toán</a>
                </div>

            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function AddProductCart(id){
          $.ajax({
                url: "{{route('route_FrontEnd_Add_Cart_Admin')}}",
                method: "POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    amount: 1,
                },
                success:function(data){
                  ProductController(data)
                   
                }

            })
      }
      function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
      function ProductController(id){
        // Swal.fire({
        //   position: "top-end",
        //   icon: "success",
        //   title: "Đã cập nhật giỏ hàng",
        //   showConfirmButton: false,
        //   timer: 1500
        // });
          $('#cart_products').html('');
          var html = '';
          var int = 0;
          var tottal = 0;
          id.forEach(element => {
            tottal = tottal + element[7];
              html += `
               <div>
                  <div class="d-flex" style="align-items: center;">
                    <img class="mt-3 " src="${element[1]}" alt="" style="height: 50px; width:50px; border-radius:5px;">
                    <div class="d-flex" style="align-items:center;">
                      <div class="ml-2" style="width:200px;">
                        <p  style="font-weight:bold;" class="ml-1"">`+element[2]+`</p>
                        <div class="d-flex">
                          <button   class="btn_css" style="width:30px; height:30px;" onclick="CheckMinus(`+int+`)">-</button>
                          <input class="text-center" type="text" id="input_`+int+`" onchange="Change(`+int+`)" style="width:50px;" value="`+element[4]+`">
                           <button  class="btn_css" style="width:30px; height:30px;" onclick="CheckPlus(`+int+`)">+</button>
                        </div>
                      </div>
                      <div style="width:150px;">
                          <p class="text-success" style="margin:0; padding:0; font-size:10px;">Số tiền: `+formatNumber(element[6])+` /vnđ </p>
                                     
                          <div class="text-info d-flex" style="align-items:center; font-size:10px;">
                             Số lượng tồn:  
                             <p  class="text-info" id="quantity_product_`+int+`" style="margin:0; padding:0; font-size:10px;">`+(element[8])+`</p>
                          </div>
                               
                          <p class="text-danger"  style="margin:0; padding:0; font-size:10px;">Tổng cộng: `+formatNumber(element[7])+` /vnđ</p>
                      </div>
                      <div>
                        <i class="fa-solid fa-trash"  
                        style="padding:5px; border:1px solid #C92127 !important; border-radius:20px; cursor: pointer; color:#C92127 !important;"
                        onclick="Delete(`+int+`)"
                        ></i>
                      </div>
                    </div>
                   
                  </div>
                </div>
                <hr>
                `;
                int++;
          });
          $('#cart_products').html(html);
          $('#total_product').text(formatNumber(tottal) +' /vnđ');
      }
      function CheckMinus(id){
            var input = $('#input_'+id).val();
            if(parseInt(input) > 1){
                $('#input_'+id).val(parseInt(input)-1);
                // ChangePrice(id,parseInt(input-1))
                $.ajax({
                    url: "{{ route('updateQuantityAdmin') }}",
                    method: "GET",
                    data: {
                        id: id,
                        value: parseInt(input)-1,
                    },
                    success: function(data) {
                        ProductController(data)
                        // $('#total_end').text(formatNumber(data.total));
                        // $('#total_tamp').text(formatNumber(data.total));
                    
                    }
                })
                
            }
            
           
        }
        function CheckPlus(id){
            var input = $('#input_'+id).val();
            var Input_number= parseInt(input)+1;
            var quantity_product = $('#quantity_product_'+id).text();
       
            var quantity_new = 0;
            if(Input_number > parseInt(quantity_product)){
                alert('Số lượng tối đa là: '+quantity_product);
                $('#input_'+id).val(parseInt(quantity_product));
                quantity_new = parseInt(quantity_product);
              
            }else{
                quantity_new = Input_number;
                $('#input_'+id).val(Input_number);
            }
            // ChangePrice(id,parseInt(input)+1);
            $.ajax({
                url: "{{ route('updateQuantityAdmin') }}",
                method: "GET",
                data: {
                    id: id,
                    value: quantity_new,
                },
                success: function(data) {
                    ProductController(data)
                    // $('#total_end').text(formatNumber(data.total));
                    // $('#total_tamp').text(formatNumber(data.total));

                   
                }
            })
           
        }

        function Change(id){
          var input = $('#input_'+id).val();
            if(input == 0){
              Swal.fire({
              position: "top-end",
              icon: "error",
              title: "Số lượng phải lớn hơn 0",
              showConfirmButton: false,
              timer: 1500
            });
              $('#input_'+id).val(1);
              return;
            }
            var Input_number= parseInt(input);
            var quantity_product = $('#quantity_product_'+id).text();
            console.log(quantity_product,'số lượng');
            var quantity_new = 0;
            if(Input_number > parseInt(quantity_product)){
                alert('Số lượng tối đa là: '+quantity_product);
                $('#input_'+id).val(parseInt(quantity_product));
                quantity_new = parseInt(quantity_product);
            }else{
                quantity_new = Input_number;
                $('#input_'+id).val(Input_number);
            }
        
            $.ajax({
                url: "{{ route('updateQuantityAdmin') }}",
                method: "GET",
                data: {
                    id: id,
                    value: quantity_new,
                },
                success: function(data) {
                    ProductController(data)
                    // $('#total_end').text(formatNumber(data.total));
                    // $('#total_tamp').text(formatNumber(data.total));

                   
                }
            })
        }
        function Delete(id){
          $.ajax({
                url: "{{ route('cartDeleteAdmin') }}",
                method: "GET",
                data: {
                    id: id,
                   
                },
                success: function(data) {
                    ProductController(data)
                    // $('#total_end').text(formatNumber(data.total));
                    // $('#total_tamp').text(formatNumber(data.total));

                   
                }
            })
        }
        function myFunction() {
            var input, filter, cards, cardContainer, title, i;
            input = document.getElementById("myFilter");
            filter = input.value.toUpperCase();
            cardContainer = document.getElementById("myProducts");
            cards = cardContainer.getElementsByClassName("card_");
            for (i = 0; i < cards.length; i++) {
              title = cards[i].querySelector(".card-title");
              if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                cards[i].style.display = "";
              } else {
                cards[i].style.display = "none";
              }

              
            }
          }
          function functioncheck() {
              $('#form_search').attr('style', 'display: none !important;');
          }
          function functioncheck_() {
              $('#form_search').attr('style', 'display: flex !important;');
        

          }
          
          $('.tab-nav').click(function(){
              // Xóa class bg-danger từ tất cả các tab
              $('.tab-nav').removeClass('bg-primaryPos');
              // Thêm class bg-danger vào tab được click
              $(this).addClass('bg-primaryPos');
          });

    </script>
</body>
</html>