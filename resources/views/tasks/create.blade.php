@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h3 mb-0">Nova Tarefa</h2>
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Voltar
                        </a>
                    </div>

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
                                   placeholder="Digite o título da tarefa"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Descrição</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      placeholder="Digite a descrição da tarefa">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox" 
                                       class="form-check-input @error('completed') is-invalid @enderror" 
                                       id="completed" 
                                       name="completed" 
                                       value="1" 
                                       {{ old('completed') ? 'checked' : '' }}>
                                <label class="form-check-label" for="completed">
                                    Tarefa concluída
                                </label>
                                @error('completed')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i> Salvar Tarefa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 