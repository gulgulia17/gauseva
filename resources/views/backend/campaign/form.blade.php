@csrf

<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title', $campaign->title) }}" required
                    class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title">
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="category_id">Campaign Category</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">Please choose a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $campaign->category_id) == $category->id)>
                            {{ ucwords($category->category_name) }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="formatted_price">Price</label>
                <!-- Hidden input field to hold the numeric value -->
                <input type="hidden" name="price" id="price" value="{{ old('price', $campaign->price) }}" />
                <input type="text" value="{{ old('price', $campaign->price) }}" required
                    class="currency form-control @error('price') is-invalid @enderror" id="formatted_price"
                    placeholder="Enter Price">
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="created_by">Campaign Owner</label>
                <input type="text" name="created_by" value="{{ old('created_by', $campaign->created_by) }}" required
                    class="form-control @error('created_by') is-invalid @enderror" id="created_by"
                    placeholder="Enter owner of campaign">
                @error('created_by')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="start_at">Start At</label>
                <input type="datetime-local" class="range form-control @error('start_at') is-invalid @enderror"
                    name="start_at" id="start_at" value="{{ old('start_at', $campaign->start_at) }}">
                @error('start_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="start_at">End At</label>
                <input type="datetime-local" class="range form-control @error('end_at') is-invalid @enderror"
                    name="end_at" id="end_at" value="{{ old('end_at', $campaign->end_at) }}">
                @error('end_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="project_description">Project Description</label>
                <textarea id="summernote" name="project_description"
                    class="form-control @error('project_description') is-invalid @enderror" cols="30" rows="10">
                    {!! old('project_description', $campaign->project_description) !!}
                </textarea>

                @error('project_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="images">Images</label>
                <div class="custom-file">
                    <input type="file" class="image-upload @error('images.*') is-invalid @enderror custom-file-input" id="image-upload" accept="image/*" multiple>
                    <label class="custom-file-label" for="image-upload">Choose file</label>
                </div>

                @error('images')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
                <div class="row" id="photo-upload__preview"></div>
            </div>
        </div>
        <div class="col-sm-6">
            <!-- radio -->
            <label>Featured</label>
            <div class="form-group">
                <div class="form-check @error('is_featured') is-invalid @enderror">
                    <input class="form-check-input" type="radio" name="is_featured" value="1"
                        id="customRadios1" {{ old('is_featured', $campaign->is_featured) == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="customRadios1">Yes</label>
                </div>
                <div class="form-check @error('is_featured') is-invalid @enderror">
                    <input class="form-check-input" type="radio" name="is_featured" value="0"
                        id="customRadios2" {{ old('is_featured', $campaign->is_featured) == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="customRadios2">No</label>
                </div>
                @error('is_featured')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="product_id">Products</label>
                <select class="select2 form-control @error('product_id.*') is-invalid @enderror" name="product_id[]"
                    id="product_id" multiple aria-placeholder="Please choose a product.">
                    <option value="" disabled>Please choose a product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}"
                            {{ in_array($product->id, $campaignProducts) ? 'selected' : '' }}>
                            {{ $product->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="documents">Documents</label>
                <div class="custom-file">
                    <input type="file" class="image-upload @error('documents.*') is-invalid @enderror custom-file-input" id="documents-upload" accept="image/*" multiple>
                    <label class="custom-file-label" for="documents-upload">Choose file</label>
                </div>

                @error('documents')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
                <div class="row" id="documents-upload__preview"></div>
            </div>
        </div>
    </div>
</div>
