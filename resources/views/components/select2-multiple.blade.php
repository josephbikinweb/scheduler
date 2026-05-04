@props ([
    'name',
    'options' => [],
    'optionLabel' => 'label',
    'optionValue' => 'id',
    'selected' => [],
    'placeholder' => 'Select options',
    'disabled' => false,
])

<select
    name="{{ $name }}[]"
    multiple
    @disabled ($disabled)
    {{ $attributes->merge(['class' => 'select2 py-2 px-4 mt-1 block w-full']) }}
>
    @foreach ($options as $option)
        @php
            $value = is_array($option) ? $option[$optionValue] : $option->{$optionValue};
            $label = is_array($option) ? $option[$optionLabel] : $option->{$optionLabel};

            $selectedValues = old($name, $selected ?? []);
            $isSelected = in_array($value, (array) $selectedValues);
        @endphp
        <option value="{{ $value }}" @selected ($isSelected)> {{ $label }}</option>
    @endforeach
</select>
