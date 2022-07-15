<div class="col-12 pb-3">
    <div class="card">
        <div class="card-header">
            ID: {{ $task->id }} - {{ $task->task }}
        </div>

        @if ($list)
            <div class="card-footer">
                <div class="float-right">
                    <a href="{{ route('tasks.show', ['task' => $task]) }}" class="btn btn-info">Detalle</a>
                    <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-secondary">Editar</a>

                    <form method="POST" class="float-right" action="{{ route('tasks.destroy', ['task' => $task]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger ml-2" value="Eliminar" />
                    </form>
                </div>
            </div>
        @else
            <div class="card-footer">
                <div class="float-right">
                    <a href="{{ route('tasks.index') }}" class="btn btn-info">Listado</a>
                </div>
            </div>
        @endif
    </div>
</div>