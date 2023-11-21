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

    {{-- navbar section --}}
    @include('users.parts.nav')
    {{-- navbar section end --}}

    {{-- edit section --}}
    <div class="container">
        <div class="my-2">

            <form action="">
                <label for="pf_image">Profile Image</label>
                <div class="input-group mt-2">
                    <input type="file" class="form-control" id="pf_image">
                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="">
                <label for="bio">Bio</label>
                <div class="input-group mt-2">
                    <input type="text" class="form-control" id="bio" placeholder="No more than 100 letters">
                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="">
                <label for="date_of_birth">Date of Birth</label>
                <div class="input-group mt-2">
                    <input type="text" class="form-control" id="date_of_birth" placeholder="exmaple(11.20.2023) No more than 50 letters">
                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="">
                <label for="education">Education</label>
                <div class="input-group mt-2">
                    <input type="text" class="form-control" id="education" placeholder="No more than 100 letters">
                    <button class="btn btn-outline-dark" >Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="">
                <label for="work">Work at</label>
                <div class="input-group mt-2">
                    <input type="text" class="form-control" id="work" placeholder="No more than 100 letters">
                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-2">

            <form action="">
                <label for="live">Live</label>
                <div class="input-group mt-2">
                    <input type="text" class="form-control" id="live" placeholder="No more than 100 letters">
                    <button class="btn btn-outline-dark">Edit</button>
                </div>
            </form>

        </div>

        <div class="my-4 profile_email_hide">
            <span class="comments_email_style">Kyaw@gmail.com</span>
            <button class="btn btn-outline-info float-end">Close</button>
            <button class="btn btn-outline-success float-end">Open</button>

        </div>

    </div>

    {{-- edit section end --}}










    {{-- js link --}}
    <script src="bs/js/index.js"></script>
</body>

</html>
