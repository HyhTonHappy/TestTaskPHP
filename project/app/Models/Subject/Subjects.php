<?php

namespace App\Models\Subject;

use CodeIgniter\Model;

class subjects extends Model
{
    protected $table = 'monhoc'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['id', 'name', 'description', 'created_at', 'updated_at']; // Define the fields that can be mass-assigned

    public function DanhSach()
    {
        $query = $this->db->query('SELECT * FROM monhoc'); 
        if ($query->getNumRows() > 0) {
            return $query->getResultArray(); 
        }
        return false; 
    }

    public function sub_id($id)
{
    $query = $this->db->query('SELECT * FROM monhoc WHERE id = ?', [$id]); // Lấy môn học theo ID
    if ($query->getNumRows() > 0) {
        return $query->getResultArray(); 
    }
    return false; 
}

    public function getMaxId()
{
    $query = $this->db->query('SELECT MAX(id) as max_id FROM monhoc');
    $result = $query->getRow();
    return $result ? $result->max_id : 0; 
}

    public function Them($data)
    {
        $chuoiSQL = 'INSERT INTO monhoc(`id`, `name`, `description`, `created_at`, `updated_at`) VALUES (?,?,?,?,?)';
        $result = $this->db->query($chuoiSQL, [
            $data['id'], 
            $data['name'], 
            $data['description'], 
            $data['created_at'], 
            $data['updated_at']
        ]);
        return $result; 
    }

   
    public function Sua($id, $data)
{
    $chuoiSQL = 'UPDATE monhoc SET `name` = ?, `description` = ?, `updated_at` = ? WHERE id = ?';
    $result = $this->db->query($chuoiSQL, [
        $data['name'], 
        $data['description'], 
        $data['updated_at'], 
        $id
    ]);
    return $result; 
}

    
    public function Xoa($id)
    {
        $chuoiSQL = 'DELETE FROM monhoc WHERE id = ?';
        $result = $this->db->query($chuoiSQL, [$id]);
        return $result; 
    }
}
