@extends('admin.master_dashboard')

@section('admin')
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="Create_Courses" data-bs-target="#CreateCourses">Create Department</button>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="Create_Member" data-bs-target="#member">Join Courses</button>

                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="example2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example2"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="members-table" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th>SL</th>
                                        <th>Name User</th>
                                        <th>Email</th>
                                        <th>department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name User</th>
                                        <th>Email</th>
                                        <th>department</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade ajax-model2" id="CreateCourses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form action="" id="FormCreateDepartments">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-11">
                        <div class="form-group focused">
                            <!-- <input type="hidden" name="user_id" id="user_id">  -->
                            <label class="form-control-label" for="input-username">Name Department</label>
                            <input type="text" id="departmentName" name="departmentName" class="form-control padding form-control-alternative" placeholder="Department #1">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <div>
                        <button type="button" id="savebtnCreatedepartments" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


<div class="modal fade ajax-model3" id="member" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form action="" id="FormMember">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Departments</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-11">
                        <div class="form-group focused">
                            <!-- {{-- <input type="hidden" name="user_id" id="user_id"> --}} -->
                            <label class="form-control-label" for="input-username">Department</label>
                            <select class="form-select mb-3" id="department_id" name="department_id" aria-label="Default select example">

                            </select>

                        </div>
                    </div>
                    <div class="col-lg-11">
                        <div class="form-group focused">

                            <label class="form-control-label" for="input-username">Users</label>
                            <select class="form-select mb-3" id="user_id" name="user_id" aria-label="Default select example">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="" id="In_active">

                    </div>

                    <div>
                        <button type="button" id="savebtnMember" class="btn btn-primary">Save Member</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

<div class="modal fade ajax-model77" id="EditMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form action="" id="FormMember">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Departments</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-11">
                        <div class="form-group focused">
                            <!-- {{-- <input type="hidden" name="user_id" id="user_id"> --}} -->
                            <label class="form-control-label" for="input-username">Department</label>
                            <select class="form-select mb-3" id="departmentID" name="departmentID" aria-label="Default select example">

                            </select>

                        </div>
                    </div>
                    <div class="col-lg-11">
                        <div class="form-group focused">

                            <label class="form-control-label" for="input-username">Users</label>
                            <select class="form-select mb-3" id="userID" name="userID" aria-label="Default select example">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="" id="In_active">

                    </div>

                    <div>
                        <button type="button" id="btnMember" class="btn btn-primary">Save Member</button>
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


        function getDataMembers() {
            $.ajax({
                url: "{{ route('get.data.members') }}",
                method: "GET",
                success: function(response) {
                    // empty the table body first
                    $("#members-table tbody").empty();
                    console.log(response.success, 'DATA');
                    // loop through the response data and append it to the table
                    $.each(response, function(key, member) {
                        var table = $("#members-table tbody").append(
                            "<tr>" +
                            "<td>" + (key + 1) + "</td>" +
                            "<td>" + member.firstname + " " + member.lastname + "</td>" +
                            "<td>" + member.email + "</td>" +
                            "<td>" + member.departmentName + "</td>" +
                            "<td>" +
                            "<a href='javascript:void(0)' class='btn btn-info EditMember' data-id='" + member.id + "'>Edit</a>" +
                            "<a href='javascript:void(0)' id='delete' class='btn btn-danger delBtn' data-id='" + member.id + "'>Delete</a>" +
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

        getDataMembers();

        $('body').on('click', '.EditMember', function() {

            var id = $(this).data('id');

            $.ajax({
                url: '{{ url("member") }}/' + id + '/edit',
                method: 'GET',

                success: function(response) {
                    $(".ajax-model77").modal('show');
                    $('.modal-title').html('Edit Member');
                    $('#btnMember').html('Update');
                    // $('.password').hide();

                    $('#userID').val(response.firstname);
                    $('#departmentID').val(response.lastname);


                    console.log(response);


                },
                error: function(error) {
                    console.log(error, 'error');
                }
            });


        });

        $('body').on('click', '.delBtn', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '{{ url("member/delete") }}/' + id,
                method: 'DELETE',

                success: function(response) {

                    console.log(response);
                    getDataMembers();

                },
                error: function(error) {
                    console.log(error, 'error');
                }
            });

        });

        var FormCreateDepartments = $("#FormCreateDepartments")[0];
        $('#savebtnCreatedepartments').click(function() {

            var formDepartments = new FormData(FormCreateDepartments);

            console.log(formDepartments);

            $.ajax({
                url: '{{route("departments.store")}}',
                method: 'POST',
                processData: false,
                contentType: false,
                data: formDepartments,

                success: function(response) {

                    console.log(response, 'response departments');
                    $(".ajax-model2").modal('hide');

                    getData();

                    console.log(response.success);
                },
                error: function(error) {
                    console.log(error, 'error');
                }
            });
        });

        $('#Create_Courses').click(function() {
            $('.modal-title').html('Create Courses');
            $('.savebtn').html('Save Course');

            $('#departmentName').val('');
            $('#mark').val('');

        });

        // get all data courses
        function getData() {
            $.ajax({
                url: "{{ route('all.departments') }}",
                method: "GET",
                success: function(response) {
                    // empty the table body first
                    $("#department_id").empty();

                    // loop through the response data and append it to the table
                    $.each(response, function(key, department) {
                        var option = $("#department_id").append(

                            "<option value=" + department.id + ">" + department.departmentName + "</option>"

                        );
                    });

                },
                error: function(error) {
                    console.log(error);
                }
            });

            $('select[name="department_id"]').on('change', function() {
                var department_id = $(this).val();

                if (department_id) {
                    $.ajax({
                        url: '{{ url("/student-all/ajax") }}/' + department_id,
                        method: 'GET',
                        dataType: "json",
                        success: function(data) {

                            $('select[name="user_id"]').html('');
                            var d = $('select[name="user_id"]').empty();
                            $.each(data, function(key, value) {
                                console.log(value, 'student-all');
                                $('select[name="user_id"]').append('<option value="' + value.id + '">' + value.firstname + ' ' + value.lastname + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });


        }

        // call the function to display user data on page load
        getData();



        var formDatamembers = $("#FormMember")[0];

        $('#savebtnMember').click(function() {

            var FormMem = new FormData(formDatamembers);

            console.log(FormMem);

            $.ajax({
                url: '{{route("Member.store")}}',
                method: 'POST',
                processData: false,
                contentType: false,
                data: FormMem,
                dataType: 'json',

                success: function(response) {

                    getDataMembers();

                    console.log(response, 'response Member');
                    $(".ajax-model3").modal('hide');

                },
                error: function(error) {
                    console.log(error, 'error');
                }
            });

        });

        $('#Create_Member').click(function() {
            $('.modal-title').html('Members');
            $('.savebtn').html('Save Member');

            $('#department_id').val('');
            $('#user_id').val('');

        });


    });
</script>
@endsection