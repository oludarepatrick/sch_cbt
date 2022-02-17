@extends('backend.layouts.master')

    @section('title','User Result')
    
    @section('content')
    <div class="span9">
        <div class="content">
        @if(Session::has('message'))

            <div class="alert alert-success">{{Session::has('message')}}</div>
        @endif
        <div class="module">
                <div class="module-head">
                        <h3>User Result</h3>
                        </div>
                <div class="module-body">
                <table class="table table-stripped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                    </tr>
                    </thead>
                    </tbody>
                    @if(count($quizzes)>0)
                    @foreach($quizzes as $quiz)
                    @foreach($quiz->users as $key=>$user)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$quiz->name}}</td>
                    <td><a href="result/{{$user->id}}/{{$quiz->id}}">
                        <button class="btn btn-primary">View Result</button></a>
                    </td>
                    </tr>
                    @endforeach
                    @endforeach

                    @else
                    <td>No user Result to display</td>
                    @endif

                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

@endsection