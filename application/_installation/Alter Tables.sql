ALTER TABLE users
ADD COLUMN spoonacular_username VARCHAR(255) AFTER user_email;

ALTER TABLE plans
ADD COLUMN plan_data JSON AFTER id;

ALTER TABLE plans
ADD COLUMN name VARCHAR(255) AFTER id;