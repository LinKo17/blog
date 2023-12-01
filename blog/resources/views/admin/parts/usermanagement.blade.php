<div class="container  mt-3 comments_contaiener">
    <form method="POST" class="input-group">
        @csrf
        <input type="text" class="form-control" name="search">
        <button class="btn btn-outline-primary">Search</button>
    </form>
</div>

<table class="table table-striped table-bordered table-hover mt-3 table_userm_style">

    <tr>
        <th class="user_id_style">id</th>
        <th class="user_name_style">Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    {{count($postData)}}
    @foreach ($usersData as $userData)
        <tr>
            <td class="user_id_style">{{ $userData->id }}</td>
            <td class="user_name_style">{{ $userData->name }}</td>

            @if ($userData->user_roll == 'admin')
                <td class="bg-primary">
                    <span class="usermanagement_first_style">{{ substr($userData->email, 0, 40) }}</span>
                    <span class="usermanagement_sec_style">{{ substr($userData->email, 0, 30) }}</span>
                    <span class="usermanagement_third_style">{{ substr($userData->email, 0, 17) }}</span>
                </td>
            @elseif($userData->ban == 0)
                <td>
                    <span class="usermanagement_first_style">{{ substr($userData->email, 0, 40) }}</span>
                    <span class="usermanagement_sec_style">{{ substr($userData->email, 0, 30) }}</span>
                    <span class="usermanagement_third_style">{{ substr($userData->email, 0, 17) }}</span>
                </td>
            @else
                <td class="bg-warning">
                    <span class="usermanagement_first_style">{{ substr($userData->email, 0, 40) }}</span>
                    <span class="usermanagement_sec_style">{{ substr($userData->email, 0, 30) }}</span>
                    <span class="usermanagement_third_style">{{ substr($userData->email, 0, 17) }}</span>
                </td>
            @endif

            <td>
                <button class="btn btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#userModel{{ $userData->id }}">Detail</button>
            </td>
        </tr>
    @endforeach
</table>
{!! $usersData->withQueryString()->links('pagination::bootstrap-5') !!}
{{-- model box section --}}


<!-- Modal -->
@foreach ($usersData as $userData)
    <div class="modal fade" id="userModel{{ $userData->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">User's Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row my-1">
                        <div class="col-3">Role</div>
                        <div class="col-9">: <span class="badge bg-secondary">{{ $userData->user_roll }}</span></div>
                    </div>

                    <div class="row my-1">
                        <div class="col-3">Name</div>
                        <div class="col-9" style="word-break: break-all">: {{ $userData->name }}</div>
                    </div>

                    <div class="row my-1">
                        <div class="col-3">Email</div>
                        <div class="col-9">:
                            <a href="{{ url("/profile/$userData->id") }}" style="word-break: break-all"
                                id="nav_user_search_name">{{ $userData->email }}</a>
                        </div>
                    </div>

                    <div class="row my-1">
                        <div class="col-3">Age</div>
                        <div class="col-9">: {{ $userData->date_of_birth }}</div>
                    </div>

                    <div class="row my-1">
                        <div class="col-3">Bio</div>
                        <div class="col-9" style="word-break: break-all">: {{ $userData->bio }}</div>
                    </div>

                    <div class="row my-1">
                        <div class="col-3">Education</div>
                        <div class="col-9" style="word-break: break-all">: {{ $userData->education }}</div>
                    </div>

                    {{-- button section --}}
                    <div class="my-2" style="margin-left:150px;">
                        <div class="input-group text-center dropdown">

                            <a href="#" class="btn btn-outline-success" data-bs-toggle="dropdown">Role</a>
                            <div class="dropdown-menu">

                                <a href="/userRole/{{ $userData->id }}" class="dropdown-item text-center"
                                    value="0">user</a>

                                <a href="/adminRole/{{ $userData->id }}" class="dropdown-item text-center"
                                    value="1">admin</a>

                            </div>

                            @if ($userData->user_roll != 'admin')
                                @if ($userData->ban == 0)
                                    <a href="/user/ban/{{ $userData->id }}" class="btn btn-outline-warning">Ban</a>
                                @else
                                    <a href="/user/unban/{{ $userData->id }}" class="btn btn-warning">Unban</a>
                                @endif
                            @endif

                            <a href="/user/delete/{{ $userData->id }}" class="btn btn-outline-danger"
                                onclick="return confirm('Are you sure?')">Delete</a>


                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                </div>
            </div>
        </div>
    </div>
@endforeach
{{-- model box section --}}

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
