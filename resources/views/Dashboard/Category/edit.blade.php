<div class="col">
    <!-- Modal -->
    <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('category.update', 'test') }}" method="post">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    @csrf
                <div class="modal-body">
                    <br>
                        <div class="col-12">
                            <label class="form-label">edit name</label>
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <input class="form-control" name="name" type="text" value="{{ $category->name }}" autofocus>
                        </div>
                        <div class="col-12">
                            <label for="description" class="col-sm-3 col-form-label">edit description</label>
                            <textarea class="form-control" name="description" id="description" rows="5">{{ $category->description }}</textarea>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Add Image</label>
                            <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                        </div>
                    <div class="form-group">
                        <label for="is_active">Is_Active</label>
                        <select class="form-control" id="is_active" name="is_active" required>
                            <option value="{{$category->is_active}}" selected>{{$category->is_active == 1 ? 'Active':'Not_Active'}}</option>
                            <option value="1">Active</option>
                            <option value="0">Not_Active</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
