<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TaskController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        try { //exemplo de passagem de dados 
            $tasks = Auth::user()->tasks()->latest()->paginate(90); // pega as tarefas mais recentes
            return view('tasks.index', compact('tasks')); // envia pra view
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Erro ao carregar tarefas.');
        }
    }

    // Mostra o formulário para criar nova tarefa
    public function create()
    {
        return view('tasks.create');
    }

    // Salva uma nova tarefa no banco
    public function store(Request $request)
    {
        try {
            // Valida o formulário
            $request->validate([
                'title' => 'required|string|max:30',
                'description' => 'nullable|string|max:130',
                'completed' => 'boolean'
            ]);

            // Evita salvar tarefas duplicadas em menos de 5 segundos
            $duplicateTask = Auth::user()->tasks()
                ->where('title', $request->title)
                ->where('description', $request->description)
                ->where('created_at', '>=', now()->subSeconds(5))
                ->first();

            if ($duplicateTask) {
                return back()->withInput()->with('error', 'Esta tarefa já foi criada recentemente.');
            }

            Auth::user()->tasks()->create($request->all()); // cria a tarefa
            return redirect()->route('tasks.index')->with('success', 'Tarefa criada com sucesso!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erro ao criar tarefa.');
        }
    }

    // Mostra os detalhes de uma tarefa específica
    public function show(Task $task)
    {
        try {
            $this->authorize('view', $task); // verifica se o usuário pode ver
            return view('tasks.show', compact('task'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tasks.index')->with('error', 'Tarefa não encontrada.');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Erro ao visualizar tarefa.');
        }
    }

    // Mostra o formulário de edição da tarefa
    public function edit(Task $task)
    {
        try {
            $this->authorize('update', $task); // verifica permissão
            return view('tasks.edit', compact('task'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tasks.index')->with('error', 'Tarefa não encontrada.');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Erro ao editar tarefa.');
        }
    }

    // Atualiza uma tarefa existente
    public function update(Request $request, Task $task)
    {
        try {
            $this->authorize('update', $task); // verifica permissão

            // Validação
            $request->validate([
                'title' => 'required|string|max:30',
                'description' => 'nullable|string|max:80',
                'completed' => 'boolean'
            ]);

            $task->update($request->all()); // salva alterações
            return redirect()->route('tasks.index')->with('success', 'Tarefa atualizada com sucesso!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tasks.index')->with('error', 'Tarefa não encontrada.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Erro ao atualizar tarefa.');
        }
    }

    // Exclui uma tarefa
    public function destroy(Task $task)
    {
        try {
            $this->authorize('delete', $task); // verifica permissão
            $task->delete(); // deleta do banco
            return redirect()->route('tasks.index')->with('success', 'Tarefa excluída com sucesso!');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('tasks.index')->with('error', 'Tarefa não encontrada.');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Erro ao excluir tarefa.');
        }
    }
}
 //Fluxo Completo de Autorização
//Usuário faz requisição
//Middleware auth verifica autenticação
//Policy verifica se usuário tem permissão
//Se autorizado, executa a ação
//Retorna resposta com feedback
