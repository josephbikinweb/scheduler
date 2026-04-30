$(function () {
    // Select2 init
    $('select').each(function () {
        let options = {
            theme: 'tailwindcss-4',
            width: $(this).data('width')
                ? $(this).data('width')
                : $(this).hasClass('w-full')
                    ? '100%'
                    : 'style',
            placeholder: $(this).data('placeholder') || 'Select an option',
            allowClear: Boolean($(this).data('allow-clear')),
            closeOnSelect: !$(this).attr('multiple'),
            tags: Boolean($(this).data('tags')),
            templateResult: formatIcon,
            templateSelection: formatIcon,
            escapeMarkup: function(markup) {
                return markup; // biar HTML kebaca
            }
        };
        $(this).select2(options);
    });
    function formatIcon(option) {
        if (!option.id) return option.text;

        let icon = $(option.element).data('icon');
        let color = $(option.element).data('color');

        if (!icon) return option.text;

        return `
            <div style="display:flex; align-items:center; gap:8px;">
                <div class="w-10 h-10 flex items-center justify-center rounded bg-${color}-500">
                    <img src="${icon}" class="w-8 h-8 filter invert brightness-0"/>
                </div>
                <span>${option.text}</span>
            </div>
        `;
    }
});