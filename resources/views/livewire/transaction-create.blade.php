<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">

    @if (session()->has('message'))
        <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="py-12">
        <form wire:submit.prevent="submit" class="space-y-6">
            <div class="form-group">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="number" id="amount" wire:model="amount" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select id="type" wire:model="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
                @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" wire:model="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" wire:model="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Add Transaction</button>
        </form>
    </div>
</div>
