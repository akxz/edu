@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6 input-group">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus maxlength="11">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direction" class="col-md-4 col-form-label text-md-right">{{ __('Direction') }}</label>

                            <div class="col-md-6">
                                <select name="direction" class="form-control" id="direction">
                                    <option value="1" {{ (old('direction', '1') == '1') ? 'selected': '' }}>Бакалавр</option>
                                    <option value="2" {{ (old('direction', '1') == '2') ? 'selected': '' }}>Магистр</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="document" id="document_label" class="col-md-4 col-form-label text-md-right">{{ __('Document') }}</label>

                            <div class="col-md-6">
                                <input id="document" type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document') }}" required autocomplete="document" autofocus>

                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Получение ID направления (магистр, бакалавр)
    function getDirection() {
        return $('#direction').val();
    }

    // Установка названия документа в зависимости от типа обучения
    function setDocumentLabel() {
        var direction = getDirection();

        if (direction == '1') {
            $('#document_label').text('Номер аттестата');
        } else {
            $('#document_label').text('Номер диплома');
        }
    }

    $(document).ready(function() {
        // Установка текста при загрузке страницы
        setDocumentLabel();

        // Установка названия документа при изменении типа обучения
        $(document).on('change', '#direction', function() {
            setDocumentLabel();
        });
    });
</script>
@endpush
