<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    {{-- bs css link --}}
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">

    {{-- bs js link --}}
    <script src="bs/js/bootstrap.bundle.js"></script>

    {{-- font-awesome link --}}
    <link rel="stylesheet" href="bs/css/all.min.css">

    {{-- css link --}}
    <link rel="stylesheet" href="bs/css/dashboard.css">
</head>

<body>

    {{-- navbar section --}}
    @include('admin.parts.navbar')
    {{-- navbar section end --}}

    <div class="container-fluid">

        <div class="row">

            <div class="col-2  g-0">

                {{-- sider section --}}
                @include('admin.parts.sider')
                {{-- sider section end --}}

            </div>

            <div class="col-10">

                {{-- main section --}}
                    @include("admin.parts.category")
                {{-- main section --}}

            </div>

        </div>
    </div>




    {{-- js link --}}
    <script src="bs/js/dashboard.js"></script>
</body>
<script>
    document.getElementById("category").style.backgroundColor = "#000000"
</script>

</html>
