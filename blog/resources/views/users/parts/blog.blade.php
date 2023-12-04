<div id="blog">

    {{-- alert section --}}
        @include('sweetalert::alert')
    {{-- alert section end --}}

    <div class="container">
        <h5 class="h1 text-center mt-5">Blogs</h5>
        <div class="container about_line"></div>

        {{-- blog section --}}
        <div class="container container_index_blog_style">
            <div class="row">
                @foreach ($posts_data as $post_data)


                    @php
                        $hidePost = false;
                        foreach ($post_data->hide as $hide_data) {
                            if ($hide_data->user_id == (auth()->user()->id ?? '') && $hide_data->post_id == $post_data->id && $hide_data->action == 'hide') {
                                $hidePost = true;
                                break;
                            }
                        }
                    @endphp


                    @if (!$hidePost && $post_data->report != 'delete')
                        <div class="col-12 p-2"> {{-- to seperate outer line --}}

                            <div class="border p-2" id="blog_style"> {{-- for main border --}}

                                {{-- blog header section --}}
                                <div class="row index_post_header_style">

                                    <div class="col-11">

                                        <img src="profile_pics/{{ $post_data->user->profile_pic }}" alt=""
                                            id="blog_profile">

                                        <?php $user_id = $post_data->user->id; ?>
                                        <a href="{{ url("/profile/$user_id") }}" id="blog_name">
                                            @if (strlen($post_data->user->name) > 20)
                                                {{ substr($post_data->user->name, 0, 20) }}...
                                            @else
                                                {{ substr($post_data->user->name, 0, 15) }}
                                            @endif
                                        </a>

                                        <p class="text-muted" id="blog_time">
                                            {{ $post_data->created_at->diffForHumans() }}
                                        </p>

                                        <span class="badge bg-dark"
                                            id="blog_category">{{ $post_data->category->category }}</span>
                                    </div>

                                    @can("check-ban",0)
                                    <div class="col-1 dropdown">
                                        <i class="fa-solid fa-ellipsis float-end" data-bs-toggle="dropdown"></i>
                                        <div class="dropdown-menu dropdown-menu-end">

                                            <a href="#" class="dropdown-item text-center" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $post_data->id }}">Report</a>

                                            <a href='{{ url("postAction/$post_data->id") }}'
                                                class="dropdown-item text-center">Hide</a>
                                        </div>
                                    </div>
                                    @endcan

                                </div>
                                {{-- blog header section end --}}



                                {{-- blog main section --}}
                                @if ($post_data->images)
                                    <?php $post_images = explode('|', $post_data->images); ?>

                                    <div id="image_container">
                                        @foreach ($post_images as $post_image)
                                            <img src="posts/{{ $post_image }}">
                                            <?php break; ?>
                                        @endforeach
                                    </div>
                                @endif

                                <h1 id="blog_title" style="word-wrap:break-word">
                                    @if (strlen($post_data->title) > 70)
                                        {{ substr($post_data->title, 0, 70) }}...
                                    @else
                                        {{ substr($post_data->title, 0, 70) }}
                                    @endif
                                </h1>

                                <p id="blog_desc" style="word-wrap:break-word">
                                    {{ substr($post_data->description, 0, 120) }}
                                    <a href="{{ url("/blog/detail/$post_data->id") }}">see more</a>
                                </p>
                                {{-- blog main section end --}}
                            </div>

                        </div>
                    @endif

                @endforeach
                {!! $posts_data->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>

        {{-- blog section end --}}


        {{-- report list --}}
        @foreach ($posts_data as $post_data)
            <div class="modal fade" id="exampleModal{{ $post_data->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                <span class="text-danger">Report Reason</span>
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <form name="editForm" id="myEditForm" method="post"
                            action="{{ url("/report/$post_data->id") }}">
                            @csrf
                            <div class="modal-body">

                                <div class="my-2">
                                    <label for="report_type"><span class="text-danger">Choice Report</span></label>

                                    <select name="report_type" id="report_type" class="form-control">

                                        @foreach ($reports_data as $report_data)
                                            <option value="{{ $report_data->reason }}">
                                                <span class="text-danger">{{ $report_data->reason }}</span>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="my-2">
                                    <label for="report_reason">
                                        <span class="text-danger">Reason</span>
                                    </label>
                                    <textarea type="text" class="form-control" id="report_reason" name="report_reason"></textarea>
                                    <span id="req-edit-des"></span>
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
        {{-- report list end --}}
    </div>
</div>
