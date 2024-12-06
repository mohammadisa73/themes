<x-filament-panels::page>
    <section class="">
        <header class="flex items-center py-4 overflow-hidden gap-x-3">
            <div class="grid flex-1 gap-y-1">
                <h3 class="text-base font-semibold leading-6 fi-section-header-heading text-gray-950 dark:text-white">
                    {{ __('themes::themes.primary_color') }}
                </h3>

                <p class="text-sm text-gray-500 fi-section-header-description dark:text-gray-400">
                    {{ __('themes::themes.select_base_color') }}
                </p>
            </div>
        </header>

        <div class="flex items-center gap-4 py-6 border-t">
            @if ($this->getCurrentTheme() instanceof \Hasnayeen\Themes\Contracts\HasChangeableColor)
                @foreach ($this->getColors() as $name => $color)
                    <button
                        wire:click="setColor('{{ $name }}')"
                        @class([
                            'w-4 h-4 rounded-full',
                            'ring p-1 border' => $this->getColor() === $name,
                        ])
                        style="background-color: rgb({{ $color[500] }});">
                    </button>
                @endforeach
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <input type="color" id="custom" name="custom" class="w-4 h-4" wire:change="setColor($event.target.value)" value="" />
                    <label for="custom">{{ __('themes::themes.custom') }}</label>
                </div>
            @else
                <p class="text-gray-700 dark:text-gray-400">{{ __('themes::themes.no_changing_primary_color') }}</p>
            @endif
        </div>
    </section>
</x-filament-panels::page>
