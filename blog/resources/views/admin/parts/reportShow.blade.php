<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports Detail</title>
    <base href="/public">

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
    @foreach ($postReports->reports as $reports)
        <div class="container mt-4">
            <div class=" p-3 rounded-3 bg-dark" id="report_detail_box">

                <img src="profile_pics/{{ $postReports->user->profile_pic }}" id="report_detail_image_style">


                <h1 id="report_detail_name_style">
                    {{-- {{ $postReports->user->name }} --}}

                    @if (strlen($postReports->user->name) > 39)
                        {{ substr($postReports->user->name, 0, 37) }}...
                    @else
                        {{ substr($postReports->user->name, 0, 40) }}
                    @endif

                </h1>


                <p class="text-muted" id="report_detail_time_style">{{ $reports->created_at->diffForHumans() }}</p>

                <br>
                <span class="badge bg-danger" id="report_detail_type_style">{{ $reports->report_type }}</span>

                <p id="report_detail_words_style">{{ $reports->report_reason }}</p>
                <a href="{{ url("/blog/detail/$postReports->id") }}" class='btn btn-secondary'>See Post</a>
            </div>
        </div>
    @endforeach





</body>

</html>
