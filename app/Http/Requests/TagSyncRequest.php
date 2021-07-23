<?php

namespace App\Http\Requests;

use App\Contracts\Interfaces\TagsRepositoryContract;
use App\Models\Tag;
use App\Repositories\TagsRepository;
use App\Services\TagsCollection;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Collection\Collection;

class TagSyncRequest extends FormRequest
{
    protected $tagsCollection;

    /**
     * TagSyncRequest constructor.
     */
    public function __construct(TagsCollection $tagsCollection)
    {
        parent::__construct();
        $this->tagsCollection = $tagsCollection;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return ['tags' => ''];
    }

    public function validated()
    {
        return $this->tagsCollection->tagsCollection($this->validator->validated());
    }

}
