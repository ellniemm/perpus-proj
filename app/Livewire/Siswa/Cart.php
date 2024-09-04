<?php

namespace App\Livewire\Siswa;

use Livewire\Component;

class Cart extends Component
{
    public $cart = [];

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = session()->get('cart', []);

        // Ensure $this->cart is an array
        if (!is_array($this->cart)) {
            $this->cart = []; // Reset to an empty array if it's not an array
        }
    }

    public function updateCart()
    {
        $this->loadCart(); // Reload the cart when cartUpdated event is triggered
    }

    public function render()
    {
        return view('livewire.siswa.cart', [
            'cart' => $this->cart,
        ]);
    }
}
