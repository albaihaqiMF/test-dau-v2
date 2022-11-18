<div>
    <form wire:submit.prevent='create' class="container mx-auto p-4">
        <div class="form-control w-full max-w-xs mb-4">
            <label class="label">
                <span class="label-text">Name Product</span>
                @error('name')
                <span class="label-text-alt text-rose-500">{{ $message }}</span>
                @enderror
            </label>
            <input wire:model='name' type="text" placeholder="Name product" class="input input-bordered w-full max-w-xs bg-white text-slate-500 placeholder:text-slate-300" />
        </div>
        <div class="form-control w-full max-w-xs mb-4">
            <label class="label">
                <span class="label-text">Price Product</span>
                @error('price')
                <span class="label-text-alt text-rose-500">{{ $message }}</span>
                @enderror
            </label>
            <input wire:model='price' min="10000" type="number" placeholder="ex: 15000" class="input input-bordered w-full max-w-xs bg-white text-slate-500 placeholder:text-slate-300" />
        </div>
        <div class="form-control w-full max-w-xs mb-4">
            <label class="label">
                <span class="label-text">Stock Product</span>
                @error('stock')
                <span class="label-text-alt text-rose-500">{{ $message }}</span>
                @enderror
            </label>
            <input wire:model='stock' min="1" type="number" placeholder="Stock.." class="input input-bordered w-full max-w-xs bg-white text-slate-500 placeholder:text-slate-300" />
        </div>

        <button class="btn btn-primary">Create</button>
    </form>
</div>
