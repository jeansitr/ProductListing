@if($errors->any())
    <div class="alert alert-danger">
        Erreurs!
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
