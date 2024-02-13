<div>
    {{ $this->table }}

    <x-modal wire:model.defer="add_modal" align="center">
        <x-card title="New Room">
            <div>
                {{ $this->form }}
            </div>
            <x-slot name="footer">
                <div class="flex justify-start gap-x-2">
                    <x-button slate label="Save Record" wire:click="saveRecord" spinner="saveRecord" right-icon="save" />
                    <x-button label="Cancel" x-on:click="close" />

                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-modal wire:model.defer="edit_modal" align="center">
        <x-card title="New Room">
            <div>
                {{ $this->form }}
            </div>
            <x-slot name="footer">
                <div class="flex justify-start gap-x-2">
                    <x-button slate label="Update Record" wire:click="updateRecord" spinner="updateRecord"
                        right-icon="save" />
                    <x-button label="Cancel" x-on:click="close" />

                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
