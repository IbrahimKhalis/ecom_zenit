@extends('layout/app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/notif.css')}}">
@endsection

@section('content')
<div class="notif-content">
  <h1 class="notif-title">
      Notification Feeds
  </h1>
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
              <button class="more-info" onclick="On_klik(this.id)">More Information</button>

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
              <button class="more-info" onclick="On_klik(this.id)">More Information</button>

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
              <button class="more-info" onclick="On_klik(this.id)">More Information</button>

          </div>
      </div>
</div>
<div id="myNotif" class="modalnotif">
    <div class="modal-mid">
        <div class="modalnotif-content">
            <div class="header">
                <span class="close close-notif">&times;</span>
            </div>
            <div class="content">
                <div class="modal-profile">
                    <div class="modal-img-prof">
                        <img src="{{ asset('assets/img/user.png') }}" alt="">
                    </div>
                    <div class="info-notif">
                        <p>Laporan Kalo barang ini utiwi</p>
                        <p>
                            <span>
                                <iconify-icon icon="mdi:user-outline"></iconify-icon>
                                From Agus Mart
                            </span>
                            <span>
                                <iconify-icon icon="mdi:clock-time-four-outline"></iconify-icon>
                                1 Hours Ago
                            </span>
                        </p>
                    </div>
                </div>
                <div class="massage-notif">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, magnam? Ipsum iste voluptas cum corrupti incidunt repellat? Dolorem esse repudiandae quae saepe sequi beatae natus magni consequatur, officia deserunt ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ipsam delectus nostrum est aut asperiores possimus aperiam molestiae alias. Quam saepe, voluptatibus debitis recusandae quos fugiat neque voluptatem quod suscipit.
                    </p>
                </div>
            </div>
        </div>
    
    </div>
</div>
<script src="{{ asset('assets/js/notif.js') }}"></script>
@endsection
