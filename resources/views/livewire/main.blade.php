<div class="pb-4 relative w-full h-screen flex items-center bg-gray-100 overflow-auto">
    <div class="hidden lg:block lg:flex-1"></div>

    <div class="flex flex-col h-full w-full md:w-auto">
        <div class="p-4 h-full overflow-y-auto space-y-8">
            <div>
                <div class="flex justify-start items-center space-x-4">
                    <img class="w-24" src="sprucewire.svg" alt="Sprucewire" />
                    <h1 class="font-bold text-4xl"><span style="color: #7BC1D1">Spruce</span><span style="color: #4E56A6">wire</span></h1>
                </div>

                <div x-data="{ show: false }" class="max-w-screen-lg">
                    <button type="button" class="-ml-4 px-4 py-2 flex items-center font-bold hover:underline" x-on:click="show = ! show">
                        <span>Show Instructions</span>
                        <x-arrow-down class="w-4 h-4" />
                    </button>
                    <div class="space-y-2" x-show="show" x-cloak>
                        <p>There are two types of properties setup:</p>
                        <ul class="ml-4 list-disc">
                            <li>
                                <span class="font-bold">Name</span><br />
                                Uses `wire:model`.<br />
                                If you change name in any of the name inputs you will see all 4 are kept in sync.<br />
                                And requests are sent from both the parent and child Livewire components.
                            </li>
                            <li>
                                <span class="font-bold">Sample</span><br />
                                Uses `wire:model.defer`.<br />
                                If you change sample on the Livewire parent component, it will only sync to the
                                Livewire child component on the next request (simulate with "Refresh Server").<br />
                            </li>
                        </ul>
                        <p>The Livewire child component also have a different property name "Random", showing that Livewire and Spruce property names can be different.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col space-y-8">
                {{-- Put livewire component blade content here or reference another livewire component --}}
                <div class="space-y-4">
                    <h1 class="text-2xl font-bold">Parent Component</h1>

                    <div class="flex flex-col space-y-8 sm:space-x-8 sm:space-y-0 sm:flex-row">
                        <div class="p-2 flex flex-col space-y-4 rounded bg-gray-50 border border-gray-300">
                            <h1 class="text-xl font-bold">Livewire One</h1>

                            <div class="flex space-x-4">
                                <div class="flex flex-col space-y-4">
                                    <span class="font-bold">Props:</span>

                                    <span class="py-2 border border-transparent font-bold">Name</span>

                                    <div class="flex flex-col">
                                        <span class="font-bold">Sample</span>

                                        <span class="font-bold text-sm">(deferred)</span>
                                    </div>
                                </div>

                                <div class="flex flex-col space-y-4">
                                    <span class="px-4 font-bold">Input:</span>

                                    <input type="text" wire:model="name" class="px-4 py-2 w-full xl:w-48 border rounded shadow" />

                                    <input type="text" wire:model="sample" class="px-4 py-2 w-full xl:w-48 border rounded shadow" />
                                </div>

                                <div class="flex flex-col space-y-4">
                                    <span class="font-bold">Output:</span>

                                    <span class="py-2 w-full xl:w-48 border border-transparent truncate">{{ $name }}</span>

                                    <span class="py-2 w-full xl:w-48 border border-transparent truncate">{{ $sample }}</span>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button class="px-4 py-2 border border-gray-700 rounded shadow font-medium bg-gray-700 text-gray-50 hover:bg-gray-900" wire:click='$refresh'>Refresh Server</button>
                            </div>
                        </div>

                        <div
                            wire:key='main-setup'
                            x-data
                            x-init="
                            $sprucewire.registerStore('main', {
                                name: $sprucewire.entangle('name'),
                                sample: $sprucewire.entangle('sample').defer
                            });

                            Spruce.store('requests', { parentRequests: [], childRequests: [] })

                            Livewire.hook('message.sent', (message, component) => {
                                component == $wire.__instance ? $store.requests.parentRequests.unshift(new Date().toLocaleTimeString('en-US')) : null
                            })
                            "
                            class="p-2 flex flex-col space-y-4 rounded bg-gray-50 border border-gray-300">
                            <h1 class="text-xl font-bold">Spruce One</h1>

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

                <div class="border-t border-gray-400"></div>

                <livewire:sub-component />
            </div>
        </div>
    </div>

    <div class="hidden lg:block lg:flex-1"></div>

    <div x-data class="hidden md:flex flex-col flex-grow-0 h-full justify-center border-l border-gray-500 divide-y divide-gray-500">
        <div class="px-4 py-2 flex-grow-0 overflow-hidden w-full h-full">
            <div>
                <span class="font-bold">
                    Livewire Parent Requests
                </span>
                <span>
                    (Total: <span x-text='$store.requests.parentRequests.length'></span>)
                </span>
            </div>
            <div class="overflow-y-auto h-full">
                <template x-for="request in $store.requests.parentRequests">
                    <div x-text="'Message sent ' + request"></div>
                </template>
            </div>
        </div>
        <div class="px-4 py-2 flex-grow-0 overflow-hidden w-full h-full">
            <div>
                <span class="font-bold">
                    Livewire Child Requests
                </span>
                <span>
                    (Total: <span x-text='$store.requests.childRequests.length'></span>)
                </span>
            </div>
            <div class="overflow-y-auto h-full">
                <template x-for="request in $store.requests.childRequests">
                    <div x-text="'Message sent ' + request"></div>
                </template>
            </div>
        </div>
    </div>
</div>
