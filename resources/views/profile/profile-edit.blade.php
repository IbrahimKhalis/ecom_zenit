@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/profile-edit.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
@include('components.sidebar')
  
<div class="contents">
  <div class="sub-content">
      <a href="{{ route('seller.profile') }}">My Profile</a>
      <a href="{{ route('seller.edit.profile') }}">Edit Profile</a>
  </div>

  <div class="row-1">
      <div class="left">
          <img src="{{ Auth::check() ? auth()->user()->profile->gallery->first()->getUrl() : asset('assets/img/user.png') }}" alt="">
          <button id="btn-prof">Change Profile</button>
      </div>
    <form action="{{ url('/seller/profile/save', auth()->id()) }}" method="POST">
        @csrf
        @method('PUT')
        
      <div class="right">
          <p>#{{ Auth()->user()->id }}</p>
          <input type="text" maxlength="15" class="username" name="username" value="{{ Auth()->user()->name }}" required>
          <textarea name="" id="" cols="117" rows="4">{{ Auth()->user()->profile->desk }}</textarea>
          <p></p>
      </div>
  </div>

  <div class="form-profile">
    <div class="left-form">
        <div class="warning-alert">
            <iconify-icon icon="material-symbols:info-rounded"></iconify-icon>
            <p>This Action needed confirmation to your email, please after you completed this action check your email to confirm</p>
        </div>
            <div class="email">
                <h3>Email</h3>
                <p>{{ Auth()->user()->email }}</p>
            </div>
            <div class="pw">
                <h3>Password</h3>
                <p>********</p>
            </div>
            <div class="btn-profile">
                <button id="btn-form-rev" onclick="On_klik(this.id)">Change</button>
            </div>
    </div>
    <div class="right-form">
        <div class="fullname">
            <div class="first-name">
                <label for="first-name">First Name</label>
                <input type="text" maxlength="25" name="firstname" id="first-name" value="{{ Auth()->user()->profile->firstname }}" required>
            </div>
            <div class="last-name">
                <label for="last-name">last Name</label>
                <input type="text" maxlength="25" name="lastname" id="last-name" value="{{ Auth()->user()->profile->lastname }}" required>
            </div>
        </div>
        <div class="phone">
            <label for="phone">Phone Number</label>
            <input type="text" maxlength="13" name="phoneNumber" id="phone" value="{{ Auth()->user()->profile->phoneNumber }}" required>
        </div>
        <div class="address">
            <label for="alamat">Address</label>
            <textarea name="Address" id="" maxlength="150" cols="30" rows="5" required>{{ Auth()->user()->profile->Address }}</textarea>
        </div>
        <div class="btn-save">
            <button type="submit">Save</button>
        </div>
    </div>
  </div>
</div>
</form>


<div id="myForm" class="modalform">
    <div class="modalform-content">
        <div class="header">
            <span class="close close-form">&times;</span>
        </div>
        <div class="content">
            <div class="title-header">
                <p>Change Email And Password</p>
            </div>
            <div class="warning-alert">
                <iconify-icon icon="material-symbols:info-rounded"></iconify-icon>
                <p>This Action needed confirmation to your email, please after you completed this action check your email to confirm</p>
            </div>
            <div class="email-modal">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ Auth()->user()->email }}">
            </div>
            <div class="password-modal">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ Auth()->user()->password }}">
            </div>
            <div class="confirm-password-modal">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="">
            </div>
            <div class="btn-confirm">
                <button id="cancel">Cancel</button>
                <button id="confirm">Confirm</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/form-review.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
        var uploadedGalleryMap = {}
            Dropzone.options.galleryDropzone = {
                    url: "{{ url('profile/image') }}",
                         maxFilesize: 5, // MB
                         maxFiles: 1,
                         acceptedFiles: '.jpeg,.jpg,.png,.gif',
                         addRemoveLinks: true,
                         headers: {
                           'X-CSRF-TOKEN': "{{ csrf_token() }}"
                         },
                         success: function (file, response) {
                           $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
                           uploadedGalleryMap[file.name] = response.name
                         },
                         removedfile: function (file) {
                           file.previewElement.remove()
                           var name = ''
                           if (typeof file.file_name !== 'undefined') {
                             name = file.file_name
                           } else {
                             name = uploadedGalleryMap[file.name]
                           }
                           $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
                         },
                         init: function () {
                     @if(isset($profile) && $profile->gallery)
                           var files =
                             {!! json_encode($profile->gallery) !!}
                               for (var i in files) {
                               var file = files[i]
                               this.options.addedfile.call(this, file)
                               this.options.thumbnail.call(this, file, file.original_url)
                               file.previewElement.classList.add('dz-complete')
                               $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
                             }
                     @endif
                         },
                          error: function (file, response) {
                              if ($.type(response) === 'string') {
                                  var message = response //dropzone sends it's own error messages in string
                              } else {
                                  var message = response.errors.file
                              }
                              file.previewElement.classList.add('dz-error')
                              _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                              _results = []
                              for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                                  node = _ref[_i]
                                  _results.push(node.textContent = message)
                              }
                              return _results
                          }
                        }
</script>

@endsection