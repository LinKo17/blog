<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>setting</title>
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


    {{-- navbar section end --}}

    {{-- edit section --}}
    <div class="container">

        <div class="my-2">

            <form method="POST" enctype="multipart/form-data" action="setting/pfImg">
                @csrf
                <label for="pf_image">Profile Image</label>
                <div class="input-group mt-2">

                    <input type="hidden" class="form-control" name="id" value="{{ auth()->user()->id }}">


                    <input type="file" class="form-control" id="pf_image" name="pf_image">
                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="setting/bio" method="post">
                @csrf
                <label for="bio">Bio</label>
                <div class="input-group mt-2">

                    <input type="hidden" class="form-control" name="id" value="{{ auth()->user()->id }}">

                    <input type="text" class="form-control" id="bio" name="bio"
                        placeholder="No more than 100 letters" value="{{ $user_setting_data->bio ?? '' }}">

                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="setting/date_of_birth" method="post">
                @csrf
                <label for="date_of_birth">Date of Birth</label>
                <div class="input-group mt-2">

                    <input type="hidden" class="form-control" name="id" value="{{ auth()->user()->id }}">

                    <input type="text" class="form-control" id="date_of_birth"
                        placeholder="exmaple(11.20.2023) No more than 50 letters" name="date_of_birth"
                        value="{{ $user_setting_data->date_of_birth ?? '' }}">

                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="setting/edu" method="post">
                @csrf
                <label for="education">Education</label>
                <div class="input-group mt-2">
                    <input type="hidden" class="form-control" name="id" value="{{ auth()->user()->id }}">


                    <input type="text" class="form-control" id="education" placeholder="No more than 100 letters"
                        name="education" value="{{ $user_setting_data->education ?? '' }}">

                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="setting/workAt" method="post">
                @csrf
                <label for="work">Work at</label>
                <div class="input-group mt-2">

                    <input type="hidden" class="form-control" name="id" value="{{ auth()->user()->id }}">

                    <input type="text" class="form-control" id="work" placeholder="No more than 100 letters"
                        name="work" value="{{ $user_setting_data->work ?? '' }}">

                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="setting/live" method="post">
                <label for="live">Live</label>
                <div class="input-group mt-2">
                    @csrf
                    <input type="hidden" class="form-control" name="id" value="{{ auth()->user()->id }}">

                    <input type="text" class="form-control" id="live" placeholder="No more than 100 letters"
                        name="live" value="{{ $user_setting_data->live ?? '' }}">

                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-4 profile_email_hide">
            <span class="comments_email_style">Kyaw@gmail.com</span>

            @if ($user_setting_data->email_action == 1)
                <a href="setting/emailClose/{{ $user_setting_data->id }}"
                    class="btn btn-outline-info float-end">Close</a>
            @else
                <a href="setting/emailOpen/{{ $user_setting_data->id }}"
                    class="btn btn-outline-success float-end">Open</a>
            @endif

        </div>

    </div>

    {{-- edit section end --}}










    {{-- js link --}}
    <script src="bs/js/index.js"></script>
</body>

</html>
