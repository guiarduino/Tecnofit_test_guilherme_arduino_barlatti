<?php

require 'vendor/autoload.php'; // Carrega o autoload do Composer

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..'); // Ajuste o caminho conforme necessário
$dotenv->load(); // Carrega as variáveis de ambiente

require_once 'connection.php'; // Inclui o arquivo de conexão

class CreateTables
{
    private $conn;

    public function __construct()
    {
        // Conecta ao banco de dados usando a função connect()
        $this->conn = connect();
    }

    public function migrate()
    {

        try{

            // Criar tabelas
            $this->create_table_user();
            $this->create_table_movement();
            $this->create_table_personal_record();

            //adiciona constraints a tabela personal_record
            $this->add_constraints_personal_record();

            // Popular tabelas
            $this->fill_table_users();
            $this->fill_table_movement();
            $this->fill_table_personal_record();

        } catch (PDOException $e) {
            echo "Erro ao criar tabela: " . $e->getMessage() . "\n";
        }
        
    }

    // cria tabela users
    public function create_table_user(){
        $sql = "CREATE TABLE `user` (
            `id` int NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            PRIMARY KEY (`id`)
            );
        ";

        try {
            $this->conn->exec($sql);
            echo "Tabela users criada com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao criar tabela: " . $e->getMessage() . "\n";
        }
    }

    // cria tabela movement
    public function create_table_movement(){
        $sql = "CREATE TABLE `movement` (
                    `id` int NOT NULL AUTO_INCREMENT,
                    `name` varchar(255) NOT NULL,
                    PRIMARY KEY (`id`)
                );
        ";

        try {
            $this->conn->exec($sql);
            echo "Tabela table_movement criada com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao criar tabela: " . $e->getMessage() . "\n";
        }
    }

    // cria tabela personal_record
    public function create_table_personal_record(){
        $sql = "CREATE TABLE `personal_record` (
                `id` int NOT NULL AUTO_INCREMENT,
                `user_id` int NOT NULL,
                `movement_id` int NOT NULL,
                `value` FLOAT NOT NULL,
                `date` DATETIME NOT NULL,
                PRIMARY KEY (`id`)
                );
        ";

        try {
            $this->conn->exec($sql);
            echo "Tabela personal_record criada com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao criar tabela: " . $e->getMessage() . "\n";
        }
    }

    // adiciona as chaves estrangeiras a tabela personal_record
    public function add_constraints_personal_record(){
        $sql = "ALTER TABLE `personal_record` ADD CONSTRAINT `personal_record_fk1` FOREIGN KEY (`movement_id`) REFERENCES `movement`(`id`);";

        try {
            $this->conn->exec($sql);
            echo "Tabela personal_record alterada com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao alterar tabela: " . $e->getMessage() . "\n";
        }
    }

    // popula tabela users
    public function fill_table_users(){
        $sql = "INSERT INTO `user` (id,name) VALUES
                (1,'Joao'),
                (2,'Jose'),
                (3,'Paulo');
        ";

        try {
            $this->conn->exec($sql);
            echo "Tabela users preenchida com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao preencher tabela: " . $e->getMessage() . "\n";
        }
    }

    // popula tabela users
    public function fill_table_movement(){
        $sql = "INSERT INTO movement (id,name) VALUES
                (1,'Deadlift'),
                (2,'Back Squat'),
                (3,'Bench Press');";

        try {
            $this->conn->exec($sql);
            echo "Tabela movement preenchida com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao preencher tabela: " . $e->getMessage() . "\n";
        }
    }
    
    // popula tabela users
    public function fill_table_personal_record(){
        $sql = "INSERT INTO personal_record (id,user_id,movement_id,value,`date`) VALUES
                (1,1,1,100.0,'2021-01-01 00:00:00.0'),
                (2,1,1,180.0,'2021-01-02 00:00:00.0'),
                (3,1,1,150.0,'2021-01-03 00:00:00.0'),
                (4,1,1,110.0,'2021-01-04 00:00:00.0'),
                (5,2,1,110.0,'2021-01-04 00:00:00.0'),
                (6,2,1,140.0,'2021-01-05 00:00:00.0'),
                (7,2,1,190.0,'2021-01-06 00:00:00.0'),
                (8,3,1,170.0,'2021-01-01 00:00:00.0'),
                (9,3,1,120.0,'2021-01-02 00:00:00.0'),
                (10,3,1,130.0,'2021-01-03 00:00:00.0'),
                (11,1,2,130.0,'2021-01-03 00:00:00.0'),
                (12,2,2,130.0,'2021-01-03 00:00:00.0'),
                (13,3,2,125.0,'2021-01-03 00:00:00.0'),
                (14,1,2,110.0,'2021-01-05 00:00:00.0'),
                (15,1,2,100.0,'2021-01-01 00:00:00.0'),
                (16,2,2,120.0,'2021-01-01 00:00:00.0'),
                (17,3,2,120.0,'2021-01-01 00:00:00.0');";

        try {
            $this->conn->exec($sql);
            echo "Tabela personal_record preenchida com sucesso!\n";
        } catch (PDOException $e) {
            echo "Erro ao preencher tabela: " . $e->getMessage() . "\n";
        }
    }

}

// Executando a migração
$migration = new CreateTables();
$migration->migrate();
?>
