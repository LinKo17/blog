<div id="blog">
    <div class="container">
        {{-- <h5 class="h1 text-center mt-5 text-light">Reports</h5>
        <div class="container about_line"></div> --}}

        <div class="report_bar_style text-center">
            <span class="report_title">Reports</span>
            <span class="report_number badge bg-danger">{{ count($posts_data) }}</span>
        </div>

        {{-- blog section --}}
        <div class="row">
            @foreach ($posts_data as $post_data)
                <div class=" col-lg-4 col-md-6  col-12 p-2"> {{-- to seperate outer line --}}

                    <div class="border p-2" id="blog_style"> {{-- for main border --}}

                        {{-- blog header section --}}
                        <div class="row">

                            <div class="col-10 ">

                                <img src="profile_pics/{{ $post_data->user->profile_pic }}" alt=""
                                    id="blog_profile">

                                <h1 id="blog_name">
                                    @if (strlen($post_data->user->name) > 15)
                                        {{ substr($post_data->user->name, 0, 15) }}...
                                    @else
                                        {{ substr($post_data->user->name, 0, 15) }}
                                    @endif
                                </h1>

                                <p class="text-muted" id="blog_time">{{ $post_data->created_at->diffForHumans() }}</p>
                            </div>

                            <div class="col-2 dropdown">

                                <i class="fa-solid fa-ellipsis float-end" data-bs-toggle="dropdown"></i>

                                <div class="dropdown-menu">

                                    <a href="{{ url("/reports/show/$post_data->id") }}"
                                        class="dropdown-item text-center">
                                        Reports :
                                        <span class="badge bg-danger">
                                            {{ count($post_data->reports) ?? '' }}
                                        </span>
                                    </a>

                                    <a href="#" class="dropdown-item text-center">Email</a>

                                    <a href="{{ url("/reports/delete/$post_data->id") }}"
                                        class="dropdown-item text-center"><span class="text-danger">Don't show</span></a>

                                    <a href="{{ url("/reports/cancel/$post_data->id") }}"
                                        class="dropdown-item text-center">Back</a>
                                </div>
                            </div>

                        </div>
                        {{-- blog header section end --}}



                        {{-- blog main section
                        <div id="image_container">
                            <img src="https://th.bing.com/th/id/OIP.4XB8NF1awQyApnQDDmBmQwHaEo?rs=1&pid=ImgDetMain "
                                alt="">
                        </div> --}}

                        {{-- ------------------------------- --}}
                        {{-- blog main section --}}
                        @if ($post_data->images)
                            <?php $post_images = explode('|', $post_data->images); ?>

                            <div id="image_container" class="pf_post_img">
                                @foreach ($post_images as $post_image)
                                    <img src="posts/{{ $post_image }}">
                                    <?php break; ?>
                                @endforeach
                            </div>
                        @endif
                        {{-- ------------------------------- --}}

                        <h1 id="blog_title">
                            @if (strlen($post_data->title) > 70)
                                {{ substr($post_data->title, 0, 70) }}...
                            @else
                                {{ substr($post_data->title, 0, 70) }}
                            @endif
                        </h1>

                        <p id="blog_desc">{{ substr($post_data->description, 0, 120) }}
                            <a href="{{url("/blog/detail/$post_data->id")}}">see more</a>
                        </p>
                        {{-- blog main section end --}}
                    </div>

                </div>
            @endforeach
        </div>
        {{-- blog section end --}}



    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
