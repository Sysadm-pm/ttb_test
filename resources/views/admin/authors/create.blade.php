@extends('layouts.app')

@section('content')

<div class="container">



  <hr />

  <form class="form-horizontal" action="{{route('admin.author.store')}}" method="post">
    @csrf

    {{-- Form include --}}
    @include('admin.authors.partials.form')

  </form>
</div>

@endsection
