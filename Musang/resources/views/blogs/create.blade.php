<div class="modal fade" id="createBlogModal" tabindex="-1" aria-labelledby="createBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBlogModalLabel"><i class="uil uil-plus me-1"></i>Buat Blog
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storeBlog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Thumbnail Blog</label>
                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                            placeholder="Thumbnail Blog..." name="thumbnail" value="{{ old('thumbnail') }}">
                        @error('thumbnail')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Judul Blog</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Judul Blog..." name="title" value="{{ old('title') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Konten Blog</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Konten Blog..." name="content"
                            rows="5">
                        {{ old('content') }}
                    </textarea>
                        @error('content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kategori Blog</label>
                        <select class="form-control @error('category') is-invalid @enderror" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
