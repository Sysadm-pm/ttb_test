
<label for="">Имя</label>
<input type="text" class="form-control" name="firstName" placeholder="Имя" value="{{ isset($author->firstName) ? $author->firstName : ''}}" required>

<label for="">Отчество</label>
<input class="form-control" type="text" name="secondName" placeholder="Отчество" value="{{isset($author->secondName) ? $author->secondName : ''}}" required>

<label for="">Фамилия</label>
<input class="form-control" type="text" name="lastName" placeholder="Фамилия" value="{{ isset($author->lastName) ? $author->lastName : ''}}" required>

<label for="">Описание</label>
<textarea  class="form-control" name="description" placeholder="Описание книги" rows="10" cols="30" required>{{isset($author->description) ? $author->description : ''}}</textarea>

<label for="">Дата рождения</label>
<input class="form-control" type="date" name="was_born" value="{{ isset($author->was_born) ? $author->was_born : ''}}" required>

<input class="form-control" type="hidden" name="created_by" value="{{ isset($author->created_by) ? $author->created_by : ''}}" disabled>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
