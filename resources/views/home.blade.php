@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @php
                        if ($user->direction[0]->name == 'Магистр') {
                            $document_type = 'диплома';
                        } else {
                            $document_type = 'аттестата';
                        }
                    @endphp
                    <dl class="row mt-4">
                        <dt class="col-sm-4 text-muted">Телефон</dt>
                        <dd class="col-sm-6">{{ $user->phone }}</dd>
                        <dt class="col-sm-4 text-muted">Направление обучения</dt>
                        <dd class="col-sm-6">{{ $user->direction[0]->name }}</dd>
                        <dt class="col-sm-4 text-muted">Номер {{ $document_type }}</dt>
                        <dd class="col-sm-6">{{ $user->document->doc_number }}</dd>
                    </dl>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
