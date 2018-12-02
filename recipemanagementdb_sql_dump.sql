/*Create recipemanagementdb database*/
/*delete if exists*/
DROP DATABASE IF EXISTS recipemanagementdb;
CREATE DATABASE IF NOT EXISTS recipemanagementdb;

/*Select recipemanegementdb database to use*/
USE recipemanagementdb;

DROP TABLE IF EXISTS AUTHOR;
CREATE TABLE IF NOT EXISTS AUTHOR(
   AuthorID   INTEGER  NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,AuthorName VARCHAR(20) NOT NULL
  ,AuthorEmail VARCHAR(50) NOT NULL
  ,AuthorPassword VARCHAR(20) NOT NULL
  ,AuthorSecurityPassword VARCHAR(20) NOT NULL
);
INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword,AuthorSecurityPassword) VALUES (200,'Alexis','alexis@gmail.com','alexis1234','0000');
INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword,AuthorSecurityPassword) VALUES (201,'Judy Diercks Oreilly','judy@gmail.com','judy1234','0000');
INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword,AuthorSecurityPassword) VALUES (202,'Soup Loving Nicole','soup@gmail.com','soup1234','0000');
INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword,AuthorSecurityPassword) VALUES (203,'Andrea Cushman','andrea@gmail.com','andrea1234','0000');
INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword,AuthorSecurityPassword) VALUES (204,'VBRAUER671','vbrauer671@gmail.com','vbrauer671','0000');
INSERT INTO AUTHOR(AuthorID,AuthorName,AuthorEmail,AuthorPassword,AuthorSecurityPassword) VALUES (205,'Sean S.','sean@gmail.com','sean1234','0000');

DROP TABLE IF EXISTS INGREDIENT;
CREATE TABLE IF NOT EXISTS INGREDIENT(
   IngredientID   INTEGER  NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,IngredientName VARCHAR(48) NOT NULL
);
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (501,'all-purpose flour');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (502,'white sugar');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (503,'baking powder');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (504,'baking soda');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (505,'salt');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (506,'fat-free greek yogurt');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (507,'fat-free buttermilk');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (508,'butter, melted');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (509,'egg, lightly beaten');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (510,'poppy seed');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (511,'vanilla extract');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (512,'water');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (513,'bourbon whiskey');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (514,'soy sauce');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (515,'packed brown sugar');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (516,'Worcestershire sauce');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (517,'lemon juice');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (518,'beef rib-eye steaks');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (519,'broccoli with long stems');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (520,'olive oil, divided');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (521,'salt and ground black pepper to taste');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (522,'garlic, minced');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (523,'raw shrimp, peeled and deveined');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (524,'dry white wine');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (525,'lemon juice');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (526,'butter');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (527,'minced fresh basil');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (528,'chopped fresh chives');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (529,'crushed red pepper');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (530,'egg');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (531,'half-and-half cream');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (532,'canned pumpkim puree');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (533,'ground cinnamon');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (534,'vanilla extract');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (535,'pumpkin pie spice');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (536,'finely chopped walnuts');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (537,'day-old bread');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (538,'orzo pasta');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (539,'olive oil');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (540,'garlic');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (541,'crushed red pepper');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (542,'chicken breast galves- cut into bite-size pieces');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (543,'salt');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (544,'chopped fresh parsley');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (545,'spinach leaves');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (546,'ground beef');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (547,'chopped onion');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (548,'ketchup');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (549,'white sugar');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (550,'white vinegar');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (551,'prepared yellow mustard');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (552,'celery seed');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (553,'Worcrstershire sauce');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (554,'ground black pepper');
INSERT INTO INGREDIENT(IngredientID,IngredientName) VALUES (555,'salt');

