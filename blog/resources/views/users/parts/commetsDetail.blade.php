<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <base href="/public">
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
    {{-- main comment section --}}
    <div class="container">
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

                    <a href="{{ url("comments/Detail/$comments->id") }}" class="badge bg-danger"
                        style="text-decoration: none; color:white;"></a>

                </div>

            </div>
        </div>


        <form action="{{ url("replycomment/$comments->post_id") }}" method="post" class="comment_reply_form">
            @csrf
            <input type="hidden" value="{{ $comments->id }}" name="replied_comment_id">{{-- post id --}}
            <textarea name="replycomments"></textarea>
            <br>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
    {{-- main comment section end --}}



    {{-- replies comments section --}}
    <div class="container">
        @foreach ($comments->replies as $replies)
            <div class="main_comment  my-3 ">

                <div class="pf_image_comment">
                    <img src="profile_pics/{{ $replies->user->profile_pic }}" alt="" id="comments_pf_img">
                </div>

                <div class="pf_other">
                    <div class="pf_name" style="word-break: break-all">{{ $replies->user->name }}
                    <span class="badge bg-dark">{{$replies->another_reply ?$replies->another_reply : $replies->comment->user->name}}</span>
                </div>
                    <div class="pf_comment">{{ $replies->content }}</div>
                    <div class="pf_action">
                        <span class="text-muted time">{{ $replies->created_at->diffForHumans() }}</span>
                        <span class="reply">reply</span>

                        <a href="{{ url("comments/Detail/$replies->id") }}" class="badge bg-danger"
                            style="text-decoration: none; color:white;"></a>

                    </div>

                </div>
            </div>

            <form action="{{ url("replycomment/$replies->post_id") }}" method="post" class="comment_reply_form">
                @csrf
                <input type="hidden" value="{{ $comments->id }}" name="replied_comment_id">{{-- replies id --}}
                <input type="hidden" value="{{ $replies->user->name }}" name="replied_again_comment_id">{{-- user name  --}}
                <textarea name="replycomments"></textarea>
                <br>
                <button class="btn btn-primary">Submit</button>
            </form>
        @endforeach
    </div>
    {{-- replies comments section end --}}

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
