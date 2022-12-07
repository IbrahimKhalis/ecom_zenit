@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/profile.css')}}">
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
      <div class="right">
          <p>#{{ Auth()->user()->id }}</p>
          <h1>{{ Auth()->user()->name }}</h1>
          <p>{{ Auth()->user()->profile->desk }}</p>
      </div>
  </div>

  <div class="row-2">
      <table>
          <tr>
              <td>First Name</td>
              <td>{{ Auth()->user()->profile->firstname }}</td>
          </tr>
          <tr>
              <td>Last Name</td>
              <td>{{ Auth()->user()->profile->lastname }}</td>
          </tr>
          <tr>
              <td>Email</td>
              <td>{{ Auth()->user()->email }}</td>
          </tr>
          <tr>
              <td>Phone Number</td>
              <td>{{ Auth()->user()->profile->phoneNumber }}</td>
          </tr>
          <tr>
              <td>Address</td>
              <td>{{ Auth()->user()->profile->Address }}</td>
          </tr>
      </table>
  </div>
</div>

<form action="{{ url('seller/profile', auth()->id()) }}" method="POST">
    @csrf
    @method('PATCH')
    <div id="myProfile" class="modalProfile">
        <div class="modalprofile-content">
            <div class="header">
                <span class="close close-prof">&times;</span>
            </div>
            <div class="profile-content">
                <div class="Profile-pict">
                    <p class="cust-prof">Profile Picture</p>
                    <div class="needsclick dropzone" id="gallery-dropzone" style="height: 300px;"></div>
                </div>
                <div class="btn-Profile">
                    <button type="submit">submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="{{ asset('assets/js/uploadimg.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

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
<script src="{{ asset('assets/js/uploadimg.js')}}"></script>
@endsection