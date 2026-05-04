@props ([
    'name',
    'options' => [],
    'optionLabel' => 'label',
    'optionValue' => 'id',
    'selected' => null,
    'placeholder' => 'Choose one thing',
    'disabled' => false,
])

<select
    name="{{ $name }}"
    @disabled ($disabled ?? false)
    {{ $attributes->merge(['class' => 'select2 py-2 px-4 mt-1 block w-full']) }}
>
    <option value="">{{ $placeholder ?? 'Choose one thing' }}</option>

    @foreach ($options as $option)
        <option
            value="{{ $option[$optionValue] }}"
            @selected (old($name, $selected ?? '') == $option[$optionValue])
        >
            {{ $option[$optionLabel] }}
        </option>
    @endforeach
</select>
