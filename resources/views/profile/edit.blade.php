@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h3 mb-0">Editar Perfil</h2>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Voltar
                        </a>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}" class="mb-4">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Salvar Alterações
                        </button>
                    </form>

                    <hr class="my-4">

                    <div class="mb-4">
                        <h3 class="h4 mb-3">Alterar Senha</h3>
                        <form method="POST" action="{{ route('password.update') }}" class="password-update-form">
                            @csrf

                            <div class="mb-3">
                                <label for="current_password" class="form-label">Senha Atual</label>
                                <input type="password" 
                                       class="form-control @error('current_password') is-invalid @enderror" 
                                       id="current_password" 
                                       name="current_password" 
                                       required>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Nova Senha</label>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Nova Senha</label>
                                <input type="password" 
                                       class="form-control" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-key me-2"></i> Alterar Senha
                            </button>
                        </form>
                    </div>

                    <hr class="my-4">

                    <div>
                        <h3 class="h4 mb-3 text-danger">Excluir Conta</h3>
                        <p class="text-secondary mb-3">Depois que sua conta for excluída, todos os seus recursos e dados serão permanentemente excluídos.</p>
                        
                        <button type="button" 
                                class="btn btn-danger" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteAccountModal">
                            <i class="fas fa-trash me-2"></i> Excluir Conta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir sua conta? Esta ação não pode ser desfeita.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i> Confirmar Exclusão
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
