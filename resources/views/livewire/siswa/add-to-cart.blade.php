<?php

namespace App\Http\Livewire\Siswa;

use App\Models\Buku;
use Livewire\Component;

class DaftarBuku extends Component
{
    public $bukus;
    public $cart = [];

    public function mount()
    {
        $this->bukus = Buku::all();
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = session()->get('cart', []);
    }

    public function addToCart($bukuId)
    {
        if (!in_array($bukuId, $this->cart)) {
            $this->cart[] = $bukuId;
            session()->put('cart', $this->cart);
            $this->emit('cartUpdated'); // Emit event for cart update
        }
    }

    public function handleCartUpdated()
    {
        $this->loadCart();
        session()->flash('message', 'Keranjang diperbarui!');
    }

    public function render()
    {
        return view('livewire.siswa.daftar-buku', [
            'bukus' => $this->bukus,
            'cart' => $this->cart,
        ]);
    }
}
