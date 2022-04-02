<?php
namespace App\Services\System;

use App\Model\Ad;
use App\Services\Service;
use Illuminate\Support\Facades\Storage;
use File;
class AdService extends Service
{
    public function __construct(Ad $ad)
    {
        parent::__construct($ad);
    }
       public function getAllData($data, $selectedColumns = [], $pagination = true)
    {
        $query = $this->query();

        if (isset($data->keyword) && $data->keyword !== null) {
            $query->where('label', 'LIKE', '%' . $data->keyword . '%');
        }
        if (count($selectedColumns) > 0) {
            $query->select($selectedColumns);
        }
        if ($pagination) {
            return $query->orderBy('id', 'ASC')->paginate(PAGINATE);
        }
        return $query->orderBy('id', 'ASC')->get();
    }
    public function store($request)
    {
        $data = $request->except('_token');
      
        if (isset($request->file_name)) {
      
            $originalFile = $request->file_name;
            $fileName = uniqid() . '.' . $originalFile->getClientOriginalExtension();
      
           
            $filePath = public_path() . '/uploads/ads';
            if (! File::exists($filePath)) {
                File::makeDirectory($filePath, $mode = 0755, true);
            }
          
            $originalFile->move($filePath, $fileName);
            $data['file_name'] = $fileName;
        }
        return $this->model->create($data);
    }
}