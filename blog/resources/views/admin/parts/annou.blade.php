<div class="container">

    <div class="report_bar_style text-center">
        <span class="report_title">Write Any Announcement</span>
    </div>

    <form method="post" action="/settingside">
        @csrf
        <input type="hidden" class="form-control" name="key_data" value="Announcement">
        <div class="my-2">
            <textarea name="value_data" id="Announcement"  rows="7" class="form-control">{{$annou_data[0]->Announcement}}</textarea>
        </div>
        <div class="my-2 text-center">
            <button type="reset" class="btn btn-outline-danger">Reset</button>
            <button type="submit" class="btn btn-outline-primary">Announcement</button>
        </div>
    </form>
</div>
