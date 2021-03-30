<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;
class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        /* Piatti ristorante 1 Pasta, Healthy */

        $names1 = ["Spaghetti allo scoglio", "Pasta alla carbonara", "Salmon Salad", "Chicken Salad", "Acqua", "Coca cola", "Birra artigianale", "Pennete panna e salmone", "Taco Salad", "Pasta Salad"];
        $images1 = ["img_restaurants/spaghetti_scoglio.jpg", "img_restaurants/carbf.jpg", "img_restaurants/orange_salad.jpg", "img_restaurants/chicken_salad.jpg", "img_restaurants/acqua.jpg", "img_restaurants/coca.jpg", "img_restaurants/birraf.jpg", "img_restaurants/panna_salmonef.jpg", "img_restaurants/taco_saladf.jpg", "img_restaurants/healthy_pasta_saladf.jpg"];
        $ingred1 = [
            "Spaghetti, gamberi, cozze, arsele, pomodoro",
            "Spaghetti, guanciale, uova, pecorino, sale, pepe",
            "Salmone marinato, Menta, Avocado, Mango, Edamame, Germogli di soia",
            "Pollo, pomodori, mais, mozzarella",
            "Acqua",
            "Acqua, Anidride carbonica, Zucchero, Aromi naturali, Caffeina",
            "Malto d'orzo, luppolo, lievito, acqua",
            "Pennete, panna, salmone, erba cipollina",
            "Carne lessa, pomodori ciliegini, lattuga romana, avocado",
            "Fusilli, pomodori, peperoni rossi, pomodori, basilico, olio extra vergine d'oliva",
        ];

        for ($i=0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names1[$i];
            $newDish->img = $images1[$i];
            $newDish->description = $ingred1[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 1;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();

        }

        $newDish = new Dish;
        $newDish->name = 'baby-yoda';
        $newDish->img = 'img_restaurants/baby.jpg';
        $newDish->description = 'Daje';
        $newDish->price = 999;
        $newDish->discount = 0;
        $newDish->rating = 5;
        $newDish->menu_class = "";
        $newDish->discount_id = "";
        $newDish->restaurant_id = 1;


        $newDish->slug = 'baby-yoda';
        $newDish->save();

        /* //Piatti ristorante 1 Pasta, Healthy //*/


        /* Piatti ristorante 2 Pizza, Ristorante */

        $names2 = ["Margherita", "Prosciutto", "Funghi", "Wurstel e patatine", "Acqua", "Coca cola", "Birra artigianale", "Bistecca alla fiorentina", "Pennete panna e salmone", "Fritto misto"];
        $images2 = ["img_restaurants/margheritaf.jpg", "img_restaurants/prosciuttof.jpg", "img_restaurants/pizza_funghif.jpg", "img_restaurants/wurstel_e_patatinef.jpg", "img_restaurants/acqua.jpg", "img_restaurants/coca.jpg", "img_restaurants/birraf.jpg", "img_restaurants/bisteccaf.jpg", "img_restaurants/panna_salmonef.jpg", "img_restaurants/fritto_mistof.jpg"];
        $ingred2 = [
            "Pomodoro, mozzarella, basilico",
            "Pomodoro, mozzarella, prosciutto",
            "Pomodoro, mozzarella, funghi",
            "Pomodoro, mozzarella, wurstel, patatine",
            "Acqua",
            "Acqua, Anidride carbonica, Zucchero, Aromi naturali, Caffeina",
            "Malto d'orzo, luppolo, lievito, acqua",
            "Carne bovina, peppe",
            "Pennete, panna, salmone, erba cipollina",
            "Gamberetti, triglie, alici, calamari, semola, sale",
        ];

        for ($i = 0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names2[$i];
            $newDish->img = $images2[$i];
            $newDish->description = $ingred2[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 2;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();
        }

        /* //Piatti ristorante 2 Pizza, Ristorante //*/


        /* Piatti ristorante 3 Giapponese, Cinese, Asiatico */

        $names3 = ["Nighiri", "Uramaki", "Tempura di gamberi", "Involtini primavera", "Acqua", "Coca cola", "Birra artigianale", "Ravioli cinesi", "Ramen", "Onigiri"];
        $images3 = ["img_restaurants/nighirif.jpg", "img_restaurants/uramakif.jpg", "img_restaurants/tempuraf.jpg", "img_restaurants/involtini_primaveraf.jpg", "img_restaurants/acqua.jpg", "img_restaurants/coca.jpg", "img_restaurants/birraf.jpg", "img_restaurants/ravioli_cinesif.jpg", "img_restaurants/ramenf.jpg", "img_restaurants/onigirif.jpg"];
        $ingred3 = [
            "Riso nishiki, salmone, tonno",
            "Riso nishiki, alga nori, avocado, polpa di granchio",
            "Gamberi, farina di riso, farina",
            "Sfoglie per involtini, cavolo cappuccio, carote",
            "Acqua",
            "Acqua, Anidride carbonica, Zucchero, Aromi naturali, Caffeina",
            "Malto d'orzo, luppolo, lievito, acqua",
            "Maiale, cavolo, cipolla, farina, vino di riso",
            "Noodles, lonza di maiale, uova, cipollotto, salsa di soia, sake, naruto, aglio",
            "Riso, salmone, tonno, olio",
        ];

        for ($i = 0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names3[$i];
            $newDish->img = $images3[$i];
            $newDish->description = $ingred3[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 3;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();
        }

        /* //Piatti ristorante 3 Giapponese, Cinese, Asiatico //*/


        /* Piatti ristorante 4 Dolci e Dessert, Gelato */

        $names4 = ["Tiramisù", "Muffin al cioccolato", "Torta panna e nutella", "Mousse al caffè", "Acqua", "Coca cola", "Birra artigianale", "Gelato al melone", "Gelato al cioccolato", "Gelato al pistacchio"];
        $images4 = ["img_restaurants/tiramisuf.jpg", "img_restaurants/muffinf.jpg", "img_restaurants/nutf.jpg", "img_restaurants/mousecaf.jpg", "img_restaurants/acqua.jpg", "img_restaurants/coca.jpg", "img_restaurants/birraf.jpg", "img_restaurants/melonef.jpg", "img_restaurants/ciocf.jpg", "img_restaurants/pistacchiof.jpg"];
        $ingred4 = [
            "Savoiardi, mascarpone, uova, zucchero, caffè",
            "Cacao, farina, zucchero, burro, cioccolato, uova, latte, lievito",
            "Farina, zucchero, panna, nutella, cioccolato, uova, latte",
            "Uova, zucchero, panna, caffè, vaniglia",
            "Acqua",
            "Acqua, Anidride carbonica, Zucchero, Aromi naturali, Caffeina",
            "Malto d'orzo, luppolo, lievito, acqua",
            "Melone, panna, latte, zucchero, uova",
            "Cacao, panna, latte, zucchero, uova",
            "Crema al pistacchio, panna, latte, zucchero, uova",
        ];

        for ($i = 0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names4[$i];
            $newDish->img = $images4[$i];
            $newDish->description = $ingred4[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 4;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();
        }

        /* //Piatti ristorante 4 Dolci e Dessert, Gelato //*/


        /* Piatti ristorante 5 Hamburger, Kebab */
        $names5 = ["Acqua", "Hamburger", "Kebab", "Bistecca", "Chicken Burger", "Crispy Chicken", "Birra", "Coca-Cola", "Filetto di manzo", "Pollo grigliato"];
        $images5 = ["img_restaurants/acqua.jpg", "img_restaurants/hamburger.jpeg", "img_restaurants/kebab.jpeg", "img_restaurants/bistecca.jpeg", "img_restaurants/chicken-burger.jpeg", "img_restaurants/crispy-chicken.jpeg", "img_restaurants/beer.jpeg", "img_restaurants/coca-cola.jpeg", "img_restaurants/filetto-manzo.jpeg", "img_restaurants/pollo-grigliato.jpeg"];
        $ingred5 = [
            "Acqua",
            "Pomodori, insalata, Hamburger di Manzo, cheddar, patatine",
            "Kebab, piadina, insalata, pomdori, cipolle",
            "Bistecca di bovino, patatine",
            "Pollo fritto, salsa aioli, insalata, pomodori ",
            "Pollo fritto, salsa rosa, insalata, cetrioli",
            "Birra",
            "Coca-Cola",
            "Filetto di manzo, verdure di stagione",
            "Pollo grigliato, verdure di",
        ];

        for ($i = 0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names5[$i];
            $newDish->img = $images5[$i];
            $newDish->description = $ingred5[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 5;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();
        }
        /* //Piatti ristorante 5 Hamburger, Kebab //*/


        /* Piatti ristorante 6 Messicano, Piadina, Burrito */
        $names6 = ["Taco", "Burrito", "Nachos Cheese", "Taco Steak", "Taco Vegetarian", "Nachos Sausage", "Birra", "Coca-Cola", "Acqua", "Jarritos"];
        $images6 = ["img_restaurants/tacos.jpeg", "img_restaurants/burrito.jpeg", "img_restaurants/nachos.jpeg", "img_restaurants/taco-steak.jpeg", "img_restaurants/burrito-vegan.jpeg", "img_restaurants/nachos-sausage.jpeg", "img_restaurants/beer.jpeg", "img_restaurants/coca-cola.jpeg", "img_restaurants/acqua.jpg", "img_restaurants/jarritos.jpg"];
        $ingred6 = [
            "Tortilla, Carne trita, cipolle rosse, tabasco, peperoni",
            "Tortilla, trito di manzo, salsa sour, pomodori, formaggio, fagioli messicani",
            "Nachos, cheddar fuso",
            "Tortilla, manzo, patate, insalata, pomodori, salsa sour, cheddar",
            "Tortilla, crauti, riso, avocado, insalata, pomodori, mais, olive, carote",
            "Nachos, salsiccia, bacon, jalapeno, cheddar",
            "Birra",
            "Coca-Cola",
            "Acqua",
            "Jarritos",
        ];

        for ($i = 0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names6[$i];
            $newDish->img = $images6[$i];
            $newDish->description = $ingred6[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 6;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();
        }
        /* //Piatti ristorante 6 Messicano, Piadina, Burrito //*/



        /* Piatti ristorante 7 Mediterraneo, Italiano */
        $names7 = ["Pasta con pesto di pistacchi", "Tagliatelle al ragù bolognese", "Pasta con panna e tartufo", "Orata sotto sale", "Tagliere di salumi", "Vino rosso della casa", "Birra", "Coca-Cola", "Acqua", "Fanta"];
        $images7 = ["img_restaurants/pasta-pesto-pistacchi.jpeg", "img_restaurants/ragu-bolognese.jpeg", "img_restaurants/pasta-panna.jpeg", "img_restaurants/pesce-sotto-sale.jpeg", "img_restaurants/tagliere-salumi.jpeg", "img_restaurants/wine-red.jpeg", "img_restaurants/beer.jpeg", "img_restaurants/coca-cola.jpeg", "img_restaurants/acqua.jpg", "img_restaurants/fanta.jpg"];
        $ingred7 = [
            "Pasta con pesto di pistacchi",
            "Tagliatelle al ragù bolognese",
            "Spaghetti con panna e tartufo",
            "Orata sotto sale, verdure di stagione",
            "Tagliere di salumi e formaggi",
            "Nachos, salsiccia, bacon, jalapeno, cheddar",
            "Vino rosso della casa",
            "Coca-Cola",
            "Acqua",
            "Fanta",
        ];

        for ($i = 0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names7[$i];
            $newDish->img = $images7[$i];
            $newDish->description = $ingred7[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 7;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();
        }
        /* //Piatti ristorante 7 Mediterraneo, Italiano //*/


        /* Piatti ristorante 8 Americano, Hamburger */
        $names8 = ["Hamburger Classic", "Patatine fritte", "Pancake", "Hot-Dog", "Cookies", "Donuts", "Birra", "Coca-Cola", "Acqua", "Fanta"];
        $images8 = ["img_restaurants/ham-burger.jpeg", "img_restaurants/fries.jpeg", "img_restaurants/pancake.jpeg", "img_restaurants/hot-dog.jpeg", "img_restaurants/cookies.jpeg", "img_restaurants/donuts.jpeg", "img_restaurants/beer.jpeg", "img_restaurants/coca-cola.jpeg", "img_restaurants/acqua.jpg", "img_restaurants/fanta.jpg"];
        $ingred8 = [
            "Hamburger, insalata, pomodoro, bacon, formaggio",
            "Porzione di patatine fritte",
            "Pancakes con nutella e fragole",
            "Hot-Dog con mayonese / ketchup / senape",
            "Cookies con gocce di cioccolato",
            "Donuts vari gusti",
            "Birra",
            "Coca-Cola",
            "Acqua",
            "Fanta",
        ];

        for ($i = 0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names8[$i];
            $newDish->img = $images8[$i];
            $newDish->description = $ingred8[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 8;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();
        }
        /* //Piatti ristorante 8 Americano, Hamburger //*/


        /* Piatti ristorante 9 Poke, Healthy */
        $names9 = ["Poke Classic", "Filetto di Salmone", "Egg-Salad", "Caesar-Salad", "Protein Porridge", "Avocado-Toast", "Poke-Vegetarian", "Coca-Cola", "Acqua", "Fanta"];
        $images9 = ["img_restaurants/poke.jpeg", "img_restaurants/salmone.jpeg", "img_restaurants/egg-salad.jpeg", "img_restaurants/caesar-salad.jpeg", "img_restaurants/porridge.jpeg", "img_restaurants/avocado-toast.jpeg", "img_restaurants/poke2.jpeg", "img_restaurants/coca-cola.jpeg", "img_restaurants/acqua.jpg", "img_restaurants/fanta.jpg"];
        $ingred9 = [
            "Riso, salmone, pomodori, funghi, avocado ",
            "Filetto di salmone con verdure di stagione",
            "Insalata con uova e verdure di stagione",
            "Insalata greca con filetti di pollo grigliato e verdure di stagione",
            "Porridge proteico con frutta di stagione",
            "Avocado toast con salmone affumicato",
            "Poke vegetariano con tofu, zucchine, riso, carote, fagioli ",
            "Coca-Cola",
            "Acqua",
            "Fanta",
        ];

        for ($i = 0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names9[$i];
            $newDish->img = $images9[$i];
            $newDish->description = $ingred9[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 9;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();
        }
        /* //Piatti ristorante 9 Poke, Healthy //*/


        /* Piatti ristorante 10 Mediterraneo, Italiano */
        $names10 = ["Acqua", "Vino Rosso", "Salmone", "Bistecca", "Polpette", "Filetto con verdure", "Birra", "Coca-Cola", "Pasta al pesto", "Risotto allo zafferano"];
        $images10 = ["img_restaurants/acqua.jpg", "img_restaurants/wine-red.jpeg", "img_restaurants/salmone.jpeg", "img_restaurants/bistecca.jpeg", "img_restaurants/polpette.jpg", "img_restaurants/carne_verdure.jpg", "img_restaurants/beer.jpeg", "img_restaurants/coca-cola.jpeg", "img_restaurants/pesto_tradiz.jpg", "img_restaurants/zafferano.jpg"];
        $ingred10 = [
            "Acqua",
            "Vino rosso",
            "Salmone con verdure",
            "Bistecca di bovino, patatine",
            "Polpette di bovino con insalata",
            "Filetto alla griglia con verdure",
            "Birra",
            "Coca-Cola",
            "Pasta al pesto, ricetta tradizionale",
            "Risotto allo zafferano secondo la nostra ricetta",
        ];

        for ($i=0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names10[$i];
            $newDish->img = $images10[$i];
            $newDish->description = $ingred10[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 10;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();

        }
        /* //Piatti ristorante 10 Mediterraneo, Italiano //*/


        /* Piatti ristorante 11 Indiano, Asiatico */
        $names11 = ["Acqua", "Vino Rosso", "Budino di carote", "Curry", "Chotpoti", "Samosa", "Birra", "Coca-Cola", "Pakora", "Biryani"];
        $images11 = ["img_restaurants/acqua.jpg", "img_restaurants/wine-red.jpeg", "img_restaurants/budino_carote.jpg", "img_restaurants/curry.jpg", "img_restaurants/chotpoti.jpg", "img_restaurants/samosa.jpg", "img_restaurants/beer.jpeg", "img_restaurants/coca-cola.jpeg", "img_restaurants/pakora.jpg", "img_restaurants/biryani.jpg"];
        $ingred11 = [
            "Acqua",
            "Vino rosso",
            "Budino di carote",
            "Curry ricetta tradizionale",
            "Patate, ceci, cipolle, peperoncini, uova sode grattugiate, tamarindo, foglie di coriandolo e cumino",
            "Impasto a base di farina avvolge un ripieno di: patate, cipolle, lenticchie, formaggio, manzo o pollo, coriandolo, peperoncino, zenzero, garam masala.",
            "Birra",
            "Coca-Cola",
            "Peperoncino verde, cumino, garam masala, chiodi di garofano, cipolle, funghi, fagiolini, spinaci, zucchine, peperoni, melanzane, cavolfiori.",
            "Riso basmati bollito a cui si aggiungono molte spezie e vari ingredienti cotti separatamente: carne, pesce, verdure.",
        ];

        for ($i=0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names11[$i];
            $newDish->img = $images11[$i];
            $newDish->description = $ingred11[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 11;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();

        }
        /* //Piatti ristorante 11 Indiano, Asiatico //*/



        /* Piatti ristorante 12 Thailandese, Asiatico */
        $names12 = ["Acqua", "Vino Rosso", "Pad Thai", "Khao Pad", "Yam Nua", "Laap", "Birra", "Coca-Cola", "Som Tam", "Khao Soi"];
        $images12 = ["img_restaurants/acqua.jpg", "img_restaurants/wine-red.jpeg", "img_restaurants/pad_thai.jpg", "img_restaurants/khao_pad.jpg", "img_restaurants/yam_nua.jpg", "img_restaurants/laap.jpg", "img_restaurants/beer.jpeg", "img_restaurants/coca-cola.jpeg", "img_restaurants/som_tam.jpg", "img_restaurants/khao_soi.jpg"];
        $ingred12 = [
            "Acqua",
            "Vino rosso",
            "Cucinato con uova e tofu, insaporito con polpa di tamarindo, salsa di pesce, gamberi, aglio, peperoncino e zucchero di palma.",
            "Riso Jasmine accompagnato da carne, pollo, gamberetti e granchio, uovo, cipolla, aglio ed occasionalmente pomodoro.",
            "Insalata servita con manzo grigliato tagliato a fette e servito con lemon grass, verdure grigliate e cipolle croccanti.",
            "Insalata con carne macinata, cucinata con pollo, manzo, anatra, pesce, maiale o funghi.",
            "Birra",
            "Coca-Cola",
            "Insalata piccante di papaya, composta da papaya sminuzzata, pasta di gamberetti, gamberi, aglio, chili e melanzane crude.",
            "Zuppa di noodles servita con maiale, pomodori, fagioli di soia fermentati, germogli di fagioli e scalogno.",
        ];

        for ($i=0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names12[$i];
            $newDish->img = $images12[$i];
            $newDish->description = $ingred12[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(3, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 12;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();

        }
        /* //Piatti ristorante 12 Thailandese, Asiatico //*/
    }
}
