<div class="row">
    <div class="col-md-8 col-md-offset-2">

@isset($book->id)
  <h1>Редактирование книги</h1>
@else
  <h1>Создание книги</h1>
@endisset

    <hr>

{{-- Using the Laravel HTML Form Collective to create our form --}}
    {{ Form::open(array('route' => 'admin.book.store')) }}

    <div class="form-group">
        {{ Form::label('title', 'Название книги') }}
        {{ Form::text('title', isset($book->title) ? $book->title : '', array('class' => 'form-control')) }}
        <br>

        {{ Form::label('description', 'Описание книги') }}
        {{ Form::textarea('description', isset($book->description) ? $book->description : '', array('class' => 'form-control')) }}
        <br>

        {{ Form::label('public_at', 'Описание книги') }}
        {{ Form::date('public_at', isset($book->public_at) ? $book->public_at : '', array('class' => 'form-control')) }}
        <br>

        {{ Form::label('authors', 'Авторы книги') }}
        <select class="form-control col-md-5" name="authors[]" multiple="">
          @include('admin.books.partials._authors')
        </select>
        <br>

        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-block')) }}
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">Back</a>
        {{ Form::close() }}
    </div>
    </div>
</div>
