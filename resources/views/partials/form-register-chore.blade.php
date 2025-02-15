@vite('resources/css/chore_styles/register_styles.css')
@vite('resources/js/btn-reset.js')
<main class="main__register">
    @if(isset($success)) CHORE DADA DE ALTA @endif
    <form class="register__register_form {{ $errors->any() ? 'register__register_form-error' : '' }}" action="{{ route('chore.doRegister', ['userId' => auth()->user()->id]) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control @error('name') register_form__input_error @enderror" type="text" name="name" placeholder="Enter title of the chore" value="{{old('name')}}">
            @error('name') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input class="form-control @error('description') register_form__input_error @enderror" type="textarea" name="description" placeholder="Enter description" value="{{old('description')}}">
            @error('name') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="due_date">Due date:</label>
            <input type="text"
                class="form-control @error('due_date') register_form__input_error @enderror"
                id="input_fecha"
                name="due_date"
                aria-describedby="due date"
                placeholder="Insert the due date for chore">
            @error('due_date') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" id="btn-reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
</main>