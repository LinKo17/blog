<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
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
        @include("users.parts.nav")
    {{-- navbar section end --}}


    {{-- about us section --}}
        @include("users.parts.about")
    {{-- about us section end --}}



    {{-- footer section --}}
        @include("users.parts.footer")
    {{-- footer section end --}}


    {{-- end section --}}
        @include("users.parts.end")
    {{-- end section end --}}



    {{-- js link --}}
    <script src="bs/js/index.js"></script>
</body>

<script>
    document.getElementById("about").style.color = "#0066cc"
</script>

</html>
