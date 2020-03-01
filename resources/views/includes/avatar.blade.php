@if(Auth::user()->imagen)
    <div class="container-avatar">
        <img src="{{route('user.avatar',['filename'=>Auth::user()->imagen])}}" class="avatar">
    </div>
@endif