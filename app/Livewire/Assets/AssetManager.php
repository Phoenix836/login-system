<?php

namespace App\Livewire\Assets;

use App\Models\Asset;
use Livewire\Component;

class AssetManager extends Component
{
    public $asset_name;
    public $category;
    public $serial_number;
    public $purchase_date;
    public $assigned_to;
    public $status = 'Available';

    public function save()
    {
        $this->validate([
            'asset_name' => 'required',
            'category' => 'required',
            'serial_number' => 'required',
        ]);

        Asset::create([
            'asset_name' => $this->asset_name,
            'category' => $this->category,
            'serial_number' => $this->serial_number,
            'purchase_date' => $this->purchase_date,
            'assigned_to' => $this->assigned_to,
            'status' => $this->status,
            'user_id' => auth()->id(),
        ]);

        $this->reset([
            'asset_name',
            'category',
            'serial_number',
            'purchase_date',
            'assigned_to',
        ]);

        $this->status = 'Available';
    }

    public function delete($id)
    {
        Asset::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.assets.asset-manager', [
            'assets' => Asset::where('user_id', auth()->id())
                ->latest()
                ->get()
        ])->layout('layouts.app');
    }
}
