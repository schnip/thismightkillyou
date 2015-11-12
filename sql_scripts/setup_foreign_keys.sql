ALTER TABLE votes
ADD FOREIGN KEY (username)
REFERENCES users(username)
ON DELETE CASCADE;

ALTER TABLE votes
ADD FOREIGN KEY (recipe_id)
REFERENCES recipes(id)
ON DELETE CASCADE;

ALTER TABLE ingredients
ADD FOREIGN KEY (recipe_id)
REFERENCES recipes(id)
ON DELETE CASCADE;

ALTER TABLE directions
ADD FOREIGN KEY (recipe_id)
REFERENCES recipes(id)
ON DELETE CASCADE;

-- This is for the tables that are used in creating the new recipes

ALTER TABLE gen_food
ADD FOREIGN KEY (type)
REFERENCES gen_type(type)
ON DELETE CASCADE;

ALTER TABLE gen_steps
ADD FOREIGN KEY (primary_type)
REFERENCES gen_type(type)
ON DELETE CASCADE;

ALTER TABLE gen_steps
ADD FOREIGN KEY (secondary_type)
REFERENCES gen_type(type)
ON DELETE CASCADE;

ALTER TABLE gen_steps
ADD FOREIGN KEY (result_type)
REFERENCES gen_type(type)
ON DELETE CASCADE;

ALTER TABLE gen_quantities
ADD FOREIGN KEY (type)
REFERENCES gen_type(type)
ON DELETE CASCADE;