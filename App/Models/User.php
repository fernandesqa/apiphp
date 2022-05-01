<?php

    namespace APP\Models;

    use App\Models\ConnectionPdo as DB;

    class User
    {
        private static $table = 'user';

        public static function select(int $id) {

            
            $connPdo = DB::connectionDB();
            $query = 'SELECT * FROM '.self::$table.' WHERE id = :id';
            $stmt = $connPdo->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                return $stmt->fetch(\PDO::FETCH_ASSOC);
                
            }else {
                throw new \Exception("Nenhum usuário encontrado");
            }
        }

        public static function selectAll() {

            $connPdo = DB::connectionDB();
            $query = 'SELECT * FROM '.self::$table;
            $stmt = $connPdo->prepare($query);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }else {
                throw new \Exception("Nenhum usuário encontrado!");
            }

        }

        public static function insert($data)
        {
            $connPdo = DB::connectionDB();
            $query = 'INSERT INTO '.self::$table.' (id, email, password, name) VALUES (:id, :em, :pa, :na)';
            $stmt = $connPdo->prepare($query);
            $stmt->bindValue(':id', $data['id']);
            $stmt->bindValue(':em', $data['email']);
            $stmt->bindValue(':pa', $data['password']);
            $stmt->bindValue(':na', $data['name']);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                return 'Usuário(a) inserido(a) com sucesso!';
                
            }else {
                throw new \Exception("Falha ao inserir usuário(a)!");
            }
        }

        public static function update($data) {
            $connPdo = DB::connectionDB();
            $query = 'UPDATE '.self::$table.' SET email = :em, password = :pa, name = :na WHERE id = :id';
            $stmt = $connPdo->prepare($query);
            $stmt->bindValue(':id', $data['id']);
            $stmt->bindValue(':em', $data['email']);
            $stmt->bindValue(':pa', $data['password']);
            $stmt->bindValue(':na', $data['name']);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                return 'Usuário(a) atualizado(a) com sucesso!';
                
            }else {
                throw new \Exception("Falha ao atualizar usuário(a)!");
            }
        }

        public static function delete(int $id) {
            $connPdo = DB::connectionDB();
            $query = 'DELETE FROM '.self::$table.' WHERE id = :id';
            $stmt = $connPdo->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                return 'Usuário(a) excluído(a) com sucesso!';
                
            }else {
                throw new \Exception("Falha ao excluir usuário(a)!");
            }
        }
    }