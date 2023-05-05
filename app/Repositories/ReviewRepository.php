<?php

namespace App\Repositories;

use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class ReviewRepository
{
    public function allReviews()
    {
        return Review::latest()->paginate(10);
    }

    public function getProductReviews($request)
    {

        $productId = $request['id'];

        $sortField = $request->input('field') ?? 'created_at';
        $sortOrder = $request->input('order') ?? 'desc';

        return Review::where('product_id', $productId)->with('user')->orderBy($sortField, $sortOrder)->get();
    }

    public function storeReview($data)
    {

        $file = $data->file('file');
        $path = $file->store('public/files');

        $reviewData = [
            'user_id' => auth()->id(),
            'product_id' => $data['product_id'],
            'rate' => $data['rate'],
            'comment' => $data['comment'],
            'file_name' => $file->getClientOriginalName(),
            'file_url' => Storage::url($path),
        ];

        Review::create($reviewData);

    }

    public function findReview($id)
    {
        return Review::find($id);
    }

    public function updateReview($data, $id)
    {
        $review = Review::where('id', $id)->first();
        $review->name = $data['name'];
        $review->slug = $data['slug'];
        $review->save();
    }

    public function destroyReview($id)
    {
        $review = Review::find($id);
        $review->delete();
    }
}
