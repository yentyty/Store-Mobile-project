<?php

namespace App\Repositories\V1\Offer;

use App\Repositories\BaseRepository;
use App\Models\Offer;
use Illuminate\Support\Facades\DB;
use File;

class OfferRepository extends BaseRepository implements OfferRepositoryInterface
{
    public function getModel()
    {
        return Offer::class;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        $limit = is_null($limit) ? config('repository.pagination.limit', 5) : $limit;

        return $this->model->with('factory')->orderBy('updated_at', 'Desc')->paginate($limit, $columns);
    }

    public function search($key)
    {
        $offers = Offer::where('title', 'LIKE', '%' . $key . '%')->paginate(10);
        $offers->appends(['key' => $key]);

        return $offers;
    }

    public function store($data)
    {
        $data['slug'] = str_slug($data['title']);
        if (isset($data['image'])) {
            $file = $data['image'];
            $data['slug'] = str_slug($data['title']);
            $forder = 'uploads/images/offers';
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = $data['slug'] . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        }

        return $this->model->create($data)->id;
    }

    public function update($id, $data)
    {
        $offer = $this->model->find($id);

        $data['slug'] = str_slug($data['title']);

        if (isset($data['image'])) {
            $file = $data['image'];
            $nameImageOld = 'uploads/images/offers/' . $offer->image;
            if (!empty($offer->image) && File::exists($nameImageOld)) {
                unlink($nameImageOld);
            }
            $forder = ('uploads/images/offers');
            $extensionFile = $file -> getClientOriginalExtension();
            $fileName = str_slug($data['title']) . '-' . time() . '.' . $extensionFile;
            $file->move($forder, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $offer->image;
        }

        return $offer->update($data);
    }

    public function delete($id)
    {
        $offer = $this->model->find($id);

        $nameImageOld = 'uploads/images/offers/' . $offer->image;
        if (!empty($offer->image) && File::exists($nameImageOld)) {
            unlink($nameImageOld);
        }

        $offer->delete();
    }
}
