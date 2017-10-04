use heroku_1322007c2edde3e;

SELECT * FROM user;
SELECT * FROM professional;
SELECT * FROM category;
SELECT * FROM service;
SELECT * FROM category_professional;

ALTER TABLE user ADD COLUMN password integer;

DELETE FROM user WHERE id > 30;


-- ALTER TABLE user CHANGE COLUMN complemento complement VARCHAR(10);
-- ALTER TABLE category ADD UNIQUE (category);