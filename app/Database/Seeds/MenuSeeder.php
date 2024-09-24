<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [

            // colddrinks
            [
                'name' => 'Strawberry Shake',
                'description' => '',
                'image' => 'strawberry shake.jpg',
                'price' => 180.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sagot Gulaman',
                'description' => '',
                'image' => 'sagot gulaman.jpg',
                'price' => 70.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Shirley Temple',
                'description' => '',
                'image' => 'shirley temple.jfif',
                'price' => 85.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Kalamansi Slush',
                'description' => '',
                'image' => 'kalamansi slush.jfif',
                'price' => 115.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Iced Coffee Float',
                'description' => '',
                'image' => 'Ice coffee float.jfif',
                'price' => 125.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Fresh Fruit Shake',
                'description' => '',
                'image' => 'fresh fruit shake.jpg',
                'price' => 155.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Juice in Can',
                'description' => 'Pineapple/4seasons/Mango',
                'image' => 'juice in can.jpg',
                'price' => 70.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Softdrinks',
                'description' => '08oz',
                'image' => 'soft drinks 8oz.jfif',
                'price' => 18.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Softdrinks',
                'description' => '1.5liter',
                'image' => 'soft drinks 1.5.jpg',
                'price' => 130.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Bottled Water',
                'description' => '500ml',
                'image' => 'bottled water 500.png',
                'price' => 22.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Bottled Water',
                'description' => '330ml',
                'image' => 'bottled water 300.jpg',
                'price' => 15.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Mango Queen',
                'description' => '',
                'image' => 'mango queen.jpg',
                'price' => 160.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Cucumber Lemonade',
                'description' => '',
                'image' => 'Cucumber-Lemonade-5.jpg',
                'price' => 200.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Iced Tea House Blend',
                'description' => '',
                'image' => 'iced tea house blend.jfif',
                'price' => 200.00,
                'category_id' => 1, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            // Alcoholic Drinks
            [
                'name' => 'Carlo Rossi wine',
                'description' => '',
                'image' => 'Carlorossi wine.jpg',
                'price' => 600.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'San Mig Flavored',
                'description' => '',
                'image' => 'san-miguel-flavored-beer.jpg',
                'price' => 70.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'San Mig Light',
                'description' => '',
                'image' => 'san mig light.png',
                'price' => 70.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'San Mig Pale Pilsen',
                'description' => '',
                'image' => 'san mig pale pilsen.png',
                'price' => 70.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Red Horse',
                'description' => '330ml',
                'image' => 'red-horse-bottle-330ml_2.jpg',
                'price' => 70.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Emperador Light',
                'description' => '750ml',
                'image' => 'emperador light 750.jpg',
                'price' => 250.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'GSM Blue',
                'description' => '700ml',
                'image' => 'GSM blue 700.jfif',
                'price' => 250.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Red Wine',
                'description' => '',
                'image' => 'Red wine.jpg',
                'price' => 500.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'El Hombre Tequila',
                'description' => '',
                'image' => 'el hombre.jpg',
                'price' => 600.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Alfonso',
                'description' => '1 liter',
                'image' => 'Alfonso 1 liter.jpg',
                'price' => 650.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Fundador',
                'description' => '1 liter',
                'image' => 'Fundador.avif',
                'price' => 900.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Jose Cuervo',
                'description' => '1 liter',
                'image' => 'jose cuervo.jpeg',
                'price' => 2500.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Black Label',
                'description' => '1 liter',
                'image' => 'Black label.jpg',
                'price' => 2800.00,
                'category_id' => 2, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            // Mixed Cocktails
            [
                'name' => 'Tequila Sunrise',
                'description' => '',
                'image' => 'tequila-sunrise-18167a1.jpg',
                'price' => 105.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Margarita',
                'description' => '',
                'image' => 'margarita-google-1000x1000.jpg',
                'price' => 105.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Dirty Shirley',
                'description' => '',
                'image' => 'DIRTY-SHIRLEY-3-1.jpg',
                'price' => 105.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Pina Colada',
                'description' => '',
                'image' => 'pina-colada-c68aca7.jpg',
                'price' => 105.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Tequila Pop',
                'description' => '',
                'image' => 'tequila pop.png',
                'price' => 105.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Pink Margarita',
                'description' => '',
                'image' => 'pink margarita.jpg',
                'price' => 105.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Daiquiri',
                'description' => '',
                'image' => 'Daiquiri_3000x3000_primary-206eb2330cb04852ab7d780dcf3d55ef.jpg',
                'price' => 105.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Mindoro Sling Pitcher',
                'description' => '',
                'image' => 'mindoro-sling-pitcher.png',
                'price' => 550.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Smirnoff-Mule',
                'description' => '',
                'image' => 'smirnoff.jpg',
                'price' => 80.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Cuba Libre',
                'description' => '',
                'image' => 'cuba libre.jpg',
                'price' => 105.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Gin Sour',
                'description' => '',
                'image' => 'gin sour.jpg',
                'price' => 105.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Tequila Shot',
                'description' => '',
                'image' => 'tequila shot.jpg',
                'price' => 85.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sangria Pitcher',
                'description' => '',
                'image' => 'sangria pitcher.jpg',
                'price' => 800.00,
                'category_id' => 3, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],

            // Hot Drinks
            [
                'name' => 'Brewed Coffee',
                'description' => '',
                'image' => 'Brewed coffee.jpg',
                'price' => 60.00,
                'category_id' => 4, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Coffee',
                'description' => '',
                'image' => 'Coffee.jfif',
                'price' => 25.00,
                'category_id' => 4, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Lipton Tea',
                'description' => '',
                'image' => 'Lipton-Tea-During-Pregnancy-1-910x1024.jpg',
                'price' => 25.00,
                'category_id' => 4, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Milo',
                'description' => '',
                'image' => 'Milo drink.jfif',
                'price' => 25.00,
                'category_id' => 4, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Hot Calamansi Juice',
                'description' => '',
                'image' => 'calamansi juice.jpg',
                'price' => 70.00,
                'category_id' => 4, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],

            // Boodle Bundles
            [
                'name' => 'Package 1 (4-5 pax)',
                'description' => 'Inihaw na Tilapia w/ sauce, halabos na hipon, inihaw na liempo, inihaw na talong, salted egg, steamed okra w/ bagoong, ensaladang mangga, and steamed rice',
                'image' => 'boodle1.png',
                'price' => 1665.00,
                'category_id' => 5, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Package 2 (4-5 pax)',
                'description' => 'Chicken bbq, crablets, inihaw na pusit, inihaw na talong, inihaw na bangus, halabos, na hipon, ensaladang labanos, and steamed rice',
                'image' => 'boodle2.png',
                'price' => 1990.00,
                'category_id' => 5, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Package 3 (4-5 pax)',
                'description' => 'Vegetable tempura, 10pcs pork bbq, buffalo wings, ensaladang ampalaya, calamares fritos, and steamed rice',
                'image' => 'boodle3.png',
                'price' => 2010.00,
                'category_id' => 5, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Seafood Bundle (3-4 pax)',
                'description' => 'w/ 3 rice and pineapple juice',
                'image' => '',
                'price' => 2375.00,
                'category_id' => 5, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],

            // Seafoods
            [
                'name' => 'Sinigang na ulo ng Salmon',
                'description' => 'Salmon head in sinigang soup',
                'image' => 'Sinigang-na-Salmon-sa-Miso-Recipe.jpg',
                'price' => 365.00,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sinigang na Tanigue',
                'description' => 'Tanigue fish in your favorite sinigang soup',
                'image' => 'sinigang na tanigue.jfif',
                'price' => 365.00,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sinigang na Bangus',
                'description' => 'Milkfish cooked in sinigang soup',
                'image' => 'sinigang na bangus.avif',
                'price' => 335.00,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Pinaputok na Tilapia',
                'description' => 'Steamed stuffed tilapia wrapped in foil cooked in its own sauce',
                'image' => 'crispy tilapia strips.jpg',
                'price' => 260.00,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Crispy Tilapia Strips',
                'description' => 'Tilapia fillet deep fried w/ whole fish until crispy served w/ sweet chili sauce',
                'image' => 'crispy tilapia strips.jpg',
                'price' => 270.00,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Fried Tilapia/Bangus',
                'description' => 'Tilapia or Bangis fish grilled and served w/ soy sauce dip',
                'image' => 'Grilled tilapia bangus.jpg',
                'price' => 245.00,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Fish Fillet with',
                'description' => 'Sweet & sour sauce or White sauce',
                'image' => 'Fish fillet.jpg',
                'price' => 295.00,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Kinilaw na Tanigue',
                'description' => 'Tanigue fillet cooked in vinegar with tomatoes, onion and ginger',
                'image' => 'KINILAW-NA-TANIGUE-1.png',
                'price' => 330.00,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sweer & Sour Tilapia',
                'description' => 'Fried Tilapia graciously coated w/ sweet and sour sauce',
                'image' => 'sweet and sour tilapia.jpg',
                'price' => 330.00,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Pampano (Ihaw or Sinigang)',
                'description' => 'Per gram',
                'image' => 'pampano.jpg',
                'price' => 1.40,
                'category_id' => 6, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],

            // Noodles
            [
                'name' => 'Pancit Sotanghon',
                'description' => '',
                'image' => 'pansit sotanghon.jpg',
                'price' => 330.00,
                'category_id' => 7, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Pancit Bihon',
                'description' => 'Thin noodles w/ soy sauce sliced meat & chopped vegetables',
                'image' => 'pancit bihon.jpg',
                'price' => 255.00,
                'category_id' => 7, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Pancit Canton',
                'description' => 'Stir-fried egg noodles topped squid balls & sauteed cabbage, carrot strips & spring onions',
                'image' => 'pancit canton.jpg',
                'price' => 255.00,
                'category_id' => 7, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Pancit Guisado',
                'description' => 'Mixture of Pancit bihon & pancit canton',
                'image' => 'pancit-guisado-main.avif',
                'price' => 255.00,
                'category_id' => 7, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Lomi',
                'description' => 'Creamy soup w/ egg, mixed seafood, pork sisig',
                'image' => 'lomi.jpg',
                'price' => 280.00,
                'category_id' => 7, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sisig Pancit',
                'description' => 'Pancit Guisado topped with your favorite pork sisig',
                'image' => 'sisig pancit.jpg',
                'price' => 320.00,      
                'category_id' => 7, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],

            // Sizzling plates
            [
                'name' => 'Sizzling Mushroom',
                'description' => 'With Tofu',
                'image' => 'Sizzling mushroom only.jfif',
                'price' => 305.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],

            [
                'name' => 'Sizzling Beef Bulalo',
                'description' => '',
                'image' => 'Sizzling beef bulalo.jpg',
                'price' => 750,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Sisig Squid',
                'description' => 'Minced squid parts with chili, onion in sizzling plate',
                'image' => 'Sizzling sisig squid.jpg',
                'price' => 295.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Pusit (Squid)',
                'description' => 'Sauteed spicy squid cuts served in a sizzling plate',
                'image' => 'Sizzling stuffed squid.jfif',
                'price' => 295.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Breaded Pork with Gravy',
                'description' => 'Deep fried breaded pork covered with hot gravy sauce',
                'image' => 'sizzling breaded porkchop.jpg',
                'price' => 395.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Seafoods',
                'description' => '',
                'image' => 'sizzling seafoods.jfif',
                'price' => 565.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Tanigue Steak',
                'description' => 'Steak-cut tanigue with special sauce',
                'image' => 'Sizzling-Tanigue-Steak.jpg',
                'price' => 315.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Fried Chicken',
                'description' => 'Fried chicken in creamy sauce with chopped vegetables',
                'image' => 'sizzling fried chicken.jpg',
                'price' => 355.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Laing with Tofu',
                'description' => 'Gabi leaves cooked in coconut milk served with crisp-fried tofu',
                'image' => 'sizzling laing with tofu.jfif',
                'price' => 265.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Chicken Diablo',
                'description' => 'Half chicken in a sizzling plate covered with special spicy red sauce',
                'image' => 'sizzling chicken diablo.jfif',
                'price' => 335.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Spicy Chicken Wings',
                'description' => 'Fried chicken wings in hot & spicy sauce in sizzling platter',
                'image' => 'sizzling-spicy-wings-recipe-2.jpg',
                'price' => 285.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Tofu',
                'description' => 'Crisp-fried tofu, chili peppers, mayonnaise and oyster sauce',
                'image' => 'sizzling tofu.jpg',
                'price' => 245.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Pork Sisig (Regular)',
                'description' => 'Minced crispy pork mask with chili, onion & liver in sizzling plate',
                'image' => 'Sizzling Pork Sisig.avif',
                'price' => 225.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Pork Sisig (Special)',
                'description' => 'Minced crispy pork mask with chili, onion & liver in sizzling plate (with egg)',
                'image' => 'Sizzling Pork Sisig.avif',
                'price' => 245.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Stuffed Squid (Per Gram)',
                'description' => 'Squid stuffed with chopped sausage bacon, carrot & onion',
                'image' => 'Sizzling stuffed squid.jfif',
                'price' => 1.60,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Hotdog',
                'description' => 'Sliced hotdog coered with spicy red sauce and mixed vegetable on the side',
                'image' => 'Sizzling-Hotdog1.jpg',
                'price' => 195.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Corn with Cheese',
                'description' => 'Sauteed whole corn kernels topped with grated cheese',
                'image' => 'sizzling corn with cheese.jpg',
                'price' => 195.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],
            [
                'name' => 'Sizzling Mushroom',
                'description' => 'Sauteed button mushroom topped with garlic bits',
                'image' => 'Sizzling mushroom only.jfif',
                'price' => 195.00,
                'category_id' => 9, // Assuming there is a category with ID 1
                'orders' => 0,
                'archived_at' => null
            ],

            // Add more entries as needed
        ];

        // Using Query Builder to insert data
        $this->db->table('menu')->insertBatch($data);
    }
}