@extends('layout/app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/setting-scedhule.css')}}">
@endsection

@section('content')
@include('components.sidebar')
<div class="contents">
    <div class="sub-content">
        <a href="{{ route('setting-info') }}">Information</a>
        <a href="{{ route('edit-info') }}">Edit Information</a>
        <a href="{{ route('seller.setting-scedhule') }}">Scedhule</a>
    </div>
    
    <div class="storeops-header">
        <iconify-icon icon="ic:baseline-access-time" style="font-size: 35px;"></iconify-icon>
        <div class="title-header">
            <h5>Store Operational Scedhule</h5>
            <p>Set your store operational schedule</p>
        </div>
    </div>
    <form action="{{ route('seller.setting.sche.push') }}" method="POST">
        @csrf
        <div class="storeops-content">
            <div class="scedhule">
                <div class="scedhule-head">
                    <h6>Day</h6>
                    <h6>Open</h6>
                    <h6>Closed</h6>
                </div>
                <div class="sunday">
                    <p>Sunday</p>
                    <input type="time" name="buka_minggu" value="{{ isset($data) ? $data->buka_minggu : ''}}" id="minggu1" onchange="change()">
                    <input type="time" name="tutup_minggu" value="{{ isset($data) ? $data->tutup_minggu : ''}}" id="minggu2" onchange="change()">
                    <label class="switch">
                        <input type="checkbox" name="lib_minggu" id="minggu3" {{ isset($data) && isset($data->buka_minggu) && isset($data->tutup_minggu) ? 'checked' : ''}}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="monday">
                    <p>monday</p>
                    <input type="time" name="buka_senin" value="{{ isset($data) ? $data->buka_senin : ''}}" id="senin1" onchange="change2()">
                    <input type="time" name="tutup_senin" value="{{ isset($data) ? $data->tutup_senin : ''}}" id="senin2" onchange="change2()">
                    <label class="switch">
                        <input type="checkbox" name="lib_senin" id="senin3" {{ isset($data) && isset($data->buka_senin) && isset($data->tutup_senin) ? 'checked' : ''}}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="tuesday">
                    <p>tuesday</p>
                    <input type="time" name="buka_selasa" value="{{ isset($data) ? $data->buka_selasa : ''}}" id="selasa1" onchange="change3()">
                    <input type="time" name="tutup_selasa" value="{{ isset($data) ? $data->tutup_selasa : ''}}" id="selasa2" onchange="change3()">
                    <label class="switch">
                        <input type="checkbox" name="lib_selasa" id="selasa3" {{ isset($data) && isset($data->buka_selasa) && isset($data->tutup_selasa) ? 'checked' : ''}}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="wednesday">
                    <p>wednesday</p>
                    <input type="time" name="buka_rabu" value="{{ isset($data) ? $data->buka_rabu : ''}}" id="rabu1" onchange="change4()">
                    <input type="time" name="tutup_rabu" value="{{ isset($data) ? $data->tutup_rabu : ''}}" id="rabu2" onchange="change4()">
                    <label class="switch">
                        <input type="checkbox" name="lib_rabu" id="rabu3" {{ isset($data) && isset($data->buka_rabu) && isset($data->tutup_rabu) ? 'checked' : ''}}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="thursday">
                    <p>thursday</p>
                    <input type="time" name="buka_kamis" value="{{ isset($data) ? $data->buka_kamis : ''}}" id="kamis1" onchange="change5()">
                    <input type="time" name="tutup_kamis" value="{{ isset($data) ? $data->tutup_kamis : ''}}" id="kamis2" onchange="change5()">
                    <label class="switch">
                        <input type="checkbox" name="lib_kamis" id="kamis3" {{ isset($data) && isset($data->buka_kamis) && isset($data->tutup_kamis) ? 'checked' : ''}}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="friday">
                    <p>friday</p>
                    <input type="time" name="buka_jumat" value="{{ isset($data) ? $data->buka_jumat : ''}}" id="jumat1" onchange="change6()">
                    <input type="time" name="tutup_jumat" value="{{ isset($data) ? $data->tutup_jumat : ''}}" id="jumat2" onchange="change6()">
                    <label class="switch">
                        <input type="checkbox" name="lib_jumat" id="jumat3" {{ isset($data) && isset($data->buka_jumat) && isset($data->tutup_jumat) ? 'checked' : ''}}>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="saturday">
                    <p>saturday</p>
                    <input type="time" name="buka_sabtu" value="{{ isset($data) ? $data->buka_sabtu : ''}}" id="sabtu1" onchange="change7()">
                    <input type="time" name="tutup_sabtu" value="{{ isset($data) ? $data->tutup_sabtu : ''}}" id="sabtu2" onchange="change7()">
                    <label class="switch">
                        <input type="checkbox" name="lib_sabtu" id="sabtu3" {{ isset($data) && isset($data->buka_sabtu) && isset($data->tutup_sabtu) ? 'checked' : ''}}>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            <button class="save" type="submit">Save</button>
        </div>
    </form>
</div>

</div>
</div>

<script src="{{ asset('assets/js/schedule.js') }}"></script>




@endsection