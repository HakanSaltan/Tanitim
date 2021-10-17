@extends('layouts.app')
@section('content')
@include('users.partials.header', [
        'title' => __('Hoşgeldiniz') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])  
    <br>
    <div class="container">    
        <div id='app'>
            <sayfalar></sayfalar>
        </div>
    </div>




    <script src="{{URL::Asset('js/app.js')}}"></script>
@endsection


