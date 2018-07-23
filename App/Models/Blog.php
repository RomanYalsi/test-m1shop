<?php

namespace Project\App\Models;

use Project\Core\Model;

class Blog extends Model
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Model::getDB();
    }

    public function get($offset, $limit)
    {
        $query = $this->pdo->prepare('SELECT * FROM Posts ORDER BY createdDate DESC LIMIT :offset, :limit');
        $query->bindParam(':offset', $offset, \PDO::PARAM_INT);
        $query->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        $query = $this->pdo->query('SELECT * FROM Posts ORDER BY createdDate DESC');

        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function add(array $data)
    {
        $query = $this->pdo->prepare('INSERT INTO Posts (title, body, image, createdDate) VALUES(:title, :body, :image, :created_date)');

        return $query->execute($data);
    }

    public function getById($id)
    {
        $query = $this->pdo->prepare('SELECT * FROM Posts WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $data)
    {
        $query = $this->pdo->prepare('UPDATE Posts SET title = :title, body = :body WHERE id = :postId LIMIT 1');
        $query->bindValue(':postId', $data['post_id'], \PDO::PARAM_INT);
        $query->bindValue(':title', $data['title']);
        $query->bindValue(':body', $data['body']);

        return $query->execute();
    }

    public function delete($id)
    {
        $query = $this->pdo->prepare('DELETE FROM Posts WHERE id = :postId LIMIT 1');
        $query->bindParam(':postId', $id, \PDO::PARAM_INT);

        return $query->execute();
    }
}