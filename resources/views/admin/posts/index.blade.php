<h1>Posts</h1>

<a href="{{route('posts.create')}}"> Criar Novo Post </a>
<hr>

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

<form action="{{ route('posts.search')}}" method="post">
    @csrf
    <input type="text" name="search" id="" placeholder="Filtrar: ">
    <button type="submit">Filtrar</button>
</form>


@foreach ($posts as $post)
    <p>
        {{$post->title}}
        [
            <a href="{{ route('posts.show', $post->id)}}">Ver</a> |
            <a href="{{ route('posts.edit', $post->id)}}">Editar</a>
        ]
    </p>
@endforeach


<hr>

@if (isset($filters))
    {{ $posts->appends($filters)->links()}}
@else
    {{ $posts->links()}}
@endif

