@vite('resources/css/user_styles/register_styles.css')
@vite('resources/js/btn-reset.js')
<main class="main__register">
    <form class="register__register_form {{ $errors->any() ? 'register__register_form-error' : '' }}" action="{{ route('user.doRegister') }}" method="post" id="register-form">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control @error('name') register_form__input_error @enderror" type="text" name="name" placeholder="Enter name" value="{{old('name')}}">
            @error('name') <small class="register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control @error('email') register_form__input_error @enderror" type="text" name="email" placeholder="Enter email" value="{{old('email')}}">
            @error('email') <small class=" register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') register_form__input_error @enderror" id="input_password" name="password" placeholder="Password" value="{{old('password')}}">
            @error('password') <small class=" register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="repeat_password">Repeat password</label>
            <input type="password" class="form-control @error('repeat_password') register_form__input_error @enderror" id="input_repeat_password" name="password_repeat" placeholder="Repeat password" value="{{old('password_repeat')}}">
            @error('repeat_password') <small class=" register_form__error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group d-flex justify-content-center gap-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" id="btn-reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
</main>