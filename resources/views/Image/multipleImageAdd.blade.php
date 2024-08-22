<form action="{{ route('multiple.image.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="image">Image</label><span class="text-danger">*</span><br>
            <input type="file" class="form-control" id="image" placeholder="Image Here" name="images[]"
                aria-label="Image" multiple>
        </div>
    </div>
    <div class="pt-4 mb-3 float-lg-end">
        <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Add</button>
    </div>
    </div>
</form>
