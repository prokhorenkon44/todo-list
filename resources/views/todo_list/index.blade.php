<div>


    <div><a href="{{route("create")}}"> Создать заданиe</a></div>
    @foreach($todolistData as $todo_item)
        @if ($todo_item->status === 1)
            <div style="color:red">
        @else
            <div style="color:green">
        @endif
        <li>{{ $todo_item->title }}</li>
        <li><a href={{route("view_description", $todo_item->id)}}>{{ $todo_item->description }}</a></li>
        <li>{{ route("view_description", $todo_item->id) }}</li>
            </div>


        <div> <a href="{{route('done', $todo_item->id)}}" > Изменить статус </a></div>
        <div> <a href="{{route('edit', $todo_item->id)}}" > Редактировать</a></div>
        <div> <a href="{{route('delete',  $todo_item->id)}}" > Удалить</a></div>

    @endforeach


</div>
<script>
