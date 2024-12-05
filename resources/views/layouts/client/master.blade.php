<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('client/assets/images/favicon1.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"  />

    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/chosen.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/jquery.scrollbar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/lightbox.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/slick.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/fonts/flaticon.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/megamenu.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/dreaming-attribute.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('client/assets/css/style.css') }}" />
    
    <title>@yield('title') </title>
</head>
<style>
      #kmacb {
    position: fixed;
    bottom: 40px;
    left: 20px;
    width: 160px;
    height: 160px;
    margin: auto;
    transition: visibility 0.5s ease 0s;
    z-index: 200000 !important;
}
#kmacb a {
    text-decoration: none;
}
#kmacb .kmacb-img-circle {
    animation: 1s ease-in-out 0s normal none infinite running kmacb-circle-img-anim;
    background: #5aaade url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAA8CAMAAADIULPRAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABs1BMVEUAAAD///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAAAPKcAvAAAAj3RSTlMATksXN+N4FifeiTABxPV+DCj9xy2kSQnl1y8iwA13/qruG/yN5hx6ZGq8WPAm9CmU+lAYtVQLTb1jBDGzhQW6q09EHhLqDhP52a4CYM/yD8o5bgPYHxH4nsapQge4V4ZzPAjtJMzCOBCvnzZVpyHzQ4Ta36xBuetRmI6jBoPxYXvTLHXvmYvbgJfWvoc0GTlTyOIAAAABYktHRACIBR1IAAAACXBIWXMAAAsSAAALEgHS3X78AAAB8UlEQVRIx43W91cTQRAH8AWResRwQCAGjKGEmkRQQDkMVhIQC4QWCMUAErtYqEoNCqLsv8yDl3e7e3uzk+9vd/d58+Z2Zy8hBE5O7hWSXfIopVfzC7KhhfQyRcUlKNVKaSaOa07ElunUTHmF2lZSLkUuFa2q5i11X1dYDxVTUwvbGxbrvQlbH7WmDlzcesk2QNYlUdroB2yTbOubAdsiW9oK2DYb267Z24Au22DI3mq3ZNvRCTRx+46Mu6BV6+65a7X34K3rNfpEe58oEjb6+XdsI8o4HzCqP1RbYnB1HyGWcPYxQp88NalvALGRqGkHsRYCrIWhZ4gd9pp2GKv73KQvuhH6kp27V1jZEdbuKEJjY+wI+RE7zsahFGthiLXQjNAJRicRqrUyO6WpbYhRRwSpG2d2GqEz3Dh61DThYHTWMja1c/MLr5NsGxa507Mk0sLli7tvVlKZ67dcB+9E+j6Yue/+EL5Yro8cdSQE+ukze1Te9aWlkf8urAo0+ZXC+dYr2O8KSssE+kNF18TdVdF1cQ2mVFYc8ZAXlvqGWHZTUXXLsvEK2meZAyMK0u2flrJO0DbJZ+GXvdzZtRnU2J7P5tds/wCY68O0lR6lAEo0z+8d5ib/HIN/Fi4TCZzEo2m6/vf033+SRQbOwv6Y4vk50nYdHuLvx/IAAAAASUVORK5CYII=") no-repeat scroll center center;
    border: 2px solid transparent;
    border-radius: 100%;
    height: 80px;
    left: 40px;
    opacity: 0.8;
    position: absolute;
    top: 40px;
    transform-origin: 50% 50% 0;
    width: 80px;
}
#kmacb .kmacb-circle-fill {
    animation: 2.3s ease-in-out 0s normal none infinite running kmacb-circle-fill-anim !important;
    background: #5aaade none repeat scroll 0 0;
    border: 2px solid transparent;
    border-radius: 100%;
    height: 110px;
    left: 25px;
    opacity: 0.24;
    position: absolute;
    top: 25px;
    width: 110px;
}
#kmacb .kmacb-circle {
    animation: 2.2s ease-in-out 0s normal none infinite running kmacb-circle-anim !important;
    background-color: transparent;
    border: 2px solid #5aaade;
    border-radius: 100%;
    height: 100%;
    opacity: 0.35;
    position: absolute;
    width: 100%;
}
#kmacb:hover .kmacb-img-circle, #kmacb:hover .kmacb-circle-fill {
    background-color: #72d582;
}
#kmacb:hover .kmacb-circle {
    border-color: #72d582;
}
#kmacb:hover .kmacb-img-circle {
    animation: 1s ease-in-out 0s normal none infinite running kmacb-circle-img-anim-hover;
}
@keyframes kmacb-circle-anim {
0% {
    opacity: 0.1;
    transform: rotate(0deg) scale(0.5) skew(1deg);
}
30% {
    opacity: 0.5;
    transform: rotate(0deg) scale(0.7) skew(1deg);
}
100% {
    opacity: 0.6;
    transform: rotate(0deg) scale(1) skew(1deg);
}
}
@keyframes kmacb-circle-anim {
0% {
    opacity: 0.1;
    transform: rotate(0deg) scale(0.5) skew(1deg);
}
30% {
    opacity: 0.5;
    transform: rotate(0deg) scale(0.7) skew(1deg);
}
100% {
    opacity: 0.1;
    transform: rotate(0deg) scale(1) skew(1deg);
}
}
@keyframes kmacb-circle-fill-anim {
0% {
    opacity: 0.2;
    transform: rotate(0deg) scale(0.7) skew(1deg);
}
50% {
    opacity: 0.2;
}
100% {
    opacity: 0.2;
    transform: rotate(0deg) scale(0.7) skew(1deg);
}
}
@keyframes kmacb-circle-fill-anim {
0% {
    opacity: 0.2;
    transform: rotate(0deg) scale(0.7) skew(1deg);
}
50% {
    opacity: 0.2;
    transform: rotate(0deg) scale(1) skew(1deg);
}
100% {
    opacity: 0.2;
    transform: rotate(0deg) scale(0.7) skew(1deg);
}
}
@keyframes kmacb-circle-img-anim {
0% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
10% {
    transform: rotate(-25deg) scale(1) skew(1deg);
}
20% {
    transform: rotate(25deg) scale(1) skew(1deg);
}
30% {
    transform: rotate(-25deg) scale(1) skew(1deg);
}
40% {
    transform: rotate(25deg) scale(1) skew(1deg);
}
50% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
100% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
}
@keyframes kmacb-circle-img-anim {
0% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
10% {
    transform: rotate(-25deg) scale(1) skew(1deg);
}
20% {
    transform: rotate(25deg) scale(1) skew(1deg);
}
30% {
    transform: rotate(-25deg) scale(1) skew(1deg);
}
40% {
    transform: rotate(25deg) scale(1) skew(1deg);
}
50% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
100% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
}
@keyframes kmacb-circle-img-anim-hover {
0% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
10% {
    transform: rotate(-35deg) scale(1) skew(1deg);
}
20% {
    transform: rotate(35deg) scale(1) skew(1deg);
}
30% {
    transform: rotate(-35deg) scale(1) skew(1deg);
}
40% {
    transform: rotate(35deg) scale(1) skew(1deg);
}
50% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
100% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
}
@keyframes kmacb-circle-img-anim-hover {
0% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
10% {
    transform: rotate(-35deg) scale(1) skew(1deg);
}
20% {
    transform: rotate(35deg) scale(1) skew(1deg);
}
30% {
    transform: rotate(-35deg) scale(1) skew(1deg);
}
40% {
    transform: rotate(35deg) scale(1) skew(1deg);
}
50% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
100% {
    transform: rotate(0deg) scale(1) skew(1deg);
}
}


