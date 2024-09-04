<?php

namespace App\Http\Livewire\Siswa;

use Livewire\Component;

class AddToCart extends Component
{
    public $bukuId;
    public $inCart = false;

    public function mount($bukuId)
    {
        $this->bukuId = $bukuId;
        $this->checkInCart();
    }

    public function checkInCart()
    {
        $cart = session()->get('cart', []);
        $this->inCart = in_array($this->bukuId, $cart);
    }

    public function addToCart()
    {
        $cart = session()->get('cart', []);
        if (!in_array($this->bukuId, $cart)) {
            $cart[] = $this->bukuId;
            session()->put('cart', $cart);
            $this->inCart = true;
            $this->emit('cartUpdated'); // Emit event for cart update
        }
    }

    public function render()
    {
        return view('livewire.siswa.add-to-cart');
    }
}