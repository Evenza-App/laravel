<x-filament-widgets::widget>
    <x-filament::section heading="Website Link" collapsible>
        <div class="flex items-center justify-center" id="qrcode" x-ref="qrcode" x-init="const d = new Date();
        var code = @js(config('app.ngrok_url'));
        new QRCode($refs.qrcode, code);"></div>
    </x-filament::section>
</x-filament-widgets::widget>
