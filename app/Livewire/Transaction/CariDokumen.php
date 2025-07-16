<?php

namespace App\Livewire\Transaction;

use App\Models\Berkas;
use App\Models\Transaction_dtl;
use App\Models\Transaction_hdr;
use Livewire\Component;
use Livewire\Attributes\Title;

class CariDokumen extends Component
{
    #[Title('Peminjaman')]

    public $key_word;
    public $kriteria;
    public $result=[];
    public $nama_wp;
    public $npwp;
    public $no_lhp;
    public $tgl_lhp;
    public $kode_riksa;
    public $peminjam;
    public $cart=[];
    public $documents=[];
    public $selectedId;
    public $no_surat;
    public $tgl_surat;
    public $tgl_pengembalian;
    public $tgl_peminjaman;
    public $masa_awal;
    public $masa_akhir;

    public function add_to_cart($id)
    {
        if (!in_array($id, $this->cart)) {
            $this->cart[] = $id;
            // Berkas::where('berkas_id', $id)->update(['berkas_status_id' => 2]);
            session()->flash('success', 'Berkas ditambahkan ke keranjang.');
        } else {
            session()->flash('danger', 'Berkas sudah ada di keranjang.');
        }
    }

    public function selectedBerkas($id)
    {
        $this->selectedId = $id;
    }

    public function delete()
    {
        $this->cart = array_filter($this->cart, fn($id) => $id != $this->selectedId);
        $this->documents = Berkas::WhereIn('berkas_id', $this->cart)->get();
        $this->dispatch('close-modal');
        session()->flash('warning', 'Berkas dihapus dari keranjang.');
    }

    public function keranjang()
    {
        $this->documents = Berkas::WhereIn('berkas_id', $this->cart)->get();
    }

    public function pinjam()
    {
        $this->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'tgl_pengembalian' => 'required',
            'tgl_peminjaman' => 'required'
        ]);
        $userId = Auth()->user()->nip;

        if (count($this->cart) !== 0) {
            $transaction = Transaction_hdr::create([
            'user_nip' => $userId,
            'transaction_status_id' => 1,
            'no_surat' => strtoupper($this->no_surat),
            'tgl_surat' => $this->tgl_surat,
            'tgl_pinjam' => $this->tgl_peminjaman,
            'tgl_kembali' => $this->tgl_pengembalian,
            'tgl_dikembalikan' => null
            ]);

            $dtlData = [];
            foreach($this->cart as $berkasId){
                $dtlData[] = [
                    'transaction_hdr_id' => $transaction->id,
                    'berkas_id' => $berkasId
                ];
            };
            
            Transaction_dtl::insert($dtlData);
            
            $this->cart=[];
            $this->no_surat=null;
            $this->tgl_surat=null;
            $this->tgl_peminjaman=null;
            $this->tgl_pengembalian=null;

            session()->flash('success', 'Transaksi berhasil disimpan. Aktivitas: Menunggu persetujuan');
        } else {
            session()->flash('warning', 'Tidak Ada Berkas yang dipinjam');
        }
        $this->result=[];
        $this->dispatch('close-cart');
    }

    public function detail($id){
        $detail_data = Berkas::find($id);
        $this->npwp= $detail_data["wajib_pajak_id"];
        $this->nama_wp= $detail_data->wajib_pajak->name;
        $this->no_lhp= $detail_data["no_lhp"];
        $this->tgl_lhp= $detail_data["tgl_lhp"];
        $this->kode_riksa= $detail_data["kode_riksa_id"];
        $this->masa_awal= $detail_data["masa_pajak_awal"];
        $this->masa_akhir= $detail_data["masa_pajak_akhir"];
    }

    public function search()
    {
        $this->result = Berkas::with('wajib_pajak')->where($this->kriteria, $this->key_word)->get();
        $this->key_word=null;
        $this->kriteria=null;
    }
    
    public function render()
    {
        return view('livewire.transaction.cari-dokumen', [
            'result' => $this->result,

        ]);
    }
}
