@extends('admin.layouts.master')

@section('title', 'User Profile')

@section('page-title', 'User Profile')

@section('breadcrumb')
<li class="active">User Profile</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile text-center">
                <img class="profile-user-img img-responsive img-circle" src="{{ asset($user->avatar_thumb) }}" alt="User profile picture">
                <h3 class="profile-username">{{ $user->name }}</h3>
                {!! Form::open(['route' => 'admin.profile.avatar', 'files' => true]) !!}
                <span class="file-wrapper">
                    <input type="file" name="avatar" id="avatar" onchange="this.form.submit()" />
                    <span class="show-button btn btn-primary">Change Avatar</span>
                </span>
                @if($user->avatar)
                    <a href="{{ route('admin.profile.removeavatar') }}" class="btn btn-danger" style="margin-top:-26px;">Remove</a>
                @endif
                {!! Form::close() !!}

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Email</strong>
                <p class="text-muted">{{ $user->email }}</p>
                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                <p class="text-muted">{{ $user->address }}</p>
                <hr>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                <li><a href="#changepassword" data-toggle="tab">Change Password</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    {!! Form::model($user, ['route' => 'admin.profile.update', 'class' => 'form-horizontal profile-form']) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Address', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <div class="tab-pane" id="changepassword">
                    {!! Form::open(['route' => 'admin.profile.changepassword', 'class' => 'form-horizontal password-form']) !!}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('password_confirmation', 'Password Confirmation', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password Confirmation']) !!}
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    $('.file-wrapper input[type=file]').bind('change focus click', SITE.fileInputs);

    $('.profile-form').validate({
        rules: {
            name: 'required',
            email: {required: true, email: true}
        }
    });
    $('.password-form').validate({
        rules: {
            password: 'required',
            password_confirmation: {required: true, equalTo: '#password'}
        },
        messages: {
            password_confirmation: {
                equalTo: 'The password confirmation does not match.'
            }
        }
    });
});
</script>
@endsection