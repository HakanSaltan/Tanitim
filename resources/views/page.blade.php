@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

<div class="header bg-gradient-primary py-7 py-lg-8">
    <div class="container" >
        <div class="header-body text-center mt-7 mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <h1 class="text-white" v-text="sayfa.sayfa_basligi"></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>

<div class="container mt--10 pb-5">

    <div class="row justify-content-center">
        <h1 v-text="sayfa.sayfa_icerik"></h1>
    </div>

</div>

@endsection
@section('js')
<script>
    let vm = new Vue({
        mixins: [mixin],
        data: {
            sayfa: {!! json_encode($sayfa) !!},
        },
        methods:{}
    });
</script>
@endsection

