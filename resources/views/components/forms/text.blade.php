<input id="{{ $id ?? '' }}"
       type="text"
       name="{{ $name ?? '' }}"
       placeholder="{{ $placeholder ?? '' }}"
       value="{{ $fieldTitle ?? old($name) }}"
       class="mt-1 block w-full rounded-md
       @error($name) border-red-600 @enderror
           border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
@error($name)
<span class="text-xs italic text-red-600">{{ $message }}</span>
@enderror
