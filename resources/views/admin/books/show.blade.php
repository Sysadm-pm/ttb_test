@extends('layouts.app')

@section('content')

    <div class="container text-center">
       <h1>{{ $book->title }}</h1>
       {{--var_dump($book) --}}


    <table class="table table-striped table-bordered w-auto table-hover">
      <thead class="thead-dark">
        <tr class="">

        </tr>
      </thead>
      <tbody>

            <tr class="" >
            <td  class="table-success text-center">{{$book->public_at}}</td>
            </tr>
            <tr>
              <td>{{$book->description}}</td>
            </tr>
            <tr>
                <td class="text-center"></td>
            </tr>

@if(!$book->title)
          <tr>
            <td colspan="4" class="text-center"><h2>Данные отсутствуют</h2></td>
          </tr>
@endif
      </tbody>

    </table>
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">Назад</a>
    @if($book->created_by == Auth::user()->id )
      <a href=" {{route('admin.book.edit', $book)}} " class="btn btn-primary btn-block btn-success"> Редактировать <i class="fa fa-edit"></i></a>
    @else
      <a href="{{ route('admin.book.show', $book) }}">{{$book->title}} <i class="fa fa-eye"></i></a>
    @endif
</div>


@endsection
