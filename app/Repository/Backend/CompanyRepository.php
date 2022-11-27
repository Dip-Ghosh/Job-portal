<?php

namespace App\Repository\Backend;

use App\Models\Company;
use App\Repository\Base\BaseRepository;

class CompanyRepository extends BaseRepository implements CompanyInterface
{
    protected $company;

    public function __construct(Company $company)
    {
        parent::__construct($company);
    }

    public function getActiveCompanies()
    {
        return $this->model->with('organization', 'industry')
            ->active()->orders()->get();
    }
}

