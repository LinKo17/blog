<div class="row mt-5">

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

<div class="row mt-3">

    <div class="col-md-4 col-12 p-2">
        <div class=" main_box_style text-center">
            <h1>{{ count($dailyUsers) }}</h1>
            <p class="text-muted">Daily Users</p>
        </div>
    </div>

    <div class="col-md-4 col-12 p-2">
        <div class=" main_box_style text-center">
            <h1>{{ count($dailyPosts) }}</h1>
            <p class="text-muted">Daily Posts</p>
        </div>
    </div>

    <div class="col-md-4 col-12 p-2">
        <div class=" main_box_style text-center">
            <h1>{{count($dailyComments) + count($dailyReplies)}}</h1>
            <p class="text-muted">Total Daily Comments</p>
        </div>
    </div>
</div>
