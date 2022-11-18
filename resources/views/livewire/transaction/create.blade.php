<div class="container mx-auto p-4">
    <form wire:submit.prevent='create'>
        <div class="form-control w-full max-w-xs mb-4">
            <label class="label">
                <span class="label-text">Quantity Product</span>
                @error('quantity')
                <span class="label-text-alt text-rose-500">{{ $message }}</span>
                @enderror
            </label>
            <input wire:model='quantity' min="1" type="number" placeholder="Quantity"
                class="input input-bordered w-full max-w-xs bg-white text-slate-500 placeholder:text-slate-300" />
        </div>
        <div class="form-control w-full max-w-xs mb-4">
            <label class="label">
                <span class="label-text">Product</span>
                @error('product')
                <span class="label-text-alt text-rose-500">{{ $message }}</span>
                @enderror
            </label>
            <select wire:model='product' class="select w-full max-w-xs bg-white text-slate-500 placeholder:text-slate-300">
                <option selected>Pick Product</option>
                @forelse ($products as $item)
                <option value="{{ $item->id }}">{{ $item->name . ' - ' . number_format($item->price) }}</option>
                @empty
                <option>No Product</option>
                @endforelse
            </select>
        </div>
        <button class="btn btn-primary">Add Transaction</button>
    </form>
</div>
