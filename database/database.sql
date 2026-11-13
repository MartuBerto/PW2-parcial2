DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS productos;
CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50) NOT NULL,
apellido VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL, 
rol VARCHAR(10) NOT NULL DEFAULT 'cliente'
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(20) NOT NULL,      
    plataforma VARCHAR(30) NOT NULL,     
    genero VARCHAR(30) NULL,            
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    imagen VARCHAR(255) NOT NULL
); 


INSERT INTO productos (nombre, categoria, plataforma, genero, precio, stock, imagen) VALUES
('PlayStation 5 Slim',          'consola', 'PS5',  NULL,      1250000.00, 5,  'img/ps5-slim.jpg'),
('Xbox Series S',               'consola', 'Xbox', NULL,       800000.00, 7,  'img/xbox-series-s.jpg'),
('The Last Of Us Part 2',         'juego',   'PS5',  'Acción',    80000.00, 12, 'img/the-last-of-us-part-2.jpg'),
('Marvel''s Spider-Man 2',      'juego',   'PS5',  'Acción',    75000.00, 8,  'img/spider-man-2.jpg'),
('Death Stranding',             'juego',   'PS5',  'Aventura',  60000.00, 3,  'img/death-stranding.jpg'),
('Forza Horizon 5',             'juego',   'Xbox', 'Carreras',  65000.00, 10, 'img/forza-horizon-5.jpg'),
('Halo Infinite',               'juego',   'Xbox', 'Shooter',   55000.00, 0,  'img/halo-infinite.jpg'),
('Starfield',                   'juego',   'Xbox', 'Rol',       72000.00, 4,  'img/starfield.jpg'),
('Grand Theft Auto VI',              'juego',   'PS5',  'Acción',     110000.00, 15, 'img/gta6-ps5.jpg'),
('God of War Ragnarok',              'juego',   'PS5',  'Acción',      60000.00, 8,  'img/god-of-war-ragnarok.jpg'),
('Elden Ring',                       'juego',   'PS5',  'Rol',         58000.00, 12, 'img/elden-ring.jpg'),
('Hogwarts Legacy',                  'juego',   'PS5',  'Rol',         52000.00, 0,  'img/hogwarts-legacy.jpg'),
('Gran Turismo 7',                   'juego',   'PS5',  'Carreras',    56000.00, 6,  'img/gran-turismo-7.jpg'),
('Ghost of Tsushima Director''s Cut','juego',   'PS5',  'Acción',      59000.00, 10, 'img/ghost-of-tsushima.jpg'),
('Astro Bot',                        'juego',   'PS5',  'Aventura',    62000.00, 9,  'img/astro-bot.jpg'),
('Diablo IV',                'juego', 'Xbox', 'Rol',      60000.00, 14, 'img/diablo-4.jpg'),
('Cyberpunk 2077',        'juego', 'Xbox', 'Rol',      70000.00, 14, 'img/cyberpunk-2077.jpg'),
('Resident Evil 4',          'juego', 'Xbox', 'Terror',   50000.00, 14, 'img/resident-evil-4.jpg');

