CREATE TABLE produto (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    descricao VARCHAR(255)
);

CREATE TABLE pedido_produto (
	id INT AUTO_INCREMENT PRIMARY KEY,
    situacao VARCHAR(20) DEFAULT 'Em aberto',
	produto_id INT,
    users_id BIGINT UNSIGNED,
    
    FOREIGN KEY (produto_id) REFERENCES produto (id),
    FOREIGN KEY (users_id) REFERENCES users (id)
);
