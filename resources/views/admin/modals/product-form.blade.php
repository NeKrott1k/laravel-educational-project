@php
    $model = $product ?? null;
    $isEdit = $model && $model->exists;

    $modalId = $modalId ?? ($isEdit ? "editProductModal_{$model->id}" : 'createProductModal');
    $formAction = $formAction ?? ($isEdit ? route('updateProduct', $model->id) : route('createProduct'));
    $modalTitle = $modalTitle ?? ($isEdit ? 'Редактировать товар' : 'Добавить товар');
    $submitLabel = $submitLabel ?? ($isEdit ? 'Сохранить' : 'Добавить');

    $categories = $categories ?? collect();

    $getValue = function (string $key, $default = null) use ($model, $isEdit) {
        $modelValue = $isEdit ? $model->{$key} ?? null : null;
        return old($key, $modelValue ?? $default);
    };
@endphp

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-labelledby="{{ $modalId }}Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $modalId }}Label">
                    {{ $modalTitle }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ $formAction }}" enctype="multipart/form-data">
                    @csrf

                    @if ($isEdit)
                        @method('PATCH')
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            @if ($isEdit && $model->photo)
                                <div class="mb-2">
                                    <img class="w-25" src="{{ asset($model->photo) }}"
                                        alt="{{ $model->name ?? 'Товар' }}" style="object-fit: contain;">
                                </div>
                            @endif

                            <input id="{{ $modalId }}_photo" type="file"
                                class="form-control @error('photo') is-invalid @enderror" name="photo"
                                @if (!$isEdit)  @endif>

                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="{{ $modalId }}_name" class="col-md-4 col-form-label text-md-end">
                            {{ __('Название: ') }}
                        </label>

                        <div class="col-md-6">
                            <input id="{{ $modalId }}_name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $getValue('name') }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="{{ $modalId }}_category" class="col-md-4 col-form-label text-md-end">
                            {{ __('Категория: ') }}
                        </label>

                        <div class="col-md-6">
                            <select id="{{ $modalId }}_category" name="category"
                                class="form-control @error('category') is-invalid @enderror">
                                <option value="">Выберите категорию</option>

                                @foreach ($categories as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                        {{ $isEdit && (string) $model->category === (string) $categoryOption->id ? 'selected' : '' }}>
                                        {{ $categoryOption->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="{{ $modalId }}_description" class="col-md-4 col-form-label text-md-end">
                            {{ __('Описание: ') }}
                        </label>

                        <div class="col-md-6">
                            <textarea id="{{ $modalId }}_description" class="form-control @error('description') is-invalid @enderror"
                                name="description">{{ $getValue('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="{{ $modalId }}_origin_country" class="col-md-4 col-form-label text-md-end">
                            {{ __('Страна производства: ') }}
                        </label>

                        <div class="col-md-6">
                            <input id="{{ $modalId }}_origin_country" type="text"
                                class="form-control @error('origin_country') is-invalid @enderror" name="origin_country"
                                value="{{ $getValue('origin_country') }}">

                            @error('origin_country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="{{ $modalId }}_release_year" class="col-md-4 col-form-label text-md-end">
                            {{ __('Дата выпуска: ') }}
                        </label>

                        <div class="col-md-6">
                            <input id="{{ $modalId }}_release_year" type="number"
                                class="form-control @error('release_year') is-invalid @enderror" name="release_year"
                                value="{{ $getValue('release_year') }}">

                            @error('release_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="{{ $modalId }}_model" class="col-md-4 col-form-label text-md-end">
                            {{ __('Модель: ') }}
                        </label>

                        <div class="col-md-6">
                            <input id="{{ $modalId }}_model" type="text"
                                class="form-control @error('model') is-invalid @enderror" name="model"
                                value="{{ $getValue('model') }}">

                            @error('model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="{{ $modalId }}_price" class="col-md-4 col-form-label text-md-end">
                            {{ __('Цена: ') }}
                        </label>

                        <div class="col-md-6">
                            <input id="{{ $modalId }}_price" type="number" step="0.01"
                                class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ $getValue('price') }}">

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="{{ $modalId }}_quantity_in_stock"
                            class="col-md-4 col-form-label text-md-end">
                            {{ __('Количество на складе: ') }}
                        </label>

                        <div class="col-md-6">
                            <input id="{{ $modalId }}_quantity_in_stock" type="number"
                                class="form-control @error('quantity_in_stock') is-invalid @enderror"
                                name="quantity_in_stock" value="{{ $getValue('quantity_in_stock') }}">

                            @error('quantity_in_stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="d-flex justify-content-between gap-2">
                            <button type="button" class="w-50 btn btn-secondary" data-bs-dismiss="modal">
                                Закрыть
                            </button>

                            <button type="submit" class="btn w-50 btn-primary">
                                {{ $submitLabel }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
