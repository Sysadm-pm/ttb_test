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
                <td class="text-center">
                  @foreach ($book->authors as $author)
                    {{ $author->firstName ?? '' }} {{ $author->secondName ?? '' }} {{ $author->lastName ?? '' }} <br/>
                  @endforeach
                </td>
            </tr>

@if(!$book->title)
          <tr>
            <td colspan="4" class="text-center"><h2>Данные отсутствуют</h2></td>
          </tr>
@endif
      </tbody>

    </table>
    <a class="btn btn-block btn-outline btn-primary" href="{{ route('default') }}">Назад</a>
</div>


@endsection
