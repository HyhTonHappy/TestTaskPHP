<?php

namespace App\Controllers;

use App\Models\Subject\Subjects;

class addSub extends BaseController
{
    protected $subjectsModel;

    public function __construct()
    {
        $this->subjectsModel = new Subjects();
    }

    public function index()
{
    $maxId = $this->subjectsModel->getMaxId();
    $newId = $maxId + 1; 

    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            form {
                margin-top: 20px;
            }
            input, button {
                padding: 5px;
                margin: 5px;
            }
          </style>";
    echo "</head>";
    echo "<body>";
    echo "<br><a href='/list-sub'>Quay lại</a>";

    echo "<h2>Thêm Môn Học</h2>";
    echo "<form method='POST' action='/addSub/store'>";
    echo "<table>";
    echo "<tr><td><label for='id'>ID:</label></td><td><input type='text' name='id' id='id' value='{$newId}' readonly></td></tr>"; // Tự động điền ID
    echo "<tr><td><label for='name'>Tên Môn Học:</label></td><td><input type='text' name='name' id='name' required></td></tr>";
    echo "<tr><td><label for='description'>Mô Tả:</label></td><td><input type='text' name='description' id='description' required></td></tr>";
    echo "<tr><td><label for='created_at'>Ngày Tạo:</label></td><td><input type='datetime-local' name='created_at' id='created_at' required></td></tr>";
    echo "<tr><td><label for='updated_at'>Ngày Cập Nhật:</label></td><td><input type='datetime-local' name='updated_at' id='updated_at'></td></tr>";
    echo "</table>";
    echo "<button type='submit'>Thêm</button>";
    echo "</form>";
    echo "</body>";
    echo "</html>";
}


    public function store()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $this->request->getPost('updated_at') ?: null, 
        ];

        $result = $this->subjectsModel->Them($data);

        if ($result) {
            echo "Thêm môn học thành công!";
        } else {
            echo "Thêm môn học thất bại. Vui lòng thử lại!";
        }

        echo "<br><a href='/addSub'>Quay lại</a>";
    }
}
