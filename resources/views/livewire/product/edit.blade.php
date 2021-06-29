<div class="container">
    <h2 class="text-center">Editar Producto</h2>
    @if(session()->has('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif
    <div class="row justify-content-center">
        <form wire:submit.prevent="save">
        <label for="">Nombre producto</label>
            <input type="hidden" wire:model.defer="data.slug">

            <input type="text" wire:model.defer="data.name" class="form-control mb-2">
            @error('name') <p class="error mb-2">{{ $message }}</p> @enderror

            <label for="">Descripción</label>
            <textarea cols="20" rows="5" wire:model.defer="data.description" class="form-control mb-2"></textarea>
            @error('description') <p class="error mb-2">{{ $message }}</p> @enderror

            <label for="">Precio</label>
            <input type="text" wire:model.defer="data.price" class="form-control mb-2"> 
            @error('price') <p class="error mb-2">{{ $message }}</p> @enderror

            <label for="">Imagen</label>
            <input type="file" wire:model.defer="newThumbnail" class="form-control mb-2">
            @error('newThumbnail') <p class="error mb-2">{{ $message }}</p> @enderror
            @if($newThumbnail)
                <img width="350" src="{{ $newThumbnail->temporaryUrl() }}" alt="">
            @elseif($data['thumbnail'])
                <img width="350" src="{{ asset('storage/'.$data['thumbnail']) }}" alt="">
            @endif

            <button type="submit" class="btn btn-outline-primary btn-block">Guardar Foto</button>
        </form>
    </div>
</div>
