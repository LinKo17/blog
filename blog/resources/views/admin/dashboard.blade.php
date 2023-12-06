<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
                @include('admin.parts.main')
                {{-- main section --}}

            </div>

        </div>
    </div>

    {{-- chart.js link --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    {{-- jquery link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- js link --}}
    <script src="bs/js/dashboard.js"></script>
</body>

</html>
{{-- <script>
    document.getElementById("dashboard").style.backgroundColor = "#000000"

  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Sun','Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
      datasets: [{
        label: '# of Votes',
        data: [20000,1200000, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

</script> --}}
<script>
    document.getElementById("dashboard").style.backgroundColor = "#000000";
    // ---------- daily activies section
    const ctx = document.getElementById('daily');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Users', 'Posts', 'Comments', 'Replies'],
            datasets: [{
                label: 'Daily Activity',
                data: [
                    {{ $dailyUsers }},
                    {{ $dailyPosts }},
                    {{ $dailyComments }},
                    {{ $dailyReplies }},
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    // ---------- daily activies section

    // ---------- month
    const monthly = document.getElementById('monthly');

    new Chart(monthly, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labels) !!},
            datasets: [{
                label: 'Daily Activity',
                data: {!! json_encode($datasets[0]['data']) !!}, // Access the data property correctly
                // backgroundColor: {!! json_encode($datasets[0]['backgroundColor']) !!}
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // ---------- month

    // ------- dayByDay
    const dayByDay = document.getElementById('dayByDay');

    new Chart(dayByDay, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labelsBydaily) !!},
            datasets: [{
                label: 'Daily Activity',
                data: {!! json_encode($datasetsByDaily[0]['dataBydaily']) !!},
                backgroundColor: {!! json_encode($datasetsByDaily[0]['colorsBydaily']) !!}
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // ------- dayByDay
    let dashboard_dayByDay_chart = document.getElementById("dashboard_dayByDay_chart")
    let dashboard_monthly_chart  = document.getElementById("dashboard_monthly_chart")

    dashboard_dayByDay_chart.onclick = function(){
        dashboard_dayByDay_chart.style.display = "none"
        dashboard_monthly_chart.style.display  = "block"
    }

    dashboard_monthly_chart.onclick = function(){
        dashboard_dayByDay_chart.style.display = "block"
        dashboard_monthly_chart.style.display  = "none"
    }

    // ---- chart hide section

</script>
