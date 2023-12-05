@if(session("info-success"))
<div class="container alert text-center text-success my-2">
    {{session("info-success")}}
</div>
@endif

@if(session("info-wrong"))
<div class="container  alert text-center text-danger my-2">
    {{session("info-wrong")}}
</div>
@endif

<div class="container">
    <form method="post" action="{{url("/email")}}">
        @csrf

        <div class="row my-3">

            <div class="col-12 col-md-3 text-light">
                Email Address
            </div>
            <div class="col-12 col-md-9">
                <input type="email" class="form-control input-style" name="email_address" required>
            </div>
        </div>

        <div class="row my-3">

            <div class="col-12 col-md-3 text-light">
                Email Greeting
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control input-style" name="email_greeting">
            </div>
        </div>


        <div class="row my-3">

            <div class="col-12 col-md-3 text-light">
                Email First Line
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control input-style" name="email_first_line">
            </div>
        </div>

        <div class="row my-3">

            <div class="col-12 col-md-3 text-light">
                Email Body
            </div>
            <div class="col-12 col-md-9">
                <textarea type="text" class="form-control input-style" name="email_body"></textarea>
            </div>
        </div>

        <div class="row my-3">

            <div class="col-12 col-md-3 text-light">
                Email Button Name
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control input-style" name="email_button_name">
            </div>
        </div>

        <div class="row my-3">

            <div class="col-12 col-md-3 text-light">
                Email Url
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control input-style" name="email_url">
            </div>
        </div>

        <div class="row my-3">

            <div class="col-12 col-md-3 text-light">
                Email Last Line
            </div>
            <div class="col-12 col-md-9">
                <input type="text" class="form-control input-style" name="email_last_line">
            </div>
        </div>

        <div class="my-4 text-center">

            <button type="reset" class="btn btn-danger  btn-lg">Reset</button>
            <button type="submit"      class="btn btn-primary  btn-lg">Send</button>
        </div>

    </form>
</div>
