<x-app-layout>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-around">
            <div class="col-6 container mt-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $data['product']->image }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data['product']->name }}</h5>
                        <p class="card-text">{{ $data['product']->description }}</p>
                        <a href="#" class="btn btn-primary mt-2">Avarage Rate - {{ round($data['avgRate'],2) }}</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="container mt-4">
                    <div class="card">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card-header text-center font-weight-bold">
                            Rate Me - {{ $data['product']->name }}
                        </div>
                        <div class="card-body">
                            <form id="add-review-post-form" method="post" action="{{ route('review.store') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">
                                    <label for="text">Rate</label>
                                    <select id="rate" name="rate" class="form-control" required="">
                                        <option value="">Select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="comment">Comment
                                        <textarea name="comment" class="form-control" cols="140" required="">{{ old('comment') }}</textarea>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" id="file" name="file" class="form-control" required="">
                                </div>

                                <input type="hidden" name="product_id" value="{{ request()->segment(count(request()->segments())) }}">

                                <button class="btn btn-primary">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input id="product-id" type="hidden" value="{{$data['product']->id}}">

    <div class="container mt-4 w-auto p-3">
        <div class="card">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th id="rank" data-field="rate" scope="col" class="sortable cursor-pointer">Rate <span class="arrow arrow-up hidden"></span><span class="arrow arrow-down"></span></th>
                        <th scope="col">Comment</th>
                        <th scope="col" data-field="createdAt" class="sortable cursor-pointer">Date</th>
                    </tr>
                </thead>
                <tbody id="reviews-container"></tbody>
            </table>

        </div>
</div>

    <script src="{{ asset('/js/review.js')}}"></script>
    <script src="{{ asset('/css/review.css')}}"></script>

</x-app-layout>
