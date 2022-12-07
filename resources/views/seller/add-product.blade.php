@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/add-product.css')}}">
@endsection

@section('content')
<div class="container">
  <div class="content-title">
      <h2>Add New Product</h2>
  </div>
  <form action="{{ url('input/product') }}">
    <div class="container-content">
      <div class="product-name">
          <label for="product-name">Product Name</label>
          <input type="text" name="product_name">
      </div>
      <div class="desc">
          <label for="desc">Description</label>
          <textarea name="descript" id="" cols="150" rows="5"></textarea>
      </div>

      <div class="double-row">
          <div class="left-row">

              <div class="product-category">
                  <label for="">Product Category</label>
                  <input type="text">
              </div>
              <div class="product-tipe">
                  <label for="product-tipe">Product Tipe</label>
                  <input type="radio" name="product-tipe" name="software">
                  <label for="software">Software</label>
                  <input type="radio" name="product-tipe" name="software">
                  <label for="hardware">Hardware</label>
              </div>
              <div class="price">
                  <label for="price">Price</label>
                  <input type="number" name="price"> 
              </div>
              <div class="related-tags">
                  <label for="related-tags">Related Tags</label>
                  <div class="tags"></div>
              </div>
          </div>
          <div class="right-row">
              <div class="stock">
                  <label for="stock">Stock</label>
                  <input type="number" name="stock">
              </div>
              <div class="product-image">
                  <label for="product-image">Product Image</label>
                  <div class="image"></div>
              </div>
              <div class="input-profile" >
                <div class="title-photo">
                    <p>Select Profile :</p>
                </div>
                <div class="input-photo needsclick dropzone" id="gallery-dropzone"></div>
              </div>
              <div class="btn-form">
                  <button class="cancle">Cancle</button>
                  <button class="upload">Upload Product</button>
              </div>
          </div>
          
      </div>
  </div>
</form>
</div>
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