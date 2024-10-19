@extends('layouts.admin')
@section('content')

    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Users
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->


    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-10">

                <div class="card-header">
                    {{ trans('global.my_profile') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("profile.updateProfile") }}">
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.user.fields.mobile') }}</label>
                            <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', auth()->user()->mobile) }}" required>
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>         </div>
        </div>
{{--        <div class="col-md-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    {{ trans('global.change_password') }}--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route("profile.password.update") }}">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="required" for="password">New {{ trans('cruds.user.fields.password') }}</label>--}}
{{--                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>--}}
{{--                            @if($errors->has('password'))--}}
{{--                                <span class="text-danger">{{ $errors->first('password') }}</span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="required" for="password_confirmation">Repeat New {{ trans('cruds.user.fields.password') }}</label>--}}
{{--                            <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" id="password_confirmation" required>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <button class="btn btn-danger" type="submit">--}}
{{--                                {{ trans('global.save') }}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
{{--    <div class="row">--}}
{{--        <div class="col-md-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    {{ trans('global.delete_account') }}--}}
{{--                </div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route("profile.password.destroyProfile") }}" onsubmit="return prompt('{{ __('global.delete_account_warning') }}') == '{{ auth()->user()->email }}'">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <button class="btn btn-danger" type="submit">--}}
{{--                                {{ trans('global.delete') }}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
@endsection
