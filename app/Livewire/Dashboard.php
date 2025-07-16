<?php

namespace App\Livewire;

use App\Models\Berkas;
use App\Models\Transaction_hdr;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;



class Dashboard extends Component
{
    use WithPagination;
    #[Title('Dashboard')]
    protected $paginationTheme = 'bootstrap';

    public $transaction_detail=[];
    public $search;

    public function getDetail($id_transaction)
    {
        $berkas = Transaction_hdr::find($id_transaction)->transaction_dtl;
        $berkas_item=[];
        foreach($berkas as $item){
            $berkas_item[]= $item['berkas_id'];
        }
        $this->transaction_detail = Berkas::whereIn('berkas_id', $berkas_item)->get();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'users' => User::get(),
            'berkas' => Berkas::where('berkas_status_id', 1)->get(),
            'pengembalian' => Transaction_hdr::where('transaction_status_id', 2)->get(),
            'persetujuan' => Transaction_hdr::where('transaction_status_id', 1)->get(),
            'monitoring' => Transaction_hdr::search($this->search)->orderBy('transaction_status_id', 'asc')->paginate(5)
        ]);
    }
}
