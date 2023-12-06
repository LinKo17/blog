<div class="container mt-3 dashboard_daily_chart">
    <div class="text-center fs-4 text-light">Daily Activity</div>
    <canvas id="daily"></canvas>
</div>

<div class="row mt-5">
    <div class="text-center fs-4 text-light">Details Section</div>

    <div class="col-12 col-md-4 col-lg-3 p-2">
        <div class=" main_box_style text-center">
            <h1>{{count($users)}}</h1>
            <p class="text-muted">Total Users</p>
        </div>
    </div>

    <div class="col-12 col-md-4 col-lg-3 p-2">
        <div class=" main_box_style text-center">
            <h1>{{count($posts)}}</h1>
            <p class="text-muted">Total Posts</p>
        </div>
    </div>

    <div class="col-12 col-md-4 col-lg-3 p-2">
        <div class=" main_box_style text-center">
            <h1>{{count($comments) + count($replies)}}</h1>
            <p class="text-muted">Total Comments</p>
        </div>
    </div>

    <div class="col-12 col-md-4 col-lg-3 p-2">
        <div class=" main_box_style text-center">
            <h1>{{count($categories)}}</h1>
            <p class="text-muted">Total Categories</p>
        </div>
    </div>

    <div class="col-12 col-md-4 col-lg-3 p-2">
        <div class=" main_box_style text-center">
            <h1>{{ count($advertisements) }}</h1>
            <p class="text-muted">Total Advertisements Left</p>
        </div>
    </div>


    <div class="col-12 col-md-4 col-lg-3 p-2">
        <div class=" main_box_style text-center">
            <h1>{{count($ban)}}</h1>
            <p class="text-muted">Total Banned Person</p>
        </div>
    </div>

</div>

<div class="container mt-3" id="dashboard_dayByDay_chart">
    <div class="text-center fs-4">WEEKLY USERS</div>
    <canvas id="dayByDay"></canvas>
</div>

<div class="container  mt-3" id="dashboard_monthly_chart">
    <div class="text-center fs-4">MONTHLY USERS</div>
    <canvas id="monthly"></canvas>
</div>





