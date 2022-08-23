<?php

class Artigo
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionar($titulo, $conteudo): void
    {
        $stm = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?)');
        $stm->bind_param('ss', $titulo, $conteudo);
        $stm->execute();
        
    }

    public function exibirTodos(): array
    {
        $result = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');

        $artigos = $result->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    public function buscarPorId($id = null)
    {
        $stm = $this->mysql->prepare('SELECT * FROM artigos WHERE id=?');
        $stm->bind_param("s", $id);
        $stm->execute();
        
        $artigo = $stm->get_result()->fetch_assoc();

        return $artigo;
    }

    public function deletar($id = null): void
    {
        $stm = $this->mysql->prepare('DELETE FROM artigos WHERE id=?');
        $stm->bind_param("s", $id);
        $stm->execute();
    }

    public function atualizar(string $id, string $titulo, string $conteudo): void
    {
        $stm = $this->mysql->prepare('UPDATE artigos SET titulo=?, conteudo=? WHERE id=?');
        $stm->bind_param('sss', $titulo, $conteudo, $id);
        $stm->execute();
        
    }

}

?>
