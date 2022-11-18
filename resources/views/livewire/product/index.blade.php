<div class="container mx-auto p-4">
    <div class="w-full py-4">
        <a href="{{ route('product.create') }}" class="btn btn-primary">Create New!</a>
    </div>
    <div class="w-full flex justify-between pb-4 items-center space-x-4">
        <div class="flex space-x-2">
            <input wire:model='price_max' type="number" placeholder="Max Price" class="input w-full max-w-xs" />
            <input wire:model='price_min' type="number" placeholder="Min Price" class="input w-full max-w-xs" />
        </div>
        <div class="flex space-x-2">
            <input wire:model='stock_max' type="number" placeholder="Max stock" class="input w-full max-w-xs" />
            <input wire:model='stock_min' type="number" placeholder="Min stock" class="input w-full max-w-xs" />
        </div>
        <div class="space-x-4">
            <input wire:model='search' type="text" placeholder="Search..." class="input w-full max-w-xs" />
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-compact w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="">detail</a>
                        <a href="{{ route('product.edit', ['product' => $product->id]) }}">edit</a>
                        <a href="">delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">EMPTY</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="w-full mt-4">{{ $products->links() }}</div>
</div>
