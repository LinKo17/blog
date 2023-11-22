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
        {{ $user_data }}
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
                            <div class="col-7">: {{ $user_data->email }}</div>
                        </div>
                    @endif
                </div>



            </div>

            <div class="col-12 col-lg-8  pf_post_section mt-2">
                <a href='{{ url('/createPost') }}' class="btn btn-primary">Create Post</a>

                {{-- blog section --}}
                @for ($i = 1; $i <= 3; $i++)
                    <div class="container my-3">
                        <div class="border p-3" id="blog_style"> {{-- for main border --}}

                            {{-- blog header section --}}
                            <div class="row">

                                <div class="col-11 ">

                                    <img src="https://th.bing.com/th/id/OIP.4XB8NF1awQyApnQDDmBmQwHaEo?rs=1&pid=ImgDetMain "
                                        alt="" id="blog_profile">

                                    <h1 id="blog_name">name</h1>

                                    <p class="text-muted" id="blog_time">19.11.2023</p>
                                </div>

                                <div class="col-1 dropdown">
                                    <i class="fa-solid fa-ellipsis float-end" data-bs-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-end">

                                        <a href="#" class="dropdown-item text-center">Comments Open</a>
                                        <a href="#" class="dropdown-item text-center">Print Open</a>
                                        <a href="#" class="dropdown-item text-center">Reupload</a>
                                        <a href='{{ url('/profile/edit/1') }}' class="dropdown-item text-center">
                                            Edit</a>
                                        <a href="#" class="dropdown-item text-center">
                                            <span class="text-danger">Delete</span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            {{-- blog header section end --}}



                            {{-- blog main section --}}
                            <div id="image_container">
                                <img src="https://th.bing.com/th/id/OIP.4XB8NF1awQyApnQDDmBmQwHaEo?rs=1&pid=ImgDetMain "
                                    alt="">
                            </div>

                            <h1 id="blog_title">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio
                                inventore...
                            </h1>

                            <p id="blog_desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam cum id
                                error
                                tempore
                                <a href="">see more</a>
                            </p>
                            {{-- blog main section end --}}
                        </div>
                    </div>
                @endfor


                {{-- blog section end --}}

            </div>
        </div>

    </div>
    {{-- profile body section end --}}


    {{-- profile section end --}}


    {{-- js link --}}
    <script src="bs/js/index.js"></script>
</body>

</html>
