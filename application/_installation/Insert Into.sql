INSERT INTO account_types (id, name)
VALUES (1, 'Guest'),
       (2, 'Normal User'),
       (7, 'Admin')
	   ON DUPLICATE KEY UPDATE
	  	name = VALUES(name);

INSERT INTO preferences (name, type)
VALUES ('Dairy', 'intolerances'),
       ('Eggs', 'intolerances'),
       ('Gluten', 'intolerances'),
       ('Grain', 'intolerances'),
       ('Peanuts', 'intolerances'),
       ('Seafood', 'intolerances'),
       ('Sesame', 'intolerances'),
       ('Shellfish', 'intolerances'),
       ('Soy', 'intolerances'),
       ('Sulfite', 'intolerances'),
       ('Tree Nut', 'intolerances'),
       ('Wheat', 'intolerances')
	   ON DUPLICATE KEY UPDATE
	  	type = VALUES(type);

INSERT INTO preferences (name, type)
VALUES ('Gluten Free', 'diet'),
       ('Keto', 'diet'),
       ('Vegetarian', 'diet'),
       ('Lacto-Vegetarian', 'diet'),
       ('Ovo-Vegetarian', 'diet'),
       ('Vegan', 'diet'),
       ('Pescetarian', 'diet'),
       ('Paleo', 'diet'),
       ('Primal', 'diet'),
       ('Low FODMAP', 'diet'),
       ('Whole30', 'diet')
	   ON DUPLICATE KEY UPDATE
	  	type = VALUES(type);

INSERT INTO searchTerms (name, type)
VALUES ('main course', 'type'),
       ('side dish', 'type'),
       ('dessert', 'type'),
       ('appetizer', 'type'),
       ('salad', 'type'),
       ('bread', 'type'),
       ('breakfast', 'type'),
       ('soup', 'type'),
       ('beverage', 'type'),
       ('sauce', 'type'),
       ('marinade', 'type'),
       ('fingerfood', 'type'),
       ('snack', 'type'),
       ('drink', 'type')
	   ON DUPLICATE KEY UPDATE
	  	type = VALUES(type);

INSERT INTO searchTerms (name, type)
VALUES ('African', 'cuisine'),
       ('Asian', 'cuisine'),
       ('American', 'cuisine'),
       ('British', 'cuisine'),
       ('Cajun', 'cuisine'),
       ('Caribbean', 'cuisine'),
       ('Chinese', 'cuisine'),
       ('Eastern European', 'cuisine'),
       ('European', 'cuisine'),
       ('French', 'cuisine'),
       ('German', 'cuisine'),
       ('Greek', 'cuisine'),
       ('Indian', 'cuisine'),
       ('Irish', 'cuisine'),
       ('Italian', 'cuisine'),
       ('Japanese', 'cuisine'),
       ('Jewish', 'cuisine'),
       ('Korean', 'cuisine'),
       ('Latin American', 'cuisine'),
       ('Mediterranean', 'cuisine'),
       ('Mexican', 'cuisine'),
       ('Middle Eastern', 'cuisine'),
       ('Nordic', 'cuisine'),
       ('Southern', 'cuisine'),
       ('Spanish', 'cuisine'),
       ('Thai', 'cuisine'),
<<<<<<< Updated upstream
       ('Vietnamese', 'cuisine');

INSERT INTO searchTerms (name, type)
VALUES ('meta-score', NULL),
       ('popularity', NULL),
       ('healthiness', NULL),
       ('price', NULL),
       ('time', NULL),
       ('random', NULL),
       ('max-used-ingredients', NULL),
       ('min-missing-ingredients', NULL),
       ('alcohol', NULL),
       ('caffeine', NULL),
       ('copper', NULL),
       ('energy', NULL),
       ('calories', NULL),
       ('calcium', NULL),
       ('carbohydrates', NULL),
       ('carbs', NULL),
       ('choline', NULL),
       ('cholesterol', NULL),
       ('total-fat', NULL),
       ('fluoride', NULL),
       ('trans-fat', NULL),
       ('saturated-fat', NULL),
       ('mono-unsaturated-fat', NULL),
       ('poly-unsaturated-fat', NULL),
       ('fiber', NULL),
       ('folate', NULL),
       ('folic-acid', NULL),
       ('iodine', NULL),
       ('iron', NULL),
       ('magnesium', NULL),
       ('manganese', NULL),
       ('vitamin-b3', NULL),
       ('niacin', NULL),
       ('vitamin-b5', NULL),
       ('pantothenic-acid', NULL),
       ('phosphorus', NULL),
       ('potassium', NULL),
       ('protein', NULL),
       ('vitamin-b2', NULL),
       ('riboflavin', NULL),
       ('selenium', NULL),
       ('sodium', NULL),
       ('vitamin-b1', NULL),
       ('thiamin', NULL),
       ('vitamin-a', NULL),
       ('vitamin-b6', NULL),
       ('vitamin-b12', NULL),
       ('vitamin-c', NULL),
       ('vitamin-d', NULL),
       ('vitamin-e', NULL),
       ('vitamin-k', NULL),
       ('sugar', NULL),
       ('zinc', NULL);       ('zinc', NULL);       ('zinc', NULL);
=======
       ('Vietnamese', 'cuisine')
	   ON DUPLICATE KEY UPDATE
	  	type = VALUES(type);
>>>>>>> Stashed changes
