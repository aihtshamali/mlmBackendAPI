
<div class="container">
  <div class="">
    <form class="" action="/share/email" method="post">

        <h3>Please verify that you are 18+</h3>
        <input type="email" name="email" value="">
        <input type="hidden" name="link" value="{{$data['link']}}">

        <input type="hidden" name="id" value="{{$data['id']}}">
        <input type="hidden" name="from_email" value="{{$data['email']}}">
        <input type="hidden" name="timestamp" value="{{$data['time']}}">
        <input type="hidden" name="type" value="{{$data['type']}}">
        <input type="hidden" name="via" value="{{$data['via']}}">

      <button type="submit" name="button">Submit</button>

    </form>
  </div>
</div>
{{$data['id']}}
