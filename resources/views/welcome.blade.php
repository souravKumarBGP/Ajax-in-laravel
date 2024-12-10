<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Ajax Testing</title>

        {{-- ************* Include external file link's ************* --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        {{-- ************* Include internal file link's ************* --}}
        <link href="{{ asset("css/style.css") }}" rel="stylesheet" type="text/css" />
        
    </head>
    <body>

        {{-- ******************* Start navbar section ******************* --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ps-5" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-5">
                        <a class="nav-link active me-5" aria-current="page" href="{{ route("homePage") }}">Home</a>
                        <a class="nav-link" href="#">Create</a>
                    </div>
                </div>
            </div>
        </nav>

        {{-- ******************* Strar main section ******************** --}}
        <main>

            {{-- ****** Registration form ****** --}}
            <div class="col-5 mx-auto mt-2">

                <form id="create_new_user_form" action="{{ route("user.create") }}" method="POST" enctype="multipart/form-data">

                    @method("POST")
                    @csrf
                    
                    <div class="row">

                        <div class="col-12">
                            <label for="name">Name:</label>
                            <input type="text" id="name" class="form-control mt-1" name="name" placeholder="First name" value="Sourav Rupani" />
                        </div>

                        <div class="col-12 mt-3">
                            <label for="email">Email:</label>
                            <input type="email" id="email" class="form-control mt-1" name="email" placeholder="Enter email" value="souravkumar201810@gmail.com">
                        </div>

                        <div class="col-12 mt-3">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" class="form-control mt-1" name="phone" placeholder="Enter email" value="9065608408" />
                        </div>

                        <div class="col-12 mt-3">
                            <label for="image">Uplode image</label>
                            <input type="file" class="form-control mt-1" id="image" name="image">
                        </div>

                        <div class="col-12 mt-3">
                            <input type="submit" value="Submit" class="form-control mt-3 bg-primary text-light fw-bold" id="image">
                        </div>

                    </div>
                    
                </form>
            </div>

            <div class="container mt-2 mb-5">
                <div id="user-list">
                    <table id="user-table" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Action Buttons</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Users will be loaded here dynamically -->
                        </tbody>
                    </table>
                
                    <div id="pagination">
                        <!-- Pagination links will be loaded here dynamically -->
                    </div>
                </div>
            </div>
            
        </main>{{-- End of main section --}}


        {{-- *************** Boostrap Modal box **************** --}}
        
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">User Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            {{-- Insert dynamicly data --}}
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="editForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <form id="edit_new_user_form" action="{{ route("user.update") }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                @method("post")
                                <input type="hidden" name="userId" id="userId" />
                                <div class="row">
            
                                    <div class="col-12">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" class="form-control mt-1" name="name" placeholder="First name" />
                                    </div>
            
                                    <div class="col-12 mt-3">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" class="form-control mt-1" name="email" placeholder="Enter email" />
                                    </div>
            
                                    <div class="col-12 mt-3">
                                        <label for="phone">Phone:</label>
                                        <input type="text" id="phone" class="form-control mt-1" name="phone" placeholder="Enter email" />
                                    </div>
            
                                    <div class="col-12 mt-3">
                                        <label for="image">Uplode image</label>
                                        <input type="file" class="form-control mt-1" id="image" name="image">
                                    </div>
            
                                    <div class="col-12 mt-3">
                                        <input type="submit" value="Submit" class="form-control mt-3 bg-primary text-light fw-bold" id="image">
                                    </div>
            
                                </div>
                                
                            </form>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        

        {{-- ****************** Include external file link's ******************* --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>

            $(document).ready(function () {

                // Function to show the users
                function showUsers(page = 1) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('user.show') }}?page=" + page,  // Include the page parameter
                        success: function (response) {
                            // Logic to populate the table with user data
                            let usersHtml = '';
                            $.each(response.users, function (index, user) {
                                usersHtml += `
                                    <tr>
                                        <td>${user.name}</td>
                                        <td>${user.email}</td>
                                        <td>${user.phone}</td>
                                        <td><img src='{{ asset('storage/') }}/${user.image}' width='100' /></td>
                                        <td>
                                            <button type="button" data-userid='${user.id}' class="viewBtn btn rounded-0 btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> View </button>

                                            <button type="button" data-userid='${user.id}' class="editBtn btn rounded-0 btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editForm"> Edit </button>

                                            <button type="button" data-userid='${user.id}' class="deleteBtn btn rounded-0 btn-sm btn-danger"> Delete </button>
                                        </td>
                                        
                                    </tr>
                                `;
                            });
                            $('#user-table tbody').html(usersHtml);

                            // Logic to display pagination links with 'active' class
                            let paginationHtml = '';
                            
                            // Previous button
                            if (response.pagination.current_page > 1) {
                                paginationHtml += `<button class="page-link" data-page="${response.pagination.current_page - 1}">Previous</button>`;
                            }

                            // Page numbers
                            for (let i = 1; i <= response.pagination.last_page; i++) {
                                let activeClass = (i === response.pagination.current_page) ? 'active' : '';
                                paginationHtml += `<button class="page-link ${activeClass}" data-page="${i}">${i}</button>`;
                            }

                            // Next button
                            if (response.pagination.current_page < response.pagination.last_page) {
                                paginationHtml += `<button class="page-link" data-page="${response.pagination.current_page + 1}">Next</button>`;
                            }

                            $('#pagination').html(paginationHtml);
                        }
                    });
                }

                // Initial call to load the first page of users<img src='{{ asset('storage/') }}/${user.image}' width='100' />users
                showUsers();

                // Handle pagination button clicks
                $('#pagination').on('click', '.page-link', function () {
                    const page = $(this).data('page');
                    showUsers(page);
                });

                
                // Logic to view single user
                $(document).on("click", ".viewBtn", function(){

                    let userId = $(this).data("userid");
                    
                    $.ajax({
                        type: "get",
                        url: "{{ route('user.view') }}",
                        data: {"userid":userId},
                        success: function (response) {
                            // console.log(response[0].name);                           

                            // Logic to populate user detals in modal box
                            let userDetailsHtml = "";

                            userDetailsHtml = `
                                <li>Name: <b>${response[0].name}</b> </li><br/>
                                <li>Email: <b>${response[0].email}</b> </li><br/>
                                <li>Phone: <b>${response[0].phone}</b> </li><br/>
                                <li>Image: <img src='{{ asset('storage/') }}/${response[0].image}' width='100' /> </li>
                            `;

                            $(".modal-body ul").html(userDetailsHtml);

                        }
                    });
                    
                });

                
                // Logic to show edit user form with user details
                $(document).on("click", ".editBtn", function(){

                    let userId = $(this).data("userid");
                    
                    $.ajax({
                        type: "get",
                        url: "{{ route('user.view') }}",
                        data: {"userid":userId},
                        success: function (response) {
                            // console.log(response[0].name); 

                            $("#edit_new_user_form #userId").val(response[0].id);
                            $("#edit_new_user_form #name").val(response[0].name);
                            $("#edit_new_user_form #email").val(response[0].email);
                            $("#edit_new_user_form #phone").val(response[0].phone);
                            
                        }
                    });
                    
                });


                // Logic to update user data when user submit update form
                $("#edit_new_user_form").on("submit", function (event) {
                    event.preventDefault();

                    const formData = new FormData(this);

                    $.ajax({
                        type: "post",
                        url: "{{ route('user.update') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {

                            // console.log(response);

                            toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                                "showDuration": "300",
                                "hideDuration": "5000",
                                "extendedTimeOut": "5000",
                                "width": "auto"
                            }
                            if (response == 1) {
                                toastr.success("Data updated successfully");
                                showUsers();  // Reload the user list after adding a new user
                            } else {
                                toastr.warning("Something went wrong. Try after some time!");
                            }
                            
                        }
                    });
                });


                // Logic to perform delete operation when user click on delete button
                // Logic to show edit user form with user details
                $(document).on("click", ".deleteBtn", function(){

                    let userId = $(this).data("userid");

                    $.ajax({
                        type: "get",
                        url: "{{ route('user.delete') }}",
                        data: {"userid":userId},
                        success: function (response) {
                            // console.log(response); 

                            toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                                "showDuration": "300",
                                "hideDuration": "5000",
                                "extendedTimeOut": "5000",
                                "width": "auto"
                            }
                            if (response == 1) {
                                toastr.success("Data deleted successfully");
                                showUsers();  // Reload the user list after adding a new user
                            } else {
                                toastr.warning("Something went wrong. Try after some time!");
                            }
                            
                        }
                    });

                    });


                // Logic to submit the form and create a new user
                $("#create_new_user_form").on("submit", function (event) {
                    event.preventDefault();

                    const formData = new FormData(this);

                    $.ajax({
                        type: "post",
                        url: "{{ route('user.create') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                                "showDuration": "300",
                                "hideDuration": "5000",
                                "extendedTimeOut": "5000",
                                "width": "auto"
                            }
                            if (response == 1) {
                                toastr.success("Data inserted successfully");
                                showUsers();  // Reload the user list after adding a new user
                            } else {
                                toastr.warning("Something went wrong. Try after some time!");
                            }
                        }
                    });
                });
            });


            
        </script>
        
    </body>
</html>