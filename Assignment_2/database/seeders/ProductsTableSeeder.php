<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'RX 6900 XT Red Devil',
            'price' => 2499,
            'chipset' => 'AMD',
            'manufacturer_id' => 2,
            'vram' => '16GB GDDR6',
            'url' => 'https://www.pccasegear.com/products/52853/powercolor-radeon-rx-6900-xt-red-devil-oc-16gb-rdna-2',
            'image' => 'products_images/RadeonRX6900XTRedDevil.jpg',
            'description' => 'PowerColor Radeon RX 6900 XT Red Devil OC 16GB RDNA 2 gaming graphics card features a 2015MHz game clock (silent mode), 2340MHz boost clock (OC mode), 16GB GDDR6 VRAM, 256-bit memory interface, 16GB/s memory clock, AMD RDNA™ 2, PCI-E 4.0, 1 x HDMI 2.1, 3 x DisplayPort 1.4, OpenGL 4.6 and DirectX 12 Ultimate support, AMD FidelityFX, and Radeon Image Sharpening.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'GeForce RTX 3060',
            'price' => 1249,
            'chipset' => 'NVIDIA',
            'manufacturer_id' => 3,
            'vram' => '12GB GDDR6',
            'url' => 'https://www.pccasegear.com/products/54481/asus-geforce-rtx-3060-dual-oc-lhr-12gb',
            'image' => 'products_images/GeForceRTX3060.png',
            'description' => 'The ASUS GeForce RTX 3060 Dual OC LHR 12GB graphics card features a 1837Mhz boost clock (gaming mode), 1867MHz boost clock (OC mode), 12GB GDDR6 192-bit memory interface, 15GB/s memory speed, 1 x HDMI 2.1, 3 x DisplayPort 1.4a, HDCP 2.3 support, OpenGL 4.6 and DirectX 12 support, and ASUS Aura RGB lighting.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'Radeon RX 6600 XT Challenger',
            'price' => 2499,
            'chipset' => 'AMD',
            'manufacturer_id' => 4,
            'vram' => '8GB GDDR6',
            'url' => 'https://www.pccasegear.com/products/55178/asrock-radeon-rx-6600-xt-challenger-d-oc-8gb',
            'image' => 'products_images/RadeonRX6600XTChallengerD.png',
            'description' => 'The ASRock Radeon RX 6600 XT Challenger D OC 8GB gaming graphics card features a 2000MHz base clock, 2593MHz boost clock, 8GB GDDR6 VRAM, 128-bit memory interface, 16GB/s memory speed, AMD RDNA ™ 2, PCI-E 4.0, 1 x HDMI 2.1, 3 x DisplayPort 1.4, HDCP support, OpenGL 4.6 and DirectX 12 Ultimate support, and AMD FidelityFX, and Radeon Image Sharpening.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'Aorus GeForce RTX 3080 Xtreme',
            'price' => 2699,
            'chipset' => 'NVIDIA',
            'manufacturer_id' => 1,
            'vram' => '10GB GDDR6X',
            'url' => 'https://www.pccasegear.com/products/54733/gigabyte-aorus-geforce-rtx-3080-xtreme-lhr-10gb',
            'image' => 'products_images/GigabyteAorusGeForceRTX3080Xtreme.jpg',
            'description' => 'The Gigabyte Aorus GeForce RTX 3080 Xtreme LHR 10GB features a 1905MHz base clock, 10GB GDDR6X 320-bit memory interface, 19,000MHz memory clock, PCI-E 4.0, 3 x HDMI 2.1, 3 x DisplayPort 1.4a, OpenGL 4.6 and DirectX 12 Ultimate support, RGB lighting, LCD edge view.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'GeForce RTX 3080 Ti iCHILL Frostbite',
            'price' => 2899,
            'chipset' => 'NVIDIA',
            'manufacturer_id' => 5,
            'vram' => '12GB GDDR6X',
            'url' => 'https://www.pccasegear.com/products/55123/inno3d-geforce-rtx-3080-ti-ichill-frostbite-12gb',
            'image' => 'products_images/Inno3DGeForce3080TiCHILLX4.png',
            'description' => 'The Inno3D GeForce RTX 3080 Ti iCHILL Frostbite 12GB graphics card features a 1365MHz base clock, 1710MHz boost clock, 12GB GDDR6X 384-bit memory interface, 19GB/s memory speed, PCI-E 4.0, 1 x HDMI 2.1, 3 x DisplayPort 1.4a, HDCP 2.3 support, OpenGL 4.6 and DirectX 12 Ultimate support, RGB lighting, and an integrated water block cooling system.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'Radeon RX 6900 XT Liquid Devil',
            'price' => 2499,
            'chipset' => 'AMD',
            'manufacturer_id' => 2,
            'vram' => '16GB GDDR6',
            'url' => 'https://www.pccasegear.com/products/53565/powercolor-radeon-rx-6900-xt-liquid-devil-16gb-rdna-2',
            'image' => 'products_images/RadeonRX6900XTLiquidDevil.jpg',
            'description' => 'The PowerColor Radeon RX 6900 XT Liquid Devil 16GB RDNA 2 gaming graphics card features a 2135MHz game clock (OC mode), 2365MHz boost clock (OC mode), 16GB GDDR6 VRAM, 256-bit memory interface, 16GB memory speed, AMD RDNA™ 2, PCI-E 4.0, 1 x HDMI 2.1, 2 x DisplayPort 1.4, 1 x USB-C, OpenGL 4.6 and DirectX 12 support, an integrated EK waterblock, and RGB lighting.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'GeForce RTX 3080 Ti',
            'price' => 2799,
            'chipset' => 'NVIDIA',
            'manufacturer_id' => 3,
            'vram' => '12GB GDDR6X',
            'url' => 'https://www.pccasegear.com/products/54791/asus-geforce-rtx-3080-ti-tuf-gaming-12gb',
            'image' => 'products_images/GeForceRTX3080Ti.jpg',
            'description' => 'The ASUS GeForce RTX 3080 Ti TUF Gaming 12GB graphics card features a 1665MHz boost clock (gaming mode), 1695MHz boost clock (OC mode), 12GB GDDR6X 384-bit memory interface, 19GB/s memory speed, PCI-E 4.0, 2 x HDMI 2.1, 3 x DisplayPort 1.4a, HDCP 2.3 support, OpenGL 4.6 and DirectX 12 support, and RGB lighting.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'GeForce RTX 3080 Ti X3',
            'price' => 2549,
            'chipset' => 'NVIDIA',
            'manufacturer_id' => 5,
            'vram' => '12GB',
            'url' => 'https://www.pccasegear.com/products/55310/inno3d-geforce-rtx-3080-ti-x3-12gb',
            'image' => 'products_images/GeForceRTX3080TiX3.jpg',
            'description' => 'The Inno3D GeForce RTX 3080 Ti X3 12GB graphics card features a 1365MHz base clock, 1665MHz boost clock, 12GB GDDR6X 384-bit memory interface, 19GB/s memory speed, PCI-E 4.0, 1 x HDMI 2.1, 3 x DisplayPort 1.4a, HDCP 2.3 support, OpenGL 4.6, and DirectX 12 Ultimate support.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('products')->insert([
            'name' => 'GeForce RTX 3060 Ti Uprising',
            'price' => 1249,
            'chipset' => 'NVIDIA',
            'manufacturer_id' => 6,
            'vram' => '8GB GDDR6',
            'url' => 'https://www.pccasegear.com/products/54523/pny-geforce-rtx-3060-ti-uprising-dual-fan-lhr-8gb',
            'image' => 'products_images/GeForceRTX3080TiUprising.jpg',
            'description' => 'The PNY GeForce RTX 3060 Ti Uprising Dual Fan 8GB graphics card features a 1410MHz core clock speed, 1665MHz boost speed, 8GB GDDR6 256-bit memory interface, 14GB/s memory speed, PCI-E 4.0, 1 x HDMI 2.1, 3 x DisplayPort 1.4a, OpenGL 4.6 and DirectX 12 support.',
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
