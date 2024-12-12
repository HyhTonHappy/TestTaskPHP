<?php

namespace App\Controllers;

use App\Models\Subject\Subjects;

class ListSub extends BaseController
{
    protected $subjectsModel;

    public function __construct()
    {
        $this->subjectsModel = new Subjects();
    }

    public function index()
    {
        $dsdn = $this->subjectsModel->DanhSach(); 
        if ($dsdn) {
            echo "<td><a href='/addSub'><button>Thêm môn học</button></a></td>";
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
                  </style>";
            echo "</head>";
            echo "<body>";
            echo "<h2>Danh sách Môn Học</h2>";
            echo "<table style='width:100%'>";
            echo "<tr>
                    <th>ID</th>
                    <th>Tên Môn Học</th>
                    <th>Mô Tả</th>
                    <th>Ngày Tạo</th>
                    <th>Ngày Cập Nhật</th>
                    <th></th>
                  </tr>";

            foreach ($dsdn as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                echo "<td>" . htmlspecialchars($row['updated_at']) . "</td>";
                echo "<td><a href='/editSub/edit/" . htmlspecialchars($row['id']) . "'><button>Chỉnh sửa</button></a></td>";
                echo "<td><a href='/deleteSub/edit/" . htmlspecialchars($row['id']) . "'><button>Xoá</button></a></td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "</body>";
            echo "</html>";
        } else {
            echo "Không có dữ liệu."; 
        }
    }
}
