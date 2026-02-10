<div>
    <form wire:submit.prevent="save" class="space-y-6">

        <flux:select wire:model="sub_categoria_id" label="Sub-Categoria Pai" placeholder="Onde este texto será salvo?">
            <option value="">Selecione...</option>
            @foreach($subcategorias as $sub)
                <flux:select.option value="{{ $sub->id }}">
                    {{ $sub->nome_subcategoria }} </flux:select.option>
            @endforeach
        </flux:select>

        <flux:textarea
            wire:model="conteudo"
            label="Conteúdo da Postagem"
            placeholder="Escreva livremente aqui..."
            rows="6"
        />

        <div class="flex justify-end pt-2">
            <flux:button type="submit" variant="primary" color="purple">
                Publicar Postagem
            </flux:button>
        </div>
    </form>

    @if (session()->has('status'))
        <div class="mt-4 text-sm text-green-600 font-medium">
            {{ session('status') }}
        </div>
    @endif
</div>
