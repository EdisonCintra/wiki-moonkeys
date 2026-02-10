<div>
    <form wire:submit.prevent="create">
        <flux:input
            wire:model="nome"
            label="Nome da Categoria"
            placeholder="Ex: Regras"
        />

        <div class="flex justify-end pt-4">
            <flux:button type="submit" variant="primary">Salvar Categoria</flux:button>
        </div>
    </form>

    @if (session()->has('status'))
        <div class="mt-2 text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
</div>
