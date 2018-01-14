@extends('start.init')

@section('content')

@include('layouts.includes.navbar')

<div class="container">
    <div class="row row-user-profile">

        <div class="col-sm-12 col-user-profile-image">
            <div class="div-user-image">
                <img src="/storage/user-profile-images/{{ $user->image_id }}" class="user-image img-circle"/>
            </div>
        </div>

        <div class="col-sm-12 col-user-profile-actions">
            <div class="div-upload-image">
                <!-- hidden form -->
                <form name="uploader" id="example" action="/user/actions/uploadProfileImage" enctype="multipart/form-data" method="post" hidden>
                    <input type="file" name="image" id="input-upload-profile-image">
                    <input type="submit" id="upload_submit" value="Send">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token"   />
                </form>
                <button class="btn btn-default button-upload-profile-image">Update Photo</button>
            </div>

            <div class="div-user-info">
                <div class="form-group">
                  <label for="hashtag" class="text-center block">#hashtag</label>
                  <input type="text" class="form-control" id="hashtag" value="{{ $user->hashtag }}">
                </div>

                <button class="btn btn-default button-update-profile">Update Info</button>
            </div>

        </div>


    </div>
</div>
@endsection
