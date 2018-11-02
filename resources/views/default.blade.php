@extends('layouts.app')

@section('content')

    <div class="container text-center">
       <h1>Список книг и авторов</h1>


    <table class="table table-striped table-bordered w-auto table-hover">
      <thead class="thead-dark">
        <tr class="">
          <th class="">Название книги</th>
          <th class="th th-sm">Краткое описание книги</th>
          <th>Авторы книги</th>
          <th class="text-center">Дата публикации</th>
          <th class="text-center">Действие</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($books as $book)
          <tr class="" >
            <td class="table-success" onclick="window.location='{{ route('show', $book) }}';" style="cursor: pointer;">{{$book->title}}</td>
            <td>{{ \Illuminate\Support\Str::limit($book->description, 70,'...')}}</td>
            <td>
              @foreach ($book->authors as $author)
                {{ $author->firstName ?? '' }} {{ $author->secondName ?? '' }} {{ $author->lastName ?? '' }} <br/>
              @endforeach
              @if ($book->authors->contains('id', $book->id))
              @endif



                    {{-- $book->authors->firstName ?? '' --}} {{-- $author->secondName ?? '' --}} {{-- $author->lastName ?? '' --}} <br/>



            </td>
            <td class="text-center">{{$book->public_at}}</td>
            <td class="text-center">
              <i class="fa fa-eye">
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center"><h2>Данные отсутствуют</h2></td>
          </tr>
        @endforelse
      </tbody>
      <tfoot>
        <tr >
          <td class="" colspan="5">
            <div class="row">
              <ul class="pagination mx-auto text-center">
                {{$books->links()}}
              </ul>
            </div>

          </td>
        </tr>
      </tfoot>
    </table>
</div>


@endsection
