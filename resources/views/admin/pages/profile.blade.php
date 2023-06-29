@extends('admin.master_dashboard')

@section('admin')

<div class="container-fluid">


    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="profile card card-body px-3 pt-3 pb-0">
                <div class="profile-head">

                    <div class="profile-info">
                        <div class="profile-photo">
                            <img src="{{!empty($adminData->photo)? url('upload/admin_images/'.$adminData->photo):url('upload/default.jpg')}}" class="img-fluid rounded-circle" alt="">
                        </div>
                        <div class="profile-details">
                            <div class="profile-name px-3 pt-2">
                                <h4 class="text-primary mb-0">{{$adminData->firstname}} {{$adminData->lastname}}</h4>
                                <p>{{$adminData->email}}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link active show">Account Details</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="profile-settings" class="tab-pane fade active show">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            <h4 class="text-primary"></h4>
                                            <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                                                @csrf

                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <input type="hidden" name="user_id" id="user_id">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" id="firstname" name="firstname" value="{{$adminData->firstname}}" class="form-control" placeholder="First Name">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" id="lastname" name="lastname" value="{{$adminData->lastname}}" class="form-control" placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" id="email" name="email" value="{{$adminData->email}}" class="form-control" placeholder="Email">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" id="phone" name="phone" value="{{$adminData->phone}}" class="form-control" placeholder="phone">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <fieldset class="mb-3">
                                                            <div class="row">
                                                                <label class="col-form-label col-sm-3 pt-0">Gender</label>
                                                                <div class="col-sm-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" id="gender_male" name="gender" value="male" {{ $adminData->gender == 'male' ? 'checked' : '' }}>
                                                                        <label class="form-check-label">
                                                                            Male
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" id="gender_female" name="gender" value="female" {{ $adminData->gender == 'female' ? 'checked' : '' }}>
                                                                        <label class="form-check-label">
                                                                            Female
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <div class="mb-3">
                                                            <label>Photo <span class="required">*</span></label>
                                                            <input id="image" class="" name="photo" type="file" />
                                                        </div>
                                                        <div class="form-group col-md-12 photo">
                                                            <img src="{{!empty($adminData->photo)? url('upload/admin_images/'.$adminData->photo):url('upload/default.jpg')}}" alt="photo" class="showImage img-fluid rounded-circle" id="showImage" style="width: 100px ; height:100px;">
                                                        </div>

                                                    </div>
                                                </div>

                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="replyModal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Post Reply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <textarea class="form-control" rows="4">Message</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
                                        <button type="button" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection