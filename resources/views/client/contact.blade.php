@extends('layouts.client.master')

@section('title', 'Về chúng tôi')

@section('content')

    <div class="banner-wrapper has_background">
        <img src="assets/images/banner-for-all2.jpg" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
        <div class="banner-wrapper-inner">
            {{-- <h1 class="page-title">Contact</h1> --}}
            <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin "><a href="{{ route('route_FrontEnd_Home') }}" ><span>Trang chủ</span></a></li>
                    <li class="trail-item trail-end active"><span>Về chúng tôi</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="site-main main-container no-sidebar container">
        <div class="row">
            <div class="col-md-7">
           

                <h2>Giới thiệu về cửa hàng</h2>
                <p>
                    Chào mừng đến với cửa hàng đồ gia dụng của chúng tôi! Chúng tôi tự hào mang đến cho bạn những sản phẩm chất lượng cao, thiết kế tinh tế và giá cả hợp lý để làm cho gian bếp của bạn trở nên hoàn hảo. Với niềm đam mê không ngừng nghỉ trong việc nâng cao trải nghiệm nấu nướng và dùng bữa, chúng tôi không chỉ cung cấp những vật dụng cần thiết mà còn mang đến sự tiện lợi và niềm vui cho cuộc sống hàng ngày của bạn. Đội ngũ chúng tôi luôn tận tâm, nhiệt huyết và sẵn sàng phục vụ bạn với sự chuyên nghiệp và thái độ thân thiện. Hãy để chúng tôi đồng hành cùng bạn trong mỗi bữa ăn gia đình và những khoảnh khắc ấm cúng tại nhà.
                </p>
            </div>
            <div class="col-md-5">
                <img src="https://tse4.mm.bing.net/th?id=OIP.njIPbgaCXqoRCyLS0icbLgHaEK&pid=Api&P=0&h=220" alt="">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-5">
                <img src="https://cdn.vietnamtours247.com/2020/09/nha-sach.png" alt="">
                
            </div>
        
            <div class="col-md-7">
                <h2>Các sản phẩm của chúng tôi</h2>
                <p>
                    Cửa hàng chúng tôi chuyên cung cấp đa dạng các sản phẩm gia dụng cho nhà bếp, từ bát, đĩa, nồi, chảo đến đũa và thìa. Mỗi sản phẩm đều được lựa chọn kỹ càng từ những chất liệu an toàn, bền đẹp và có thiết kế hiện đại. Chúng tôi cam kết mang đến cho bạn những sản phẩm không chỉ tiện ích mà còn tạo điểm nhấn cho không gian bếp của bạn. Dù bạn đang tìm kiếm những bộ bát đĩa tinh tế để tiếp đãi khách hay những dụng cụ nấu ăn chuyên nghiệp để thỏa mãn đam mê ẩm thực, cửa hàng của chúng tôi luôn sẵn sàng đáp ứng mọi nhu cầu của bạn.
                </p>
            </div>
        </div>
        <div class="row mt-5">
           
            <div class="col-md-12">
                <h2>Sứ mệnh của cửa hàng</h2>
                <p>
                    Sứ mệnh của chúng tôi là mang đến cho mỗi gia đình những trải nghiệm nấu nướng và dùng bữa tuyệt vời nhất. Chúng tôi tin rằng những bữa ăn không chỉ là sự kết hợp của thức ăn mà còn là những khoảnh khắc quý giá bên gia đình và bạn bè. Vì vậy, chúng tôi luôn nỗ lực để cung cấp những sản phẩm gia dụng chất lượng cao, an toàn và đẹp mắt, giúp bạn có thể tận hưởng trọn vẹn từng phút giây trong gian bếp của mình. Chúng tôi cũng không ngừng cải tiến và đổi mới để mang đến những sản phẩm và dịch vụ tốt nhất cho khách hàng.
                </p>
            </div>
        </div>
        <div class="row mt-5">
           
            <div class="col-md-12">
                <h2>Chính sách bảo hành</h2>
                <p>
                    Chúng tôi hiểu rằng sự an tâm của khách hàng là rất quan trọng. Vì vậy, tất cả các sản phẩm của chúng tôi đều được bảo hành trong một khoảng thời gian nhất định tùy theo từng loại sản phẩm. Chúng tôi cam kết sẽ hỗ trợ và giải quyết mọi vấn đề của bạn một cách nhanh chóng và hiệu quả nhất. Nếu sản phẩm có bất kỳ lỗi kỹ thuật nào trong quá trình sử dụng, bạn có thể liên hệ với chúng tôi để được hướng dẫn và hỗ trợ bảo hành. Sự hài lòng của bạn là niềm vinh dự và động lực để chúng tôi không ngừng phấn đấu và hoàn thiện.
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-center">
                <img src="https://hopcartongiare.vn/Upload/images/tin-tuc/quy-trinh-kiem-tra-chat-luong-san-pham-la-gi%20(2).jpg" alt="">
            </div>
            <div class="col-md-12">
                <h2>Cam kết về chất lượng</h2>
                <p>
                    Chất lượng là yếu tố hàng đầu mà chúng tôi luôn đặt lên hàng đầu. Mỗi sản phẩm tại cửa hàng đều trải qua quá trình kiểm tra nghiêm ngặt từ khâu chọn nguyên liệu đến khi thành phẩm. Chúng tôi cam kết chỉ cung cấp những sản phẩm an toàn, bền đẹp và thân thiện với môi trường. Đội ngũ chuyên gia của chúng tôi luôn nghiên cứu và cập nhật những xu hướng mới nhất để mang đến cho bạn những sản phẩm hiện đại và tiện ích. Với chúng tôi, mỗi sản phẩm bán ra không chỉ là một món hàng mà còn là sự gửi gắm niềm tin và uy tín của cửa hàng đến khách hàng.
                </p>
            </div>
        </div>
    </div>

@endsection
