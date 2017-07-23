@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">UserName</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card_type') ? ' has-error' : '' }}">
                            <label for="card_type" class="col-md-4 control-label">Card Type</label>
                            <div class="col-md-6">
                                <input id="card_type" type="text" class="form-control" name="card_type" value="{{ old('card_type') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('billingAddress') ? ' has-error' : '' }}">
                            <label for="billingAddress" class="col-md-4 control-label">Billing Address</label>
                            <div class="col-md-6">
                                <input id="billingAddress" type="text" class="form-control" name="billingAddress" value="{{ old('billingAddress') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('socialSecurityNo') ? ' has-error' : '' }}">
                            <label for="socialSecurityNo" class="col-md-4 control-label">Social Security No.</label>
                            <div class="col-md-6">
                                <input id="socialSecurityNo" type="int" class="form-control" name="socialSecurityNo" value="{{ old('socialSecurityNo') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('cvv_no') ? ' has-error' : '' }}">
                            <label for="cvv_no" class="col-md-4 control-label">CVV Number</label>
                            <div class="col-md-6">
                                <input id="cvv_no" type="int" class="form-control" name="cvv_no" value="{{ old('socialSecurityNo') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('exp') ? ' has-error' : '' }}">
                          <label for="exp" class="col-md-4 control-label">Expiry Date</label>
                          <div class="col-md-6">
                            <input id="dob" type="date" class="form-control" name="exp" value="{{ old('exp') }}" required autofocus>
                          </div>
                        </div>
                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="exp" class="col-md-4 control-label">DOB</label>
                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="{{ old('dob') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('matrial_status') ? ' has-error' : '' }}">
                            <label for="exp" class="col-md-4 control-label">Matrial Status</label>
                            <div class="col-md-6">
                              <select class="form-control" name="matrial_status">
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
