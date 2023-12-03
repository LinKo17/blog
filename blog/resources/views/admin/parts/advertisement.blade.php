<h1 class="text-light  text-center">Advertisement</h1>

<?php
$adver_1 = $adver_data[0] ?? "";

$adver_2 = $adver_data[1] ?? "";

$adver_3 = $adver_data[2] ?? "";

$adver_4 = $adver_data[3] ?? "";

$adver_5 = $adver_data[4] ?? "";
?>

{{-- ad->1 --}}
<div class="container adver_container g-0 my-5">

    <div class="adver_title text-center p-2">
        Advertisement 1
    </div>

    <div class="adver_image">
        <img src="/advertisementImg/{{$adver_1->adver_image ?? ""}}" >
    </div>

    <div class="adver_create">
        <form  method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control mt-2" name="adver_img">

            <input type="hidden" value="1" name="adver_id">
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-outline-primary" name="adver">Create</button>
                <a href="/advertisements/delete/1" class="btn btn-outline-danger">Delete</a>
            </div>
        </form>
    </div>
</div>

{{-- ad->2 --}}
<div class="container adver_container g-0 my-5">

    <div class="adver_title text-center p-2">
        Advertisement 2
    </div>

    <div class="adver_image">
        <img src="/advertisementImg/{{$adver_2->adver_image ?? ""}}" >
    </div>

    <div class="adver_create">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control mt-2" name="adver_img">

            <input type="hidden" value="2" name="adver_id">
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-outline-primary" name="adver">Create</button>
                <a href="/advertisements/delete/2" class="btn btn-outline-danger">Delete</a>
            </div>
        </form>
    </div>
</div>

{{-- ad->3 --}}
<div class="container adver_container g-0 my-5">

    <div class="adver_title text-center p-2">
        Advertisement 3
    </div>

    <div class="adver_image">
        <img src="/advertisementImg/{{$adver_3->adver_image ?? ""}}" >
    </div>

    <div class="adver_create">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control mt-2" name="adver_img">

            <input type="hidden" value="3" name="adver_id">
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-outline-primary" name="adver">Create</button>
                <a href="/advertisements/delete/3" class="btn btn-outline-danger">Delete</a>
            </div>
        </form>
    </div>
</div>

{{-- ad->4 --}}
<div class="container adver_container g-0 my-5">

    <div class="adver_title text-center p-2">
        Advertisement 4
    </div>

    <div class="adver_image">
        <img src="/advertisementImg/{{$adver_4->adver_image ?? ""}}" >
    </div>

    <div class="adver_create">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control mt-2" name="adver_img">

            <input type="hidden" value="4" name="adver_id">
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-outline-primary" name="adver">Create</button>
                <a href="/advertisements/delete/4" class="btn btn-outline-danger">Delete</a>
            </div>
        </form>
    </div>
</div>

{{-- ad->5 --}}
<div class="container adver_container g-0 my-5">

    <div class="adver_title text-center p-2">
        Advertisement 5
    </div>

    <div class="adver_image">
        <img src="/advertisementImg/{{$adver_5->adver_image ?? ""}}" >
    </div>

    <div class="adver_create">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" class="form-control mt-2" name="adver_img">

            <input type="hidden" value="5" name="adver_id">
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-outline-primary" name="adver">Create</button>
                <a href="/advertisements/delete/5" class="btn btn-outline-danger">Delete</a>
            </div>
        </form>
    </div>
</div>

