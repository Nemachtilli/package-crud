@extends('nemachtilli-crud::layouts.app')

@section('content')
    @include('nemachtilli-crud::tasks.partials.task', ['list' => false])
@endsection