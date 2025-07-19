<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use App\Models\Transaction_hdr;
use App\Models\Berkas;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Attributes\Title;


class KonfirmasiTransaksi extends Component
{
    use WithPagination;
    #[Title('Konfirmasi Transaksi')]

    protected $paginationTheme = 'bootstrap';
    public $transaction_detail=[];
    public $name;
    public $phone;
    public $email;
    public $seksi;
    public $selected_id;
    public $tgl_dikembalikan;
    public $search_persetujuan='';
    public $search_pengembalian='';

    public function selectedTransaction($id)
    {
        $this->selected_id = $id;
    }

    public function tolak()
    {
        Transaction_hdr::where('id', $this->selected_id)->update(['transaction_status_id' => 3]);
        session()->flash('warning', 'Peminjaman berkas berhasil ditolak');
        $this->dispatch('close-reject');
    }

    public function kembalikan()
    {
        Transaction_hdr::find($this->selected_id)->update(['transaction_status_id' => 4, 'tgl_dikembalikan'=> $this->tgl_dikembalikan]);
        $berkas = Transaction_hdr::find($this->selected_id)->transaction_dtl;
        foreach($berkas as $item){
            Berkas::where('berkas_id', $item['berkas_id'])->update(['berkas_status_id' => 1]);
        }
        session()->flash('success', 'Pengembalian berkas berhasil');
        $this->dispatch('close-pengembalian');
    }

    public function setujui()
    {
        Transaction_hdr::where('id', $this->selected_id)->update(['transaction_status_id' => 2]);
        $berkas = Transaction_hdr::find($this->selected_id)->transaction_dtl;
        foreach($berkas as $item){
            Berkas::where('berkas_id', $item['berkas_id'])->update(['berkas_status_id' => 0]);
        }
        session()->flash('success', 'Peminjaman berkas berhasil disetujui');
        $this->dispatch('close-approve');
    }

    public function getDetail($id_transaction)
    {
        $berkas = Transaction_hdr::find($id_transaction)->transaction_dtl;
        $berkas_item=[];
        foreach($berkas as $item){
            $berkas_item[]= $item['berkas_id'];
        }
        $this->transaction_detail = Berkas::whereIn('berkas_id', $berkas_item)->get();
    }

    public function updatingSearchPengembalian(){
        $this->resetPage();
    }

    public function getContact($user_nip){
        $contact = User::where('nip', $user_nip)->first();
        $this->name = $contact['name'];
        $this->phone = $contact['phone'];
        $this->email = $contact['email'];
        $this->seksi = $contact->seksi->deskripsi;
    }

    public function render()
    {
        $peminjaman = Transaction_hdr::search($this->search_persetujuan)->where('transaction_status_id', 1)->get();
        $pengembalian = Transaction_hdr::search($this->search_pengembalian)->where('transaction_status_id', 2)->paginate(5);
        return view('livewire.transaction.konfirmasi-transaksi', [
            'peminjaman' => $peminjaman,
            'pengembalian' => $pengembalian
        ]);
    }
}
