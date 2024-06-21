<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Category;

class TransactionCreate extends Component
{
    public $amount;
    public $type = 'income'; // default to income
    public $category_id;
    public $description;
    public $categories = [];

    protected $rules = [
        'amount' => 'required|numeric|min:0',
        'type' => 'required|in:income,expense',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string|max:255',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function submit()
    {
        $this->validate();

        Transaction::create([
            'amount' => $this->amount,
            'type' => $this->type,
            'category_id' => $this->category_id,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Transaction successfully added.');

        $this->reset(['amount', 'type', 'category_id', 'description']);
    }

    public function render()
    {
        return view('livewire.transaction-create')->layout('layouts.app');

    }
}
