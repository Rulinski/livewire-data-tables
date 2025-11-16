<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
        <main class="mx-auto flex justify-center px-8 lg:px-16">
            <div class="py-12 w-full max-w-[60rem]">
                {{ $slot }}
            </div>
        </main>
    </flux:main>
</x-layouts.app.sidebar>
