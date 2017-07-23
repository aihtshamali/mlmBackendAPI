@extends('layouts.app')
@section('content')
  <div class="container">
    <span align="center" >
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </span>
    <h3 style="float:left  ">Users:</h3>
    <a href="{{route('register')}}"  style="margin-top: 22px"class="btn btn-success pull-right ">New User</a>
    <table class="table">
      <tr>
        <th>Name</th>
        <th>UserName</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>CVV</th>
        <th>DOB</th>
        <th>Card Type</th>
        <th>Expiry Date</th>
        <th>Matrial_status</th>
        <th>socialSecurityNo</th>
        <th>Actions</th>
      </tr>
      @forelse ($users as $a)
        <tr>
          <td>{{$a->name}}</td>
          <td>{{$a->username}}</td>
          <td>{{$a->phoneNo}}</td>
          <td>{{$a->email}}</td>
          <td>{{$a->billingAddress}}</td>
          <td>{{$a->cvv_no}}</td>
          <td>{{$a->dob}}</td>
          <td>{{$a->card_type}}</td>
          <td>{{$a->exp}}</td>
          <td>{{$a->matrial_status}}</td>
          <td>{{$a->socialSecurityNo}}</td>
          <td><a href="{{route('users.edit',$a->id)}}" class="btn btn-small btn-primary">Edit</a></td>
          <td>    <td>
                  <form action="{{route('users.destroy',$a->id)}}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                  </form>
              </td></td>
        </tr>
      @empty
        <td>No Users Added</td>
      @endforelse
    </table>
  </div>
@endsection
