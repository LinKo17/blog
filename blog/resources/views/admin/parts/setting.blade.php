<div class="container">

    <div class="my-3">
        <label for="email" class="text-light">Email_1</label>
        <form  class="input-group mt-1" method="post">
            @csrf
            <input type="hidden" class="form-control" name="key_data" value="email_1">
            <input type="gmail" class="form-control" name="value_data" value="{{$admin_setting->email_1}}">
            <button class="btn btn-outline-success">Edit</button>
        </form>
    </div>

    <div class="my-3">
        <label for="email" class="text-light">Email_2</label>
        <form action="" class="input-group mt-1" method="post">
            @csrf
            <input type="hidden" class="form-control" name="key_data" value="email_2">
            <input type="gmail" class="form-control" name="value_data" value="{{$admin_setting->email_2}}">
            <button class="btn btn-outline-success">Edit</button>
        </form>
    </div>

    <div class="my-3">
        <label for="phone" class="text-light">Phone</label>
        <form action="" class="input-group mt-1" method="post">
            @csrf
            <input type="hidden" class="form-control" name="key_data" value="phone">
            <input type="text" class="form-control"  name="value_data" value="{{$admin_setting->phone}}">
            <button class="btn btn-outline-success">Edit</button>
        </form>
    </div>

    <div class="my-3">
        <label for="address" class="text-light">Address</label>
        <form action="" class="input-group mt-1" method="post">
            @csrf
            <input type="hidden" class="form-control" name="key_data" value="address">
            <input type="text" class="form-control" name="value_data" value="{{$admin_setting->address}}">
            <button class="btn btn-outline-success">Edit</button>
        </form>
    </div>

    <div class="my-3">
        <label for="facebook" class="text-light">facebook</label>
        <form action="" class="input-group mt-1" method="post">
            @csrf
            <input type="hidden" class="form-control" name="key_data" value="facebook">
            <input type="text" class="form-control" name="value_data" value="{{$admin_setting->facebook}}">
            <button class="btn btn-outline-success">Edit</button>
        </form>
    </div>

    <div class="my-3">
        <label for="twitter" class="text-light">twitter</label>
        <form action="" class="input-group mt-1" method="post">
            @csrf
            <input type="hidden" class="form-control" name="key_data" value="twitter">
            <input type="text" class="form-control" name="value_data" value="{{$admin_setting->twitter}}">
            <button class="btn btn-outline-success">Edit</button>
        </form>
    </div>

    <div class="my-3">
        <label for="instagram" class="text-light">Instagram</label>
        <form action="" class="input-group mt-1" method="post">
            @csrf
            <input type="hidden" class="form-control" name="key_data" value="instagram">
            <input type="text" class="form-control" name="value_data" value="{{$admin_setting->instagram}}">
            <button class="btn btn-outline-success">Edit</button>
        </form>
    </div>



</div>
