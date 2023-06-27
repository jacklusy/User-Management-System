@extends('admin.master_dashboard')

@section('admin')

<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>

<style>
    .col-lg-12 {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .editButton {
        margin-right: 1rem;
    }

    .col-lg-11 {
        width: 100% !important;
        margin-bottom: 1rem;
    }
</style>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="add_User" data-bs-target="#addUser">Add User</button>
            </div>
        </div>

    </div>
    <!--end breadcrumb-->

    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>UserName</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>



<div class="modal fade ajax-model" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form action="" id="ajaxForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="form-group focused">
                            <input type="hidden" name="user_id" id="user_id">
                            <label class="form-control-label" for="input-username">First Name</label>
                            <input type="text" id="firstname" name="firstname" class="form-control padding form-control-alternative" placeholder="First Name">
                        </div>
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-username">Last Name</label>
                            <input type="text" id="lastname" name="lastname" class="form-control padding form-control-alternative" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-username">Email</label>
                            <input type="email" id="email" name="email" class="form-control padding form-control-alternative" placeholder="example@gmail.com">
                        </div>
                        <div class="form-group focused password">
                            <label class="form-control-label" for="input-username">Password</label>
                            <input type="password" id="password" name="password" class="form-control padding form-control-alternative" placeholder="********">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-username">Phone</label>
                            <input type="phone" id="phone" name="phone" class="form-control padding form-control-alternative" placeholder="+976 3445 2345">
                        </div>
                        <div class="form-group d-flex align-items-center focused">

                            <input type="radio" id="gender_male" name="gender" value="male">
                            <label for="gender_male">Male</label><br>

                            <input type="radio" id="gender_female" name="gender" value="female">
                            <label for="gender_female">Female</label><br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-xl-between">

                    <div class="" id="In_active">
                        <input type="checkbox" id="status" name="status" value="true">
                        <label for="status">Active</label><br>
                    </div>

                    <div>
                        <button type="button" id="savebtn" class="btn btn-primary">Save User</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>





<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })




        /// create User
        var formData = $("#ajaxForm")[0];
        $('#savebtn').click(function() {

            var form = new FormData(formData);

            console.log(form);

            $.ajax({
                url: '{{route("user.store")}}',
                method: 'POST',
                processData: false,
                contentType: false,
                data: form,

                success: function(response) {

                    getUserData();
                    $(".ajax-model").modal('hide');

                    console.log(response.success);
                },
                error: function(error) {
                    console.log(error, 'error');
                }
            });
        });


        // read Users 
        function getUserData() {
            $.ajax({
                url: "{{ route('user.index') }}",
                method: "GET",
                success: function(response) {
                    // empty the table body first
                    $("#user-table tbody").empty();

                    // loop through the response data and append it to the table
                    $.each(response, function(key, user) {
                        var table = $("#user-table tbody").append(
                            "<tr>" +
                            "<td>" + (key + 1)  + "</td>" +
                            "<td>" + user.firstname + " " + user.lastname + "</td>" +
                            "<td>" + user.email + "</td>" +
                            "<td>" + user.phone + "</td>" +
                            "<td>" + user.gender + "</td>" +
                            "<td>" + user.status + "</td>" +
                            "<td>" +
                            "<a href='javascript:void(0)' class='btn btn-info editButton' data-id='" + user.id + "'>Edit</a>" +
                            "<a href='javascript:void(0)' id='delete' class='btn btn-danger delButton' data-id='" + user.id + "'>Delete</a>" +
                            "</td>" +
                            "</tr>"
                        );
                    });

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        getUserData();


        /// edit User
        $('body').on('click', '.editButton', function() {

            var id = $(this).data('id');

            $.ajax({
                url: '{{ url("user") }}/' + id + '/edit',
                method: 'GET',

                success: function(response) {
                    $(".ajax-model").modal('show');
                    $('.modal-title').html('Edit User');
                    $('#savebtn').html('Update');
                    // $('.password').hide();

                    $('#user_id').val(response.id);
                    $('#firstname').val(response.firstname);
                    $('#lastname').val(response.lastname);
                    $('#email').val(response.email);
                    $('#phone').val(response.phone);
                    $('input[type="radio"][id="gender_' + response.gender + '"]').prop('checked', true);

                    if (response.status == 'active') {
                        $('#status').prop('checked', true);
                        $('label[for="status"]').html('Active');
                    } else {
                        $('#status').prop('checked', false);
                        $('label[for="status"]').html('Inactive');
                    }

                    console.log(response);


                },
                error: function(error) {
                    console.log(error, 'error');
                }
            });


        });

        $('#add_User').click(function() {
            $('.modal-title').html('Create User');
            $('#savebtn').html('Create User');

            $('#user_id').val('');
            $('#firstname').val('');
            $('#lastname').val('');
            $('#email').val('');
            $('#password').val('');
            $('#phone').val('');
            $('#gender').val('');

        });


        $('body').on('click', '.delButton', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ url("user/delete") }}/' + id,
                method: 'DELETE',

                success: function(response) {

                    console.log(response);
                    getUserData();

                },
                error: function(error) {
                    console.log(error, 'error');
                }
            });

        });

        

    });
</script>
@endsection