@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/notif.css')}}">
@endsection

@section('content')
<div class="notif-content">
  <h1 class="notif-title">
      Notification Feeds
  </h1>
  <div class="row-1">
      <div class="filter-dropdown">
          <select name="filter" id="filter" class="option-filter">
            <option value="popular">All</option>
          </select>
        </div>
        <div class="mark-read">
          <iconify-icon icon="ph:book-open" style="font-size: 30px; margin-top: -13px;"></iconify-icon>
          <p>Mark all as read</p>
        </div>
      </div>
     
      <div class="notif">
          <div class="notif-row-1">
              <div class="right">
                  <h4>Barangnya Otw nih cuy  </h4>
                  <div class="right-row">
                      <div class="store-name">
                          <a href="" style="display: flex;">
                              <iconify-icon style="font-size: 20px;" icon="ri:user-3-line"></iconify-icon>
                              <p>By Agus Store</p>

                          </a>
                      </div>
                      <div class="time">
                          <iconify-icon style="font-size: 20px;" icon="ic:sharp-access-time"></iconify-icon>
                          <p>1 Hours</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row-2">
              <p class="desc">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident eos id voluptas nemo? Reprehenderit, numquam laudantium. Recusandae assumenda debitis, qui cum est molestiae.
              </p>
              <button class="more-info">More Information</button>

          </div>
      </div>
      
      <div class="notif">
          <div class="notif-row-1">
              <div class="right">
                  <h4>Barangnya Otw nih cuy  </h4>
                  <div class="right-row">
                      <div class="store-name">
                          <a href="" style="display: flex;">
                              <iconify-icon style="font-size: 20px;" icon="ri:user-3-line"></iconify-icon>
                              <p>By Agus Store</p>

                          </a>
                      </div>
                      <div class="time">
                          <iconify-icon style="font-size: 20px;" icon="ic:sharp-access-time"></iconify-icon>
                          <p>1 Hours</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row-2">
              <p class="desc">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident eos id voluptas nemo? Reprehenderit, numquam laudantium. Recusandae assumenda debitis, qui cum est molestiae.
              </p>
              <button class="more-info">More Information</button>

          </div>
      </div>
      
      <div class="notif">
          <div class="notif-row-1">
              <div class="right">
                  <h4>Barangnya Otw nih cuy  </h4>
                  <div class="right-row">
                      <div class="store-name">
                          <a href="" style="display: flex;">
                              <iconify-icon style="font-size: 20px;" icon="ri:user-3-line"></iconify-icon>
                              <p>By Agus Store</p>

                          </a>
                      </div>
                      <div class="time">
                          <iconify-icon style="font-size: 20px;" icon="ic:sharp-access-time"></iconify-icon>
                          <p>1 Hours</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row-2">
              <p class="desc">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident eos id voluptas nemo? Reprehenderit, numquam laudantium. Recusandae assumenda debitis, qui cum est molestiae.
              </p>
              <button class="more-info">More Information</button>

          </div>
      </div>
</div>
@endsection
