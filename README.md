![Image of Sprucewire](https://github.com/joshhanley/sprucewire/blob/main/art/Sprucewire-Logo.png)

# Sprucewire Demo

This is a demonstration of how you can use [Sprucewire](https://github.com/joshhanley/sprucewire) in a Livewire app.

Sprucewire is adapter between Spruce and Livewire, that enables them to be entangled.

It brings the power of Spruce's global state to Livewire so you can seamlessly share data between Livewire components and keep their state in sync.

- [Sprucewire Video](https://www.youtube.com/watch?v=Etwv6jW0Z_w)
- [Sprucewire Repo](https://github.com/joshhanley/sprucewire)

## The Components

This demo contains two different Livewire components

- Main
- Sub Component

The `Main` component is the parent component and it registers the Spruce store using Sprucewire's `registerStore` method. See `resources/views/livewire/main.blade.php`.

The `Sub Component` is the child component and it loads the Spruce store using Sprucewire's `loadStore` method. See `resources/views/livewire/sub-component.blade.php`.

For details on how the register and load store methods work, see ["Setup Stores" in Sprucewire readme](https://github.com/joshhanley/sprucewire#setup-stores).

## Instructions

This demo is live at https://sprucewire.joshhanley.com.au/.

Below are instructions for testing the demo.

There are two types of properties setup:

- **Name**
Uses `wire:model`.
If you change name in any of the name inputs you will see all 4 are kept in sync.
And requests are sent from both the parent and child Livewire components.
- **Sample**
Uses `wire:model.defer`.
If you change sample on the Livewire parent component, it will only sync to the Livewire child component on the next request (simulate with "Refresh Server").
The Livewire child component also have a different property name "Random", showing that Livewire and Spruce property names can be different.
