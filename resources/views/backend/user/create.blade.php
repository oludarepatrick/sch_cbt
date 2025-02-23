@extends('backend.layouts.master')

    @section('title','create user')
    
    @section('content')
    <div class="span9">
        <div class="content">
        @if(Session::get('message'))

            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="module">
                <div class="module-head">
                        <h3>Create User</h3>
                        </div>
                <div class="module-body">
            <form action="{{route('user.store')}}" method="POST">@csrf
            <div class="module">
                <div class="module-head">
                        <h3>Create User</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">
                    <lable class="control-label" for="name">Full name</label>
                    <div class="controls">
                        <input type="text" name="name" class="span8 @error('name') border-red @enderror" placeholder="name" value="{{old('name')}}">
                    </div>
                   @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="control-group">
                    <lable class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input type="text" name="email" class="span8 @error('email') border-red @enderror" placeholder="name" value="{{old('email')}}">
                    </div>
                   @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="control-group">
                    <lable class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="text" name="password" class="span8 @error('password') border-red @enderror" placeholder="password" value="{{old('password')}}">
                    </div>
                   @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror
                    </div>

                    <div class="control-group">
                    <lable class="control-label" for="occupation">Occupation</label>
                    <div class="controls">
                        <input type="text" name="occupation" class="span8 @error('occupation') border-red @enderror" placeholder="occupation" value="{{old('occupation')}}">
                    </div>
                   @error('occupation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror
                    </div>

                    <div class="control-group">
                    <lable class="control-label" for="address">Address</label>
                    <div class="controls">
                        <input type="text" name="address" class="span8 @error('address') border-red @enderror" placeholder="address" value="{{old('address')}}">
                    </div>
                   @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror
                    </div>

                    <div class="control-group">
                    <lable class="control-label" for="phone">Phone</label>
                    <div class="controls">
                        <input type="text" name="phone" class="span8 @error('phone') border-red @enderror" placeholder="phone" value="{{old('phone')}}">
                    </div>
                   @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror
                    </div>
                
                <div class="control-group">
                    <button type="submit" class="btn btn-success">Create User</button>
                </div>
                </form>
                </div>
                </div>
                </div>
                </div>
                </div>
@endsection