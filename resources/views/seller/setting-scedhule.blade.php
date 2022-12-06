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
        <a href="{{ route('setting-scedhule') }}">Scedhule</a>
    </div>
    
    <div class="storeops-header">
        <iconify-icon icon="ic:baseline-access-time" style="font-size: 35px;"></iconify-icon>
        <div class="title-header">
            <h5>Store Operational Scedhule</h5>
            <p>Set your store operational schedule</p>
        </div>
    </div>
    
    <div class="storeops-content">
        <div class="scedhule">
            <div class="scedhule-head">
                <h6>Day</h6>
                <h6>Open</h6>
                <h6>Closed</h6>
            </div>
            <div class="sunday">
                <p>Sunday</p>
                <input type="time">
                <input type="time">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="monday">
                <p>monday</p>
                <input type="time">
                <input type="time">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="tuesday">
                <p>tuesday</p>
                <input type="time">
                <input type="time">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="wednesday">
                <p>wednesday</p>
                <input type="time">
                <input type="time">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="thursday">
                <p>thursday</p>
                <input type="time">
                <input type="time">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="friday">
                <p>friday</p>
                <input type="time">
                <input type="time">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
            <div class="saturday">
                <p>saturday</p>
                <input type="time">
                <input type="time">
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <button class="save">Save</button>
    </div>
</div>

  </div>
</div>


@endsection