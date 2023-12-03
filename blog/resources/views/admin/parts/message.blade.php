<div class="container  mt-3 comments_contaiener">
    <form method="POST" class="input-group">
        @csrf
        <input type="text" class="form-control" name="search">
        <button class="btn btn-outline-primary">Search</button>
    </form>
</div>

<div class="container">
    <div class="float-end border rounded-2 d-flex">

        {{-- -------------------------------- --}}
            @php
                $id = [];

                foreach($messages as $msg){
                    $id[] =$msg->id;
                }
            @endphp
        {{-- -------------------------------- --}}

        <div class="bg-light fs-3 px-3">{{count($messages)}}</div>

        <div class="px-3 message_trash">
            <form action="{{url("/message/delete")}}" method="post">
                @csrf
                <input type="hidden" value="<?php print_r(json_encode($id)) ?>" name="data">
                <button style="background: none; border:none">
                    <i class="fa-solid fa-trash text-danger"></i>
                </button>
            </form>
        </div>

    </div>
</div>

<div class="container mt-5">
    @php
        $messageExit = false;
    @endphp

    @foreach ($messages as $msg)
        @php
            $messageExit = true;
        @endphp
        <div class="message_body border p-2 rounded-2 my-2">

            <div class="message_user_email ">
                <span class="badge bg-danger">{{ $msg->id }}</span>
                <a href="{{ url("/profile/$msg->user_id") }}" class="p-1  border rounded-1 bg-light">
                    <span class="usermanagement_first_style">
                        {{ substr($msg->user->email, 0, 40) }}
                    </span>
                    <span class="usermanagement_sec_style">
                        {{ substr($msg->user->email, 0, 30) }}
                    </span>
                    <span class="usermanagement_third_style">
                        {{ substr($msg->user->email, 0, 17) }}
                    </span>
                </a>
            </div>

            <div class="text-muted">
                {{ $msg->created_at->diffForHumans() }}
            </div>

            <div class="message_body text-light">
                {{ substr($msg->reason, 0, 50) }}
                <br>
                <a href="{{ url("message/detail/$msg->id") }}" class="btn btn-secondary ">Detail</a>
                <a href="{{ url("message/delete/$msg->id") }}" class="text-danger">
                    <i class="fa-solid fa-trash "></i>
                </a>
            </div>
        </div>
    @endforeach


    @if (!$messageExit)
        <div class="border text-light rounded fs-3 p-3 text-center">
            Empty!!!
        </div>
    @endif


    {!! $messages->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
