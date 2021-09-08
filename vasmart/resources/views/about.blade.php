@extends('layout')
@section('content')
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Về Chúng tôi</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{\Illuminate\Support\Facades\URL::to('index')}}">Trang Chủ</a></li>
                                <li>About</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SETCTION END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper section">

        <!-- ABOUT SECTION START -->
        <div class="about-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-left ">
                            <h2 class="uppercase">Đôi điều về VA-Smart</h2>
                            <h6 class="mb-40">Chúng tôi luôn đi đầu trong việc đưa sản phẩm mới đến với người dùng</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about-photo p-20 bg-img-1">
                            <img src="{{asset('../public/frontend/img/others/about.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-description mt-50">
                        <p>Với Sologan : “UY TÍN TRƯỚC SAU NHƯ MỘT” cũng là kim chỉ nam cho các hoạt động tại VA-Smart. Các Sản phẩm bán ra luôn phải đảm bảo chất lượng tốt nhất, Zin nguyên bản – Bảo hành 12 tháng mặc định – 30 NGÀY đổi không cần Lí do và quan trọng là Giá luôn Rẻ nhất. Chúng tôi mang những gì TỐT và thuận tiện nhất tới cho Khách hàng</p>
                        <p>Tầm nhìn:
                            Trở thành Công ty Bán lẻ các sản phẩm Di động – Máy tính bảng – Macbook Giá Rẻ số 1 trên thị trường với các Chi nhánh tại cả 3 miền Tổ Quốc , được Khách hàng tin tưởng lựa chọn.</p>
                        <p>Sự hài lòng của Khách hàng là giá trị bền vững của Công ty.
                            VA-Smart luôn cố gắng hoàn thiện từng ngày để đem lại những Sản phẩm tốt và trải nghiệm tuyệt nhất cho Khách hàng. Sự hài lòng của Khách hàng là yếu tố tiên quyết cho sự Phát triển của công ty. Toàn thể cán bộ nhân viên của VA-Smart luôn phải nỗ lực trong vai trò Một người làm dịch vụ: Lắng nghe và tận tâm với Khách hàn</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ABOUT SECTION END -->

        <!-- TEAM SECTION START -->
        <div class="team-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-left ">
                            <h2 class="uppercase">Thành Viên</h2>
                        </div>
                    </div>
                </div>
                <div class="active-team-member">
                    <!-- team-member start -->
                    <div class="col-lg-12">
                        <div class="team-member box-shadow bg-shape">
                            <div class="team-member-photo">
                                <img style="border-radius: 50%" src="{{asset('../public/frontend/img/team/5.jpg')}}" alt="">
                            </div>
                            <div class="team-member-info pt-20">
                                <h5 class="member-name"><a href="#">Phạm Trần Việt Anh</a></h5>
                                <p class="member-position">CEO</p>
                                <p class="mb-20">There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.</p>
                                <ul class="footer-social">
                                    <li>
                                        <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- team-member end -->
                    <!-- team-member start -->
                    <div class="col-lg-12">
                        <div class="team-member box-shadow bg-shape">
                            <div class="team-member-photo">
                                <img style="border-radius: 50%" src="{{asset('../public/frontend/img/team/6.jpg')}}" alt="">
                            </div>
                            <div class="team-member-info pt-20">
                                <h5 class="member-name"><a href="#">Đỗ Tấn Hưng</a></h5>
                                <p class="member-position">CEO</p>
                                <p class="mb-20">There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.</p>
                                <ul class="footer-social">
                                    <li>
                                        <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- team-member end -->
                    <!-- team-member start -->
                    <div class="col-lg-12">
                        <div class="team-member box-shadow bg-shape">
                            <div class="team-member-photo">
                                <img style="border-radius: 50%" src="{{asset('../public/frontend/img/team/7.jpg')}}" alt="">
                            </div>
                            <div class="team-member-info pt-20">
                                <h5 class="member-name"><a href="#">Nguyễn Quang Ninh</a></h5>
                                <p class="member-position">CEO</p>
                                <p class="mb-20">There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.</p>
                                <ul class="footer-social">
                                    <li>
                                        <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- team-member end -->
                    <!-- team-member start -->
                    <div class="col-lg-12">
                        <div class="team-member box-shadow bg-shape">
                            <div class="team-member-photo">
                                <img style="border-radius: 50%" src="{{asset('../public/frontend/img/team/8.jpg')}}" alt="">
                            </div>
                            <div class="team-member-info pt-20">
                                <h5 class="member-name"><a href="#">Cao Văn Tiến</a></h5>
                                <p class="member-position">CEO</p>
                                <p class="mb-20">There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.</p>
                                <ul class="footer-social">
                                    <li>
                                        <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- team-member end -->
                    <!-- team-member start -->
                    <div class="col-lg-12">
                        <div class="team-member box-shadow bg-shape">
                            <div class="team-member-photo">
                                <img style="border-radius: 50%" src="{{asset('../public/frontend/img/team/2.png')}}" alt="">
                            </div>
                            <div class="team-member-info pt-20">
                                <h5 class="member-name"><a href="#">Nancy holland</a></h5>
                                <p class="member-position">Chairman</p>
                                <p class="mb-20">There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.</p>
                                <ul class="footer-social">
                                    <li>
                                        <a class="facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="google-plus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="rss" href="#" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- team-member end -->
                </div>
            </div>
        </div>
        <!-- TEAM SECTION END -->
    </section>
@endsection
