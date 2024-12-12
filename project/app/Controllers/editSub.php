<?php

namespace App\Controllers;

use App\Models\Subject\Subjects;

class editSub extends BaseController
{
    protected $subjectsModel;

    public function __construct()
    {
        $this->subjectsModel = new Subjects();
    }

    public function edit($id)
    {
        $monHoc = $this->subjectsModel->sub_id($id); 

        if ($monHoc) {
            $monHoc = $monHoc[0]; 
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
            echo "<h2>Chỉnh Sửa Môn Học</h2>";
            echo "<form method='POST' action='/editSub/update'>";
            echo "<table>";
            echo "<tr><td><label for='id'>ID:</label></td><td><input type='text' name='id' id='id' value='" . htmlspecialchars($monHoc['id']) . "' readonly></td></tr>";
            echo "<tr><td><label for='name'>Tên Môn Học:</label></td><td><input type='text' name='name' id='name' value='" . htmlspecialchars($monHoc['name']) . "' required></td></tr>";
            echo "<tr><td><label for='description'>Mô Tả:</label></td><td><input type='text' name='description' id='description' value='" . htmlspecialchars($monHoc['description']) . "' required></td></tr>";
            echo "<tr><td><label for='updated_at'>Ngày Cập Nhật:</label></td><td><input type='datetime-local' name='updated_at' id='updated_at' value='" . htmlspecialchars($monHoc['updated_at']) . "' required></td></tr>";
            echo "</table>";
            echo "<button type='submit'>Cập nhật</button>";
            echo "</form>";
            echo "</body>";
            echo "</html>";
        } else {
            echo "Không tìm thấy môn học.";
        }
    }

    public function update()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'updated_at' => $this->request->getPost('updated_at'),
        ];
        $id = $this->request->getPost('id');

        $result = $this->subjectsModel->Sua($id, $data);

        if ($result) {
            echo "Cập nhật môn học thành công!";
        } else {
            echo "Cập nhật môn học thất bại. Vui lòng thử lại!";
        }

        echo "<br><a href='/list-sub'>Quay lại danh sách môn học</a>";
    }
}
