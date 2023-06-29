@extends('admin.master_dashboard')

@section('admin')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="Create_Courses" data-bs-target="#CreateCourses">Create Department</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="Create_Member" data-bs-target="#member">Join Courses</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-12 d-flex justify-content-end">
                            <div class="">
                                <input type="search" class="form-control" placeholder="Search" id="searchInput">
                            </div>
                        </div>
                        <table id="example3" class="display members-table " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name User</th>
                                    <th>Email</th>
                                    <th>department</th>
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


<div class="modal fade ajax-model33" id="member-2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <form action="" id="FormMemberEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title-2" id="exampleModalLabel">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-11">
                        <div class="form-group focused">

                            <label class="form-control-label" for="userID">Users</label>
                            <select class="form-select mb-3" id="userID" name="userID" aria-label="Default select example">

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-11">
                        <div class="form-group focused">
                            <input type="hidden" name="memberID" id="memberID">
                            <label class="form-control-label" for="departmentID">Department</label>
                            <select class="form-select mb-3" id="departmentID" name="departmentID" aria-label="Default select example">

                            </select>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div>
                        <button type="button" id="savebtnMemberEdit" class="btn btn-primary">Update</button>
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

        //// table///
        function getDataMembers() {
            var searchTerm = $("#searchInput").val().trim();

            $.ajax({
                url: "{{ route('get.data.members') }}",
                method: "GET",
                data: {
                    search: searchTerm
                },
                success: function(response) {
                    $(".members-table tbody").empty();

                    $.each(response, function(key, member) {
                        var table = $(".members-table tbody").append(
                            "<tr>" +
                            "<td>" + (key + 1) + "</td>" +
                            "<td>" + member.firstname + " " + member.lastname + "</td>" +
                            "<td>" + member.email + "</td>" +
                            "<td>" + member.departmentName + "</td>" +
                            "<td>" +
                            "<div class='d-flex'>" +
                            "<a href='javascript:void(0)' class='btn btn-primary shadow btn-xs sharp me-1 EditMember' data-id='" + member.id + "'><i class='fas fa-pencil-alt'></i></a>" +
                            "<a href='javascript:void(0)' id='delete' class='btn btn-danger shadow btn-xs sharp delBtn' data-id='" + member.id + "'><i class='fa fa-trash'></i></a>" +
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
        getDataMembers();


        $("#searchInput").on("change", function() {
            getDataMembers();
        });


        ///// get edit data table
        function getDataEdit(memberID) {

            $.ajax({
                url: '{{ url("users-all/ajax/") }}/' + memberID,
                method: "GET",
                dataType: "json",
                success: function(value) {
                    $("#userID").empty();

                    var option = $("#userID").append(
                        '<option selected value="' + value.user_id + '">' + value.firstname + ' ' + value.lastname + '</option>'
                    );

                    var userID = value.user_id;
                    if (userID) {
                        $.ajax({
                            url: '{{ url("get/departments/") }}/' + userID,
                            method: 'GET',
                            dataType: "json",
                            success: function(data) {

                                $('select[name="departmentID"]').html('');
                                var d = $('select[name="departmentID"]').empty();

                                $.each(data, function(key, value) {
                                    $('select[name="departmentID"]').append('<option value="' + value.id + '">' + value.departmentName + '</option>');
                                });
                            },

                        });
                    } else {
                        alert('danger');
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            });

        }



        /////  edit data table
        $('body').on('click', '.EditMember', function() {

            var memberID = $(this).data('id');
            var member_id = $("#memberID").val(memberID);

            getDataEdit(memberID);

            $.ajax({
                url: '{{ url("member") }}/' + memberID + '/edit',
                method: 'GET',
                success: function(response) {
                    $(".ajax-model33").modal('show');
                    $('.modal-title-2').html('Edit Member');
                    $('#savebtnMemberEdit').html('Update');

                    console.log(response, 'noooooooooooooooo');

                },
                error: function(error) {
                    console.log(error, 'error');
                }
            });


        });

        //// post data edit table
        var formDatamembersEdit = $("#FormMemberEdit")[0];
        $('#savebtnMemberEdit').click(function() {
            console.log('hi');
            var FormMemEdit = new FormData(formDatamembersEdit);
            var memberID = $("#memberID").val();

            $.ajax({
                url: '{{ url("MemberEdit/store/") }}/' + memberID,
                method: 'POST',
                processData: false,
                contentType: false,
                data: FormMemEdit,
                dataType: 'json',

                success: function(response) {

                    getDataMembers();

                    console.log(response, 'response Member');
                    $(".ajax-model33").modal('hide');

                },
                error: function(error) {
                    console.log(error, 'error');
                }
            });

        });

        /// delete data table
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



        //// create departments
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

        //// clear data departments
        $('#Create_Courses').click(function() {
            $('.modal-title').html('Create Department');
            $('.savebtn').html('Save Department');

            $('#departmentName').val('');

        });

        // get data departments
        function getData() {
            $.ajax({
                url: "{{ route('all.departments') }}",
                method: "GET",
                success: function(response) {
                    // empty the table body first
                    $("#department_id").empty();

                    // loop through the response data and append it to the table
                    $.each(response, function(key, value) {
                        var option = $("#department_id").append(

                            "<option value=" + value.id + ">" + value.departmentName + "</option>"

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

        getData();


        /// post data member
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

        /// clear data member
        $('#Create_Member').click(function() {
            $('.modal-title').html('Members');
            $('.savebtn').html('Save Member');

            $('#department_id').val('');
            $('#user_id').val('');

        });






    });
</script>
@endsection