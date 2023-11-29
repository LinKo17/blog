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

{{-- ----------------------------- comments section ----------------------------- --}}

    <div class="my-2 px-4 pt-2">
        <span class="fs-3">Comments ({{ count($comments_data) + count($replies)}})</span>
    </div>

    <div class="px-4">
        <form method="post">
            @csrf
            <textarea type="text" class="form-control" placeholder="Comments" name="comments"></textarea>
            <button class="btn btn-primary mt-1">Add Comment</button>
        </form>
    </div>

    <div class="mx-4 mt-3 border p-3 rounded-3">
        @foreach ($comments_data as $comments)
            <div class="main_comment  my-3 ">

                <div class="pf_image_comment">
                    <img src="profile_pics/{{ $comments->user->profile_pic }}" alt="" id="comments_pf_img">
                </div>

                <div class="pf_other">
                    <div class="pf_name" style="word-break: break-all">{{ $comments->user->name }}</div>
                    <div class="pf_comment">{{ $comments->content }}</div>
                    <div class="pf_action">
                        <span class="text-muted time">{{ $comments->created_at->diffForHumans() }}</span>
                        <span class="reply">reply</span>

                        <a href="{{url("comments/Detail/$comments->id")}}" class="badge bg-danger" style="text-decoration: none; color:white;"></a>

                        <a href="{{url("/comments/Detail/$comments->id")}}" class="bg-dark badge" style="color:white; text-decoration:none;">{{count($comments->replies)}}</a>

                    </div>

                </div>
            </div>


            <form action="{{url("replycomment/$comments->post_id")}}" method="post" class="comment_reply_form">
                @csrf
                <input type="hidden" value="{{ $comments->id }}" name="replied_comment_id">{{-- post id --}}
                <textarea name="replycomments"></textarea>
                <br>
                <button class="btn btn-primary">Submit</button>
            </form>
        @endforeach
    </div>


    <script>
        let replies = document.querySelectorAll(".reply");
        let forms = document.querySelectorAll(".comment_reply_form");

        replies.forEach((reply, index) => {
            reply.onclick = function(event) {
                event.stopPropagation(); // Prevent the click event from reaching the body

                forms.forEach((form) => {
                    form.style.display = "none";
                });

                forms[index].style.display = "inline-block";

                forms[index].onclick = function(event) {
                    event.stopPropagation(); // Prevent the click event from reaching the body
                };
            };
        });

        document.body.onclick = () => {
            forms.forEach((form, index) => {
                form.style.display = "none";
            });
        };
    </script>


</body>

</html>
