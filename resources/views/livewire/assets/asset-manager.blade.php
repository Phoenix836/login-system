<div>

    <h1>Asset Register</h1>

    <form wire:submit.prevent="save">

        <input
            type="text"
            wire:model="asset_name"
            placeholder="Asset Name">

        <input
            type="text"
            wire:model="category"
            placeholder="Category">

        <input
            type="text"
            wire:model="serial_number"
            placeholder="Serial Number">

        <input
            type="date"
            wire:model="purchase_date">

        <input
            type="text"
            wire:model="assigned_to"
            placeholder="Assigned To">

        <select wire:model="status">
            <option value="Available">Available</option>
            <option value="Assigned">Assigned</option>
            <option value="Maintenance">Maintenance</option>
            <option value="Retired">Retired</option>
        </select>

        <button type="submit">
            Add Asset
        </button>

    </form>

    <hr>

    @foreach($assets as $asset)

        <div style="margin-bottom:15px;">

            <strong>{{ $asset->asset_name }}</strong>

            <br>

            Category: {{ $asset->category }}

            <br>

            Serial Number: {{ $asset->serial_number }}

            <br>

            Purchase Date: {{ $asset->purchase_date }}

            <br>

            Assigned To: {{ $asset->assigned_to }}

            <br>

            Status: {{ $asset->status }}

            <br><br>

            <button wire:click="delete({{ $asset->id }})">
                Delete
            </button>

        </div>

    @endforeach

</div>
