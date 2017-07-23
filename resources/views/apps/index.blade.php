@extends('layouts.app')
@section('content')
  <div class="container">
    <span align="center" >
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </span>
    <h3 style="float:left  ">appS Data:</h3>
    <a href="{{route('apps.create')}}"  style="margin-top: 22px"class="btn btn-success pull-right ">Create an App</a>
    <table class="table">
      <tr>
        <th>Title</th>
        <th>SubTitle</th>
        <th>Link</th>
        <th>img_url</th>
        <th>Actions</th>
      </tr>
      @forelse ($apps as $a)
        <tr>
          <td>{{$a->title}}</td>
          <td>{{$a->subtitle}}</td>
          <td>{{$a->link}}</td>
          <td>{{$a->img_url}}</td>
          <td><a href="{{route('apps.edit',$a->id)}}" class="btn btn-small btn-primary">Edit</a></td>
          <td>    <td>
                  <form action="{{route('apps.destroy',$a->id)}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                  </form>
              </td></td>
        </tr>
      @empty
        <td>No $apps Data</td>
      @endforelse
    </table>
  </div>
@endsection
