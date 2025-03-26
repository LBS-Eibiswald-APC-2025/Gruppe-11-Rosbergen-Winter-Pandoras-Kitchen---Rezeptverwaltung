CREATE TABLE IF NOT EXISTS account_types
(
    id   INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);



CREATE TABLE IF NOT EXISTS preferences
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL,
    type VARCHAR(50)         NOT NULL
);

CREATE TABLE IF NOT EXISTS user_preferences
(
    user_id       INT NOT NULL,
    preference_id INT NOT NULL,
    PRIMARY KEY (user_id, preference_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
    FOREIGN KEY (preference_id) REFERENCES preferences (id) ON DELETE CASCADE
);



CREATE TABLE IF NOT EXISTS pantry
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    ingredientName VARCHAR(255) NOT NULL,
	image VARCHAR(255)
);



CREATE TABLE IF NOT EXISTS user_pantry
(
    user_id INT NOT NULL,
    item_id INT NOT NULL,
    PRIMARY KEY (user_id, item_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES pantry (id) ON DELETE CASCADE
);



CREATE TABLE IF NOT EXISTS user_favorites
(
    user_id   INT NOT NULL,
    recipe_id INT NOT NULL,
    PRIMARY KEY (user_id, recipe_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS plans(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
	plan_data JSON
);


CREATE TABLE IF NOT EXISTS user_plans (
    user_id INT NOT NULL,
    plan_id INT NOT NULL,
    PRIMARY KEY (user_id, plan_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (plan_id ) REFERENCES plans(id) ON DELETE CASCADE
);

/* Search Terms*/
CREATE TABLE IF NOT EXISTS searchTerms
(
    id   INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE NOT NULL,
    type VARCHAR(50)         NOT NULL
);
