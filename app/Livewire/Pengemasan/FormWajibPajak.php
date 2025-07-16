<?php

namespace App\Livewire\Pengemasan;

use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\Wajib_pajak;
use Livewire\Component;

class FormWajibPajak extends Component
{
    use WithPagination;
    #[Title('Input Wajib Pajak')]
    
    protected $paginationTheme = 'bootstrap';   

    public $selected;
    public $wajib_pajak_id;
    public $name;
    public $jenis;
    public $old_wajib_pajak_id;
    public $update_wajib_pajak_id;
    public $update_name;
    public $update_jenis;
    public $search='';

    public function selectedTaxPayer($id)
    {
        $this->selected = $id;
    }

    public function delete()
    {
        Wajib_pajak::where('wajib_pajak_id', $this->selected)->delete();
        return redirect()->route('wajibPajak')->with('danger', 'Pengguna berhasil dihapus');
    }

    public function edit($tax_payer)
    {
        $this->update_wajib_pajak_id = $tax_payer['wajib_pajak_id'];
        $this->old_wajib_pajak_id = $tax_payer['wajib_pajak_id'];
        $this->update_name = $tax_payer['name'];
        $this->update_jenis = $tax_payer['jenis'];
    }

    public function update()
    {
        $this->validate([
            'update_wajib_pajak_id' => 'required|min:15|unique:wajib_pajak,wajib_pajak_id,' . $this->old_wajib_pajak_id . ',wajib_pajak_id',
            'update_name' => 'required',
            'update_jenis' => 'required',
        ]);

        $taxpayer = Wajib_pajak::findOrFail($this->old_wajib_pajak_id);
        $update_fields =[];
        if($this->update_wajib_pajak_id !== $taxpayer->wajib_pajak_id){
            $update_fields['wajib_pajak_id'] = $this->update_wajib_pajak_id;
        };
        if($this->update_name !== $taxpayer->name){
            $update_fields['name'] = ucwords(strtolower($this->update_name));
        };
        if($this->update_jenis !== $taxpayer->jenis){
            $update_fields['jenis'] = $this->update_jenis;
        };

        if (count($update_fields) > 0) {
            $update_fields['updated_at'] = now();
            $taxpayer->update($update_fields);
            session()->flash('success', 'Data Wajib Pajak berhasil diubah!');
        } else {
            session()->flash('warning', 'Tidak ada perubahan data.');
        }
        return redirect()->route('wajibPajak');

    }
    
    public function save()
    {
        $this->validate([
            'wajib_pajak_id' => 'required|min:15|unique:wajib_pajak',
            'name' => 'required',
            'jenis' => 'required',
        ]);

        Wajib_pajak::create([
            'wajib_pajak_id' => $this->wajib_pajak_id,
            'name' => ucwords(strtolower($this->name)),
            'jenis' => $this->jenis
        ]);

        $this->wajib_pajak_id = null;
        $this->name = null;
        $this->jenis = null;

        session()->flash('success', 'Data Wajib Pajak berhasil ditambah!');
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.pengemasan.form-wajib-pajak',[
            'tax_payers' => Wajib_pajak::search($this->search)->orderBy('name', 'asc')->paginate(5)
        ]);
    }
}
