<?php

namespace App\Controllers;

use App\Models\Subject\Subjects;

class deleteSub extends BaseController
{
    protected $subjectsModel;

    public function __construct()
    {
        $this->subjectsModel = new Subjects();
    }

    public function delete($id)
    {
        $result = $this->subjectsModel->Xoa($id);

        if ($result) {
            return redirect()->to('/list-sub'); 
        } else {
            echo "Có lỗi khi xoá môn học.";
        }
    }
}
