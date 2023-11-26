<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post_detail->user->name }} 's post</title>

    {{-- bs css link --}}
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">

    {{-- bs js link --}}
    <script src="bs/js/bootstrap.bundle.js"></script>

    {{-- font-awesome link --}}
    <link rel="stylesheet" href="bs/css/all.min.css">

    {{-- css link --}}
    <link rel="stylesheet" href="bs/css/index.css">
</head>

<body class="detail_body">

    {{-- blog header section --}}
    <div class="blog_detail px-4 py-3">

        <div class="">

            <img src="profile_pics/{{ $post_detail->user->profile_pic }}" alt="" id="blog_detail_profile">

            <p class="text-muted" id="blog_detail_time">
                {{ $post_detail->created_at->diffForHumans() }}
            </p>

            <span class="badge bg-dark" id="blog_detail_category">
                {{ $post_detail->category->category }}
            </span>

            <span class="my-1 px-4 py-2" id="blog_detail_print">
                <a class="bg-danger text-light fs-4 p-2 text-decoration-none rounded post_print">Print</a>
            </span>

        </div>

        <h1 class="mt-2 fs-3">
            {{ $post_detail->user->name }}
        </h1>


    </div>
    {{-- blog header section end --}}


    <div class=" fs-3 px-4 py-2 mt-3">
        {{ $post_detail->title }}
    </div>


    @if ($post_detail->images)
        <?php $post_images = explode('|', $post_detail->images); ?>

        <div class="row px-4 py-2 g-0">
            @foreach ($post_images as $post_image)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="blog_detail_images_box rounded">
                        <img src="posts/{{ $post_image }}" class="blog_detail_images">
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class=" fs-5 px-4 py-2" style="word-break: break-all">
        {{ $post_detail->description }}
    </div>



    <div class="my-2 px-4 py-2">
        <span class="fs-3">Comments</span>
    </div>
</body>

</html>
