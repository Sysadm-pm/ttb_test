@extends('layouts.app')

@section('content')

<div class="container">
  <hr>
  <a href="{{route('admin.author.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-square-o text-info"> </i> Добавить автора</a>
  <table class="table table-striped">
    <thead>
      <th>Имя автора</th>
      <th>Дата рождения</th>
      <th>Создал</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($authors as $author)
        <tr>
          <td>
            @if($author->created_by == Auth::user()->id )
              <a href=" {{route('admin.author.edit', $author)}} " class="text-success"> {{$author->firstName}} {{$author->secondName}} {{$author->lastName}}  <i class="fa fa-edit"></i></a>
            @else
              <a href="{{ route('admin.author.show', $author) }}"> {{$author->firstName}} {{$author->secondName}} {{$author->lastName}} <i class="fa fa-eye"></i></a>
            @endif

          </td>
          <td>{{$author->was_born}}</td>
          <td>
            @foreach ($users->where('id',$author->created_by) as $key => $value)
              {{$value->name}}
            @endforeach
          </td>
          <td class="text-right">
            @if($author->created_by == Auth::user()->id )
              <form id="delForm" onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.author.destroy', $author)}}" method="post">
                @method('DELETE')
                @csrf
                  <a href="{{route('admin.author.edit', $author)}}">
                    <i class="fa fa-edit text-success"></i>
                  </a>
                  <a href="{{ route('admin.author.show', $author) }}">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a href="#" onclick="$('#delForm').submit()" class="">
                    <i class="fa fa-trash-o text-danger"></i>
                  </a>
              </form>
            @else
              <a href="{{ route('admin.author.show', $author) }}">
                <i class="fa fa-eye"></i>
              </a>
            @endif

          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">
<ul class="pagination pull-rigth">
  {{$authors->links()}}

</ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

@endsection
