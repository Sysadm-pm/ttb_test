
<label for="">Название книги</label>
<input type="text" class="form-control" name="title" placeholder="Название книги" value="{{ isset($book->title) ? $book->title : ''}}" required>

<label for="">Описание книги</label>
<textarea  class="form-control" name="description" placeholder="Описание книги" rows="10" cols="30" required>{{isset($book->description) ? $book->description : ''}}</textarea>

<label for="">Дата публикации книги</label>
<input class="form-control" type="date" name="public_at" value="{{ isset($book->public_at) ? $book->public_at : ''}}" required>

<select class="form-control" name="authors[]" multiple="">
  @include('admin.books.partials._authors')
</select>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
