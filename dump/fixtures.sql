-- admin/admin
INSERT INTO user(login, password) VALUES('admin', '$argon2i$v=19$m=65536,t=4,p=1$Nm45MHJUbGFrcTliOFFUdg$TGKbKA/rsGsD6AkzICaX4pQBORC4oR6UlB+iWU5lbFU');

INSERT INTO director(firstName, lastName) VALUES('Christopher', 'Nolan');
INSERT INTO director(firstName, lastName) VALUES('Quentin', 'Tarantino');
INSERT INTO director(firstName, lastName) VALUES('Martin', 'Scorsese');

INSERT INTO type(label) VALUES('Action');
INSERT INTO type(label) VALUES('Adventure');
INSERT INTO type(label) VALUES('Comedy');

INSERT INTO scriptwriter(firstName, lastName) VALUES('John', 'Hughes');
INSERT INTO scriptwriter(firstName, lastName) VALUES('David', 'Fincher');

INSERT INTO production_company(name) VALUES('Warner Bros');
INSERT INTO production_company(name) VALUES('Paramount Pictures');

INSERT INTO movie(title, director, synopsis, type, scriptwriter, production_company, release_date) VALUES('Inception', 1, 'Inception synopsis', 1, 1, 1, '2010-07-16');
INSERT INTO movie(title, director, synopsis, type, scriptwriter, production_company, release_date) VALUES('Pulp Fiction', 2, 'Pulp Fiction synopsis', 2, 2, 2, '1994-10-14');
INSERT INTO movie(title, director, synopsis, type, scriptwriter, production_company, release_date) VALUES('The Wolf of Wall Street', 3, 'The Wolf of Wall Street synopsis', 3, 2, 2, '2013-12-25');
