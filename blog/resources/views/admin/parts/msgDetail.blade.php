<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $message->user->name }} 's post</title>

    {{-- bs css link --}}
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">

    {{-- bs js link --}}
    <script src="bs/js/bootstrap.bundle.js"></script>

    {{-- font-awesome link --}}
    <link rel="stylesheet" href="bs/css/all.min.css">

    {{-- css link --}}
    <link rel="stylesheet" href="bs/css/index.css">
</head>

<body class="detail_body bg-dark">

    <div class="p-2 rounded-2 container mt-3 text-light" style="border:1px solid blue;">
        @if ($message->images)
            <?php $post_images = explode('|', $message->images); ?>

            <div class="row px-4 py-2 g-0">
                @foreach ($post_images as $post_image)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="blog_detail_images_box rounded">
                            <img src="msgAd/{{ $post_image }}" class="blog_detail_images">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class=" fs-5 px-4 py-2" style="word-break: break-all">
            {{ $message->reason }}
        </div>
    </div>





</body>

</html>
