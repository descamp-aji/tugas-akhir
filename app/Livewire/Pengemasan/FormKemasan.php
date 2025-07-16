<?php

namespace App\Livewire\Pengemasan;

use App\Models\Kemasan;
use Livewire\Component;

class FormKemasan extends Component
{
    public $rak;
    public $baris;
    public $kolom;
    public $label;
    public $update_rak;
    public $update_baris;
    public $update_kolom;
    public $update_label;
    public $kemasan_id;
    public $search;
    
    public function setLabel()
    {
        $formated_rak = strtoupper($this->rak);
        $this->label = implode("-", array($formated_rak, $this->baris, $this->kolom));
    }
    public function setLabelUpdate()
    {
        $formated_rak = strtoupper($this->update_rak);
        $this->update_label = implode("-", array($formated_rak, $this->update_baris, $this->update_kolom));
    }

    public function save()
    {
        $this->setLabel();
        $validated = $this->validate([
            'rak' => 'required',
            'baris' => 'required',
            'kolom' => 'required',
            'label' => 'unique:kemasan,label'
        ]);

        $validated['rak'] = strtoupper($validated['rak']);

        Kemasan::create($validated);
        
        $this->rak = null;
        $this->baris = null;
        $this->kolom = null;
        $this->label = null;

        session()->flash('success', 'Data kemasan berhasil ditambahkan');
    }

    public function edit_data($item)
    {
        $this->update_rak = $item['rak'];
        $this->update_baris = $item['baris'];
        $this->update_kolom = $item['kolom'];
        $this->kemasan_id = $item['kemasan_id'];
    }

    public function update()
    {
        $this->setLabelUpdate();
        $this->validate([
            'update_rak' => 'required',
            'update_baris' => 'required',
            'update_kolom' => 'required',
            'update_label' => 'unique:kemasan,label,' . $this->kemasan_id . ',kemasan_id',
        ]);
        $kemasan = Kemasan::findOrFail($this->kemasan_id);
        $update_fields =[];

        if($this->update_rak !== $kemasan->rak){
            $update_fields['rak'] = strtoupper($this->update_rak);
        };
        if($this->update_baris !== $kemasan->baris){
            $update_fields['baris'] = $this->update_baris;
        };
        if($this->update_kolom !== $kemasan->kolom){
            $update_fields['kolom'] = $this->update_kolom;
        };
        if($this->update_label !== $kemasan->label){
            $update_fields['label'] = $this->update_label;
        };

        if (count($update_fields) > 0) {
            $update_fields['updated_at'] = now();
            $kemasan->update($update_fields);
            session()->flash('success', 'Data Kemasan berhasil diubah!');
        } else {
            session()->flash('warning', 'Tidak ada perubahan data.');
        }
        return redirect()->route('kemasan');
    }

    public function selected($id)
    {
        $this->kemasan_id = $id;
    }

    public function delete()
    {
        Kemasan::where('kemasan_id', $this->kemasan_id)->delete();
        return redirect()->route('kemasan')->with('danger', 'Kemasan berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.pengemasan.form-kemasan', [
            'items' => Kemasan::search($this->search)->orderBy('label', 'asc')->paginate(10)
        ]);
    }
}
