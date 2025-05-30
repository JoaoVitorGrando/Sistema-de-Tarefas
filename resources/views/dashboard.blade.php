@extends('layouts.app')
<!-- dashboard.blade.php é o arquivo que contém a lógica para exibir o painel de controle do usuário. Ele estende o layout app e exibe as tarefas do usuário. -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h3 mb-0">Bem-vindo, {{ Auth::user()->name }}!</h2>
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Nova Tarefa
                        </a>
                    </div>
                    
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="card border-0 bg-primary text-white h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-2">Total de Tarefas</h5>
                                            <p class="display-4 mb-0">{{ Auth::user()->tasks()->count() }}</p>
                                        </div>
                                        <i class="fas fa-tasks fa-3x opacity-50"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 bg-success text-white h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title mb-2">Tarefas Concluídas</h5>
                                            <p class="display-4 mb-0">{{ Auth::user()->tasks()->where('completed', true)->count() }}</p>
                                        </div>
                                        <i class="fas fa-check-circle fa-3x opacity-50"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 bg-light">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="h5 mb-0">Últimas Tarefas</h4>
                                <a href="{{ route('tasks.index') }}" class="btn btn-sm btn-primary">
                                    Ver Todas
                                </a>
                            </div>

                            @php
                                $recentTasks = Auth::user()->tasks()->latest()->take(5)->get();
                            @endphp

                            @if($recentTasks->isEmpty())
                                <div class="text-center py-4">
                                    <i class="fas fa-clipboard-list fa-3x text-secondary mb-3"></i>
                                    <p class="text-secondary mb-0">Você ainda não tem tarefas.</p>
                                </div>
                            @else
                                <div class="list-group list-group-flush">
                                    @foreach($recentTasks as $task)
                                        <div class="list-group-item bg-transparent border-0 px-0">
                                            <div class="d-flex w-100 justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="mb-1">{{ Str::limit($task->title, 30) }}</h5>
                                                    <p class="text-secondary mb-0">{{ Str::limit($task->description, 40) }}</p>
                                                </div>
                                                <div class="text-end">
                                                    <span class="badge bg-{{ $task->completed ? 'success' : 'warning' }} mb-2">
                                                        {{ $task->completed ? 'Concluída' : 'Pendente' }}
                                                    </span>
                                                    <div class="text-secondary small">
                                                        {{ $task->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
