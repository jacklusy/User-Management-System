@extends('admin.master_dashboard')

@section('admin')

<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" id="add_User" data-bs-target=".bd-example-modal-lg">Create User</button>
                        <div class="modal fade bd-example-modal-lg ajax-model" id="addUser" tabindex="-1" role="dialog" aria-hidden="true">
                            <form action="" id="ajaxForm">
                                @csrf
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <input type="hidden" name="user_id" id="user_id">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <fieldset class="mb-3">
                                                        <div class="row">
                                                            <label class="col-form-label col-sm-3 pt-0">Gender</label>
                                                            <div class="col-sm-12">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" id="gender_male" name="gender" value="male">
                                                                    <label class="form-check-label">
                                                                        Male
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" id="gender_female" name="gender" value="female">
                                                                    <label class="form-check-label">
                                                                        Female
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="mb-3 row">
                                                    <div class="col-sm-9">
                                                        <div class="form-check" id="In_active">
                                                            <input class="form-check-input" type="checkbox"  id="status" name="status" value="true">
                                                            <label class="form-check-label" for="status">
                                                                Active
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="savebtn" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display user-table" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
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
    </div>
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
                    $(".user-table tbody").empty();

                    // loop through the response data and append it to the table
                    $.each(response, function(key, user) {
                        var table = $(".user-table tbody").append(
                            "<tr>" +
                            "<td>" + (key + 1) + "</td>" +
                            "<td>" + user.firstname + " " + user.lastname + "</td>" +
                            "<td>" + user.email + "</td>" +
                            "<td>" + user.phone + "</td>" +
                            "<td>" + user.gender + "</td>" +
                            "<td>" + user.status + "</td>" +
                            "<td>" +
                            "<div class='d-flex'>" +
                            "<a href='javascript:void(0)' class='btn btn-primary shadow btn-xs sharp me-1 editButton' data-id='" + user.id + "'><i class='fas fa-pencil-alt'></i></a>" +
                            "<a href='javascript:void(0)' id='delete' class='btn btn-danger shadow btn-xs sharp delButton' data-id='" + user.id + "'><i class='fa fa-trash'></i></a>" +
                            "<div>" +
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