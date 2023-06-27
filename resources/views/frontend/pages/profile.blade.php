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
                <div class="form-group col-md-6">
                    <label>First Name <span class="required">*</span></label>
                    <input class="form-control" name="firstname" type="text" value={{$userData->firstname}}>
                </div>
                <div class="form-group col-md-6">
                    <label> Last Name <span class="required">*</span></label>
                    <input class="form-control" name="lastname" type="text" value={{$userData->lastname}}>
                </div>
                <div class="form-group col-md-12">
                    <label>Email <span class="required">*</span></label>
                    <input class="form-control" name="email" type="email" value={{$userData->email}}>
                </div>
                <div class="form-group col-md-12">
                    <label>Phone <span class="required">*</span></label>
                    <input class="form-control" name="phone" type="phone" value={{$userData->phone}}>
                </div>
                <div class="form-group col-md-12">

                    <div class="form-group d-flex align-items-center focused">

                        <input type="radio" id="gender_male" name="gender" value="male">
                        <label for="gender_male">Male</label><br>
    
                        <input type="radio" id="gender_female" name="gender" value="female">
                        <label for="gender_female">Female</label><br>
                    </div>
                </div>
                <div class="form UserPhoto col-md-12">
                    <div class="">
                        <label>User Photo <span class="required">*</span></label>
                        <input id="image" class="" name="photo" type="file" />
                    </div>

                    <button type="submit" class="CheckOut btn mb-20 " name="submit" value="Submit">Save Change</button>

                </div>
                <div class="form-group col-md-12 photo">
                    <img src="{{!empty($userData->photo)?url('upload/user_images/'.$userData->photo):url('upload/default.jpg')}}" alt="photo" class="showImage" id="showImage" style="width: 100px ; height:100px;">
                </div>


            </div>
        </form>
    </div>
</div>

@endsection