<?php

namespace App\Livewire\Siswa;

use App\Models\Buku;
use Livewire\Component;

class SearchBuku extends Component
{
    public $search = '';
    public $bukus = [];

    public function updatedSearch()
    {
        $this->bukus = Buku::where('buku_nama', 'like', '%' . $this->search . '%')
                           ->orWhere('buku_deskripsi', 'like', '%' . $this->search . '%')
                           ->get();
    }

    public function render()
    {
        return view('livewire.siswa.search-buku', [
            'bukus' => $this->bukus,
        ]);
    }
}
