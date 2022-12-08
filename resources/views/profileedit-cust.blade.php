@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/profileedit-cust.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@endsection

@section('content')
<form action="{{ url('/profile') }}" method='POST'>
    @csrf
    @method('PUT')
    
<div class="edit-profile-content">
    <div class="left-row">
        <div class="pict">
            <img src="{{ Auth::check() ? auth()->user()->profile->gallery->first()->getUrl() : asset('assets/img/user.png') }}" alt=""> 
            <div class="needsclick dropzone" id="gallery-dropzone" style=" height: 300px; width: 300px; padding:65px;" ></div>
        </div>
    </div>
    <div class="right-row">
        <div class="first-name">
            <p>First Name</p>
            <input type="text" value="{{ Auth()->user()->profile->firstname }}" name="firstname">
        </div>
        <div class="last-name">
            <p>Last Name</p>
            <input type="text" value="{{ Auth()->user()->profile->lastname }}" name="lastname">
        </div>
        <div class="email">
            <p>Email</p>
            <input type="email" value="{{ Auth()->user()->email }}" name="email">
        </div>
        <div class="phone">
            <p>Phone Number</p>
            <input type="number" value="{{ Auth()->user()->profile->phoneNumber }}" name="phoneNumber">
        </div>
        <div class="address">
            <p>Address</p>
            <textarea  name="Address" id="" cols="79" rows="5">{{ Auth()->user()->profile->Address }}</textarea>
        </div>
        <button type="submit">Save Changes</button>
    </div>
   </div>
</form>


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
@endsection