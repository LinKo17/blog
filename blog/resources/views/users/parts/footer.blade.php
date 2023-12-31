<div id="footer-style">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6 col-lg-3 text-center mt-1">

                <a class="navbar-brand" href="#"><span class="logo_style">Blog</span></a>

                @foreach ($adminSetting_datas as $ad_setting)
                    <h4 class="footer_title_style">Office Address</h4>
                    <p class="footer_des_style">{{ $ad_setting->address }}</p>

                    <h4 class="footer_title_style">Phone</h4>
                    <p class="footer_des_style">{{ $ad_setting->phone }}</p>

                    <h4 class="footer_title_style">Email</h4>
                    <p class="footer_des_style">{{ $ad_setting->email_1 }}</p>
                    <p class="footer_des_style">{{ $ad_setting->email_2 }}</p>
                @endforeach

            </div>

            <div class="col-12 col-md-6 col-lg-3 text-center mt-1">
                <h4 class="footer_title_style">Menu</h4>

                <div class="footer_link_style">
                    <a href='{{ url('/') }}'>Home</a>
                </div>

                <div class="footer_link_style">
                    <a href='{{ url('/aboutnav') }}'>About</a>
                </div>

            </div>

            <div class="col-12 col-md-6 col-lg-3 text-center mt-1">

                <h4 class="footer_title_style">Categories</h4>

                @foreach ($categories_data as $category)
                    <div class="footer_link_style">
                        <a href='{{ url("/categoriesnav/$category->id") }}'>{{ $category->category }}</a>
                    </div>
                @endforeach

            </div>

            <div class="col-12 col-md-6 col-lg-3 text-center mt-1">

                <h4 class="footer_title_style">Social Media</h4>

                <div class="footer_social_link">
                    <span>
                        @if (isset($ad_setting->facebook))
                            <a href="{{ $ad_setting->facebook }}">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        @endif
                    </span>
                </div>

                <div class="footer_social_link">
                    <span>
                        @if (isset($ad_setting->twitter))
                            <a href="{{ $ad_setting->twitter }}">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        @endif
                    </span>
                </div>

                <div class="footer_social_link">
                    <span>
                        @if (isset($ad_setting->instagram))
                            <a href="{{ $ad_setting->instagram }}">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        @endif
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
