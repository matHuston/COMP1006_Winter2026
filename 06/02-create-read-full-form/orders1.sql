<<<<<<< HEAD
CREATE TABLE orders (
  customer_id INT AUTO_INCREMENT PRIMARY KEY,

=======
CREATE TABLE orders1 (
  customer_id INT AUTO_INCREMENT PRIMARY KEY,
>>>>>>> 2a3f1822ae44ea7e7d8e61fff41c63040b919caf
  first_name VARCHAR(100) NOT NULL,
  last_name  VARCHAR(100) NOT NULL,
  phone      VARCHAR(20)  NOT NULL,
  address    VARCHAR(255) NOT NULL,
  email      VARCHAR(150) NOT NULL,
<<<<<<< HEAD

  chaos_croissant         INT NOT NULL DEFAULT 0,
  existential_eclair      INT NOT NULL DEFAULT 0,
  procrastination_cookie  INT NOT NULL DEFAULT 0,

=======
  chaos_croissant         INT NOT NULL DEFAULT 0,
  existential_eclair      INT NOT NULL DEFAULT 0,
  procrastination_cookie  INT NOT NULL DEFAULT 0,
>>>>>>> 2a3f1822ae44ea7e7d8e61fff41c63040b919caf
  comments TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);