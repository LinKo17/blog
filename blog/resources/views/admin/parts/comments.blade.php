<div class="container  mt-3 comments_contaiener">
    <form method="POST" class="input-group">
        @csrf
        <input type="text" class="form-control" name="search">
        <button class="btn btn-outline-primary">Search</button>
    </form>
</div>


@if (isset($comments_data) || isset($replies_data))
    @php
        $commentsExist = false;
        $replyExist = false;
    @endphp

    @foreach ($comments_data as $comments)
        <?php $commentsExist = true;?>
        @if (isset($comments->id))
            {{-- ------------------------------- --}}
            <div class="main_comment  my-3 ">

                <div class="pf_image_comment">
                    <img src="profile_pics/{{ $comments->user->profile_pic }}" alt="" id="comments_pf_img">
                </div>

                <div class="pf_other">
                    <div class="pf_name" style="word-break: break-all">
                        <?php $user_id = $comments->user->id; ?>
                        <a href="{{ url("/profile/$user_id") }}" class="text-light">{{ $comments->user->name }}</a>
                        <span class="badge bg-light text-dark">{{ $comments->user->email }}</span>
                    </div>
                    <div class="pf_comment text-light">{{ $comments->content }}</div>
                    <div class="pf_action">
                        <span class="text-muted time">{{ $comments->created_at->diffForHumans() }}</span>

                        <a href="{{ url("/blog/detail/$comments->post_id") }}" class="btn btn-secondary fs-6">view
                            post</a>

                    </div>

                </div>

                <div class="pf_trash mt-1 ms-1">
                    <a href="{{ url("/commentsAdmin/delete/$comments->id") }}" class="logo_category">
                        <i class="text-danger fa-solid fa-trash float-end"></i>
                    </a>
                </div>
            </div>
            {{-- ------------------------------- --}}
        @endif
    @endforeach

    @foreach ($replies_data as $replies)
        <?php $replyExist = true;?>
        @if (isset($replies->id))
            {{-- ------------------------------- --}}
            <div class="main_comment  my-3 ">

                <div class="pf_image_comment">
                    <img src="profile_pics/{{ $replies->user->profile_pic }}" alt="" id="comments_pf_img">
                </div>

                <div class="pf_other">
                    <?php $user_id = $replies->user->id; ?>
                    <div class="pf_name" style="word-break: break-all">
                        <a href="{{ url("/profile/$user_id") }}" class="text-light">{{ $replies->user->name }}</a>
                        <span class="badge bg-light text-dark">{{ $replies->user->email }}</span>
                    </div>
                    <div class="pf_comment text-light">{{ $replies->content }}</div>
                    <div class="pf_action">
                        <span class="text-muted time">{{ $replies->created_at->diffForHumans() }}</span>

                        <a href="{{ url("/blog/detail/$replies->post_id") }}" class="btn btn-secondary fs-6">view
                            post</a>

                    </div>

                </div>

                <div class="pf_trash ms-1">
                    <a href="{{ url("/replyAdmin/delete/$replies->id") }}" class="logo_category">
                        <i class="text-danger fa-solid fa-trash float-end"></i>
                    </a>
                </div>
            </div>
            {{-- ------------------------------- --}}

        @endif
    @endforeach


    @if (!$commentsExist && !$replyExist)
        <div class="container mt-3 comments_empty">
            empty!!!
        </div>
    @endif
@else
    <div class="container mt-3 comments_empty">
        empty!!!
    </div>
@endif
