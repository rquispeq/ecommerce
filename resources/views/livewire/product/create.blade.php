<div>
    <h2 class="text-center">Agregar nuevo producto</h2>
    <div class="row justify-content-center">
        <div class="col-sm-6">
        <form wire:submit.prevent="save">
            <label for="">Nombre producto</label>
            <input type="text" wire:model="name" class="form-control mb-2">
            @error('name') <p class="error mb-2">{{ $message }}</p> @enderror

            <label for="">Descripción</label>
            <textarea cols="20" rows="5" wire:model="description" class="form-control mb-2"></textarea>
            @error('description') <p class="error mb-2">{{ $message }}</p> @enderror

            <label for="">Precio</label>
            <input type="text" wire:model="price" class="form-control mb-2"> 
            @error('price') <p class="error mb-2">{{ $message }}</p> @enderror

            <label for="">Imagen</label>
            <input type="file" wire:model="thumbnail" class="form-control mb-2">
            @error('thumbnail') <p class="error mb-2">{{ $message }}</p> @enderror
            @if($thumbnail)
                <img src="{{ $thumbnail->temporaryUrl() }}" alt="">
            @endif

            <button type="submit" class="btn btn-outline-primary btn-block">Guardar Foto</button>
        </form>
        </div>
    </div>
</div>
