<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
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

    {{-- create post section --}}

    <div class="container user_create_style mt-3">
        <div class="card">

            <div class="card-header fs-4 text-light bg-primary">
                Connect To Admin
            </div>

            {{-- ------error section ------ --}}
            @if ($errors->any())


                @foreach ($errors->all() as $err)
                    @php
                        $string = $err;

                        // Use regular expression to extract the numeric part
                        preg_match('/(\d+)/', $string, $matches);

                        // Check if a match is found and get the value
                        $number = isset($matches[1]) ? $matches[1] : null;

                        // Output the result

                    @endphp
                    <div class=" text-danger" style="font-size:20px">
                        {{ '* ' . str_replace($number, '', $err) }}
                    </div>
                @endforeach

            @endif()
            {{-- ------error section ------ --}}


            {{-- message section --}}
            @if(session("info"))
            <span class="text-success">{{"* " . session("info")}}</span>
            @endif
            {{-- message section end --}}

            <form method="post" enctype="multipart/form-data">
                @csrf


                <div class="card-body">


                    <div class="row my-3">

                        <div class="col-12 col-md-3 create_post_title">
                            Image
                        </div>

                        <div class="col-12 col-md-9">
                            <input type="file" class="form-control" name="images[]" multiple>
                        </div>

                    </div>

                    <div class="row my-3">

                        <div class="col-12 col-md-3 create_post_title">
                            Description
                        </div>

                        <div class="col-12 col-md-9">
                            <textarea cols="30" class="form-control @error('description') is-invalid @enderror" name="description" required></textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <div class="text-center">
                        <button type="reset" class="btn_create_post_style btn btn-outline-danger">Reset</button>

                        <button type="submit" class="btn_create_post_style btn btn-outline-primary">Create</button>

                    </div>
                </div>

            </form>

        </div>

    </div>

    {{-- create post section end --}}

    {{-- js link --}}

    <script>
        document.getElementById("home").style.color = "#0066cc"


        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
</body>

</html>
