@extends('layouts.app')
<!-- welcome.blade.php é o arquivo que contém a lógica para exibir a página inicial do aplicativo. Ele estende o layout app e exibe uma mensagem de boas-vindas. -->
@section('content')
<div class="container">
    <div class="welcome-banner text-center">
        <h1>Bem-vindo ao Produtiva</h1>
        <p>Gerencie suas tarefas de forma simples e eficiente</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <i class="fas fa-check-circle text-primary" style="font-size: 3rem;"></i>
                        <h2 class="h3 mt-3">Sistema de Gerenciamento de Tarefas</h2>
                        <p class="text-secondary">Organize suas atividades e aumente sua produtividade</p>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fas fa-tasks text-primary mb-3" style="font-size: 2rem;"></i>
                                <h3 class="h5">Organize</h3>
                                <p class="text-secondary small">Mantenha suas tarefas organizadas e acessíveis</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fas fa-clock text-primary mb-3" style="font-size: 2rem;"></i>
                                <h3 class="h5">Acompanhe</h3>
                                <p class="text-secondary small">Monitore o progresso das suas atividades</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="fas fa-chart-line text-primary mb-3" style="font-size: 2rem;"></i>
                                <h3 class="h5">Produza</h3>
                                <p class="text-secondary small">Aumente sua produtividade diária</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">
                                <i class="fas fa-sign-in-alt me-2"></i> Entrar
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-user-plus me-2"></i> Registrar
                            </a>
                        @else
                            <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-tasks me-2"></i> Minhas Tarefas
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
