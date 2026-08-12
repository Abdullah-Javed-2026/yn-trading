<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CleanGeneralCategoriesSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $generalCategories = [
            [
                'id' => 1,
                'title' => 'Men\'s Fashion',
                'slug' => 'mens-fashion',
                'summary' => 'Men\'s Eastern & Western Apparel',
                'photo' => 'https://images.unsplash.com/photo-1617137968427-85924c800a22?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => 'Women\'s Fashion',
                'slug' => 'womens-fashion',
                'summary' => 'Women\'s Apparel & Festive Wear',
                'photo' => 'https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'title' => 'Kid\'s Clothing',
                'slug' => 'kids-clothing',
                'summary' => 'Boys & Girls Traditional & Casual Outfits',
                'photo' => 'https://images.unsplash.com/photo-1519238263530-99bdd11df2ea?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'title' => 'Unstitched Collection',
                'slug' => 'unstitched-collection',
                'summary' => '3 Piece & 2 Piece Lawn, Chiffon & Velvet Suits',
                'photo' => 'https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'title' => 'Ready to Wear (Pret)',
                'slug' => 'ready-to-wear-pret',
                'summary' => 'Stitched Kurtis, Festive Pret & Co-ord Sets',
                'photo' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'title' => 'Footwear & Accessories',
                'slug' => 'footwear-accessories',
                'summary' => 'Handcrafted Khussas, Kolhapuris & Shawls',
                'photo' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('categories')->insert($generalCategories);

        // Remap products to active category IDs 1-6
        DB::table('products')->update(['child_cat_id' => null]);
        DB::table('products')->whereNotIn('cat_id', [1,2,3,4,5,6])->update(['cat_id' => 1]);

        echo "Database categories successfully reset to 6 clean general categories!\n";
    }
}
