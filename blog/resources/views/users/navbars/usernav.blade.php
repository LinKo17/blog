<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Search</title>
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
    <div class="container mt-5">
        @php
            $userExit = false;
        @endphp

        @foreach ($users as $user)
            @php
                $userExit = true;
            @endphp
            <div class="border rounded-4 p-2 d-flex">
                <div id="search_user_img_box">
                    <img src="profile_pics/{{$user->profile_pic}}" alt="" id="search_user_img">
                </div>

                {{-- @php
                    $user_origin_id = $user->id;
                    $user_id = $user_origin_id . "&" . sha1(md5(rand(999,time())));
                    echo $user_id;

                @endphp --}}

                <div id="search_user_name_box">
                    <a href="{{url("/profile/$user->id")}}" id="nav_user_search_name">{{$user->name}}</a>
                </div>
            </div>
        @endforeach

        @if(!$userExit)
            <div class="text-center fs-1 border rounded-3 p-5 bg-dark text-light">
                <span>Empty !!!</span>
            </div>
        @endif
    </div>
</body>

</html>
