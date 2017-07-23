@extends('layouts.app')
@section('content')
  <div class="container">
    <span align="center" >
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </span>
    <h3 style="float:left  ">appShare Data:</h3>
    <a href="{{route('appshare.create')}}"  style="margin-top: 22px"class="btn btn-success pull-right ">Share an App</a>
    <table class="table">
      <tr>
        <th>ByUser</th>
        <th>ToUser</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Downloaded</th>
        <th>Facebook</th>
        <th>Google</th>
        <th>Actions</th>
      </tr>
      @forelse ($appShares as $a)
        <tr>
          <td>{{$a->Byuser->name}}</td>
          <td>{{$a->Touser->name}}</td>
          <td>{{$a->phoneNo}}</td>
          <td>{{$a->email}}</td>
          <td>{{$a->downloaded}}</td>
          <td>{{$a->fb}}</td>
          <td>{{$a->google}}</td>
          <td><a href="{{route('appshare.edit',$a->id)}}" class="btn btn-small btn-primary">Edit</a></td>
          <td>    <td>
                  <form action="{{route('appshare.destroy',$a->id)}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                  </form>
              </td></td>
        </tr>
      @empty
        <td>No AppShare Data</td>
      @endforelse
    </table>
  </div>
@endsection
