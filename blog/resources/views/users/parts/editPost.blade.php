<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit post</title>
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
                Edit Posts
            </div>

            <form action="">
                <div class="card-body">

                    <div class="row my-3">

                        <div class="col-12 col-md-3 create_post_title">
                            Title
                        </div>

                        <div class="col-12 col-md-9">
                            <input type="text" class="form-control">
                        </div>

                    </div>

                    <div class="row my-3">

                        <div class="col-12 col-md-3 create_post_title">
                            Image
                        </div>

                        <div class="col-12 col-md-9">
                            <input type="file" class="form-control">
                        </div>

                    </div>
                    <div class="row my-3">

                        <div class="col-12 col-md-3 create_post_title">
                            Category
                        </div>

                        <div class="col-12 col-md-9">
                            <select name="" id="" class="form-control">
                                <option value="">Type 1</option>
                                <option value="">Type 2</option>
                                <option value="">Type 3</option>
                            </select>
                        </div>

                    </div>

                    <div class="row my-3">

                        <div class="col-12 col-md-3 create_post_title">
                            Description
                        </div>

                        <div class="col-12 col-md-9">
                            <textarea cols="30" class="form-control"></textarea>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <div class="text-center">
                        <button class="btn_create_post_style btn btn-outline-danger">Reset</button>

                        <button class="btn_create_post_style btn btn-outline-primary">Create</button>

                    </div>
                </div>

            </form>

        </div>

    </div>

    {{-- create post section end --}}




    {{-- js link --}}
    <script src="bs/js/index.js"></script>
</body>

</html>
