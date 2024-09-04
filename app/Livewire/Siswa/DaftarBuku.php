<?php

namespace App\Livewire\Siswa;

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

        // Ensure $this->cart is an array
        if (!is_array($this->cart)) {
            $this->cart = []; // Reset to an empty array if it's not an array
        }
    }

    public function addToCart($bukuId)
    {
        $cart = session()->get('cart', []);
        $buku = Buku::find($bukuId); // Asumsikan Anda memiliki model Buku

        $cart[] = [
            'id' => $bukuId,
            'nama' => $buku->buku_nama,
            'quantity' => 1
        ];

        session()->put('cart', $cart);
        $this->dispatch('cartUpdated');
    }

    public function handleCartUpdated()
    {
        $this->loadCart();
        session()->flash('message', 'Keranjang diperbarui!');
    }

    public function render()
    {
        $cart = session()->get('cart', []);
        return view('livewire.siswa.daftar-buku', [
            'bukus' => $this->bukus,
            'cart' => $this->cart,
        ]);
    }
}
