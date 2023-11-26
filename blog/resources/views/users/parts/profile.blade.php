<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
    {{-- bs css link --}}
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">

    {{-- bs js link --}}
    <script src="bs/js/bootstrap.bundle.js"></script>

    {{-- font-awesome link --}}
    <link rel="stylesheet" href="bs/css/all.min.css">

    {{-- css link --}}
    <link rel="stylesheet" href="bs/css/index.css">
</head>

<body>

    {{-- navbar section --}}
    @include('users.parts.nav')
    {{-- navbar section end --}}

    {{-- profile section --}}

    {{-- profile header section --}}
    <div class="container mt-5">

        <div class="container pf_img g-0">
            <img src="/profile_pics/{{ $user_data->profile_pic }}" alt="">
        </div>

        <div class="container text-center mt-3 pf_name">
            <h1>{{ $user_data->name }}</h1>
        </div>


    </div>
    {{-- profile header section --}}


    {{-- profile body section --}}
    <div class="container">
        {{-- {{ $user_data }} --}}
        <div class="row">
            <div class="col-12  col-lg-4 mt-2">

                <div class="border py-2 px-3">
                    <div class="mb-5">
                        <a href='{{ url('/setting') }}'>
                            <i class="fa-solid fa-gear float-end pf_setting text-dark"></i>
                        </a>
                    </div>

                    @if ($user_data->bio)
                        <p class="text-center mt-3" style="word-wrap:break-word"> {{ $user_data->bio }}
                        </p>
                    @endif


                    @if ($user_data->date_of_birth)
                        <div class="row ">
                            <div class="col-5">Birth Date</div>
                            <div class="col-7" style="word-wrap: break-word">:
                                {{ $user_data->date_of_birth }}</div>
                        </div>
                    @endif

                    @if ($user_data->education)
                        <div class="row my-1">
                            <div class="col-5">Education</div>
                            <div class="col-7" style="word-wrap: break-word">: {{ $user_data->education }}</div>

                        </div>
                    @endif

                    @if ($user_data->work)
                        <div class="row my-1">
                            <div class="col-5">work</div>
                            <div class="col-7" style="word-wrap: break-word">: {{ $user_data->work }}</div>
                        </div>
                    @endif

                    @if ($user_data->live)
                        <div class="row my-1">
                            <div class="col-5">live</div>
                            <div class="col-7" style="word-wrap: break-word">: {{ $user_data->live }}
                            </div>
                        </div>
                    @endif

                    @if ($user_data->email_action == 1)
                        <div class="row my-1">
                            <div class="col-5">Email</div>
                            <div class="col-7" style="word-wrap:break-word">
                                : {{ $user_data->email }}
                            </div>
                        </div>
                    @endif
                </div>



            </div>

            <div class="col-12 col-lg-8  pf_post_section mt-2">
                <a href='{{ url('/createPost') }}' class="btn btn-primary">Create Post</a>

                {{-- post action --}}
                @foreach ($posts_data as $post_data)
                    @if ($post_data->post_action == 'waiting')
                        <div class="bg-success p-3 text-light my-3">

                            <span class="d-none d-md-inline">You have created a post.</span>Please wait for approve!!!

                            <div class="float-end">
                                <a href='' class="btn btn-light" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $post_data->id }}">Delete</a>
                            </div>

                        </div>
                    @endif

                    @if ($post_data->post_action == 'reject')
                        <div class="bg-danger p-3 text-light my-3">

                            Your's post do not fix out community guide line!!!

                            <div class="float-end">
                                <a href="{{ url("posts/delete/$post_data->id") }}" class="btn btn-light">Delete</a>
                            </div>
                            <div class="float-end mx-2">
                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#detail{{ $post_data->id }}">Detail</button>
                            </div>

                        </div>
                    @endif
                @endforeach
                {{-- post action --}}

                {{-- blog section --}}
                @foreach ($posts_data as $post_data)
                    @if ($post_data->post_action == 'approve')
                        <div class="container my-3">
                            <div class="border p-3" id="blog_style" style="background-color:#ffffff;">
                                {{-- for main border --}}

                                {{-- blog header section --}}
                                <div class="row mb-4">

                                    <div class="col-10 ">

                                        <img src="profile_pics/{{ $post_data->user->profile_pic }}" alt=""
                                            id="blog_profile">

                                        {{-- ------blog name ------ --}}
                                        <h1 id="blog_name" class="blog_name_max">
                                            @if (strlen($post_data->user->name) > 39)
                                            {{ substr($post_data->user->name, 0, 37) }}...
                                            @else
                                            {{ substr($post_data->user->name, 0, 40) }}
                                            @endif
                                        </h1>

                                        <h1 id="blog_name" class="blog_name_middle">
                                            @if (strlen($post_data->user->name) > 29)
                                            {{ substr($post_data->user->name, 0, 27) }}...
                                            @else
                                            {{ substr($post_data->user->name, 0, 30) }}
                                            @endif
                                        </h1>

                                        <h1 id="blog_name" class="blog_name_min">
                                            @if (strlen($post_data->user->name) > 17)
                                            {{ substr($post_data->user->name, 0, 17) }}...
                                            @else
                                            {{ substr($post_data->user->name, 0, 20) }}
                                            @endif
                                        </h1>
                                        {{-- ------blog name ------ --}}

                                        <p class="text-muted" id="blog_time">
                                            {{ $post_data->created_at->diffForHumans() }}
                                        </p>
                                        <span class="badge bg-dark"
                                            id="blog_category">{{ $post_data->category->category }}</span>
                                    </div>

                                    <div class="col-2 dropdown">
                                        <i class="fa-solid fa-ellipsis float-end" data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">

                                            @if ($post_data->comments_action == 'on')
                                                <a href='{{ url("/profile/commentOff/$post_data->id") }}'
                                                    class="dropdown-item text-center">Comments <span
                                                        class="badge bg-success">On</span></a>
                                            @else
                                                <a href='{{ url("/profile/commentOn/$post_data->id") }}'
                                                    class="dropdown-item text-center">Comments <span
                                                        class="badge bg-danger">Off</span></a>
                                            @endif

                                            @if ($post_data->print_action == 'on')
                                                <a href='{{ url("/profile/printOff/$post_data->id") }}'
                                                    class="dropdown-item text-center">Print <span
                                                        class="badge bg-success">On</span></a>
                                            @else
                                                <a href='{{ url("/profile/printOn/$post_data->id") }}'
                                                    class="dropdown-item text-center">Print <span
                                                        class="badge bg-danger">Off</span></a>
                                            @endif

                                            <a href="#" class="dropdown-item text-center">Reupload</a>

                                            <a href='{{ url("/profile/edit/$post_data->id") }}'
                                                class="dropdown-item text-center">
                                                Edit</a>

                                            <a href='' class="dropdown-item text-center" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $post_data->id }}">
                                                <span class="text-danger">Delete</span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                {{-- blog header section end --}}


                                {{-- blog main section --}}
                                @if ($post_data->images)
                                    <?php $images = explode('|', $post_data->images); ?>

                                    <div id="image_pf_container">
                                        @foreach ($images as $image)
                                            <img src="posts/{{ $image }}" alt="">
                                            <?php break; ?>
                                        @endforeach
                                    </div>
                                @endif

                                <h1 id="blog_title" style="word-wrap: break-word">{{ substr($post_data->title, 0, 70) }}</h1>

                                <p id="blog_desc"  style="word-wrap: break-word">{{ substr($post_data->description, 0, 120) }}
                                    <a href="{{url("/blog/detail/$post_data->id")}}">see more</a>
                                </p>
                                {{-- blog main section end --}}
                            </div>
                        </div>
                    @endif
                @endforeach

                {{-- blog section end --}}

            </div>
        </div>

    </div>
    {{-- profile body section end --}}


    {{-- profile section end --}}


    {{-- delete form section --}}
    @foreach ($posts_data as $post_data)
        <div class="modal fade" id="exampleModal{{ $post_data->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($post_data->post_action == 'waiting')
                            <div class="text-center">You're trying to delete a post before approve.</div>
                            <div class="text-center">Are you Sure?</div>
                        @else
                            <div class="text-center">You're trying to delete a post.</div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="{{ url("posts/delete/$post_data->id") }}" type="button"
                            class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detail{{ $post_data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Reject Reason</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            {{ $post_data->rreason->reason ?? '' }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="{{ url("posts/delete/$post_data->id") }}" type="button"
                            class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- delete form section end --}}


    {{-- keep position --}}
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    {{-- keep position end --}}

</body>

</html>
