@extends('layouts.app')

@section('content')

<div class="container">

  <form class="form-horizontal" action="{{ route('admin.book.update', ['book' => $book,'previous'=>url()->previous()]) }}" method="post">
    @method('PUT')
    @csrf

    {{-- Form include --}}
    @include('admin.books.partials.form')

  </form>
</div>
<hr/>
@endsection
