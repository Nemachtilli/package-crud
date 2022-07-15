<div class="col-12 p-5">
    <div class="col-8 offset-2">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="text-center">{{ $titleBtn }}</h2>

        <form method="POST" action="{{ $route }}">
            @csrf

            @method($method)

            <div class="form-group">
                <label for="task">Tarea</label>
                <input type="text" class="form-control" id="task" name="task" value="{{ old('task') ?: $task->task }}" />
            </div>

            <input type="submit" class="btn btn-primary" value="{{ $titleBtn }}" />
            <a class="btn btn-info" href="{{ route('tasks.index') }}">Volver al listado</a>
        </form>
    </div>
</div>