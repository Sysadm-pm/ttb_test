@extends('layouts.app')

@section('content')

<div class="container">


  <form class="form-horizontal" action="{{route('admin.book.store')}}" method="post">
    @csrf

    {{-- Form include --}}
    @include('admin.books.partials.form')

  </form>
</div>

<hr>
@endsection