DROP TABLE IF EXISTS RECIPE;
CREATE TABLE IF NOT EXISTS RECIPE(
   RecipeID   INTEGER  NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,RecipeName VARCHAR(40) NOT NULL
  ,RecipeDesc VARCHAR(448) NOT NULL
  ,AuthorID   INTEGER  NOT NULL
  ,PrepTime   VARCHAR(20) NOT NULL
  ,CookTime   VARCHAR(20) NOT NULL
);
INSERT INTO RECIPE(RecipeID,RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES (100,'Greek Yogurt Poppy Seed Muffins','Very moist and delicious! Try replacing poppy seeds with nuts, fruit, chocolate chips...this batter is a great muffin base.',200,'15mins','20mins');
INSERT INTO RECIPE(RecipeID,RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES (101,'Bourbon Street Rib-Eye Steak','After eating this style of steak in a restaurant a few times, I worked on making my own marinade. The results are tender and do not have an overbearing bourbon taste. This marinade is very different from the only other one I have seen on this site.',201,'7mins','8mins');
INSERT INTO RECIPE(RecipeID,RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES (102,'Keto Shrimp Scampi with Broccoli Noodles','Shrimp scampi is served over broccoli noodles for a keto-friendly meal. Garnish with Parmesan and additional basil if desired.',202,'15mins','15mins');
INSERT INTO RECIPE(RecipeID,RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES (103,'Pumpkin Pie French Toast','A delicious holiday breakfast. It''s a wonderful spin on traditional french toast that measures up for any pumpkin pie lover. Serve warm with warmed maple syrup!',203,'15mins','20mins');
INSERT INTO RECIPE(RecipeID,RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES (104,'Garlic Chicken with Orzo Noodles','This is a simple recipe with a spicy kick for garlic lovers. It is my combination of a much loved linguine and clam sauce dish and a recent introduction to orzo pasta. I have several variations for this recipe. Add more red pepper for extra spice. Substitute the chicken for clams or shrimp. Substitute the spinach leaves for diced tomatoes. I''ve also added spices such as basil, rosemary and oregano bringing a distinct Italian flavor to the dish.',204,'15mins','15mins');
INSERT INTO RECIPE(RecipeID,RecipeName,RecipeDesc,AuthorID,PrepTime,CookTime) VALUES (105,'Grandpa''s Classic Coney Sauce','My Grandfather owned a drive-in restaurant back in the 1950''s. This is his exact recipe for Coney Dogs from back in the day. I make this on special occasions and it is always hit with friends and family. Enjoy.',205,'10mins','2hrs');

DROP TABLE IF EXISTS STEP;
CREATE TABLE IF NOT EXISTS STEP(
   StepID     INTEGER  NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,RecipeID   INTEGER 
  ,StepNumber INTEGER
  ,StepDesc   VARCHAR(431)
);
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (300,100,1,'Preheat oven to 375 degrees F (190 degrees C). Spray 15 muffin cups with cooking spray.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (301,100,2,'Lightly spoon 2 cups flour into a dry measuring cup; level with a knife. Combine flour, sugar, baking powder, baking soda, and salt in a bowl using a whisk; make a well in the center.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (302,100,3,'Stir yogurt, buttermilk, butter, eggs, poppy seeds, and vanilla extract together in a separate bowl; add to flour mixture, stirring just until batter is moist. Spoon batter into prepared muffin cups.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (303,100,4,'Bake in the preheated oven until tops are golden brown, about 18 minutes. Remove muffins from cups immediately and place on a wire rack.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (304,101,1,'Whisk together the water, bourbon whiskey, soy sauce, brown sugar, Worcestershire sauce, and lemon juice in a bowl, and pour into a plastic zipper bag. Add the rib-eye steaks, coat with the marinade, squeeze out excess air, and seal the bag. Marinate in the refrigerator for 8 hours or overnight.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (305,101,2,'Preheat an outdoor grill for high heat, and lightly oil the grate.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (306,101,3,'Remove the rib-eye steaks from the marinade, and shake off excess. Discard the remaining marinade. Grill the steaks on high, 1 to 2 minutes per side, to sear the meat. Move the steaks to a cooler part of the grill and cook for an additional 2 to 3 minutes per side, if desired.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (307,102,1,'Cut off broccoli florets and save for another use. Cut woody ends off the stems. Shave large knots off the stems using a vegetable peeler so that they are as uniform as possible. Cut into noodles using the smallest blade on a spiralizer.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (308,102,2,'Heat 1 tablespoon olive oil in a large skillet over medium-high heat. Add broccoli noodles, salt, and pepper; toss for 3 minutes. Remove from heat and set aside.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (309,102,3,'Heat remaining olive oil and garlic in a separate skillet over medium heat. Cook for 1 minute. Add shrimp and cook until opaque, about 3 minutes per side. Transfer shrimp to a bowl.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (310,102,4,'Add wine, lemon juice, butter, basil, chives, and red pepper to the skillet. Whisk over medium heat for 3 minutes. Return shrimp to the skillet and toss to coat.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (311,102,5,'Spoon broccoli noodles into 4 serving bowls. Top with shrimp mixture.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (312,103,1,'Heat a lightly oiled skillet over medium heat.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (313,103,2,'Whisk eggs, half and half, pumpkin, cinnamon, vanilla extract, pumpkin pie spice, and walnuts together in a bowl. Soak one slice of bread at a time in the pumpkin mixture, then place in the prepared skilled. Repeat with the remaining slices of bread. Stir the pumpkin mixture between dips to keep the walnuts from settling. Cook the bread until golden brown, about 3 minutes on each side.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (314,104,1,'Bring a large pot of lightly salted water to a boil. Add orzo pasta, cook for 8 to 10 minutes, until al dente, and drain.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (315,104,2,'Heat the oil in a skillet over medium-high heat, and cook the garlic and red pepper 1 minute, until garlic is golden brown. Stir in chicken, season with salt, and cook 2 to 5 minutes, until lightly browned and juices run clear. Reduce heat to medium, and mix in the parsley and cooked orzo. Place spinach in the skillet. Continue cooking 5 minutes, stirring occasionally, until spinach is wilted. Serve topped with Parmesan cheese.');
INSERT INTO STEP(StepID,RecipeID,StepNumber,StepDesc) VALUES (316,105,1,'Place the ground beef and onion in a large skillet over medium-high heat. Cook, stirring to crumble, until beef is browned. Drain. Transfer the beef and onion to a slow cooker and stir in the ketchup, sugar, vinegar and mustard. Season with celery seed, Worcestershire sauce, pepper and salt. Cover and simmer on Low setting for a few hours before serving.');

DROP TABLE IF EXISTS STEP_INGREDIENT;
CREATE TABLE IF NOT EXISTS STEP_INGREDIENT(
   Step_IngredD  INTEGER  NOT NULL PRIMARY KEY 
  ,StepID        INTEGER  NOT NULL
  ,IngredientID  INTEGER 
  ,IngredientAmt NUMERIC(20,2)
  ,AmtUnits      VARCHAR(18)
);
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (401,300,NULL,NULL,NULL);
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (402,301,501,2,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (403,301,502,0.75,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (404,301,503,2,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (405,301,504,1,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (406,301,505,0.5,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (407,302,506,1,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (408,302,507,0.75,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (409,302,508,0.25,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (410,302,509,1,'large');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (411,302,510,1,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (412,302,511,1,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (413,303,512,1,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (414,304,513,0.66,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (415,304,514,0.5,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (416,304,515,0.25,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (417,304,516,3,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (418,304,517,2,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (419,304,518,6,'ounce');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (420,305,NULL,NULL,NULL);
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (421,306,NULL,NULL,NULL);
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (422,307,519,2,'large head');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (423,308,520,2,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (424,308,521,2,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (425,309,522,2,'cloves');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (426,309,523,1,'pound');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (427,310,524,2,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (428,310,525,2,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (429,310,526,2,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (430,310,527,1,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (431,310,528,1,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (432,310,529,0.5,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (433,311,NULL,NULL,NULL);
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (434,312,NULL,NULL,NULL);
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (435,313,530,3,'large');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (436,313,531,0.5,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (437,313,532,0.25,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (438,313,533,1,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (439,313,534,1,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (440,313,535,0.25,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (441,313,536,0.25,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (442,313,537,8,'slices');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (443,314,538,1,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (444,315,539,2,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (445,315,540,2,'cloves');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (446,315,541,0.25,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (447,315,542,2,'skinless, boneless');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (448,315,543,2,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (449,315,544,1,'tablespoon');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (450,315,545,2,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (451,316,546,2,'pound');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (452,316,547,0.5,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (453,316,548,1.5,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (454,316,549,0.25,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (455,316,550,0.25,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (456,316,551,0.25,'cup');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (457,316,552,0.5,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (458,316,553,0.75,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (459,316,554,0.5,'teaspoons');
INSERT INTO STEP_INGREDIENT(Step_IngredD,StepID,IngredientID,IngredientAmt,AmtUnits) VALUES (460,316,555,0.75,'teaspoons');
