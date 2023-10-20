-- admin/admin
INSERT INTO user(login, password) VALUES
('admin', '$argon2i$v=19$m=65536,t=4,p=1$Nm45MHJUbGFrcTliOFFUdg$TGKbKA/rsGsD6AkzICaX4pQBORC4oR6UlB+iWU5lbFU'),
('user', '$argon2i$v=19$m=65536,t=4,p=1$VWtBci41SHd4V2pDYXJUaw$9iN+rtQiKwt/yb3DYrPm93mbQqz3iC54Jt0EIeUO5LE');

INSERT INTO movie(title, director, synopsis, type, scriptwriter, production_company, release_date, user) 
VALUES 
('Inception', 'Christopher Nolan', 'Inception synopsis', 'Action', 'John Hughes', 'Warner Bros', '2010-07-16', 1),
('Pulp Fiction', 'Quentin Tarantino', 'Pulp Fiction synopsis', 'Adventure', 'David Fincher', 'Paramount Pictures', '1994-10-14', 1),
('The Wolf of Wall Street', 'Martin Scorsese', 'The Wolf of Wall Street synopsis', 'Comedy', 'David Fincher', 'Paramount Pictures', '2013-12-25', 1);

INSERT INTO list(user, movie) VALUES(1, 1), (1, 2), (1, 3);
INSERT INTO list(user, movie) VALUES(2, 1);
