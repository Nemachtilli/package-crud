<?php

namespace Nemachtilli\Crud\Http\Controllers;

use Nemachtilli\Crud\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index () {
		$tasks = Task::paginate(5);
		return view('nemachtilli-crud::tasks.index', compact( 'tasks'));
	}

	public function show ($id) {
		$task = Task::findOrFail($id);
		return view('nemachtilli-crud::tasks.detail', compact( 'task'));
	}

	public function create () {
		$titleBtn = "Añadir tarea";
		$route = route('tasks.store');
		$method = "POST";
		$task = new Task;
		return view('nemachtilli-crud::tasks.create', compact('titleBtn', 'route', 'method', 'task'));
	}

	public function store () {
		$this->validate( request(), [
			'task' => 'required|unique:tasks,task|min:5|max:150',
		], [
			'task.required' => 'La tarea es requerida',
			'task.unique' => 'La tarea ya existe',
			'task.min' => 'La tarea tiene muy poco texto, mínimo :min',
			'task.max' => 'La tarea tiene demasiado texto, máximo :max',
		] );

		Task::create(request()->input());
		return redirect()->route('tasks.index')->with('message', ['success', 'Tarea creada correctamente']);
	}

	public function edit ($task) {
		$titleBtn = "Editar tarea";
		$route = route('tasks.update', ['task' => $task]);
		$method = "PUT";
		$task = Task::findOrFail($task);
		return view('nemachtilli-crud::tasks.edit', compact('titleBtn', 'route', 'method', 'task'));
	}

	public function update ($id) {
		$this->validate(request(), [
			'task' => 'required|unique:tasks,task,'.$id.'|min:5|max:150'
		], [
			'task.required' => 'La tarea es requerida',
			'task.unique' => 'La tarea ya existe',
			'task.min' => 'La tarea tiene muy poco texto, mínimo :min',
			'task.max' => 'La tarea tiene demasiado texto, máximo :max',
		]);

		$task = Task::findOrFail($id);
		$task->fill(request()->input())->save();
		return redirect()->route('tasks.index')->with('message', ['success', 'Tarea actualizada correctamente']);
	}

	public function destroy ($id) {
		$task = Task::findOrFail($id);
		$task->delete();
		return back()->with('message', ['success', 'Tarea eliminada correctamente']);
	}
}
