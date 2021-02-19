@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Salut, {{ Auth::user()->firstname }}</div>

                <div class="card-body">
                    <!---->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>reside a {{Auth::user()->city}}, {{Auth::user()->country}}</p>

                </div>
                                    <button onclick="window.location.href='/credit-card'" type="button" class="btn btn-primary">faites votre payment ici</button>
            </div>
        </div>
    </div>
    </div>


</div>
@endsection
