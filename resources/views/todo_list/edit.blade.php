
<form action="{{route('store')}}" method="POST">
    @csrf
    <input type="text" name="title" value="{{$todo_item->title}}">
    <textarea cols="10" rows="10" name="description"> {{$todo_item->description}}</textarea>
    <input type="submit" name="submit" value="send">
</form>
<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
</div>