.cart-animation-helper {
	margin: 0 20%;
	width: 0;
	height: 0;
	position: relative; /* Added to make sure the :after pseudo-element is positioned correctly */
}

.cart-animation-helper:after {
	opacity: 0;
	border-radius: 0%;
	max-height: 150px; /* Replace $product-height with an actual value */
	max-width: 150px; /* Replace $product-width with an actual value */
	content: "";
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	margin: 0 auto;
	display: block;
	height: 100px; /* Replace $product-height with an actual value */
	width: 100px; /* Replace $product-width with an actual value */
	background-color: #ff9a9e;
	transition: transform 0.8s ease-out, margin 0.8s ease-out, opacity 0.8s ease-out, 
	            border-radius 0.4s ease-out, max-height 0.4s ease-out, max-width 0.4s ease-out;
}




</style>
<body>
    @include('layouts.client.header')

    <div style="background-color:#f8f6f0">
        @yield('content')
    </div>
   

    @include('layouts.client.footer')

    <a href="#" class="backtotop active d-flex justify-content-center align-items-center">
        <i class="fa fa-angle-up d-flex align-items-center justify-content-center"></i>
    </a>
    <div id="kmacb">
        <a modal="kmacb-form" href="#" title="Перезвонить Вам">
          <div class="kmacb-circle"></div>
          <div class="kmacb-circle-fill"></div>
          <div class="kmacb-img-circle"></div>
        </a>
    </div>
    <script src="{{ asset('client/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/chosen.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/countdown.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/slick.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/threesixty.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('client/assets/js/mobilemenu.js') }}"></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
    <script src="{{ asset('client/assets/js/functions.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // $('.count').text(10);


        function AddToCardLike(id,status){
          
            if ($('#Cart_Like_' + id).hasClass('label-left-like')) {
                $.ajax({
                    url: "{{route('cartDeleteLike')}}",
                    method: "GET",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id: $('#id_product_'+id).val(),
                        
                    },
                    success:function(data){
                        let numberOfSubArrays = data.length;
                       
                        $('#Cart_Like_' + id).removeClass('label-left-like');
                        $('#Cart_Like_' + id + ' i').removeClass('new-color');
                        $('.count_like').text(numberOfSubArrays);
                    }

                })
            }else{
                $.ajax({
                    url: "{{route('route_FrontEnd_Add_Cart_Like')}}",
                    method: "POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        id: $('#id_product_'+id).val(),
                        amount: $('#amount_product_'+id).val(),
                    },
                    success:function(data){
                        let numberOfSubArrays = data.length;
                        console.log('#Cart_Like_' + id);
                        $('#Cart_Like_' + id).addClass('label-left-like');
                        $('#Cart_Like_' + id + ' i').addClass('new-color');
                        $('.count_like').text(numberOfSubArrays);
                    }

                })
            }
           
        }
        function AddToCard(id){
            $.ajax({
                url: "{{route('route_FrontEnd_Add_Cart')}}",
                method: "POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id: $('#id_product_'+id).val(),
                    amount: $('#amount_product_'+id).val(),
                },
                success:function(data){
                    let numberOfSubArrays = data.length;
                    
                    $('.count').text(numberOfSubArrays);
                    // alert('Thêm sản phẩm thành công');
                }

            })
        }

        function AddToCard_1(id){
            $.ajax({
                url: "{{route('route_FrontEnd_Add_Cart')}}",
                method: "POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    id: $('#id_product__'+id).val(),
                    amount: $('#amount_product__'+id).val(),
                },
                success:function(data){
                    let numberOfSubArrays = data.length;
                    
                    $('.count').text(numberOfSubArrays);
                    // alert('Thêm sản phẩm thành công');
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Thêm sản phẩm thành công",
                        showConfirmButton: false,
                        timer: 1500
                        });
                }

            })
        }
        // $('.add-to-cart').on('click', function () {
        //         var cart = $('.block-link');
        //         var imgtodrag = $(this).closest('.card').find("img").eq(0);

        //         if (imgtodrag) {
        //             var imgclone = imgtodrag.clone()
        //                 .offset({
        //                 top: imgtodrag.offset().top,
        //                 left: imgtodrag.offset().left
        //             })
        //                 .css({
        //                     'opacity': '0.5',
        //                     'position': 'absolute',
        //                     'height': '150px',
        //                     'width': '150px',
        //                     'z-index': '100'
        //             })
        //                 .appendTo($('body'))
        //                 .animate({
        //                 'top': cart.offset().top + 10,
        //                 'left': cart.offset().left + 150,
        //                 'width': 150,
        //                 'height': 150
        //             }, 1000, 'easeInOutExpo');
                    
        //             setTimeout(function () {
        //                 cart.effect("shake", {
        //                     times: 2
        //                 }, 200);
        //             }, 1500);

        //             imgclone.animate({
        //                 'width': 0,
        //                     'height': 0
        //             }, function () {
        //                 $(this).detach()
        //             });
        //         }
        // });
    </script>
    <script>
        $(document).ready(function(e) {
    $('.add-to-cart').click(function() {
        var target        = $('.block-link').first(),
            target_offset = target.offset();

        var target_x = target_offset.left,
            target_y = target_offset.top;

        console.log('target: ' + target_x + ', ' + target_y);
        
		var obj_id = 1 + Math.floor(Math.random() * 100000),
			obj_class = 'cart-animation-helper',
			obj_class_id = obj_class + '_' + obj_id;
		
        var obj = $("<div>", {
            'class': obj_class + ' ' + obj_class_id
        });

        $(this).parent().parent().append(obj);
		
        var obj_offset = obj.offset(),
			dist_x = target_x - obj_offset.left + 10,
            dist_y = target_y - obj_offset.top + 10,
            delay  = 0.8; // seconds
        setTimeout(function(){
            obj.css({
            	'transition': 'transform ' + delay + 's ease-in',
            	'transform' : "translateX(" + dist_x + "px)"
            });
			$('<style>.' + obj_class_id + ':after{ \
				transform: translateY(' + dist_y + 'px); \
				opacity: 1; \
				border-radius: 100%; \
				max-height: 20px; \
				max-width: 20px; margin: 0; \
			}</style>').appendTo('head');
        }, 0);
		
        
        obj.show(1).delay((delay + 0.02) * 1000).hide(1, function() {
            $(obj).remove();
        });
    });
});
   
    </script>
</body>

</html>
