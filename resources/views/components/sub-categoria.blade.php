<div>
    <form wire:submit.prevent="create" class="space-y-6">

        <flux:select wire:model="categoria_id" label="Categoria Pai" placeholder="Selecione a categoria...">
            <option value="">Escolha uma opção...</option> @foreach($categorias as $categoria)
                <flux:select.option value="{{ $categoria->id }}">
                    {{ $categoria->nome_categoria }}
                </flux:select.option>
            @endforeach
        </flux:select>

        <flux:input
            wire:model="nome_subcategoria"
            label="Nome da Sub Categoria"
            placeholder="Digite o nome da subdivisão..."
        />

        <div class="flex justify-end pt-2">
            <flux:button type="submit" variant="primary" color="lime">
                Criar Sub-Categoria
            </flux:button>
        </div>
    </form>

    @if (session()->has('status'))
        <div class="mt-4 text-sm text-green-600 font-medium">
            {{ session('status') }}
        </div>
    @endif
</div>
