@extends('layouts.app')

@section('content')

<div class="container">
  <hr>
  <a href="{{route('admin.book.create')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus-square-o text-info"> </i> Добавить книгу</a>
  <table class="table table-striped">
    <thead>
      <th>Название книги</th>
      <th>Дата публикации</th>
      <th class="text-right">Действие</th>
    </thead>
    <tbody>
      @forelse ($books as $book)
        <tr>
          <td>
            @if($book->created_by == Auth::user()->id )
              <a href=" {{route('admin.book.edit', $book)}} " class="text-success"> {{$book->title}} <i class="fa fa-edit"></i></a>
            @else
              <a href="{{ route('admin.book.show', $book) }}">{{$book->title}} <i class="fa fa-eye"></i></a>
            @endif
          </td>
          <td>{{$book->public_at}}</td>
          <td class="text-right">
            @if($book->created_by == Auth::user()->id )

              <form id="delForm" onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.book.destroy', $book)}}" method="post">
                @method('DELETE')
                @csrf
                  <a href="{{route('admin.book.edit', $book)}}">
                    <i class="fa fa-edit text-success"></i>
                  </a>
                  <a href="{{ route('admin.book.show', $book) }}">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a href="#" onclick="$('#delForm').submit()" class="">
                    <i class="fa fa-trash-o text-danger"></i>
                  </a>
              </form>
            @else
              <a href="{{ route('admin.book.show', $book) }}"><i class="fa fa-eye"></i></a>
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
  {{$books->links()}}

</ul>
        </td>
      </tr>
    </tfoot>
  </table>
</div>

@endsection
