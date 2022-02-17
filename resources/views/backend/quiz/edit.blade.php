@extends('backend.layouts.master')

    @section('title','create quiz')
    
    @section('content')

    <div class="span9">
        <div class="content">

        @if(Session::has('message'))

            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif

        <form action="{{route('quiz.update',[$quiz->id])}}" method="POST">@csrf
        {{method_field('PUT')}}
            <div class="module">
                <div class="module-head">
                        <h3>Create Quiz</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">
                    <lable class="control-label" for="name">Quiz name</label>
                    <div class="controls">
                        <input type="text" name="name" class="span8" placeholder="name of a quiz" value="{{$quiz->name}}">
                    </div>
                   @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror
                    </div>

                    <div class="control-group">
                    <lable class="control-label" for="description">Description</label>
                    <div class="controls">
                        <textarea name="description" class="span8" placeholder="description of a quiz">{{$quiz->description}}</textarea>
                    </div>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    
                    </div>
                    @enderror
                    <div class="control-group">
                    <lable class="control-label" for="minutes">Minutes</label>
                    <div class="controls">
                        <input type="text" name="minutes" class="span8" placeholder="minute" value="{{$quiz->minutes}}">
                    </div>
                    @error('minutes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Update</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

@endsection