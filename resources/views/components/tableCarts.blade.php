
  <div class="container">
    <div class="content">
      <div class="left-content">
        <div class="logo-cart">
          <i class="fa-solid fa-cart-shopping"></i>
          <p>Your Cart</p>
          <p>({{ $carts->count() }})</p>
        </div>
        <div class="cart-content">
          <div class="check-all">
            <div class="check">
              <label for="check">Cart</label>
            </div>
            <!-- <div class="delete">
              <button>Delete</button>
            </div> -->
          </div>
        </div>
  
        {{-- ca rd cart --}}
        
          @foreach($carts as $cart)
          <div class="cart-product">
            <div class="header-cart">
              <div class="profile-shop">
                <a href="">
                  <iconify-icon `class="store" icon="clarity:store-solid"></iconify-icon>
                  <p>{{$cart->product->users->shop->name}}</p>
                </a>
              </div>
              <!-- <div class="btn-delete">
                <div class="delete">
                  <button>Delete</button>
                </div>  
              </div> -->
            </div>
            <div class="content-product">
              <img src="{{$cart->product->gallery->first()->getUrl()}}" alt="">
              <div class="details-product">
                <div class="row-1">
                  <div class="name">
                    <p>{{ $cart->product->major }}</p>
                    <p id="product-name">{{ $cart->product->name }}</p>
                  </div>
                  <p class="price" id="product-price">{{ number_format($cart->product->price,2,',','.')}}</p>
                </div>
    
                <div class="row-2">
                  <p class="type" id="type">{{ $cart->product->category->name }}</p>
                  <div class="row-kanan">
                    <div class="favs">
                      <button>
                        <iconify-icon class="heart" icon="akar-icons:heart"></iconify-icon>
                      </button>
                    </div>
                    <div class="quantity">
                      <button onclick="trash('{{ url('cart/dest', $cart->id) }}')">
                        <iconify-icon class="trash" icon="fe:trash"></iconify-icon>
                      </button>
                      <a href="{{ $cart->product->category->name != 'Software' ? url('cart/dec', $cart->id) : '' }}">
                        <button id="decrease" {{ $cart->product->category->name == 'Software' ? 'disabled' : '' }} >-</button>
                      </a>
    
                      <input type="text" value="{{ $cart->quantity }}" id="quantity" name="quantity" >
    
                      <a href="{{ $cart->product->category->name != 'Software' ? url('cart/inc', $cart->id) : '' }}">
                        <button id='increase' {{ $cart->product->category->name == 'Software' ? 'disabled' : '' }} >+</button>
                      </a>
    
                    </div>
                  </div>
                </div>
                <!-- <p class="stock">Stock Available</p> -->
              </div>
            </div>
          </div>
          @endforeach
        
      </div>
  
      <!-- card summary -->
      <div class="card-summary">
        <p class="summary">Summary</p>
        @foreach( $carts as $sum)
        <div class="product" id="product">
          <button>-</button>
          <div class="row1">
            <p id="name-summary">{{$sum->product->name}}</p>
            <div class="price">
              <p id="quantity-summary">{{ $sum->quantity }}</p>
              <p>x</p>
              <p id="price-summary">Rp. {{ $sum->product->price  }}</p>
            </div>
          </div>
          <div class="row-2">
            <p class="software" id="label-summary">{{ $sum->product->category->name }}</p>
            <div class="subtotal">
              <p>Subtotal : </p>
              <p id="total-price">Rp. {{ $sum->product->price * $sum->quantity }}</p>
            </div>
          </div>
        </div>
        @endforeach
        <div class="total" id="total">
          <p>Total</p>
          <p id="total-summary">Rp {{ number_format($total,0,',','.')}}</p>
        </div>
  
        <div class="button">
          {{-- <button style="background-color: #3333; color: black; cursor: no-drop;" id="btn-con" disabled>Continue</button> --}}
          <a href="{{ url('checkoutdetail') }}"><button @if ( $carts->count() === 0) style="background-color: #3333; color: black; cursor: no-drop;" id="btn-con" disabled @endif>Continue</button></a>
        </div>
      </div>
  
    </div>
  </div>
