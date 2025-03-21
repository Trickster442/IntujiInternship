<div>
    <h1>Upload Form</h1>
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button>Upload file</button>
    </form>
</div>