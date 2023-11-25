@if ($errors->any())
    @foreach ($errors->all() as $err)
        <div class="alert bg-danger mt-1">{{ $err }}</div>
    @endforeach
@endif

<div class="container  mt-4 category_create_style">
    <form action="" method="post">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" name="category" placeholder="Create Category">
            <button class="btn btn-outline-primary">Add</button>
        </div>
    </form>
</div>

<div class="container category_container mt-4">

    @foreach ($categories as $category)
        <div class="row">
            <div class="col-10">
                <span class="text_category">{{ $category->category }}</span>
            </div>
            <div class="col-2">
                <span class="logo_category">
                    <a href='{{ url("/categories/delete/$category->id") }}' data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="text-danger fa-solid fa-trash float-end"></i>
                    </a>
                </span>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        You are trying to delete  ({{$category->category}}) category !
                        Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="{{ url("/categories/delete/$category->id") }}" type="button"
                            class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



</div>
