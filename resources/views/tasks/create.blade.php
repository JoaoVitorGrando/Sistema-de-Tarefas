@extends('layouts.app') <!--Herança de layout-->

@section('content') <!--Conteúdo da página-->
<divclass="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h3 mb-0">Nova Tarefa</h2> <!--Btn-->
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Voltar
                        </a>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tasks.store') }}" method="POST" id="taskForm">
                        @csrf
                        
                        <div class="mb-4"> <!--Form P-->
                            <label for="title" class="form-label">Título <small class="text-muted">(máximo 30 caracteres)</small></label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
                                   placeholder="Digite o título da tarefa"
                                   maxlength="30"
                                   required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Descrição <small class="text-muted">(máximo 80 caracteres)</small></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="4" 
                                      maxlength="80"
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
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fas fa-save me-2"></i> Salvar Tarefa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('taskForm').addEventListener('submit', function(e) {
    // Desabilita o botão de submit
    document.getElementById('submitBtn').disabled = true;
    
    // Opcional: Adiciona um texto de "Salvando..."
    document.getElementById('submitBtn').innerHTML = 'Salvando...';
});
</script>
@endpush
@endsection 