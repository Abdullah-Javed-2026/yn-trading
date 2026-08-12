<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PakistanItemsSeeder extends Seeder
{
    /**
     * Seed Pakistani brands, categories, subcategories, hero banners, and products.
     *
     * @return void
     */
    public function run()
    {
        // 1. Seed Pakistani Brands
        $brands = [
            ['title' => 'Khaadi', 'slug' => 'khaadi', 'status' => 'active'],
            ['title' => 'Sapphire', 'slug' => 'sapphire', 'status' => 'active'],
            ['title' => 'Gul Ahmed', 'slug' => 'gul-ahmed', 'status' => 'active'],
            ['title' => 'Junaid Jamshed (J.)', 'slug' => 'junaid-jamshed', 'status' => 'active'],
            ['title' => 'Limelight', 'slug' => 'limelight', 'status' => 'active'],
            ['title' => 'Maria B', 'slug' => 'maria-b', 'status' => 'active'],
            ['title' => 'Sana Safinaz', 'slug' => 'sana-safinaz', 'status' => 'active'],
            ['title' => 'Baroque', 'slug' => 'baroque', 'status' => 'active'],
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->updateOrInsert(
                ['slug' => $brand['slug']],
                array_merge($brand, [
                    'created_at' => now(),
                    'updated_at' => now()
                ])
            );
        }

        // Get Brand IDs mapping
        $brandMap = DB::table('brands')->pluck('id', 'slug');

        // 2. Seed Hero Banners for Pakistan Sale
        DB::table('banners')->truncate();
        $banners = [
            [
                'title' => 'Azadi Festive Lawn Sale 2026',
                'slug' => 'azadi-festive-lawn-sale-2026',
                'photo' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=1200&auto=format&fit=crop',
                'description' => 'Up to 50% OFF on 3-Piece Unstitched & Pret Collections',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Men\'s Luxury Kurta & Waistcoat Collection',
                'slug' => 'mens-luxury-kurta-waistcoat-collection',
                'photo' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=1200&auto=format&fit=crop',
                'description' => 'Premium Stitched Kurta Shalwar & Raw Silk Waistcoats',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Ready to Wear Pret & Kurtis',
                'slug' => 'ready-to-wear-pret-kurtis',
                'photo' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=1200&auto=format&fit=crop',
                'description' => 'Chic Embroidered Pret Outfits & Modern Co-ord Sets',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('banners')->insert($banners);

        // 3. Seed Main Categories & Subcategories
        $categoriesData = [
            [
                'title' => 'Unstitched Collection',
                'slug' => 'unstitched-collection',
                'summary' => '3 Piece, 2 Piece, Chiffon, Lawn & Velvet Unstitched Suits',
                'photo' => 'https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'children' => [
                    ['title' => '3 Piece Lawn Suits', 'slug' => '3-piece-lawn-suits'],
                    ['title' => '2 Piece Printed Suits', 'slug' => '2-piece-printed-suits'],
                    ['title' => 'Luxury Chiffon Festive', 'slug' => 'luxury-chiffon-festive'],
                    ['title' => 'Winter Khaddar & Velvet', 'slug' => 'winter-khaddar-velvet'],
                ]
            ],
            [
                'title' => 'Ready to Wear (Pret)',
                'slug' => 'ready-to-wear-pret',
                'summary' => 'Stitched Kurtis, 2-Piece & 3-Piece Festive Outfits',
                'photo' => 'https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'children' => [
                    ['title' => 'Printed & Embroidered Kurtis', 'slug' => 'printed-embroidered-kurtis'],
                    ['title' => '2 Piece Pret Sets', 'slug' => '2-piece-pret-sets'],
                    ['title' => 'Festive Formal Pret', 'slug' => 'festive-formal-pret'],
                ]
            ],
            [
                'title' => 'Men\'s Eastern Wear',
                'slug' => 'mens-eastern-wear',
                'summary' => 'Stitched Kurta Shalwar, Waistcoats & Unstitched Boski',
                'photo' => 'https://images.unsplash.com/photo-1617137968427-85924c800a22?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'children' => [
                    ['title' => 'Stitched Kurta Shalwar', 'slug' => 'stitched-kurta-shalwar'],
                    ['title' => 'Waistcoats', 'slug' => 'waistcoats'],
                    ['title' => 'Unstitched Men\'s Fabric', 'slug' => 'unstitched-mens-fabric'],
                ]
            ],
            [
                'title' => 'Shawls & Footwear',
                'slug' => 'shawls-footwear',
                'summary' => 'Handcrafted Khussas, Kolhapuris & Velvet Shawls',
                'photo' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?q=80&w=600&auto=format&fit=crop',
                'is_parent' => 1,
                'parent_id' => null,
                'status' => 'active',
                'children' => [
                    ['title' => 'Velvet & Pashmina Shawls', 'slug' => 'velvet-pashmina-shawls'],
                    ['title' => 'Handcrafted Khussas', 'slug' => 'handcrafted-khussas'],
                ]
            ]
        ];

        foreach ($categoriesData as $cat) {
            $children = $cat['children'];
            unset($cat['children']);

            $catId = DB::table('categories')->insertGetId(array_merge($cat, [
                'created_at' => now(),
                'updated_at' => now()
            ]));

            foreach ($children as $child) {
                DB::table('categories')->insert([
                    'title' => $child['title'],
                    'slug' => $child['slug'],
                    'summary' => $child['title'],
                    'photo' => $cat['photo'],
                    'is_parent' => 0,
                    'parent_id' => $catId,
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        // Get Category IDs mapping
        $catMap = DB::table('categories')->pluck('id', 'slug');

        // 4. Seed Pakistani Products
        $products = [
            [
                'title' => '3-Piece Embroidered Lawn Suit with Chiffon Dupatta',
                'slug' => '3-piece-embroidered-lawn-suit-chiffon-dupatta',
                'summary' => 'Premium 3-Piece Unstitched Summer Lawn with Schiffli Embroidered Front & Silk Chiffon Dupatta.',
                'description' => '<p>Elevate your summer wardrobe with this exquisite 3-piece embroidered lawn suit. Features intricate neck embroidery, printed back and sleeves, paired with a lightweight printed chiffon dupatta and dyed trousers.</p>',
                'photo' => 'https://images.unsplash.com/photo-1583391733956-3750e0ff4e8b?q=80&w=600&auto=format&fit=crop',
                'stock' => 50,
                'size' => 'Unstitched',
                'condition' => 'hot',
                'status' => 'active',
                'price' => 4990,
                'discount' => 15,
                'is_featured' => 1,
                'cat_id' => $catMap['unstitched-collection'] ?? 1,
                'child_cat_id' => $catMap['3-piece-lawn-suits'] ?? null,
                'brand_id' => $brandMap['sapphire'] ?? 1,
            ],
            [
                'title' => 'Embroidered Lawn Pret Kurti - Emerald Green',
                'slug' => 'embroidered-lawn-pret-kurti-emerald-green',
                'summary' => 'Ready to Wear Stitched Lawn Kurti with Organza Border & Thread Embroidery.',
                'description' => '<p>Crafted from high-grade breathable cotton lawn, this emerald green kurti features detailed neck thread work and organza sleeve cuffs. Perfect for casual and semi-formal outings.</p>',
                'photo' => 'https://images.unsplash.com/photo-1525507119028-ed4c629a60a3?q=80&w=600&auto=format&fit=crop',
                'stock' => 35,
                'size' => 'S,M,L,XL',
                'condition' => 'new',
                'status' => 'active',
                'price' => 3490,
                'discount' => 10,
                'is_featured' => 1,
                'cat_id' => $catMap['ready-to-wear-pret'] ?? 2,
                'child_cat_id' => $catMap['printed-embroidered-kurtis'] ?? null,
                'brand_id' => $brandMap['limelight'] ?? 2,
            ],
            [
                'title' => 'Men\'s Premium Cotton Kurta Shalwar - Royal Navy',
                'slug' => 'mens-premium-cotton-kurta-shalwar-royal-navy',
                'summary' => 'Stitched Traditional Men\'s Kurta Shalwar in 100% Egyptian Cotton.',
                'description' => '<p>Classic Pakistani traditional wear for men. Tailored from soft Egyptian cotton fabric with band collar, cuff sleeves, and matching shalwar.</p>',
                'photo' => 'https://images.unsplash.com/photo-1617137968427-85924c800a22?q=80&w=600&auto=format&fit=crop',
                'stock' => 40,
                'size' => 'S,M,L,XL',
                'condition' => 'hot',
                'status' => 'active',
                'price' => 5990,
                'discount' => 10,
                'is_featured' => 1,
                'cat_id' => $catMap['mens-eastern-wear'] ?? 3,
                'child_cat_id' => $catMap['stitched-kurta-shalwar'] ?? null,
                'brand_id' => $brandMap['junaid-jamshed'] ?? 3,
            ],
            [
                'title' => 'Men\'s Raw Silk Embroidered Waistcoat - Charcoal Grey',
                'slug' => 'mens-raw-silk-embroidered-waistcoat-charcoal-grey',
                'summary' => 'Festive Raw Silk Waistcoat with Brass Buttons for Wedding & Eid Celebrations.',
                'description' => '<p>Complete your festive look with this tailored raw silk waistcoat featuring subtle self-texture, mandarin collar, and custom metallic buttons.</p>',
                'photo' => 'https://images.unsplash.com/photo-1507679799987-c73779587ccf?q=80&w=600&auto=format&fit=crop',
                'stock' => 25,
                'size' => 'M,L,XL',
                'condition' => 'new',
                'status' => 'active',
                'price' => 4500,
                'discount' => 15,
                'is_featured' => 1,
                'cat_id' => $catMap['mens-eastern-wear'] ?? 3,
                'child_cat_id' => $catMap['waistcoats'] ?? null,
                'brand_id' => $brandMap['junaid-jamshed'] ?? 3,
            ],
            [
                'title' => 'Luxury Chiffon Embroidered Festive Suit',
                'slug' => 'luxury-chiffon-embroidered-festive-suit',
                'summary' => '3-Piece Heavy Zari & Sequins Embroidered Chiffon Unstitched Suit.',
                'description' => '<p>Designed for grand occasions, this luxury chiffon suite comes with hand-embellished neckline, heavy sequin border, and matching silk inner and trouser.</p>',
                'photo' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=600&auto=format&fit=crop',
                'stock' => 20,
                'size' => 'Unstitched',
                'condition' => 'hot',
                'status' => 'active',
                'price' => 8990,
                'discount' => 20,
                'is_featured' => 1,
                'cat_id' => $catMap['unstitched-collection'] ?? 1,
                'child_cat_id' => $catMap['luxury-chiffon-festive'] ?? null,
                'brand_id' => $brandMap['baroque'] ?? 4,
            ],
            [
                'title' => 'Handcrafted Traditional Tilla Leather Khussa',
                'slug' => 'handcrafted-traditional-tilla-leather-khussa',
                'summary' => 'Pure Leather Hand-embroidered Khussa Shoe with Soft Padded Sole.',
                'description' => '<p>Authentic Pakistani handcrafted khussa crafted from genuine cowhide leather with metallic golden tilla embroidery. Comfortable and durable padding.</p>',
                'photo' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?q=80&w=600&auto=format&fit=crop',
                'stock' => 60,
                'size' => '37,38,39,40,41',
                'condition' => 'default',
                'status' => 'active',
                'price' => 2850,
                'discount' => 10,
                'is_featured' => 1,
                'cat_id' => $catMap['shawls-footwear'] ?? 4,
                'child_cat_id' => $catMap['handcrafted-khussas'] ?? null,
                'brand_id' => $brandMap['khaadi'] ?? 1,
            ],
            [
                'title' => 'Embroidered Micro Velvet Festive Shawl',
                'slug' => 'embroidered-micro-velvet-festive-shawl',
                'summary' => 'Royal Micro Velvet Shawl with Four-Side Heavy Zari Border Embroidery.',
                'description' => '<p>A timeless winter statement piece. Plush micro-velvet shawl embellished with gold zari threadwork along all four borders.</p>',
                'photo' => 'https://images.unsplash.com/photo-1608256246200-53e635b5b65f?q=80&w=600&auto=format&fit=crop',
                'stock' => 15,
                'size' => 'Free Size',
                'condition' => 'hot',
                'status' => 'active',
                'price' => 6500,
                'discount' => 25,
                'is_featured' => 1,
                'cat_id' => $catMap['shawls-footwear'] ?? 4,
                'child_cat_id' => $catMap['velvet-pashmina-shawls'] ?? null,
                'brand_id' => $brandMap['maria-b'] ?? 5,
            ],
            [
                'title' => '2-Piece Stitched Printed Linen Co-Ord Set',
                'slug' => '2-piece-stitched-printed-linen-co-ord-set',
                'summary' => 'Trendy Stitched Printed Linen Top with Matching Straight Cut Trouser.',
                'description' => '<p>Stay effortlessly stylish with this contemporary 2-piece printed linen co-ord set featuring high-low shirt hem and matching trousers.</p>',
                'photo' => 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?q=80&w=600&auto=format&fit=crop',
                'stock' => 30,
                'size' => 'S,M,L',
                'condition' => 'new',
                'status' => 'active',
                'price' => 3990,
                'discount' => 10,
                'is_featured' => 1,
                'cat_id' => $catMap['ready-to-wear-pret'] ?? 2,
                'child_cat_id' => $catMap['2-piece-pret-sets'] ?? null,
                'brand_id' => $brandMap['sana-safinaz'] ?? 6,
            ],
        ];

        foreach ($products as $prod) {
            DB::table('products')->updateOrInsert(
                ['slug' => $prod['slug']],
                array_merge($prod, [
                    'created_at' => now(),
                    'updated_at' => now()
                ])
            );
        }

        echo "Pakistani items, brands, categories, hero banners, and products seeded successfully!\n";
    }
}
