@extends('layouts.1column', [
    'newsletter' => 0
])

@push('footer_js')
    <script src="{{ URL('/') }}/js/auth.js"></script>
@endpush

@section('title', trans('titles.restore_password'))

@section('content')
    <div class="page-auth" id="js-page-auth" style="background-image: url('{{ URL('/') }}/images/bg-register.jpg');" data-bg-login="/images/bg-login.jpg" data-bg-register="/images/bg-register.jpg">
        <div class="page-auth__container site-width">
            <div class="spacer">
                <div class="heading-decorative">
                    <h1 class="heading-decorative__title">
                        <span>@lang('auth.headings.reset')</span>
                    </h1>
                    <h2 class="heading-decorative__subtitle">@lang('auth.headings.password')</h2>
                </div>
                <div class="page-auth__forms box-tabs">
                    <div class="tab-content">
                        <div class="tab">

                            {{ Form::open([
                                'url' => route('reset_password'),
                                'method' => 'POST',
                                'class' => 'form js-form form-login form-grey',
                                'role' => 'form'
                            ]) }}

                            <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-row">
                                    <div class="form-item">
                                        {{ Form::label('email', trans('auth.labels.email'), [
                                            'class' => 'form-label'
                                        ]) }}
                                        <div class="form-input">
                                            @if ($errors->has('email'))
                                                <span class="form-item-errors">
                                                    <span>{{ $errors->first('email') }}</span>
                                                </span>
                                            @endif
                                            {{ Form::email('email', old('email'), [
                                                'placeholder' => trans('auth.placeholders.email'),
                                                'maxlength' => 255,
                                                'required',
                                                'class' => $errors->has('email') ? 'form-control parsley-error' : 'form-control',
                                                'data-parsley-type-message' => trans('auth.validation.email')
                                            ]) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-item">
                                        {{ Form::label('password', trans('auth.labels.password'), [
                                            'class' => 'form-label'
                                        ]) }}

                                        <div class="form-input">
                                            @if ($errors->has('password'))
                                                <span class="form-item-errors">
                                                    <span>{{ $errors->first('password') }}</span>
                                                </span>
                                            @endif
                                            {{ Form::password('password', [
                                                'placeholder' => trans('auth.placeholders.password'),
                                                'required',
                                                'class' => $errors->has('password') ? 'form-control parsley-error' : 'form-control'
                                            ]) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-item">
                                        {{ Form::label('password_confirmation', trans('auth.labels.confirm_password'), [
                                            'class' => 'form-label'
                                        ]) }}

                                        <div class="form-input">
                                            @if ($errors->has('password'))
                                                <span class="form-item-errors">
                                                    <span>{{ $errors->first('password_confirmation') }}</span>
                                                </span>
                                            @endif
                                            {{ Form::password('password_confirmation', [
                                                'placeholder' => trans('auth.placeholders.confirm_password'),
                                                'required',
                                                'class' => $errors->has('password_confirmation') ? 'form-control parsley-error' : 'form-control',
                                                'data-parsley-equalto' => '#password'
                                            ]) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn is-large">
                                        @lang('auth.buttons.reset_password')
                                    </button>
                                </div>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

