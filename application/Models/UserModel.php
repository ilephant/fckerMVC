<?php

namespace Fcker\Application\Models;

use Fcker\Framework\Core\Model;

class UserModel extends Model
{
    public function all()
    {
        $sql = 'SELECT * FROM users ORDER BY id DESC';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}

