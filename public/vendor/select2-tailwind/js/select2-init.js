$(function () {

    function initSelect2(context = document) {
        $(context).find('.select2').each(function () {

            // avoid double init
            if ($(this).hasClass("select2-hidden-accessible")) {
                return;
            }

            let $el = $(this);

            $el.select2({
                theme: $el.data('theme') || 'tailwindcss-4',
                width: $el.data('width')
                    ? $el.data('width')
                    : $el.hasClass('w-full')
                        ? '100%'
                        : 'style',

                placeholder: $el.data('placeholder') || 'Select an option',

                allowClear: Boolean($el.data('allow-clear')),

                closeOnSelect: !$el.attr('multiple'),

                tags: Boolean($el.data('tags')),
            });
        });
    }

    initSelect2();

    // kalau nanti pakai ajax/livewire/alpine
    window.initSelect2 = initSelect2;
});