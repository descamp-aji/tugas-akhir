<?php

namespace App\Livewire\Pengemasan;

use App\Models\Berkas;
use App\Models\Berkas_status;
use App\Models\Kemasan;
use App\Models\Kode_riksa;
use App\Models\Wajib_pajak;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class FormBerkas extends Component
{
    use WithPagination;
    #[Title('Input Berkas')]

    protected $paginationTheme = 'bootstrap';

    public $berkas_id;
    public $wajib_pajak_id;
    public $nama_wp;
    public $no_lhp;
    public $tgl_lhp;
    public $masa_pajak_awal;
    public $masa_pajak_akhir;
    public $berkas_status_id;
    public $kode_riksa_id;
    public $kemasan_id;
    public $search;

    public function updatedWajibPajakId($value)
    {
        $wp = Wajib_pajak::where('wajib_pajak_id', $value)->first();
        if ($wp) {
            $this->nama_wp = $wp->name; 
        } else {
            $this->nama_wp = null;
        }
    }

    public function save()
    {
        $validated= $this->validate([
            'wajib_pajak_id' => 'required',
            'no_lhp' => 'required|unique:berkas,no_lhp',
            'tgl_lhp' => 'required',
            'masa_pajak_awal' => 'required',
            'masa_pajak_akhir' => 'required',
            'berkas_status_id' => 'required',
            'kode_riksa_id' => 'required',
            'kemasan_id' => 'required'
        ]);
        $validated['no_lhp'] = strtoupper($this->no_lhp);
        Berkas::create($validated);

        $this->wajib_pajak_id = null;
        $this->nama_wp = null;
        $this->no_lhp = null;
        $this->tgl_lhp = null;
        $this->masa_pajak_awal = null;
        $this->masa_pajak_akhir = null;
        $this->berkas_status_id = null;
        $this->kode_riksa_id = null;
        $this->kemasan_id = null;

        session()->flash('success', 'Data Berkas berhasil ditambahkan');
        $this->dispatch('close-addDocument');
    }

    public function edit($edit_data)
    {
        $this->berkas_id = $edit_data['berkas_id'];
        $this->wajib_pajak_id = $edit_data['wajib_pajak_id'];
        $this->nama_wp = $edit_data['wajib_pajak']['name'];
        $this->no_lhp = $edit_data['no_lhp'];
        $this->tgl_lhp = $edit_data['tgl_lhp'];
        $this->masa_pajak_awal = $edit_data['masa_pajak_awal'];
        $this->masa_pajak_akhir = $edit_data['masa_pajak_akhir'];
        $this->berkas_status_id = $edit_data['berkas_status_id'];
        $this->kode_riksa_id = $edit_data['kode_riksa_id'];
        $this->kemasan_id = $edit_data['kemasan_id'];
    }

    public function update()
    {
        $this->validate([
            'wajib_pajak_id' => 'required',
            'nama_wp' => 'required',
            'no_lhp'  => 'required|unique:berkas,no_lhp,'.$this->berkas_id.',berkas_id',
            'tgl_lhp' => 'required',
            'masa_pajak_awal' => 'required',
            'masa_pajak_akhir' => 'required',
            'berkas_status_id' => 'required',
            'kode_riksa_id' => 'required',
            'kemasan_id' => 'required',
        ]);

        $berkas = Berkas::findOrFail($this->berkas_id);
        $update_fields = [];

        if($this->wajib_pajak_id !== $berkas->wajib_pajak_id){
            $update_fields['wajib_pajak_id'] = $this->wajib_pajak_id;
        };
        if($this->no_lhp !== $berkas->no_lhp){
            $update_fields['no_lhp'] = strtoupper($this->no_lhp);
        };
        if($this->tgl_lhp !== $berkas->tgl_lhp){
            $update_fields['tgl_lhp'] = $this->tgl_lhp;
        };
        if($this->masa_pajak_awal !== $berkas->masa_pajak_awal){
            $update_fields['masa_pajak_awal'] = $this->masa_pajak_awal;
        };
        if($this->masa_pajak_akhir !== $berkas->masa_pajak_akhir){
            $update_fields['masa_pajak_akhir'] = $this->masa_pajak_akhir;
        };
        if($this->berkas_status_id !== $berkas->berkas_status_id){
            $update_fields['berkas_status_id'] = $this->berkas_status_id;
        };
        if($this->kode_riksa_id !== $berkas->kode_riksa_id){
            $update_fields['kode_riksa_id'] = $this->kode_riksa_id;
        };
        if($this->kemasan_id !== $berkas->kemasan_id){
            $update_fields['kemasan_id'] = $this->kemasan_id;
        };

        if (count($update_fields) > 0) {
            $update_fields['updated_at'] = now();
            $berkas->update($update_fields);
            session()->flash('success', 'Data Berkas berhasil diubah!');
        } else {
            session()->flash('warning', 'Tidak ada perubahan data.');
        }
        return redirect()->route('berkas');

    }

    public function selectedId($id)
    {
        $this->berkas_id = $id;
    }

    public function delete()
    {
        Berkas::where('berkas_id', $this->berkas_id)->delete();
        return redirect()->route('berkas')->with('danger', 'Berkas berhasil dihapus');
    }

    public function render()
    {
        // Ambil hasil pencarian dengan paginasi
        $berkasPaginated = Berkas::search($this->search)->paginate(10);

        // Load relasi pada koleksi hasil pencarian
        $berkasPaginated->load(['wajib_pajak', 'kode_riksa', 'berkas_status', 'kemasan']);

        return view('livewire.pengemasan.form-berkas', [
            'kode_riksa' => Kode_riksa::all(),
            'status' => Berkas_status::all(),
            'kemasan' => Kemasan::all(),
            'berkas' => $berkasPaginated,
        ]);
    }
}
