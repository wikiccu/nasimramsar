@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 pull-right">
            <div class="panel panel-success">
                <div class="panel-heading">
                    ورود به سایت
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        خوش آمدید. شما وارد سایت شده اید!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
