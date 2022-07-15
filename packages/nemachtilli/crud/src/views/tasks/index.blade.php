@extends('nemachtilli-crud::layouts.app')

@section('content')
    <div class="row p-5">

        <div class="col-12 mb-2">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary float-right">Añadir tarea</a>
        </div>

        @forelse ($tasks as $task)
            @include('nemachtilli-crud::tasks.partials.task', ['list' => true])
        @empty
            <div class="w-100 p-3">
                <div class="alert alert-dark text-center">No hay ninguna tarea disponible</div>
            </div>
        @endforelse

        @if ($tasks->count())
            {{ $tasks->links() }}
        @endif
    </div>
@endsection