<x-main-layout>
    @section('title', breadcrumb())
<div class="seperator-header layout-top-spacing">
        <a href="{{ route('category.index') }}">
            <h4 class="">Show All Blog Category</h4>
        </a>
    </div>
    <div class="page-content">      

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">Edit Blog Category</h6>
                        {!! Form::open([
                            'method' => 'put',
                            'route' => ['category.update', $category->id],
                            'class' => 'forms-sample',
                        ]) !!}
                        <div class="mb-3">

                            {!! Form::label('name', 'Category Name', ['class' => 'form-label','required' => 'required']) !!}

                            {!! Form::text('category_name', $value = $category->category_name, [
                                'class' => 'form-control',
                                'placeholder' => 'Category Name',
                            ]) !!}
                            @error('category_name')
                                <span class="text-danger pt-3">{{ $message }}</span>
                            @enderror

                        </div>

                        {!! Form::submit('Submit', ['class' => 'btn btn-outline-primary btn-icon-text mb-2 mb-md-0']) !!}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>

    </div>
    
</x-main-layout>
