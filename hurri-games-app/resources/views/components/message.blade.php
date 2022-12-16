@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@else
    @if ($message = Session::get('success'))
        <div class="alert alert-success fade show" role="alert">
            {{Session::get("success")["msg"]}}
        </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="alert alert-warning fade show" role="alert">
            {{Session::get("warning")["msg"]}}
        </div>
    @endif
@endif
