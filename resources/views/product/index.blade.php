<x-app-layout title="Product">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>
    <div class="mt-12">
        <a href="{{ route('product.create') }}" class="btn btn-primary">Create New!</a>
    </div>
    <div class="mt-12">
        <div class="container mx-auto p-4">
            <livewire:product.index />
        </div>
    </div>
</x-app-layout>
