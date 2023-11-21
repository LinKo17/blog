<div id="blog">
    <div class="container">
        {{-- <h5 class="h1 text-center mt-5 text-light">Reports</h5>
        <div class="container about_line"></div> --}}

        <div class="report_bar_style text-center">
            <span class="report_title">Reports</span>
            <span class="report_number badge bg-danger">5</span>
        </div>

        {{-- blog section --}}
        <div class="row">
            @for ($i = 1; $i <= 2; $i++)
                <div class=" col-lg-4 col-md-6  col-12 p-2"> {{-- to seperate outer line --}}

                    <div class="border p-2" id="blog_style"> {{-- for main border --}}

                        {{-- blog header section --}}
                        <div class="row">

                            <div class="col-11 ">

                                <img src="https://th.bing.com/th/id/OIP.4XB8NF1awQyApnQDDmBmQwHaEo?rs=1&pid=ImgDetMain "
                                    alt="" id="blog_profile">

                                <h1 id="blog_name">name</h1>

                                <p class="text-muted" id="blog_time">19.11.2023</p>
                            </div>

                            <div class="col-1 dropdown">

                                <i class="fa-solid fa-ellipsis float-end" data-bs-toggle="dropdown"></i>

                                <div class="dropdown-menu">

                                    <a href="#" class="dropdown-item text-center">
                                        Reports : <span class="badge bg-danger">4</span>
                                    </a>
                                    <a href="#" class="dropdown-item text-center" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Report Reason</a>

                                    <a href="#" class="dropdown-item text-center">Email</a>

                                    <a href="#" class="dropdown-item text-center"><span class="text-danger">Delete</span></a>

                                    <a href="#" class="dropdown-item text-center">Back</a>
                                </div>
                            </div>

                        </div>
                        {{-- blog header section end --}}



                        {{-- blog main section --}}
                        <div id="image_container">
                            <img src="https://th.bing.com/th/id/OIP.4XB8NF1awQyApnQDDmBmQwHaEo?rs=1&pid=ImgDetMain "
                                alt="">
                        </div>

                        <h1 id="blog_title">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio
                            inventore...
                        </h1>

                        <p id="blog_desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam cum id error
                            tempore
                            <a href="">see more</a>
                        </p>
                        {{-- blog main section end --}}
                    </div>

                </div>
            @endfor
        </div>
        {{-- blog section end --}}


        {{-- report list --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                            <span class="text-primary">Post Edit</span>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form name="editForm" id="myEditForm">
                        <div class="modal-body">

                            <div class="my-2">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title">

                            </div>

                            <div class="my-2">

                                <label for="category">Category</label>

                                <select name="category" id="category" class="form-control">
                                    <option value="">Type 1</option>
                                    <option value="">Type 2</option>
                                    <option value="">Type 3</option>
                                </select>


                            </div>


                            <div class="my-2">

                                <label for="category">Role</label>

                                <select name="role" id="role" class="form-control">
                                    <option value="">Admin</option>
                                    <option value="">Normal</option>
                                </select>


                            </div>

                            <div class="my-2">
                                <label for="description">Description</label>
                                <textarea type="text" class="form-control" id="description" name="description"></textarea>
                                <span id="req-edit-des"></span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- report list end --}}
    </div>
</div>
