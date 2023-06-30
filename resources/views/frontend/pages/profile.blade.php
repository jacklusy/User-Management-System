@extends('frontend.master_dashboard')

@section('main')

<div class="container-lg card">
    <div class="card-header">
        <h5>Account Details</h5>
    </div>
    <div class="card-body">

        <form method="POST" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label>First Name <span class="required">*</span></label>
                    <input class="form-control" name="firstname" type="text" value={{$userData->firstname}}>
                </div>
                <div class="mb-3 col-md-6">
                    <label> Last Name <span class="required">*</span></label>
                    <input class="form-control" name="lastname" type="text" value={{$userData->lastname}}>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label>Email <span class="required">*</span></label>
                    <input class="form-control" name="email" type="email" value={{$userData->email}}>
                </div>
                <div class="mb-3 col-md-6">
                    <label>Phone <span class="required">*</span></label>
                    <input class="form-control" name="phone" type="phone" value={{$userData->phone}}>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6">
                    <fieldset class="mb-3">
                        <div class="row">
                            <label class="col-form-label col-sm-3 pt-0">Gender</label>
                            <div class="col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="gender_male" name="gender" value="male" {{ $userData->gender == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="gender_female" name="gender" value="female" {{ $userData->gender == 'female' ? 'checked' : '' }}>
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
                        <img src="{{!empty($userData->photo)?url('upload/user_images/'.$userData->photo):url('upload/default.jpg')}}" alt="photo" class="showImage rounded" id="showImage" style="width: 100px ; height:100px;">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="Submit">Save Change</button>
        </form>
    </div>
</div>

@endsection