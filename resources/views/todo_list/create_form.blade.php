<div>

    <form action="{{route('store')}}" method="POST">
        @csrf
        <input type="text" name="title">
        <textarea cols="10" rows="10" name="description"></textarea>
        <input type="submit" name="submit" value="send">
    </form>
</div>
