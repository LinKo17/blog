@php
    if (!$post_detail) {
        return back();
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <style>
        .user_name{
            font-size:25px;
            padding:5px;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: black;
            color:white;
        }
        .user_title{
            border:1px dashed black;
            font-size:25px;
            padding: 5px;
            border-radius: 10px;
            margin-top:10px;
            margin-bottom: 20px;

        }
        .user-detail{
            word-break: break-all;
            font-size:15px;
            border:1px dashed black;
            padding:5px;
            border-radius: 5px;
            margin-top:5px;
        }

    </style>

</head>

<body class="detail_body">

    {{-- user name section --}}

   <span class="user_name">
    {{ $post_detail->user->name }}
   </span>
    {{-- user name section end --}}

    {{-- user title section --}}
    <div class="user_title">
        {{ $post_detail->title }}
    </div>
    {{-- user title section end --}}



    <div class="user-detail">
        {{ $post_detail->description }}
    </div>




</body>

</html>
