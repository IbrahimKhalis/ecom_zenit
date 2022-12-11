@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/edit-product.css')}}">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
<form action="{{ route('seller.product.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="content-title">
            <h2>Edit Product</h2>
        </div>
    
        <div class="container-content">
    
            <div class="product-name">
                <label for="product-name">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}">
            </div>
            <div class="desc">
                <label for="desc">Description</label>
                <textarea name="desc" id="" cols="150" rows="5">{{ $product->desc }}</textarea>
            </div>
    
            <div class="double-row">
                <div class="left-row">
    
                    <div class="product-category">
                        <label for="">Product Major</label>
                        <select name="major" id="" style="width: 200px; height: 40px;">
                            <option value="PPLG" {{ $product->major == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                            <option value="ANIMASI" {{ $product->major == 'ANIMASI' ? 'selected' : '' }}>ANIMASI</option>
                            <option value="BRF" {{ $product->major == 'BRF' ? 'selected' : '' }}>BRF</option>
                            <option value="TJKT" {{ $product->major == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                            <option value="TE" {{ $product->major == 'TE' ? 'selected' : '' }}>TE</option>
                        </select>
                    </div>
                    <div class="product-tipe">
                        <label for="product-tipe">Product Tipe</label>
                        @foreach($category as $cate)
                        <input type="radio" name="category_id" value="{{ $cate->id }}" {{ $product->category_id == $cate->id ? 'checked' : ''}}>
                        <label>{{ $cate->name }}</label>
                        @endforeach
                    </div>
                    <div class="price">
                        <label for="price">Price</label>
                        <input type="number" name="price" value="{{ $product->price }}">
                    </div>
    
                    <div class="related-tags">
                        <label for="related-tags">Related Tags</label>
                        <select class="tags" name="tags[]" multiple>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" 
                            {{ in_array($tag->id, $product->tags->pluck('id')->all()) ? 'selected' : ''}} >{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="right-row">
                    <div class="stock">
                        <label for="stock">Stock</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}">
                    </div>
                    <div class="product-image">
                        <label  for="product-image">Product Image</label>
                        <div class="image needsclick dropzone" style="height: 250px" id="gallery-dropzone"></div>
                    </div>
                    <div class="btn">
                        <button class="cancle" disabled><a href="{{ route('product.show', $product->slug) }}">Cancel</a></button>
                        <button class="upload" type="submit">Save Edit</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</form>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


<script>
        var uploadedGalleryMap = {}
            Dropzone.options.galleryDropzone = {
                    url: "{{ url('product/image') }}",
                         maxFilesize: 5, // MB
                         maxFiles: 4,
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
                     @if(isset($product) && $product->gallery)
                           var files =
                             {!! json_encode($product->gallery) !!}
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