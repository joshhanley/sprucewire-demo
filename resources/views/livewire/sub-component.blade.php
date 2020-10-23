<div class="space-y-4">
    <h1 class="text-2xl font-bold">Child Component</h1>

    <div class="flex flex-col space-y-8 sm:space-x-8 sm:space-y-0 sm:flex-row">
        <div class="p-2 flex flex-col space-y-4 rounded bg-gray-50 border border-gray-300">
            <h1 class="text-xl font-bold">Livewire Two</h1>

            <div class="flex space-x-4">
                <div class="flex flex-col space-y-4">
                    <span class="font-bold">Props:</span>

                    <span class="py-2 border border-transparent font-bold">Other</span>

                    <div class="flex flex-col">
                        <span class="font-bold">Random</span>

                        <span class="font-bold text-sm">(deferred)</span>
                    </div>
                </div>

                <div class="flex flex-col space-y-4">
                    <span class="px-4 font-bold">Input:</span>

                    <input type="text" wire:model="other" class="px-4 py-2 w-full xl:w-48 border rounded shadow" />

                    <input type="text" wire:model="random" class="px-4 py-2 w-full xl:w-48 border rounded shadow" />
                </div>

                <div class="flex flex-col space-y-4">
                    <span class="font-bold">Output:</span>

                    <span class="py-2 w-full xl:w-48 border border-transparent truncate">{{ $other }}</span>

                    <span class="py-2 w-full xl:w-48 border border-transparent truncate">{{ $random }}</span>
                </div>
            </div>

            <div class="flex justify-end">
                <button class="px-4 py-2 border border-gray-700 rounded shadow font-medium bg-gray-700 text-gray-50 hover:bg-gray-900" wire:click='$refresh'>Refresh Server</button>
            </div>
        </div>

        <div
            x-data
            x-init="
            $sprucewire.loadStore('main', {
                name: $sprucewire.entangle('other'),
                sample: $sprucewire.entangle('random').defer
            });
            Livewire.hook('message.sent', (message, component) => {
                component == $wire.__instance ? $store.requests.childRequests.push(new Date().toLocaleTimeString('en-US')) : null
            })
            "
            class="p-2 flex flex-col space-y-4 rounded bg-gray-50 border border-gray-300">
            <h1 class="text-xl font-bold">Spruce Two</h1>

            <div class="flex space-x-4">
                <div class="flex flex-col space-y-4">
                    <span class="font-bold">Props:</span>

                    <span class="py-2 border border-transparent font-bold">Name</span>

                    <span class="py-2 border border-transparent font-bold">Sample</span>
                </div>

                <div class="flex flex-col space-y-4">
                    <span class="px-4 font-bold">Input:</span>

                    <input type="text" x-model="$store.main.name" class="px-4 py-2 w-full xl:w-48 border rounded shadow" />

                    <input type="text" x-model="$store.main.sample" class="px-4 py-2 w-full xl:w-48 border rounded shadow" />
                </div>

                <div class="flex flex-col space-y-4">
                    <span class="font-bold">Output:</span>

                    <span class="py-2 w-full xl:w-48 border border-transparent truncate" x-text="$store.main.name"></span>

                    <span class="py-2 w-full xl:w-48 border border-transparent truncate" x-text="$store.main.sample"></span>
                </div>
            </div>
        </div>
    </div>
</div>
