@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
    <hr>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    <hr>
@endif

<form action="{{ route('quoteReplace.submit') }}" method="POST">
    @csrf
    <textarea name="quote-replace-text" id="" cols="30" rows="10">{{ old('quote-replace-text') }}</textarea>
    <button type="submit">Submit</button>
</form>

<hr>
<h3>Text Replace</h3>

<br>

<div>
    {{ session('quoteReplaceText') ? session('quoteReplaceText') : '' }}
</div>