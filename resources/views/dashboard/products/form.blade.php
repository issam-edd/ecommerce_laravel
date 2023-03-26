
@csrf
<div class="row">
    <div class="col-md-6 col-12">
        <div class="form-group mb-2"> 
            <label for="blog-edit-title" class="card-title">Title</label>
            <input type="text" name="title" value="{{ old('title',$product->title ?? null) }}" id="blog-edit-title" class="form-control" placeholder="title"/>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group mb-2">
            <label for="blog-edit-status" class="card-title">Category</label>
            <select class="form-control" name="category_id" id="blog-edit-status">
                <option value="" selected>-- categories --</option>
                @foreach($categories as $category)
                @if ($product ?? null)
                <option value="{{ $category->id }}"{{$product->category_id === $category->id  ? 'selected':'' }}>{{ $category->title }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group mb-2">
            <label for="inStock" class="card-title">In Stock</label>
            <input type="number" id="inStock" name="inStock" class="form-control" value="{{ old('inStock',$product->inStock ?? null) }}" data-bts-step="1" min="1" />
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group mb-2">
            <label for="Price" class="card-title">Price (DH)</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price',$product->price ?? null) }}" data-bts-step="0.5" min="1" />
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="form-group mb-2">
            <label for="old_price" class="card-title">Old Price (DH)</label>
            <input type="number" id="old_price" name="old_price" class="form-control" value="{{ old('old_price',$product->old_price ?? null) }}" data-bts-step="0.5" min="1" />
        </div>
    </div>
    <!-- Basic Textarea start -->
    <section class="basic-textarea col-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Description</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description">{{ old('description',$product->description ??null) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Textarea end -->
    </div>
    <div class="col-12 mb-2">
        <div class="border rounded p-2">
            <h4 class="mb-1">Featured Image</h4>
            <div class="media flex-column flex-md-row">
                <img src="{{ asset($product->image ?? 'app-assets/images/slider/03.jpg' ) }}" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                <div class="media-body">
                    <small class="text-muted">Required image resolution 800x400, image size 2048 kb.</small><br>
                    <div class="d-inline-block pt-2">
                        <div class="form-group mb-0">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="blogCustomFile" accept="image/*" />
                                <label class="custom-file-label" for="blogCustomFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-50">
