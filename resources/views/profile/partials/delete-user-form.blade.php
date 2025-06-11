<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Excluir Conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Após a exclusão da sua conta, todos os seus dados e recursos serão permanentemente removidos. Antes de excluir sua conta, faça o download de quaisquer dados ou informações que deseja manter.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Excluir Conta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Tem certeza que deseja excluir sua conta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Após a exclusão da sua conta, todos os seus dados e recursos serão permanentemente removidos. Por favor, digite sua senha para confirmar a exclusão permanente da sua conta.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Senha') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Digite sua senha') }}"
                    required
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Excluir Conta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('delete-account-form');
    const button = document.getElementById('delete-account-button');
    
    if (form && button) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Previne o envio padrão
            
            // Desabilita o botão e mostra mensagem
            button.disabled = true;
            button.innerHTML = '{{ __("Excluindo...") }}';
            
            // Envia o formulário manualmente
            fetch(form.action, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    password: document.getElementById('password').value
                })
            })
            .then(response => {
                if (response.redirected) {
                    window.location.href = response.url;
                } else {
                    return response.json();
                }
            })
            .then(data => {
                if (data && data.error) {
                    button.disabled = false;
                    button.innerHTML = '{{ __("Excluir Conta") }}';
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                button.disabled = false;
                button.innerHTML = '{{ __("Excluir Conta") }}';
                alert('Ocorreu um erro ao excluir a conta. Por favor, tente novamente.');
            });
        });
    }
});
</script>
@endpush
