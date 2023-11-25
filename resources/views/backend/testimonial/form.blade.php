
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">Name
            </label>
            <input type="text" class="form-control" name="name" value="{{old('name', $testimonial->name)}}"
                   placeholder="Name" required>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">Position
            </label>
            <input type="text" class="form-control" name="position" value="{{old('position', $testimonial->position)}}"
                   placeholder="Position" required>
            @if ($errors->has('position'))
                <span class="text-danger">{{ $errors->first('position') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="categoryTitleInput" class="text-capitalize">
                 Image
            </label>
            <div class="custom-file">
                <input type="file" id="customFile" class="form-control custom-file-input"
                       {{ $testimonial->image ?  '' : 'required' }} name="image">
                <label class="custom-file-label" for="customFile">Choose file</label>
                @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Feedback</label>
            <textarea name="feedback" class="form-control" rows="3" required="">@if($testimonial->feedback != ''){{$testimonial->feedback}} @endif
            </textarea>
            @if ($errors->has('feedback'))
                <span class="text-danger">{{ $errors->first('feedback') }}</span>
            @endif
        </div>
    </div>
</div>


