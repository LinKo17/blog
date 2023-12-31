<div>
    <div class="container">

        <?php
        $approves = count($approve_requests);
        ?>

        <div class="report_bar_style text-center">
            <span class="report_title">Approve Request</span>
            <a href="" data-bs-toggle="modal" data-bs-target="#confirm"
                class="report_number badge bg-primary">{{ count($approve_requests) }}</a>
        </div>

        {{-- blog section --}}
        <div class="row">
            @foreach ($approve_requests as $approve)
                <div class=" col-lg-4 col-md-6  col-12 p-2"> {{-- to seperate outer line --}}

                    <div class="border p-2" id="blog_style"> {{-- for main border --}}

                        {{-- blog header section --}}
                        <div class="row mb-5">

                            <div class="col-10 ">

                                <img src="profile_pics/{{ $approve->user->profile_pic }}" id="blog_profile">

                                <?php $user_id = $approve->user->id; ?>
                                <a href="{{ url("/profile/$user_id") }}" id="blog_name" id="nav_user_search_name">
                                    @if (strlen($approve->user->name) > 15)
                                        {{ substr($approve->user->name, 0, 15) }}...
                                    @else
                                        {{ substr($approve->user->name, 0, 15) }}
                                    @endif
                                </a>

                                <p class="text-muted" id="blog_time">{{ $approve->created_at->diffForHumans() }}</p>

                                <span class="badge bg-dark" id="blog_category">{{ $approve->category->category }}</span>
                            </div>

                            <div class="col-2 dropdown">

                                <i class="fa-solid fa-ellipsis float-end" data-bs-toggle="dropdown"></i>

                                <div class="dropdown-menu">

                                    <a href="/approve/{{ $approve->id }}" class="dropdown-item text-center">
                                        <span class="text-success">Approve</span>
                                    </a>

                                    <a href="#" class="dropdown-item text-center" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $approve->id }}"><span
                                            class="text-danger">Reject</span></a>

                                    <a href="{{url("/emailsider")}}" class="dropdown-item text-center">
                                        Email
                                    </a>

                                </div>
                            </div>

                        </div>
                        {{-- blog header section end --}}



                        {{-- blog main section --}}
                        @if ($approve->images)
                            <?php $post_images = explode('|', $approve->images); ?>

                            <div id="image_container" class="pf_post_img">
                                @foreach ($post_images as $post_image)
                                    <img src="posts/{{ $post_image }}">
                                    <?php break; ?>
                                @endforeach
                            </div>
                        @endif

                        <h1 id="blog_title" class="mt-1" style="word-wrap:break-word">

                            @if (strlen($approve->title) > 70)
                                {{ substr($approve->title, 0, 70) }}...
                            @else
                                {{ substr($approve->title, 0, 70) }}
                            @endif

                        </h1>

                        </h1>

                        <p id="blog_desc" style="word-wrap:break-word">{{ substr($approve->description, 0, 120) }}
                            <a href="{{ url("/blog/detail/$approve->id") }}">see more</a>
                        </p>
                        {{-- blog main section end --}}
                    </div>

                </div>
            @endforeach
            {!! $approve_requests->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        {{-- blog section end --}}


        {{-- reject list --}}
        @foreach ($approve_requests as $approve)
            <div class="modal fade" id="exampleModal{{ $approve->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                <span class="text-danger">Reject Reason</span>
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form name="editForm" id="myEditForm" method="post"
                            action="{{ url("/reject/$approve->id") }}">
                            @csrf
                            <div class="modal-body">

                                <div class="my-2">
                                    <label for="reject_type"><span class="text-danger">Choice Reject</span></label>

                                    <select name="reject_type" id="reject_type" class="form-control">

                                        @foreach ($reasons as $reason)
                                            <option value="{{ $reason->id }}">
                                                <span class="text-danger">{{ $reason->reason }}</span>
                                            </option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
        {{-- reject list end --}}

        {{-- confirm to approve all --}}
        <div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <span class="text-danger">Approve Section</span>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">
                        You are trying to approve every post.Are you sure?

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href='{{ url("/approves/$approves") }}' type="submit" class="btn btn-primary">Confirm</a>
                    </div>

                </div>
            </div>
        </div>
        {{-- confirm to approve all end --}}
    </div>
</div>
