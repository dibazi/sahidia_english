@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">hi, {{ Auth::user()->firstname }}</div>

                <div class="card-body">
                    <!---->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>live in {{Auth::user()->country}}, {{Auth::user()->city}}</p>
                     <p>{{Auth::user()->profile->description}}</p>


                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    </div>

</div>
@endsection
