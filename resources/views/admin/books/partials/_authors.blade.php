@foreach ($authors as $authorItem)
  <option value="{{ $authorItem->id ?? ''}}"
@isset($book->id)

  @if ($book->authors->contains('id', $authorItem->id))
    selected=""
  @endif

@endisset
    >
    {{ $delimeter ?? '' }}{{ $authorItem->firstName ?? '' }} {{ $authorItem->secondName ?? '' }} {{ $authorItem->lastName ?? '' }}
  </option>

@endforeach
