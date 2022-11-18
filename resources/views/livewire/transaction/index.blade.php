<div class="container mx-auto p-4">
    <div class="w-full py-4">

        <a href="{{ route('transaction.create') }}" class="btn btn-primary">Create New!</a>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-compact w-full">
            <thead>
                <tr>
                    <th></th>
                    <th>Status</th>
                    <th>Reference Number</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $key => $transaction)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $transaction->status ?? '-' }}</td>
                    <td>{{ $transaction->reference_number ?? '-' }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>{{ $transaction->price }}</td>
                    <td>{{ $transaction->total_price }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->product->name }}</td>
                    <td>
                        <a href="#">detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">EMPTY</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
