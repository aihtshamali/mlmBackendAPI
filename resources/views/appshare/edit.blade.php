@extends('layouts.app')
@section('content')
  <div class="container">
    <form  action="{{route('appshare.store')}}" method="post">
      {{csrf_field()}}
    <table class="table-condensed table">
      <tr>
        <td><label for="">Touserid</label></td>
        <td><input class="form-control" type="text" name="ToUserId" value="{{$a->Touserid}}"></td>
      </tr>
      <tr>
        <td><label for="">Phone No</label></td>
        <td><input class="form-control" type="text" name="phoneNo" value="{{$a->phoneNo}}"></td>
      </tr>
      <tr>
        <td><label for="">Email</label></td>
        <td><input class="form-control" type="email" name="email" value="{{$a->email}}"></td>
      </tr>
      <tr>
        <td><label for="">Downloaded</label></td>
        <td>
          <select class="form-control" name="downloaded">
            @if($a->downloaded==0)
            <option value="0" selected>No</option>
            <option value="1" >Yes</option>
          @else
            <option value="1" selected>Yes</option>
            <option value="0" >No</option>
          @endif
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="">FB</label></td>
        <td><input class="form-control" type="text" name="fb" value="{{$a->fb}}"></td>
      </tr>
      <tr>
        <td><label for="">Google</label></td>
        <td><input class="form-control" type="text" name="google" value="{{$a->fb}}"></td>
      </tr>
      <tr>
        <td>      <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button type="submit" class="btn btn-primary">
                Submit
              </button>
            </td>
      </tr>

    </table>
    </form>
  </div>
@endsection
