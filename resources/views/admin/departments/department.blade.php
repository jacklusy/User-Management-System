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
                                        <th>department</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Prev</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                </ul>
                            </div>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="savebtnMember" class="btn btn-primary">Save Member</button>
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
                    console.log(response.success , 'DATA');
                    // loop through the response data and append it to the table
                    $.each(response, function(key, member) {
                        var table = $("#members-table tbody").append(
                            "<tr>" +
                            "<td>" + member.id + "</td>" +
                            "<td>" + member.firstname + " " + member.lastname + "</td>" +
                            "<td>" + member.departmentName + "</td>" +
                            "<td>" +
                            "<a href='javascript:void(0)' class='btn btn-info editButton' data-id='" + member.id + "'>Edit</a>" +
                            "<a href='javascript:void(0)' id='delete' class='btn btn-danger delButton' data-id='" + member.id + "'>Delete</a>" +
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

                    // getData();
                    console.log(response, 'response departments');
                    $(".ajax-model2").modal('hide');



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

                    // getData();
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