@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/setting-edit.css')}}">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="{{ route('setting-info') }}">Information</a>
        <a href="{{ route('edit-info') }}">Edit Information</a>
        <a href="{{ route('seller.setting-scedhule') }}">Scedhule</a>
    </div>
    
    <div class="card-store">
      <div class="header-cards">
        <i class="fa-solid fa-store"></i>
        <p>Store Information</p>
      </div>
    <form action="{{ route('update/profile/shop'), auth()->id() }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-content">
        <div class="row1">
          <div class="col1">
            <div class="store-name">
              <label for="name">Store Name</label>
              <input type="text" name="name" id="name" value="{{ $shop->name }}" required>
            </div>
            <div class="desc">
              <label for="desc">Description</label>
              <textarea name="desc" id="" cols="30" rows="5" required>{{ $shop->desc }}</textarea>
            </div>    
          </div>
          <div class="col2">
            <div class="store-profile">
              <p>Store Profile</p>
              <div class="needsclick dropzone" id="gallery-dropzone" required></div>
            </div>
          </div>
        </div>
        <div class="row2">
          <p>Social Media Stores</p>
          <div class="content-row2">
            <div class="col1">
              <div class="instagram">
                <label for="ig"><iconify-icon icon="mdi:instagram"></iconify-icon> Instagram</label>
                <input type="text" name="instagram" id="ig" value="{{ $shop->instagram }}">
              </div>  
              <div class="gmail">
                <label for="gmail"><iconify-icon icon="simple-icons:gmail"></iconify-icon> Gmail</label>
                <input type="text" name="gmail" id="gmail" value="{{ $shop->gmail }}">
              </div>  
            </div>
            <div class="col2">
              <div class="linkedin">
                <label for="link"><iconify-icon icon="mdi:linkedin"></iconify-icon> linkedIn</label>
                <input type="text" name="linkedIn" id="link" value="{{ $shop->linkedIn }}">
              </div>  
              
              <div class="cv">
                <label for="cv"><iconify-icon icon="ic:baseline-insert-drive-file"></iconify-icon> portofolio/cv</label>
                <input type="file" accept="application/pdf" name="portofolio" id="link" value="{{ asset($shop->portofolio) }}" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="btn-save">
          <button type="submit">Save</button>
        </div>
      </div>
    </form>
    </div>
 
</div>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
  var uploadedGalleryMap = {}
      Dropzone.options.galleryDropzone = {
              url: "{{ url('shop-profile/image') }}",
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
               @if(isset($shop) && $shop->gallery)
                     var files =
                       {!! json_encode($shop->gallery) !!}
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