@php
    $model = $category ?? null;
        $isEdit = isset($category) && !empty($category->id);

    $modalId = $modalId ?? ($isEdit ? "editCategoryModal_{$model->id}" : 'createCategoryModal');
    $formAction = $formAction ?? ($isEdit ? route('updateCategory', $model->id) : route('createCategory'));
    $modalTitle = $modalTitle ?? ($isEdit ? 'Редактировать категорию' : 'Добавить категорию');
    $submitLabel = $submitLabel ?? ($isEdit ? 'Сохранить' : 'Добавить');

    $nameValue = old('name', $isEdit ? $model->name ?? null : null);
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
                <form method="POST" action="{{ $formAction }}">
                    @csrf
                    @if ($isEdit)
                        @method('PATCH')
                    @endif

                    <div class="row mb-3">
                        <label for="{{ $modalId }}_name" class="col-md-4 col-form-label text-md-end">
                            {{ __('Название: ') }}
                        </label>

                        <div class="col-md-6">
                            <input id="{{ $modalId }}_name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $nameValue }}">

                            @error('name')
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
