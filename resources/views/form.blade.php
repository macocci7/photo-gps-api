<div>
<h2>URLs</h2>
<form method="GET" action="/api/files">
    <ul>
        @for ($i = 1; $i <= config('photogps.limit.files.count'); $i++)
        <li>
            <label>file{{ $i }}</label>
            <input type="text" name="file{{ $i }}" placeholder="Input a url..." />
        </li>
        @endfor
    </ul>
    <button type="submit">submit</button>
</form>
<h2>Upload Files</h2>
<form method="POST" action="/api/upload" enctype="multipart/form-data">
    @csrf
    <ul>
        @for ($i = 1; $i <= config('photogps.limit.upload.count'); $i++)
        <li>
            <label>file{{ $i }}</label>
            <input type="file" name="file{{ $i }}">
        </li>
        @endfor
    </ul>
    <button type="submit">submit</button>
</form>
</div>
