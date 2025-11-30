<x-layouts.app :title="__('Blade components')">
    <div class="grid gap-8">
        <div class="grid gap-4">
            <h2 class="text-5xl font-bold">Button</h2>

            <x-separator />

            <div>
                <x-button icon="download">Export</x-button>
            </div>
        </div>

        <div class="grid gap-4">
            <h2 class="text-5xl font-bold">Counter</h2>

            <x-separator />

            <div x-data="{ count: 0 }" class="grid gap-4">
                <x-input.counter x-model="count" />

                <div>The current count is: <span x-text="count"></span></div>
            </div>
        </div>

        <div class="grid gap-4">
            <h2 class="text-5xl font-bold">Money Input</h2>

            <x-separator />

            <x-input.money value="0.00" class="!border-green-500" />
        </div>

        <div class="grid gap-4">
            <h2 class="text-5xl font-bold">Separator</h2>

            <x-separator class="!bg-blue-400"/>

            <div class="flex gap-4">
                <div>Home</div>

                <x-separator vertical />

                <div>About</div>

                <x-separator vertical />

                <div>Team</div>
            </div>
        </div>

        <div class="grid gap-4">
            <h2 class="text-5xl font-bold">Card</h2>

            <x-separator />

            <div class="flex gap-4">
                <x-card heading="Skateboards" slim>
{{--                    <x-slot:heading>--}}
{{--                        <h3 class="text-1xl font-bold">Skateboards</h3>--}}
{{--                    </x-slot:heading>--}}

                    <p>Shop our line of custom-made skate decks. Each deck is hand-crafted from lumber grown in Loompa Land.</p>

                    <x-card.footer col>
                        <button class="rounded-lg bg-gray-300 hover:bg-gray-400/50 py-1.5 px-6 flex-grow">Shop now</button>
                        <button class="rounded-lg bg-gray-300 hover:bg-gray-400/50 py-1.5 px-6 flex-grow">Shop later</button>
                    </x-card.footer>
                </x-card>
            </div>
        </div>
    </div>
</x-layouts.app>
