-- admin/admin
INSERT INTO user(login, password) VALUES('admin', '$argon2i$v=19$m=65536,t=4,p=1$Nm45MHJUbGFrcTliOFFUdg$TGKbKA/rsGsD6AkzICaX4pQBORC4oR6UlB+iWU5lbFU');

INSERT INTO movie(title, director, synopsis, type, scriptwriter, production_company, release_date, user) 
VALUES 
('Inception', 'Christopher Nolan', 'Inception synopsis', 'Action', 'John Hughes', 'Warner Bros', '2010-07-16', 1),
('Pulp Fiction', 'Quentin Tarantino', 'Pulp Fiction synopsis', 'Adventure', 'David Fincher', 'Paramount Pictures', '1994-10-14', 1),
('The Wolf of Wall Street', 'Martin Scorsese', 'The Wolf of Wall Street synopsis', 'Comedy', 'David Fincher', 'Paramount Pictures', '2013-12-25', 1);
