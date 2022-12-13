@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/processed.css')}}">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="{{ route('seller.upcoming') }}">Upcoming Orders</a>
        <a href="{{ route('seller.process') }}">Processed Orders</a>
        <a href="{{ route('seller.completed') }}">Completed Orders</a>
        <a href="{{ route('seller.canceled') }}">Canceled Orders</a>
    </div>

    <div class="content-tabs">
        <table border="1px solid black">
            <tr>
                <th style="width: 70px;">No</th>
                <th style="text-align: start;">Product</th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Quantity</th>
                <th>Type</th>
                <th></th>
            </tr>
            @foreach($confirmed as $item)
            <tr>
                <td style="width: 100px;">1</td>
                <td style="display: flex; gap:20px; text-align: start; width: 250px;">
                    <img src="{{ $item->products->gallery->first()->getUrl() }}" alt="">
                    <div class="prod-details" style="line-height: 14px;">
                        <p>{{ $item->product_name }}</p>
                        <p>{{ $item->created_at }}</p>
                        <p>Rp.{{ $item->subtotal }}</p>
                    </div>
                </td>
                <td style="width: 110px;">{{ $item->orders->invoice_no }}</td>
                <td style="width: 250px;">{{ $item->orders->users->name }}</td>
                <td style="width: 120px;">{{ $item->product_qty }}</td>
                <td style="width: 100px;">
                    <p id="label-order" style="margin-top: 10px;">{{ $item->products->category->name }}</p>
                </td>
                <td style="width: 120px;">
                    <a href="#" style="font-weight:600;" id="btn-receipt" onclick="On_click('{{ route('seller.resiUp', $item->id) }}')">Send</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
</div>


<div id="myReceipt" class="modalreceipt">
    <form action="" id="modalForm" method="POST">
        <div class="modalreceipt-content">
            <div class="header">
                <span class="close close-rec">&times;</span>
            </div>
            <div class="reciep-content">
                <div class="receipt-pict">
                    <p class="cust-rec">Receipt Pict</p>
                    <div class="needsclick dropzone" id="gallery-dropzone" style="margin-bottom: 0px;"></div>
                </div>
                <div class="receipt-number" style="margin-top: 20px;">
                    <p>Receipt Number</p>
                    <input type="text">
                </div>
                <div class="btn-receipt">
                    <button>submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

<script src="{{ asset('assets/js/receipt.js')}}"></script>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<script>
        var uploadedGalleryMap = {}
            Dropzone.options.galleryDropzone = {
                    url: "{{ url('dataresi/image') }}",
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