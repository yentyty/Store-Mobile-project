<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Contact\ContactRepositoryInterface;
use App\Repositories\V1\Factory\FactoryRepositoryInterFace;
use App\Http\Requests\Contacts\CreateContactRequest;
use App\Repositories\V1\Introduce\IntroduceRepositoryInterface;

class ContactController extends Controller
{
    protected $repoContact;
    protected $repoFactory;
    protected $repoIntroduce;


    public function __construct(
        ContactRepositoryInterface $repoContact,
        FactoryRepositoryInterface $repoFactory,
        IntroduceRepositoryInterface $repoIntroduce
    ) {
        $this->repoContact = $repoContact;
        $this->repoFactory = $repoFactory;
        $this->repoIntroduce = $repoIntroduce;
    }

    public function index()
    {
        $fatories = $this->repoFactory->index();
        $introduce = $this->repoIntroduce->paginate(3);

        return view('frontend.contact.index', compact('fatories', 'introduce'));
    }

    public function store(CreateContactRequest $request)
    {
        $this->repoContact->store($request->all());

        return redirect()
        ->route('fe.contact.index')
        ->with('msg', 'Bạn đã gửi liên hệ thành công !!! Hệ thống sẽ gửi mail xác nhận');
    }
}
