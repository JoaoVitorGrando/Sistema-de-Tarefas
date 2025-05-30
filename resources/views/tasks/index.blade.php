@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h3 mb-0">Minhas Tarefas</h2>
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Nova Tarefa
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card border-0 bg-light mb-4">
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-end-0">
                                            <i class="fas fa-search text-secondary"></i>
                                        </span>
                                        <input type="text" class="form-control border-start-0" id="search" placeholder="Buscar tarefas...">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select" id="status">
                                        <option value="">Todos os status</option>
                                        <option value="1">Concluídas</option>
                                        <option value="0">Pendentes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($tasks->isEmpty())
                        <div class="text-center py-5">
                            <i class="fas fa-clipboard-list fa-4x text-secondary mb-3"></i>
                            <h4 class="h5 text-secondary mb-2">Nenhuma tarefa encontrada</h4>
                            <p class="text-secondary mb-0">Comece criando sua primeira tarefa!</p>
                        </div>
                    @else
                        <div class="list-group list-group-flush">
                            @foreach($tasks as $task)
                                <div class="list-group-item bg-transparent border-0 px-0 mb-3">
                                    <div class="card border-0 bg-light">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="flex-grow-1">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <h5 class="mb-0 me-3">{{ $task->title }}</h5>
                                                        <span class="badge bg-{{ $task->completed ? 'success' : 'warning' }}">
                                                            {{ $task->completed ? 'Concluída' : 'Pendente' }}
                                                        </span>
                                                    </div>
                                                    <p class="text-secondary mb-3">{{ $task->description }}</p>
                                                    <div class="d-flex align-items-center text-secondary small">
                                                        <i class="fas fa-clock me-2"></i>
                                                        Criada {{ $task->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                                <div class="ms-3">
                                                    <div class="btn-group">
                                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            {{ $tasks->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const search = document.getElementById('search');
    const status = document.getElementById('status');

    function filterTasks() {
        const searchTerm = search.value.toLowerCase();
        const statusValue = status.value;

        const tasks = document.querySelectorAll('.list-group-item');
        tasks.forEach(task => {
            const title = task.querySelector('h5').textContent.toLowerCase();
            const taskStatus = task.querySelector('.badge').textContent.trim();
            
            const matchesSearch = title.includes(searchTerm);
            const matchesStatus = !statusValue || 
                (statusValue === '1' && taskStatus === 'Concluída') ||
                (statusValue === '0' && taskStatus === 'Pendente');

            task.style.display = matchesSearch && matchesStatus ? 'block' : 'none';
        });
    }

    search.addEventListener('input', filterTasks);
    status.addEventListener('change', filterTasks);
});
</script>
@endpush
@endsection 