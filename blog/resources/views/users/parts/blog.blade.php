<div id="blog">
    <div class="container">
        <h5 class="h1 text-center mt-5">Blogs</h5>
        <div class="container about_line"></div>

        {{-- blog section --}}
        <div class="row">
            @for ($i = 1; $i <= 6; $i++)
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
                                <div class="dropdown-menu dropdown-menu-end">

                                    <a href="#" class="dropdown-item text-center" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Report</a>

                                    <a href="#" class="dropdown-item text-center">Hide</a>
                                </div>
                            </div>

                        </div>
                        {{-- blog header section end --}}



                        {{-- blog main section --}}
                        <div id="image_container">
                            <img src="https://th.bing.com/th/id/OIP.4XB8NF1awQyApnQDDmBmQwHaEo?rs=1&pid=ImgDetMain "
                                alt="">
                        </div>

                        <h1 id="blog_title">Lorem ipsum dolor, sit amet consectetur             adipisicing     elit. Distinctio
                            inventore...
                        </h1>

                        <p id="blog_desc">Lorem ipsum dolor, sit amet consectetur adipisicing   elit. Ullam cum id error tempore
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
                            <span class="text-danger">Report Reason</span>
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form name="editForm" id="myEditForm">
                        <div class="modal-body">

                            <div class="my-2">
                                <label for="report_type"><span class="text-danger">Choice Report</span></label>

                                <select name="report_type" id="report_type" class="form-control">

                                    <option value="1">
                                        <span class="text-danger">Reason One</span>
                                    </option>

                                    <option value="2">
                                        <span class="text-danger">Reason Two</span>
                                    </option>

                                    <option value="3">
                                        <span class="text-danger">Reason Three</span>
                                    </option>

                                </select>
                            </div>

                            <div class="my-2">
                                <label for="description">
                                    <span class="text-danger">Reason</span>
                                </label>
                                <textarea type="text" class="form-control" id="description" name="description"></textarea>
                                <span id="req-edit-des"></span>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Confirm</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        {{-- report list end --}}
    </div>
</div>
