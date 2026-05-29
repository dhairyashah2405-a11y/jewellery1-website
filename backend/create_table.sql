CREATE TABLE IF NOT EXISTS u3 (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(100) NOT NULL UNIQUE,
    email      VARCHAR(150) NOT NULL,
    password   VARCHAR(255) NOT NULL,       -- Stores hashed password
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);