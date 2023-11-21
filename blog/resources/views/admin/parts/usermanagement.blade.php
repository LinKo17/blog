<table class="table table-striped table-bordered table-hover mt-3 table_userm_style">
    <tr>
        <th class="user_id_style">id</th>
        <th class="user_name_style">Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <tr>
        <td class="user_id_style">1</td>
        <td class="user_name_style">Kyaw</td>
        <td>Kyaw@gamil.com</td>
        <td>
            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Detail</button>
        </td>
    </tr>
</table>

{{-- model box section --}}


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">User's Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row my-1">
                    <div class="col-3">Role</div>
                    <div class="col-9">: User</div>
                </div>

                <div class="row my-1">
                    <div class="col-3">Name</div>
                    <div class="col-9">: Kyaw</div>
                </div>

                <div class="row my-1">
                    <div class="col-3">Email</div>
                    <div class="col-9">: Kyaw@gamil.com</div>
                </div>

                <div class="row my-1">
                    <div class="col-3">Age</div>
                    <div class="col-9">: 19</div>
                </div>

                <div class="row my-1">
                    <div class="col-3">Bio</div>
                    <div class="col-9">: no one can beat me</div>
                </div>

                <div class="row my-1">
                    <div class="col-3">Education</div>
                    <div class="col-9">: PHD</div>
                </div>

                <div class="row my-1">
                    <div class="col-3">Post</div>
                    <div class="col-9">: 2</div>
                </div>

                <div class="row my-1">
                    <div class="col-3">Comments</div>
                    <div class="col-9">: 10</div>
                </div>

                <div class="row my-1">
                    <div class="col-3">Reports </div>
                    <div class="col-9">: 1</div>
                </div>

                <div class="my-2" style="margin-left:150px;">
                    <div class="input-group text-center">
                        <a href="" class="btn btn-outline-success">Role</a>
                        <a href="" class="btn btn-outline-warning">Ban</a>
                        <a href="" class="btn btn-outline-danger">Delete</a>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
            </div>
        </div>
    </div>
</div>
{{-- model box section --}}
