<?php

namespace App\Livewire\Transaction;

use App\Models\Berkas;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Transaction_hdr;
use Livewire\WithPagination;


class Peminjaman extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Title('Peminjaman')]

    public $user_nip;
    public $transaction_detail=[];
    public $search_history='';
    public $search_peminjaman='';

    public function getDetail($id_transaction)
    {
        $berkas = Transaction_hdr::find($id_transaction)->transaction_dtl;
        $berkas_item=[];
        foreach($berkas as $item){
            $berkas_item[]= $item['berkas_id'];
        }
        $this->transaction_detail = Berkas::whereIn('berkas_id', $berkas_item)->get();
    }

    public function updatingSearchHistory(){
        $this->resetPage();
    }

    public function render()
    {
        $this->user_nip = Auth()->user()->nip;
        $peminjaman = Transaction_hdr::search($this->search_peminjaman)->where('user_nip', $this->user_nip)->whereIn('transaction_status_id', [1,2])->get();
        $history = Transaction_hdr::search($this->search_history)->where('user_nip', $this->user_nip)->whereIn('transaction_status_id', [3,4])->paginate(5);
        return view('livewire.transaction.peminjaman',[
            'peminjaman' => $peminjaman,
            'history' => $history
        ]);
    }
}
